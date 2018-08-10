   <?PHP
     include("conex/bd_vehiculos.php"); 
     $Vehiculo = new vehiculos();
   ?>
   <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"/>
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css"/>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
   <script>
      $(document).ready(function(){
         SelVehiculo = document.getElementById("Sel_Vehiculos")
         datos = "vacío";
         TablaReporte;
         /* =========================== 
            Inicializar data table */
         TablaReporte = $("#TablaReporte").dataTable({
            //"aaSorting": [[ 0, "des" ]], // Ordena el numero de la tabla de forma descendente
            "bStateSave": true, // Almacenamiento de cookies
            "sPaginationType": "full_numbers", // Paginación con números
            "bJQueryUI": true
         });

         $("#Btn_Reporte").click(function(){
            var Sel_Vehiculos = document.getElementById("Sel_Vehiculos").value
            if( Sel_Vehiculos != 0 )
            {
               // Borrar filas anteriores
               //$('#TablaReporte tbody').find("tr").remove()
               //eliminarFilas()
               $('#TablaReporte').dataTable().fnClearTable();

               $.get("ope/reporte_detallado.php?sel_vehiculos="+Sel_Vehiculos, function(data){
                  if( data!=="false" )
                  {
                     datos = JSON.parse(data);
                     for( i=0; i<datos.length;i++ )
                     {
                        $('#TablaReporte').dataTable().fnAddData( [
                           i+1,
                           ""+datos[i]['fecha'],
                           ""+datos[i]['latitud'] +", "+ datos[i]['latitud'],
                           ""+datos[i]['evento'],
                           ""+datos[i]['velocidad'],
                           ""+datos[i]['lugar']
                        ] );
                     } // Fin del for para rellenar la tabla de reportes
                     // Borrar contenido de los campos después de insertar al usuario
                  } else {
                     alert("No se pudo obtener el id: " + Sel_Vehiculos)
                  }
               });
            }
         });

         /* Eliminar filas */
         function eliminarFilas(){
            try {
               //var table = document.getElementById("TablaReporte");
               var numFilas = $("#TablaReporte>tbody>tr").length
                  for(var i=0; i<numFilas; i++) {
                  //var row = $("#TablaReporte>tbody>tr").rows[i];
                     TablaReporte.dataTable().fnDeleteRow(i)
                     //numFilas--;
                     //i++;
               }
            }catch(e) {
               alert(e);
            }
         }
         
         /* Eliminar filas *
         function eliminarFilas(tabla){
            try {
               var table = document.getElementById(tabla);
               var rowCount = table.rows.length;
                  for(var i=1; i<rowCount; i++) {
                  var row = table.rows[i];
/*                  var chkbox = row.cells[0].childNodes[0];
                  if(null != chkbox && true == chkbox.checked) {*
                     table.deleteRow(i);
///*-*               alert("fila "+ i+" borrada")
                     rowCount--;
                     i--;
//*-*               alert("rowCount: " +rowCount + ", i"+ i)
                  //}
               }
            }catch(e) {
               alert(e);
            }
         }
         /* ---------------------------------------- */
         $("#imgCargando").addClass("oculto")
         $(".ventana").removeClass("oculto")
       });
   </script>

   <div id="imgCargando"></div>

   <div class="oculto ventana ancho100">
      <nav class="titulo"><label>Reporte detallados</label></nav>
      <section class="informacion">
         Seleccione un veh&iacute;culo de la lista para mostrar su reporte correspondiente.
      </section>

      <section class="botones tabla contenido">
         <select id="Sel_Vehiculos" class="ancho50" tabindex="1">
            <?PHP $Vehiculo->LlenarLista(); ?>
         </select>
         <button type="button" id="Btn_Reporte" tabindex="2">Generar reporte</button>
      </section>
      <br/>

      <section class="contenido">
         <table class="tabla-cuadrada" id="TablaReporte">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Fecha/Hora</th>
                  <th>Coordenadas</th>
                  <th>Evento</th>
                  <th>Velocidad</th>
                  <th>Direcci&oacute;n</th>
               </tr>
            </thead>

            <!-- Cuerpo de la tabla con los campos -->
            <tbody>
               <!-- ?PHP $Vehiculo->LlenarReporte(); ?>-->
            </tbody>
         </table>
         <div style="clear:both"></div>
      </section>
   </div>