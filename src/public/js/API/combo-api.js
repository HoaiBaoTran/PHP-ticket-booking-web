const getAllCombos = async () => {
  const url = 'http://localhost:8080/api/combo/-1'
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

const getComboById = async (id) => {
  const url = `http://localhost:8080/api/combo/${id}`
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
}

const addCombo = async (formData) => {
  const url = `http://localhost:8080/api/combo/-1`
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

const updateCombo = async (formData) => {
  const url = `http://localhost:8080/api/combo/${formData.get('id')}`
  let dataRes
  const postData = {
    name: formData.get('name'),
    price: formData.get('price'),
    status: formData.get('status'),
  }
  await $.ajax({
    url: url,
    type: 'PUT',
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

const deleteCombo = async (id) => {
  const url = `http://localhost:8080/api/combo/${id}`
  let dataRes
  await $.ajax({
    url: url,
    type: 'DELETE',
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
}

export { getAllCombos, getComboById, addCombo, updateCombo, deleteCombo };
