<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CarStore | Automoviles</title>

  <!-- Bootstrap 5.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <div class="mt-3">
      <h1>CRUD Automóviles</h1>
      <hr>
    </div>
    <div class="row mt-3">
      <div class="col-md-4">
        <form action="" autocomplete="off" id="formulario-automovil">
          <div class="mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <select name="" class="form-select" id="marca">
              <option value="Suzuki">Suzuki</option>
              <option value="Changan">Changan</option>
              <option value="Renault">Renault</option>
              <option value="JAC">JAC</option>
              <option value="Haval">Haval</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" class="form-control form-control-sm" id="modelo">
          </div>
          <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control form-control-sm" id="precio">
          </div>
          <div class="mb-3">
            <label for="tipocombustible" class="form-label">Tipo combustible:</label>
            <input type="text" class="form-control form-control-sm" id="tipocombustible">
          </div>
          <div class="mb-3">
            <label for="color" class="form-label">Color:</label>
            <input type="text" class="form-control form-control-sm" id="color">
          </div>
          <div class="mb-3">
            <div class="d-grid gap-2">
              <button type="button" class="btn btn-success btn-sm" id="guardar">Guardar</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-8">
      <table id="tabla-automoviles" class="table">
        <thead class="table-primary">
          <tr>
            <th>#</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Tipo C.</th>
            <th>Color</th>
            <th>Comandos</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </div>
    </div>
  </div>
  
  <!-- Librerias -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      //Cuerpo de la tabla
      const tableBody = document.querySelector("#tabla-automoviles tbody");

      //Objetos
      const txMarca = document.getElementById("marca");
      const txModelo = document.getElementById("modelo");
      const txPrecio = document.getElementById("precio");
      const txTipoCombustible = document.getElementById("tipocombustible");
      const txColor = document.getElementById("color");

      const btGuardar = document.getElementById("guardar");

      let idautomovil = 0;

      function renderData() {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listar");

        fetch("../controllers/Automovil.controller.php", {
          method: 'POST',
          body: parametros
        })
          .then(response => response.json())
          .then(data => {
            tableBody.innerHTML = '';
            data.forEach(element => {
            let fila = `
              <tr>
                <td>${element.idautomovil}</td>
                <td>${element.marca}</td>
                <td>${element.modelo}</td>
                <td>${element.precio}</td>
                <td>${element.tipocombustible}</td>
                <td>${element.color}</td>
                <td>
                    <a href='#' class='editar btn btn-info btn-sm' data-idautomovil='${element.idautomovil}'>
                      Editar
                    </a>  
                    <a href='#' class='eliminar btn btn-danger btn-sm' data-idautomovil='${element.idautomovil}'>
                      Eliminar  
                    </a>  
                  </td> 
              </tr>
            `;

            tableBody.innerHTML += fila;
            });
          });
      }

      //MANIPULAR BOTONES
      //EDITAR

      //ELIMINAR
      tableBody.addEventListener("click", (event) => {
        if (event.target.classList[0] === 'eliminar') {
          if (confirm("¿Está seguro de eliminar el registro?")) {
            idautomovil = parseInt(event.target.dataset.idautomovil);
            
            const parametros = new URLSearchParams();
            parametros.append("operacion", "eliminar");
            parametros.append("idautomovil", idautomovil);

            fetch("../controllers/Automovil.controller.php", {
              method: 'POST',
              body: parametros
            })
              .then(response => response.json())
              .then(datos => {
                if (datos.status) {
                  renderData();
                } else {
                  alert("Error al eliminar");
                }
              })
          }
        }
      });

      function registerCar() {
        if (confirm("¿Estás seguro de registrar?")) {
          const fd = new FormData();
          fd.append("operacion", "registrar");
          fd.append("marca", txMarca.value);
          fd.append("modelo", txModelo.value);
          fd.append("precio", txPrecio.value);
          fd.append("tipocombustible", txTipoCombustible.value);
          fd.append("color", txColor.value);

          fetch("../controllers/Automovil.controller.php", {
            method: 'POST',
            body: fd
          })
            .then(response => response.json())
            .then(datos => {
              if (datos.status) {
                document.getElementById("formulario-automovil").reset();
                renderData();
              } else {
                alert("Error al guardar");
              }
            })
        }
      }

      //CLICKS
      btGuardar.addEventListener("click", registerCar);

      renderData();
    })
  </script>

</body>
</html>