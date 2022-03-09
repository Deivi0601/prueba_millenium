<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba millenium</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

    <div class="loader"></div>

    <div class="primary-content">
        <section class="container-form shadow primary-card">
            <form>

                <label>Nombres</label>
                <label class="primary-form-field">
                    <input type="text" class="primary-input" id="nombres">
                </label>

                <label>Apellidos</label>
                <label class="primary-form-field">
                    <input type="text" class="primary-input" id="apellidos">
                </label>

                <button type="button" class="primary-button" id="saveUser">Agregar usuario</button>

            </form>

        </section>
        <section class="container-users shadow primary-card">
            <h1 class="margin-top-0">Lista de usuarios</h1>
            <table class="primary-table" id="table-content-users">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.js"></script>
    <script src="./js/main.js"></script>

</body>

</html>