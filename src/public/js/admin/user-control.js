import {
  getAllUsers,
  getAllManagers,
  addUser,
  updateUser,
  deleteUser,
} from "../api/user-api.js"

import { XORDecrypt } from "../util/EncryptXOR.js";
import { RegisterAPI } from "../api/LoginAPI.js";

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
  //   var rowData = table.row(indexes).data();
  //   if (type === "row") {
  //     var data = table.rows(indexes).data();
  //     fillEditData(data[0][0]);
  //   }
  // });

  table.on('click', 'td', function () {
    const cell = table.cell(this);
    const rowIndex = cell.index().row;
    // Delete
    if ($(this).index() === 7) {
      const id = table.cell({ row: rowIndex, column: 0 }).data();
      const name = table.cell({ row: rowIndex, column: 1 }).data();
      $('#ModalDeleteUser .modal-body').html(`Bạn có chắc muốn xóa ${name}`)
      $('#btn-delete-user-modal').attr('data-id', id)
      $('#ModalDeleteUser').modal('show')
    }
    // Edit
    else {
      const data = table.rows(rowIndex).data()
      fillEditData(data[0][0]);
    }
  })

  $('#btn-delete-user-modal').click(function () {
    const id = $(this).attr('data-id')
    deleteUser(id).then(
      (res) => {
        if (!res.status)
          $("#ModalDeleteUser .message")
            .text("Xóa thất bại")
            .removeClass("success");
        else {
          $("#ModalDeleteUser .message")
            .text("Xóa thành công")
            .addClass("success");
          $(".all-user").trigger("click");
        }
        const delay = setTimeout(() => {
          $('#ModalDeleteUser').modal('hide')
        }, 2000)
      }
    )
  })

  $(".item-choosing-block").click(function () {
    $(".item-choosing-block .divider-mini").remove();
    $(this).append("<div class=divider-mini></div>");
  });

  $(".all-user").click(() => loadAllUser().then(() => showData(currentData)));
  $(".customer").click(() => loadUser().then(() => showData(currentData)));
  $(".manager").click(() => loadManager().then(() => showData(currentData)));

  $("#btn-search").click(() => {
    let queryID = $(".input-place.input").val()
    $(".input-place.input").val('')

    allData.filter((element) => {
      if (queryID == element['user_id']) {
        let tempData = []
        tempData.push(element)
        $(".item-choosing-block .divider-mini").remove();
        $(".search-result").parent().append("<div class=divider-mini></div>");
        showData(tempData);
      }
    }
    );

  });

  // Add form
  $("#btn-add").click(() => {
    let firstName = $("#ModalAddUser .first-name").val().trim();
    let lastName = $("#ModalAddUser .last-name").val().trim();
    let email = $("#ModalAddUser .email").val().trim();
    let username = $("#ModalAddUser .username").val().trim();
    let password = $("#ModalAddUser .password").val().trim();
    let address = $("#ModalAddUser .address").val();
    let phone = $("#ModalAddUser .phone").val();
    let type = $("#ModalAddUser .type").val();
    addUser(email, username, password, firstName, lastName, phone, address, type).then(
      (res) => {
        if (!res.status)
          $("#ModalAddUser .message")
            .text("Thêm thất bại")
            .removeClass("success");
        else {
          $("#ModalAddUser .message")
            .text("Thêm thành công")
            .addClass("success");
          $(".all-user").trigger("click");
        }
        const delay = setTimeout(() => {
          $('#ModalAddUser').modal('hide')
        }, 2000)
      }
    );
  });

  // Edit form
  $("#btn-edit").click(() => {
    let firstName = $("#ModalEditUser .first-name").val().trim();
    let lastName = $("#ModalEditUser .last-name").val().trim();
    let password = $("#ModalEditUser .password").val().trim();
    let phone = $("#ModalEditUser .phone").val();
    let id = $("#ModalEditUser .id").val();
    let userType = $("#ModalEditUser .type").val();
    let address = $("#ModalEditUser .address").val();

    updateUser(id, userType, password, firstName, lastName, phone, address).then(
      (res) => {
        console.log(res)
        if (!res.status)
          $("#ModalEditUser .message")
            .text("Cập nhật thất bại")
            .removeClass("success");
        else {
          $("#ModalEditUser .message")
            .text("Cập nhật thành công")
            .addClass("success");
          $(".all-user").trigger("click");
        }
        const delay = setTimeout(() => {
          $('#ModalEditUser').modal('hide')
        }, 2000)
      }
    )
  });

  loadAllUser().then(() => showData(currentData)); // page load
});

function showData(data) {
  table.clear().draw();
  let numRow = data.length;
  for (let i = 0; i < numRow; i++) {
    table.row
      .add([
        data[i]['user_id'],
        data[i]['first_name'] + ' ' + data[i]['last_name'],
        data[i].email,
        data[i]['phone_number'],
        data[i].password,
        data[i].address ? data[i].address : "",
        data[i]['user_type'] == 1 ? "Quản lý" : "Khách hàng",
        "Xóa"
      ])
      .draw();
  }
}

async function loadAllUser() {
  currentData = [];
  let page = 1;
  let data;
  do {
    data = await getAllUsers();
    currentData.push(...data.data);
    page++;
  } while (data.data.length == 0);
  page = 1;

  do {
    data = await getAllManagers();
    currentData.push(...data.data);
    page++;
  } while (data.data.length == 0);
  allData = [...currentData];
}

async function loadUser() {
  currentData = [];
  let page = 1;
  let data;
  data = await getAllUsers();
  for (let i = 0; i < data.data.length; i++) {
    currentData.push(data.data[i]);
  }
  return currentData;
}

async function loadManager() {
  currentData = [];
  let page = 1;
  let data;
  data = await getAllManagers();
  currentData.push(...data.data);
  return currentData;
}

function fillEditData(id) {
  let editModal = $("#ModalEditUser");
  let data = currentData.find((e) => e['user_id'] === id);
  editModal.find(".id").val(id);
  editModal.find(".type").val(data['user_type']);
  editModal.find(".first-name").val(data['first_name']);
  editModal.find(".last-name").val(data['last_name']);
  editModal.find(".email").val(data.email);
  editModal.find(".phone").val(data['phone_number']);
  //editModal.find(".password").val(data.password);
  editModal.find(".address").val(data.address)
  editModal.modal("show");
}
