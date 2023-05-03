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
        <!-- Formulario de registro-->
        <form action="" autocomplete="off" id="formulario-automovil">
          <div class="card">
            <div class="card-header">
              Registro de vehículos
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <select class="form-select form-select-sm" id="marca" autofocus>
                  <option value="">Seleccione</option>
                  <option value="Toyota">Toyota</option>
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
                <select class="form-select form-select-sm" id="tipocombustible">
                  <option value="">Seleccione</option>
                  <option value="Gasolina Premium">Gasolina Premium</option>
                  <option value="Gasolina Regular">Gasolina Regular</option>
                  <option value="GNV">GNV</option>
                  <option value="GLP">GLP</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" class="form-control form-control-sm" id="color">
              </div>
            </div>
            <div class="card-footer text-muted">
              <div class="d-grid gap-2">
                <button type="button" class="btn btn-success btn-sm" id="guardar">Guardar</button>
              </div>
            </div> <!-- Fin card footer -->
          </div> <!-- Fin card -->
        </form> <!-- Fin formulario -->
      </div> <!-- Fin col-md-4 -->

      <div class="col-md-8">
        <!-- Tabla Automoviles -->
        <table id="tabla-automoviles" class="table table-sm table-striped">
          <thead class="table-success">
            <tr>
              <th>#</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Precio</th>
              <th>Tipo Combustible</th>
              <th>Color</th>
              <th>Comandos</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modales -->
  <div class="modal fade" id="modal-automoviles" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info text-light">
          <h5 class="modal-title" id="modalTitleId">Actualizar datos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="md-marca" class="form-label">Marca:</label>
              <select class="form-select form-select-sm" id="md-marca" autofocus>
                <option value="">Seleccione</option>
                <option value="Toyota">Toyota</option>
                <option value="Suzuki">Suzuki</option>
                <option value="Changan">Changan</option>
                <option value="Renault">Renault</option>
                <option value="JAC">JAC</option>
                <option value="Haval">Haval</option>
            </select>
          </div>
              
          <div class="mb-3">
            <label for="md-modelo" class="form-label">Modelo:</label>
            <input type="text" class="form-control form-control-sm" id="md-modelo">
          </div>

          <div class="mb-3">
            <label for="md-precio" class="form-label">Precio:</label>
            <input type="number" class="form-control form-control-sm" id="md-precio">
          </div>

          <div class="mb-3">
            <label for="md-tipocombustible" class="form-label">Tipo combustible:</label>
            <select class="form-select form-select-sm" id="md-tipocombustible">
              <option value="">Seleccione</option>
              <option value="Gasolina Premium">Gasolina Premium</option>
              <option value="Gasolina Regular">Gasolina Regular</option>
              <option value="GNV">GNV</option>
              <option value="GLP">GLP</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="md-color" class="form-label">Color:</label>
            <input type="text" class="form-control form-control-sm" id="md-color">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" id="actualizar" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin modales -->
  
  <!-- Librerias -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {

      //Objetos y variables
      let idautomovil = 0;
      const tableBody = document.querySelector("#tabla-automoviles tbody");
      const btGuardar = document.getElementById("guardar");
      const btActualizar = document.getElementById("actualizar");
      const modal = new bootstrap.Modal(document.querySelector("#modal-automoviles"));
      
      //Objetos del formulario
      const txMarca = document.getElementById("marca");
      const txModelo = document.getElementById("modelo");
      const txPrecio = document.getElementById("precio");
      const txTipoCombustible = document.getElementById("tipocombustible");
      const txColor = document.getElementById("color");

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
            let numeroFila = 1;
            data.forEach(element => {
              let fila = `
                <tr>
                  <td>${numeroFila}</td>
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
              numeroFila++;
            });
          });
      }

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
                renderData();
                document.getElementById("formulario-automovil").reset();
                txMarca.focus();
              } else {
                alert(datos.message);
              }
            });
        }
      }

      function updateCar() {
        if (confirm("¿Está seguro de actualizar?")) {
          const fd = new FormData();
          fd.append("operacion", "actualizar");

          fd.append("idautomovil", idautomovil);
          fd.append("marca", document.querySelector("#md-marca").value);
          fd.append("modelo", document.querySelector("#md-modelo").value);
          fd.append("precio", document.querySelector("#md-precio").value);
          fd.append("tipocombustible", document.querySelector("#md-tipocombustible").value);
          fd.append("color", document.querySelector("#md-color").value);

          fetch("../controllers/Automovil.controller.php", {
            method: 'POST',
            body: fd
          })
            .then(response => response.json())
            .then(datos => {
              if (datos.status) {
                renderData();
                modal.toggle();
              } else {
                alert(datos.message);
              }
            });
        }
      } 

      //Proceso de eliminación
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
                  alert(datos.message);
                }
              })
          }
        }
      });

      //Proceso de ediciòn
      tableBody.addEventListener("click", (event) => {
        if (event.target.classList[0] === 'editar') {
          idautomovil = parseInt(event.target.dataset.idautomovil);
          
          const parametros = new URLSearchParams();
          parametros.append("operacion", "obtener");
          parametros.append("idautomovil", idautomovil);

          fetch("../controllers/Automovil.controller.php", {
            method: 'POST',
            body: parametros
          })
            .then(response => response.json())
            .then(datos => {
              document.querySelector("#md-marca").value = datos.marca;
              document.querySelector("#md-modelo").value = datos.modelo;
              document.querySelector("#md-precio").value = datos.precio;
              document.querySelector("#md-tipocombustible").value = datos.tipocombustible;
              document.querySelector("#md-color").value = datos.color;

              modal.toggle();
            });
        }
      });
      
      //Eventos
      btGuardar.addEventListener("click", registerCar);
      btActualizar.addEventListener("click", updateCar);

      //Funciones automáticas
      renderData();
    })
  </script>

</body>
</html>