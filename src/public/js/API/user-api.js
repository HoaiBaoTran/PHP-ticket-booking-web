const getAllUsers = async () => {
  const url = 'http://localhost:8080/api/user/-1'
  const postData = {
    action: 'getAllUsers'
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

const getAllManagers = async () => {
  const url = 'http://localhost:8080/api/manager'
  const postData = {
    action: 'getAllManagers'
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

const changePassword = async (url = "../..", id, newPass, oldPass) => {
  const urls = `${url}/Controller/User/ajax.php`;
  const data = await fetch(urls, {
    method: "PUT",
    body: JSON.stringify({
      action: "changePassword",
      id: id,
      new_password: newPass,
      old_password: oldPass,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};

const updateCustomer = async (
  url = "../..",
  id,
  email,
  password,
  fullname,
  address,
  phone
) => {
  const urls = `${url}/Controller/User/ajax.php`;
  const data = await fetch(urls, {
    method: "PUT",
    body: JSON.stringify({
      action: "update_customer",
      id: id,
      email: email,
      password: password,
      fullname: fullname,
      address: address,
      phone: phone,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};

const getCustomerByEmail = async (url, email) => {
  const urls = `${url}/api/v1/customer?email=${email}`;
  const data = await fetch(urls, {
    method: "GET",
  });
  const datatorender = await data.json();
  return datatorender;
};

const getUserById = async (id) => {
  const url = `http://localhost:8080/api/user/${id}`
  const postData = {
    action: 'getUserById'
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

const updateManager = async (
  url = "../..",
  id,
  email,
  password,
  fullname,
  phone
) => {
  const urls = `${url}/Controller/User/ajax.php`;
  const data = await fetch(urls, {
    method: "PUT",
    body: JSON.stringify({
      action: "update_manager",
      id: id,
      email: email,
      password: password,
      fullname: fullname,
      phone: phone,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};

const addUser = async (
  email,
  username,
  password,
  fistName,
  lastName,
  phone,
  address,
  userType,
) => {
  const urls = `${url}/api/v1/manager`;
  const data = await fetch(urls, {
    headers: {
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify({
      action: "addManger",
      fullname: fullname,
      email: email,
      password: password,
      address: address,
      phone: phone,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};

const deleteManager = async (url = "../..", email) => {
  const urls = `${url}/Controller/User/ajax?email=${email}.php`;
  const data = await fetch(urls, {
    method: "DELETE",
  });
  const datatorender = await data.json();
  return datatorender;
};

export {
  getAllUsers,
  getAllManagers,
  changePassword,
  updateCustomer,
  updateManager,
  addManager,
  deleteManager,
  getCustomerByEmail,
  getUserById,
};
