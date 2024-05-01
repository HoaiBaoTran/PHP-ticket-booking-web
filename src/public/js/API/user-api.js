const getAllUsers = async () => {
  const url = 'http://localhost:8080/api/user/-1'
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

const getAllManagers = async () => {
  const url = 'http://localhost:8080/api/manager'
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

// const changePassword = async (url = "../..", id, newPass, oldPass) => {
//   const urls = `${url}/Controller/User/ajax.php`;
//   const data = await fetch(urls, {
//     method: "PUT",
//     body: JSON.stringify({
//       action: "changePassword",
//       id: id,
//       new_password: newPass,
//       old_password: oldPass,
//     }),
//   });
//   const datatorender = await data.json();
//   return datatorender;
// };

// const getCustomerByEmail = async (url, email) => {
//   const urls = `${url}/api/v1/customer?email=${email}`;
//   const data = await fetch(urls, {
//     method: "GET",
//   });
//   const datatorender = await data.json();
//   return datatorender;
// };

const getUserById = async (id) => {
  const url = `http://localhost:8080/api/user/${id}`
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

const updateUser = async (
  id,
  userType,
  password,
  firstName,
  lastName,
  phone,
  address,
) => {
  const url = `http://localhost:8080/api/user/${id}`;
  const putData = {
    password,
    firstName,
    lastName,
    phone,
    address,
    userType,
  }
  let dataRes
  await $.ajax({
    url: url,
    type: 'PUT',
    data: putData,
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

const addUser = async (
  email,
  username,
  password,
  firstName,
  lastName,
  phone,
  address,
  userType,
) => {
  const url = `http://localhost:8080/api/user/-1`;
  const postData = {
    email,
    username,
    password,
    firstName,
    lastName,
    phone,
    address,
    userType,
    action: 'addUser',
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

const deleteUser = async (id) => {
  const url = `http://localhost:8080/api/user/${id}`
  console.log(url)
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
  getAllUsers,
  getAllManagers,
  changePassword,
  addUser,
  updateUser,
  deleteUser,
  getCustomerByEmail,
  getUserById,
};
