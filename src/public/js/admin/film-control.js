import {
  getAllFilms,
  getFilmById,
  getFilmsByCondition,
  getPremiereFilms,
  getUpcomingFilms,
  addFilm,
  updateFilm,
  getHotFilms,
} from "../api/film-api.js";
import { getAllGenres } from "../api/genre-api.js";
import { getAllStudios } from "../api/studio-api.js";
import { getAllLanguages } from "../api/language-api.js";
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
  table.on("select", function (e, dt, type, indexes) {
    if (type === "row") {
      var data = table.rows(indexes).data();
      fillEditData(data[0][0]);
    }
  });
  $(".item-choosing-block").click(function () {
    $(".item-choosing-block .divider-mini").remove();
    $(this).append("<div class=divider-mini></div>");
  });

  $(".hot-film").click(() => loadHotFilm().then(() => showData(currentData)));
  $(".premiere-film").click(() =>
    loadPremiereFilms().then(() => showData(currentData))
  );
  $(".upcoming-film").click(() =>
    loadUpcomingFilm().then(() => showData(currentData))
  );
  $(".all-film").click(() => loadAllFilms().then(() => showData(currentData)));
  $("#btn-search").click(async () => {
    const id = $("#search-film-by-id").val().trim();
    $("#search-film-by-id").val('')
    const languageID = $("#select-language").val();
    const genreID = $("#select-genre").val();
    const studioID = $("#select-studio").val();
    const data = await getFilmsByCondition(genreID, studioID, languageID, id)
    currentData = []
    for (let i = 0; i < data.data.length; i++) {
      currentData.push(data.data[i]);
    }
    $(".item-choosing-block .divider-mini").remove();
    $(".search-result").parent().append("<div class=divider-mini></div>");
    showData(currentData);
  });

  // Add form
  $("#btn-add").click(() => {
    let FilmName = $("#ModalAddUser #name").val().trim();
    let Time = $("#ModalAddUser #time").val().trim();
    let LanguageID = $("#ModalAddUser #language").val().trim();
    let StudioID = $("#ModalAddUser #studio").val();
    let posterFile = $("#ModalAddUser #poster").val();
    let imageFiles = $("#ModalAddUser #image").val();

    let Director = $("#ModalAddUser #director").val().trim();
    let rating = $("#ModalAddUser #rating").val().trim();

    let age = $("#ModalAddUser #age").val();
    let listGenre = $("#ModalAddUser #genre").val();
    let story = $("#ModalAddUser #story").val().trim();
    let Year = $("#ModalAddUser #year").val();
    let Premiere = $("#ModalAddUser #premiere").val();
    let URLTrailer = $("#ModalAddUser #trailer").val();
    if (!posterFile || !imageFiles) return;

    let listImage = [];
    $("#ModalAddUser #poster")[0]
      .files[0].convertToBase64()
      .then((res) => {
        listImage.push({ file: res.result, type: 1 });
      });
    $("#ModalAddUser #image")[0]
      .files.convertAllToBase64(/\.(png|jpeg|jpg|gif)$/i)
      .then(function (res) {
        listImage.push(
          ...res.map((e) => {
            return { file: e.result, type: 2 };
          })
        );
        addFilm(
          FilmName,
          Director,
          Year,
          Premiere,
          URLTrailer,
          Time,
          StudioID,
          LanguageID,
          story,
          age,
          rating,
          listGenre,
          listImage,
          imageFiles,
          posterFile
        ).then((res) => {
          if (res.success == false)
            $("#ModalAddUser .message")
              .text("Thêm thất bại")
              .removeClass("success");
          else
            $("#ModalAddUser .message")
              .text("Thêm thành công")
              .addClass("success");
        });
      });
  });

  // Edit form
  $("#btn-edit").click(() => {
    let FilmID = $("#ModalEditUser #id").val().trim();
    let FilmName = $("#ModalEditUser #name").val().trim();
    let Time = $("#ModalEditUser #time").val().trim();
    let LanguageID = $("#ModalEditUser #language").val().trim();
    let StudioID = $("#ModalEditUser #studio").val();
    let Director = $("#ModalEditUser #director").val().trim();
    let age = $("#ModalEditUser #age").val();
    let story = $("#ModalEditUser #story").val().trim();
    let Year = $("#ModalEditUser #year").val().trim();
    let Premiere = $("#ModalEditUser #premiere").val();
    let URLTrailer = $("#ModalEditUser #trailer").val();

    updateFilm(
      "../..",
      FilmID,
      FilmName,
      Director,
      Year,
      Premiere,
      URLTrailer,
      Time,
      StudioID,
      LanguageID,
      story,
      age
    ).then((res) => {
      if (res.success == false)
        $("#ModalEditUser .message")
          .text("Sửa thất bại")
          .removeClass("success");
      else {
        $("#ModalEditUser .message").text("Sửa thành công").addClass("success");
      }
    });
  });

  loadAllFilms().then(() => showData(currentData)); // page load
  loadAllGenre();
  loadAllStudio();
  loadAllLanguage();
});

