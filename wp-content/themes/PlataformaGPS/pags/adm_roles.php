   <?PHP include("conex/bd_roles.php");
      $Rol = new roles();
   ?>
   <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"/>
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css"/>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
   <script>
      $(document).ready(function(){
         /* ----------------------------
            Obtener todos los campos  del documento */
         Rol = document.getElementById("Txt_Rol")
         Chk_Ver = document.getElementById("Chk_Permisos_1")
         Chk_Agregar = document.getElementById("Chk_Permisos_2")
         Chk_Modificar = document.getElementById("Chk_Permisos_3")
         Chk_Eliminar = document.getElementById("Chk_Permisos_4")
         Permiso = [0,0,0,0] /* Orden de los permisos */
         Tabla = document.getElementById("TablaRoles")
         t = "vacio";

         /* ================================
            Inicializar dataTable */
         $(Tabla).dataTable({
            "aaSorting": [[ 0, "asc" ]], // Ordenar tabla por nombre automáticamente
            "bStateSave": false, // Almacenamiento de cookies
            "sPaginationType": "full_numbers", // Paginación con números
            "bJQueryUI": true,
            "bPaginate": false,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": true
         });
         /* -------------------------------- */

         /* ================================
            Obtener roles de usuarios */
         $.get("ope/roles.php", function(data){
            if( data!=="false" )
            {
               datos = JSON.parse(data);
               for( i=0; i<datos.length;i++ )
               {
                  var nombre = datos[i]["nombre"];
                  var hid    = datos[i]["id"];
                  var hver   = datos[i]["ver"];
                  var hins   = datos[i]["ins"];
                  var hact   = datos[i]["upd"];
                  var helim  = datos[i]["del"];

                  $(Tabla).dataTable().fnAddData( [
                     "<input type='hidden' id='h_"+hid+"' value='"+hid+"'/>"+nombre,
                     ponOculto(hver,"Ver",hid,"ver") +
                     ponOculto(hins,"Agregar",hid,"ins") +
                     ponOculto(hact,"Editar",hid,"act") +
                     ponOculto(helim,"Eliminar",hid,"del")
                  ] );
               } // Fin del for para rellenar la tabla
            }
         });

         /* ================================
            Función para editar los campos de la tabla seleccionada */
         /* -------------------------------- */

         /* ================================
            Función para poner los campos ocultos e imprimir los valores */
         function ponOculto(valor,texto,id,variable){
            var resultado = "<input type='hidden' id='h_"+variable+"_"+id+"' value='"+valor+"'/>"
            if( valor!=0 && valor!="" && valor!=" " ){
               resultado += " ("+texto+")";
            }
            return resultado;
         }
         /* -------------------------------- */

         /* ================================
            Cambiar valores del array Permiso de acuerdo a las opciones seleccionadas */
         $(Chk_Ver).change(function(){
            if(this.checked) {
               Permiso[0] = 1
            } else { Permiso[0] = 0 }
         });
         $(Chk_Agregar).change(function(){
            if(this.checked) {
               Permiso[1] = 2
            } else { Permiso[1] = 0 }
         });
         $(Chk_Modificar).change(function(){
            if(this.checked) {
               Permiso[2] = 4
            } else { Permiso[2] = 0 }
         });
         $(Chk_Eliminar).change(function(){
            if(this.checked) {
               Permiso[3] = 8
            } else { Permiso[3] = 0 }
         });
         /* ================================ */

         /* ===========================
            Función para borrar los cuadros de texto del formulario */
         function borrarCampos(){
            Rol.value=""
         };
         /* ---------------------------------------------------------- */
         $("#imgCargando").addClass("oculto")
         $(".ventana").removeClass("oculto")
   });
   </script>

   <div id="imgCargando"></div>

   <div class="oculto ventana ancho900px">

      <nav class="titulo"><label>Administrar roles</label></nav>
      <section class="informacion">
         Seleccione el rol a modificar o, si desea, puede crear un nuevo rol para un grupo o usuario.
      </section>

      <section class="contenido">
         <table class="ancho100">
            <tr>
               <td>
                  <label for="Txt_Rol">Rol:</label>
               </td>
               <td colspan="4">
                  <input type="text" name="Txt_Rol" id="Txt_Rol" class="ancho50" autofocus/>
               </td>
            </tr>
            <tr>
               <td>
                  <label>Permisos:</label>
               </td>
               <td>
                  <input type="checkbox" id="Chk_Permisos_1" name="Chk_Permisos_1"/>
                  <label for="Chk_Permisos_1"><span></span>Ver</label>
               </td>
               <td>
                  <input type="checkbox" id="Chk_Permisos_2" name="Chk_Permisos_2"/>
                  <label for="Chk_Permisos_2"><span></span>Agregar</label>
               </td>
               <td>
                  <input type="checkbox" id="Chk_Permisos_3" name="Chk_Permisos_3"/>
                  <label for="Chk_Permisos_3"><span></span>Modificar</label>
               </td>
               <td>
                  <input type="checkbox" id="Chk_Permisos_4" name="Chk_Permisos_4"/>
                  <label for="Chk_Permisos_4"><span></span>Eliminar</label>
               </td>
            </tr>
         </table>

         <section class="botones">
            <button type="button" id="Btn_Guardar" tabindex="10">Guardar</button>
            <button type="button" id="Btn_Agregar" tabindex="9">Agregar</button>
            <button type="button" id="Btn_Eliminar" tabindex="10">Eliminar</button>
         </section>
      </section>

      <br/>

      <section class="contenido">
         <table class="tabla-cuadrada" id="TablaRoles">
            <thead>
               <tr>
                  <th>Rol</th>
                  <th>Permisos</th>
               </tr>
            </thead>
            <!-- Cuerpo de la tabla con los campos -->
            <tbody>
            </tbody>
         </table>
         <div style="clear:both"></div>
      </section>
   </div>