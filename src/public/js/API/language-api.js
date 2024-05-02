const getLanguageById = async (url, id = "1") => {
  const data = await fetch(
    `${url}/Controller/Language/ajax.php?action=getLanguageById&id=${id}`,
    {
      method: "GET",
    }
  );
  const datatorender = await data.json();
  return datatorender;
};
const getAllLanguages = async () => {
  const url = 'http://localhost:8080/api/language'
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
const addLanguage = async (url = "../..", name) => {
  const urls = `${url}/Controller/Language/ajax.php`;
  const data = await fetch(urls, {
    method: "POST",
    body: JSON.stringify({
      name: name,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};
const removeLanguage = async (url = "../..", id) => {
  const urls = `${url}/Controller/Language/ajax?id=${id}.php`;
  const data = await fetch(urls, {
    method: "DELETE",
  });
  const datatorender = await data.json();
  return datatorender;
};
const updateLanguage = async (url = "../..", name, id) => {
  const urls = `${url}/Controller/Language/ajax.php`;
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

export {
  getAllLanguages,
  getLanguageById,
  addLanguage,
  removeLanguage,
  updateLanguage,
};
