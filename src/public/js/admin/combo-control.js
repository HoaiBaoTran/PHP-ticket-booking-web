import { getAllCombos, getComboById, addCombo, updateCombo, deleteCombo } from "../api/combo-api.js";
import { XORDecrypt } from "../util/EncryptXOR.js";

let allData = [];
let currentData = [];

let table = $("#table-content").DataTable({
  pagelength: 5,
  lengthMenu: [5, 10],
  select: {
    style: "single",
    info: false,
  },
  searching: true,
  language: {
    lengthMenu: "Số kết quả / Trang _MENU_",
    zeroRecords: "Không tìm thấy dữ liệu",
    info: "Hiển thị trang _PAGE_ trên _PAGES_",
    infoEmpty: "Đang tìm kiếm dữ liệu",
    infoFiltered: "(filtered from _MAX_ total records)",
    paginate: {
      first: "Trang đầu",
      last: "Trang cuối",
      next: "Trang sau",
      previous: "Trang trước",
    },
  },
});

$("#table-content_filter").hide();
$(document).ready(() => {
  // table.on("select", function (e, dt, type, indexes) {
  //   if (type === "row") {
  //     var data = table.rows(indexes).data();
  //     fillEditData(data[0][0]);
  //   }
  // });

  table.on('click', 'td', function () {
    const cell = table.cell(this);
    const rowIndex = cell.index().row;
    // Delete
    if ($(this).index() === 5) {
      const id = table.cell({ row: rowIndex, column: 0 }).data();
      const name = table.cell({ row: rowIndex, column: 1 }).data();
      $('#ModalDeleteCombo .modal-body').html(`Bạn có chắc muốn xóa ${name}`)
      $('#btn-delete-combo-modal').attr('data-id', id)
      $('#ModalDeleteCombo').modal('show')
    }
    // Edit
    else {
      const data = table.rows(rowIndex).data()
      fillEditData(data[0][0]);
    }
  })

  $('#btn-delete-combo-modal').click(function () {
    const id = $(this).attr('data-id')
    deleteCombo(id).then(
      (res) => {
        if (!res.status)
          $("#ModalDeleteCombo .message")
            .text("Xóa thất bại")
            .removeClass("success");
        else {
          $("#ModalDeleteCombo .message")
            .text("Xóa thành công")
            .addClass("success");
          $(".all-combo").trigger("click");
        }
        const delay = setTimeout(() => {
          $('#ModalDeleteCombo').modal('hide')
          $("#ModalDeleteCombo .message").text("")
        }, 2000)
      }
    )
  })

  $(".item-choosing-block").click(function () {
    $(".item-choosing-block .divider-mini").remove();
    $(this).append("<div class=divider-mini></div>");
  });

  $(".all-combo").click(() => loadAllMenu().then(() => showData(currentData)));

  $("#btn-search").click(async () => {
    const id = $("#search-combo-by-id").val().trim();
    $("#search-combo-by-id").val('')
    const data = await getComboById(id)
    currentData = []
    for (let i = 0; i < data.data.length; i++) {
      currentData.push(data.data[i]);
    }
    $(".item-choosing-block .divider-mini").remove();
    $(".search-result").parent().append("<div class=divider-mini></div>");
    showData(currentData);
  });

  $("#btn-add").click(() => {
    let Name = $("#ModalAddUser #Name").val().trim();
    let Price = $("#ModalAddUser #Price").val().trim();
    let status = $("#ModalAddUser #status").val();
    let imageFile = $("#ModalAddUser #image")[0].files[0];

    const formData = new FormData();
    formData.append('name', Name)
    formData.append('price', Price)
    formData.append('status', status)
    formData.append('image', imageFile)

    if (!imageFile) return;
    $("#ModalAddUser #image")[0]
      .files[0].convertToBase64()
      .then((res) => {
        addCombo(
          formData
        ).then((res) => {
          if (!res.status)
            $("#ModalAddUser .message")
              .text("Thêm thất bại")
              .removeClass("success");
          else
            $("#ModalAddUser .message")
              .text("Thêm thành công")
              .addClass("success");
          $(".all-combo").trigger("click");
          const delay = setTimeout(() => {
            $('#ModalAddUser').modal('hide')
            $("#ModalAddUser .message").text("")
          }, 2000)
        });
      });
  });

  $("#btn-edit").click(() => {
    let ItemID = $("#ModalEditUser #ItemID").val().trim();
    let Name = $("#ModalEditUser #Name").val().trim();
    let Price = $("#ModalEditUser #Price").val().trim();
    let status = $("#ModalEditUser #status").val();

    const formData = new FormData();
    formData.append('id', ItemID)
    formData.append('name', Name)
    formData.append('price', Price)
    formData.append('status', status)

    updateCombo(formData).then(
      (res) => {
        if (!res.status)
          $("#ModalEditUser .message")
            .text("Sửa thất bại")
            .removeClass("success");
        else
          $("#ModalEditUser .message")
            .text("Sửa thành công")
            .addClass("success");
        $(".all-combo").trigger("click");
      }
    );
  });
  loadAllMenu().then(() => showData(currentData));
});

async function loadAllMenu() {
  currentData = [];
  let data;
  data = await getAllCombos();
  for (let i = 0; i < data.data.length; i++) {
    currentData.push(data.data[i]);
  }
  console.log(currentData);
  return currentData;
}

function toVndCurrencyFormat(number) {
  const currencyFormat = new Intl.NumberFormat("vi-VN", {
    style: "currency",
    currency: "VND",
    minimumFractionDigits: 0,
  });

  return currencyFormat.format(number);
}

function showData(currentData) {
  table.clear().draw();
  let data = currentData;
  let numRow = data.length;
  for (let i = 0; i < numRow; i++) {
    table.row
      .add([
        data[i]['item_id'],
        data[i].name,
        data[i].price,
        data[i]['image_url'],
        data[i].status,
        'Xóa',
      ])
      .draw();
  }
}

function fillEditData(id) {
  let editModal = $("#ModalEditUser");
  let data = currentData.find((e) => e['item_id'] === id);
  console.log(data);
  editModal.find("#ItemID").val(data['item_id']);
  editModal.find("#Name").val(data.name);
  editModal.find("#Price").val(data.price);
  editModal
    .find("#image")
    .val(data['image_url']);
  editModal.find("#status").val(data.status);
  editModal.modal("show");
}

File.prototype.convertToBase64 = function () {
  return new Promise(
    function (resolve, reject) {
      var reader = new FileReader();
      reader.onloadend = function (e) {
        resolve({
          fileName: this.name,
          result: e.target.result,
          error: e.target.error,
        });
      };
      reader.readAsDataURL(this);
    }.bind(this)
  );
};
