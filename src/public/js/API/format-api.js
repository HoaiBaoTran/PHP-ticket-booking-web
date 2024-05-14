const getFormatById = async (url, id = 1) => {
  const data = await fetch(
    `${url}/api/v1/format/${id}`,
    {
      method: "GET",
    }
  );
  const datatorender = await data.json();
  return datatorender;
};
const getAllFormats = async () => {
  const url = `http://localhost:8080/api/format/-1`
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
const getAllFormatsOfMovie = async (url, movieId = 1) => {
  const data = await fetch(
    `${url}/Controller/Format/ajax.php?action=getAllFormatsOfMovie&movieId=${movieId}`,
    {
      method: "GET",
    }
  );
  const datatorender = await data.json();
  return datatorender;
};
const updateFormat = async (url = "../..", name, id) => {
  const urls = `${url}/Controller/Format/ajax.php`;
  const data = await fetch(urls, {
    method: "PUT",
    body: JSON.stringify({
      name: name,
      id: id,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};
const removeFormat = async (url = "../..", id) => {
  const urls = `${url}/Controller/Format/ajax?id=${id}.php`;
  const data = await fetch(urls, {
    method: "DELETE",
  });
  const datatorender = await data.json();
  return datatorender;
};
const addFormat = async (url = "../..", name) => {
  const urls = `${url}/Controller/Format/ajax.php`;
  const data = await fetch(urls, {
    method: "POST",
    body: JSON.stringify({
      name: name,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};
const getAllFormatsByMovieId = async (url, IDMovie = 1) => {
  const data = await fetch(
    `${url}/Controller/Format/ajax.php?action=getAllFormatsByMovieId&movieId=${IDMovie}`,
    {
      method: "GET",
    }
  );
  const datatorender = await data.json();
  return datatorender;
};
export {
  addFormat,
  updateFormat,
  removeFormat,
  getAllFormats,
  getAllFormatsOfMovie,
  getFormatById,
  getAllFormatsByMovieId,
};
