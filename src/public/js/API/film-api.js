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
    listImage
) => {
    console.log('name: ', FilmName)
    console.log('Director: ', Director)
    console.log('Year: ', Year)
    console.log('Premiere: ', Premiere)
    console.log('URLTrailer: ', URLTrailer)
    console.log('Time: ', Time)
    console.log('LanguageID: ', LanguageID)
    console.log('StudioID: ', StudioID)
    console.log('story: ', story)
    console.log('age: ', age)
    console.log('rating: ', rating)
    console.log('listGenre: ', listGenre)
    console.log('listImage: ', listImage)
    // const urls = `${url}/api/v1/Film`;
    // const data = await fetch(urls, {
    //     headers: {
    //         "Content-Type": "application/json",
    //     },
    //     method: "POST",
    //     body: JSON.stringify({
    //         action: "addFilm",
    //         name: FilmName,
    //         director: Director,
    //         year: Year,
    //         premiere: Premiere,
    //         urlTrailer: URLTrailer,
    //         time: Time,
    //         studioId: StudioID,
    //         language: LanguageID,
    //         story: story,
    //         age: age,
    //         FilmGenres: listGenre,
    //         verticalPoster: listImage[0].file,
    //         horizontalPoster: listImage[1].file,
    //     }),
    // });
    // const datatorender = await data.json();
    // return datatorender;
};

const updateFilm = async (
    url = "../..",
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
) => {
    const urls = `${url}/api/v1/Film/Films/${FilmID}`;
    const data = await fetch(urls, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            action: "updateFilm",
            FilmId: FilmID,
            name: FilmName,
            director: Director,
            year: Year,
            premiere: Premiere,
            urlTrailer: URLTrailer,
            time: Time,
            studioId: StudioID,
            language: LanguageID,
            story: story,
            age: age,
        }),
    });
    const datatorender = await data.json();
    return datatorender;
};

const deleteFilm = async (url, id) => {
    const data = await fetch(`${url}/api/v1/Film/${id}`, {
        method: "DELETE",
    });
    const datatorender = await data.json();
    return datatorender;
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
