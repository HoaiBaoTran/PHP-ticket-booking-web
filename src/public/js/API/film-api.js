const getAllFilms = async () => {
    const url = 'http://localhost:8080/api/film/-10'
    let dataRes
    await $.ajax({
        url: url,
        type: 'GET',
        async: false,
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};

const getFilmById = async (id) => {
    const url = `http://localhost:8080/api/film/${id}`
    let dataRes
    await $.ajax({
        url: url,
        type: 'GET',
        async: false,
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};

const getFilmsByCondition = async (genre, studio, language, id) => {
    const url = `http://localhost:8080/api/film/-3`
    let postData
    if (id != '') {
        postData = {
            genre,
            studio,
            language,
            id,
        }
    }
    else {
        postData = {
            genre,
            studio,
            language,
        }
    }
    let dataRes
    await $.ajax({
        url: url,
        type: 'POST',
        data: postData,
        async: false,
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};

const getHotFilms = async () => {
    const url = `http://localhost:8080/api/film/0`
    let dataRes
    await $.ajax({
        url: url,
        type: 'GET',
        async: false,
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};

// const getHotFilmAPIPaginated = async (url) => {
//     const data = await fetch(`${url}/api/v1/Film/hot?page=1`, {
//         method: "GET",
//     });
//     const datatorender = await data.json();
//     return datatorender;
// };

// const getPremiereFilmsByGenreID = async (url, id) => {
//     const data = await fetch(`${url}/api/v1/Film/playing?genre-id=${id}`, {
//         method: "GET",
//     });
//     const datatorender = await data.json();
//     return datatorender;
// };

const getPremiereFilms = async () => {
    const url = `http://localhost:8080/api/film/-1`
    let dataRes
    await $.ajax({
        url: url,
        type: 'GET',
        async: false,
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};

const getUpcomingFilms = async () => {
    const url = `http://localhost:8080/api/film/-2`
    let dataRes
    await $.ajax({
        url: url,
        type: 'GET',
        async: false,
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};


const addFilm = async (
    formData
) => {
    const url = `http://localhost:8080/api/film/-1`
    let dataRes
    await $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        async: false,
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from setting contentType
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};

const updateFilm = async (
    formData
) => {
    const url = `http://localhost:8080/api/film/-1`
    let dataRes
    await $.ajax({
        url: url,
        type: 'PUT',
        data: formData,
        async: false,
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from setting contentType
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};

const deleteFilm = async (id) => {
    const url = `http://localhost:8080/api/film/${id}`
    let dataRes
    await $.ajax({
        url: url,
        type: 'DELETE',
        async: false,
        success: async function (data) {
            dataRes = JSON.parse(data)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    })
    return dataRes
};

export {
    getAllFilms,
    getFilmsByCondition,
    // getPremiereFilmsByGenreID,
    // getHotFilmAPIPaginated,
    getPremiereFilms,
    getUpcomingFilms,
    getHotFilms,
    getFilmById,
    addFilm,
    updateFilm,
    deleteFilm,
};
