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
         /* ===========================
            Meses del año
         =========================== */
         Meses = new Array();
         Meses[1] = "Enero";
         Meses[2] = "Febrero";
         Meses[3] = "Marzo";
         Meses[4] = "Abril";
         Meses[5] = "Mayo";
         Meses[6] = "Junio";
         Meses[7] = "Julio";
         Meses[8] = "Agosto";
         Meses[9] = "Septiembre";
         Meses[10] = "Octubre";
         Meses[11] = "Noviembre";
         Meses[12] = "Diciembre";

         /* =========================== 
            Inicializar data table */
         $("#TablaReporte").dataTable({
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
               $('#TablaReporte').dataTable().fnClearTable();

               $.get("ope/reporte_resumido.php?sel_vehiculos="+Sel_Vehiculos, function(data){
                  if( data!=="false" )
                  {
                     datos = JSON.parse(data);
                     for( i=0; i<datos.length;i++ )
                     {
                        $('#TablaReporte').dataTable().fnAddData( [
                           i+1,
                           ""+datos[i]['evento'],
                           ""+datos[i]['lugar'],
                           ""+datos[i]['velocidad'],
                           "El "+datos[i]['dia'] +" de "+ Meses[datos[i]['mes']] +" de "+ datos[i]['agno'] +" a las "+ convHora(datos[i]['hora'],datos[i]['minuto'])
                        ] );
                     } // Fin del for para rellenar la tabla de reportes
                  } else {
                     alert("No se pudo obtener el id: " + Sel_Vehiculos)
                  }
               });
            }
         });
         /* ---------------------------------------- */
         function convHora(hora,minutos){
            if( hora>12 ){
               hora-=12
               return hora + ":" + minutos +" PM";
            }
            return hora +":"+ minutos +" AM";
         }
         /* ---------------------------------------- */
         /* ---------------------------------------- */
         $("#imgCargando").addClass("oculto")
         $(".ventana").removeClass("oculto")
       });
   </script>

   <div id="imgCargando"></div>

   <div class="oculto ventana ancho100">
      <nav class="titulo"><label>Reporte resumido</label></nav>
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
                  <th>Evento</th>
                  <th>Direcci&oacute;n</th>
                  <th>Velocidad</th>
                  <th>Fecha</th>
               </tr>
            </thead>
            <!-- Cuerpo de la tabla con los campos -->
            <tbody>
            </tbody>
         </table>
         <div style="clear:both"></div>
      </section>
   </div>