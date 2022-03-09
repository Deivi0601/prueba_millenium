$(document).ready(() => {
  $body = $("body");
  $(document).on({
    ajaxStart: () => $body.addClass("loading"),
    ajaxStop: () => $body.removeClass("loading"),
  });

  $("#saveUser").on("click", () => saveUser());

  getAllUsers();
});

function saveUser() {
  const apellidos = $("#apellidos").val();
  const nombres = $("#nombres").val();

  if (nombres === "" || apellidos === "") {
    alertify.error("Todos los campos son obligatorios", 2);
  } else {
    const params = new FormData();
    params.append("apellidos", apellidos);
    params.append("nombres", nombres);
    params.append("ope", 1);

    ajaxRequest(params, "./controllers/ajax.php", (response) => {
      if (response.status) {
        $("#apellidos").val("");
        $("#nombres").val("");

        alertify.success(response.message);
        getAllUsers();
      } else {
        alertify.error("Lo sentimos, ha ocurrido un error");
      }
    });
  }
}

function getAllUsers() {
  const params = new FormData();
  params.append("ope", 2);

  ajaxRequest(params, "./controllers/ajax.php", (response) => {
    if (response.status) {
      createTableUsers(response.data);
    } else {
      alertify.error("Lo sentimos, ha ocurrido un error");
    }
  });
}

function createTableUsers(users) {
  let rows = "";

  if (users.length === 0) {
    rows = `
    <tr>
      <td colspan="2">No hay usuarios registrados</td>
    </tr>`;
  } else {
    users.forEach(
      (user) =>
        (rows += `
        <tr>
          <td>${user.nombres}</td>
          <td>${user.apellidos}</td>
        </tr>
      `)
    );
  }

  $("#table-content-users tbody").empty().append(rows);
}

function ajaxRequest(params, url, callback) {
  $.ajax({
    url: url,
    type: "POST",
    data: params,
    dataType: "json",
    contentType: false,
    processData: false,
  })
    .done((response) => callback(response))
    .fail(function (jqXHR, textStatus, errorThrown) {
      alert("Hubo un error, por favor vuelve a intentarlo más tarde");
    });
}
