const getAllTicketsByShowTimeId = async (showtimeID) => {
  const url = `http://localhost:8080/api/ticket`;
  let dataRes
  await $.ajax({
    url,
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

export { getAllTicketsByShowTimeId };