function showData(currentData) {
  table.clear().draw();
  let data = currentData;
  let numRow = data.length;
  for (let i = 0; i < numRow; i++) {
    table.row
      .add([
        data[i]['film_id'],
        data[i]['name'],
        data[i]['time'],
        data[i]['type'],
        data[i]['premiere'],
        data[i]['director'],
        data[i]['description'],
        data[i]['language_name'],
        data[i]['url_poster_vertical'],
        data[i]['url_trailer']
      ])
      .draw();
  }
}

async function loadPremiereFilms() {
  currentData = [];
  let data;
  data = await getPremiereFilms();
  for (let i = 0; i < data.data.length; i++) {
    currentData.push(data.data[i]);
  }
  // allData = [...currentData]
  return currentData;
}

async function loadHotFilm() {
  currentData = [];
  let data = await getHotFilms();
  for (let i = 0; i < data.data.length; i++) {
    currentData.push(data.data[i]);
  }
  return currentData;
}

async function loadUpcomingFilm() {
  currentData = [];
  let data = await getUpcomingFilms();
  for (let i = 0; i < data.data.length; i++) {
    currentData.push(data.data[i]);
  }
  return currentData;
}

async function loadAllFilms() {
  currentData = [];
  let data;
  data = await getAllFilms();
  for (let i = 0; i < data.data.length; i++) {
    currentData.push(data.data[i]);
  }
  // allData = [...currentData]
  return currentData;
}

async function loadAllGenre() {
  let page = 1;
  let genreData = [];
  let data;
  let options = [];
  data = await getAllGenres();
  genreData.push(...data.data);
  genreData.forEach((element) => {
    $("#select-genre").append(
      `<option value=${element['genre_id']}>${element['genre_name']}</option>`
    );
    options.push({ id: element['genre_id'], name: element['genre_name'] });
  });
  $(".modal #genre").selectize({
    valueField: "id",
    labelField: "name",
    options: options,
  });
}

async function loadAllStudio() {
  let data = await getAllStudios("../..");
  data.data.forEach((element) => {
    $("#select-studio").append(
      `<option value=${element['studio_id']}>${element['studio_name']}</option>`
    );
    $(".modal #studio").append(
      `<option value=${element['studio_id']}>${element['studio_name']}</option>`
    );
  });
}

async function loadAllLanguage() {
  let data = await getAllLanguages("../..");
  data.data.forEach((element) => {
    $("#select-language").append(
      `<option value=${element['language_id']}>${element['language_name']}</option>`
    );
    $(".modal #language").append(
      `<option value=${element['language_id']}>${element['language_name']}</option>`
    );
  });
}

function fillEditData(id) {
  let editModal = $("#ModalEditUser");
  let data = currentData.find((e) => e.FilmId === id);
  editModal.find("#id").val(data.FilmId);
  editModal.find("#name").val(data.name);
  editModal.find("#time").val(data.time);
  editModal.find("#language").val(data.language).change();
  editModal.find("#studio").val(data.studio).change();
  editModal.find("#director").val(data.director);
  editModal.find("#age").val(data.age);
  editModal.find("#trailer").val(data.urlTrailer);
  editModal.find("#year").val(data.year);
  editModal.find("#premiere").val(data.premiere);
  editModal.find("#story").val(data.story);
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

FileList.prototype.convertAllToBase64 = function (regexp) {
  // empty regexp if not set
  regexp = regexp || /.*/;
  //making array from FileList
  var filesArray = Array.prototype.slice.call(this);
  var base64PromisesArray = filesArray
    .filter(function (file) {
      return regexp.test(file.name);
    })
    .map(function (file) {
      return file.convertToBase64();
    });
  return Promise.all(base64PromisesArray);
};
