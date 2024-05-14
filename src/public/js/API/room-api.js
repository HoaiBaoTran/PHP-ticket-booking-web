const getRoomById = async (id) => {
  // const data = await fetch(`${url}/api/v1/room/${id}`, {
  //   method: "GET",
  // });
  // const datatorender = await data.json();
  // return datatorender;
  const url = `http://localhost:8080/api/room/${id}`
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

const getAllRooms = async () => {
  const url = `http://localhost:8080/api/room/-1`
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

const updateRoom = async (
  url = "../..",
  RoomName,
  NumberOfSeats,
  TheaterID,
  RoomID
) => {
  const urls = `${url}/Controller/Room/ajax.php`;
  const data = await fetch(urls, {
    method: "PUT",
    body: JSON.stringify({
      RoomID: RoomID,
      NumberOfSeats: NumberOfSeats,
      TheaterID: TheaterID,
      RoomName: RoomName,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};
const deleteRoom = async (url = "../..", id) => {
  const urls = `${url}/Controller/Room/ajax?id=${id}.php`;
  const data = await fetch(urls, {
    method: "DELETE",
  });
  const datatorender = await data.json();
  return datatorender;
};
const addRoom = async (url = "../..", RoomName, NumberOfSeats, TheaterID) => {
  const urls = `${url}/Controller/Room/ajax.php`;
  const data = await fetch(urls, {
    method: "POST",
    body: JSON.stringify({
      RoomName: RoomName,
      NumberOfSeats: NumberOfSeats,
      TheaterID: TheaterID,
    }),
  });
  const datatorender = await data.json();
  return datatorender;
};
export { getRoomById, getAllRooms, updateRoom, addRoom, deleteRoom };
