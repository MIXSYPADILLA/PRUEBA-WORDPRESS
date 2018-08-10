   <?PHP include("ope/cons_usuario.php");?>
   <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"/>
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css"/>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
   <script>
      $(document).ready(function(){
         FilaSeleccionada = 0;
         Nombre = document.getElementById("Txt_Nombre");
         Correo = document.getElementById("Txt_Correo");
         Usuario = document.getElementById("Txt_Usuario");
         Rol = document.getElementById("Sel_Rol");
         ZHora = document.getElementById("ZHora");
         Estado = document.getElementById("Sel_Estado");
         Psw1 = document.getElementById("Psw1");
         Psw2 = document.getElementById("Psw2");

         // Copiar Contenido de la tabla al formulario de edición
         $("#TablaUsuarios tr").click(function(){
            // Obtener texto de la fila seleccionada
            var $tds = $(this).find("td");
            FilaSeleccionada = this
            if( $tds.length != 0 ){
               Nombre.value = $tds.eq(1).text();
               Usuario.value = $tds.eq(0).text();
               Correo.value = $tds.eq(2).text();
            }
         });

         /* ===========================
            Inicializar data table */
         $("#TablaUsuarios").dataTable({
            "aaSorting": [[ 1, "asc" ]], // Ordenar tabla por nombre automáticamente
            "bStateSave": true, // Almacenamiento de cookies
            "sPaginationType": "full_numbers", // Paginación con números
            "bJQueryUI": true
         });
         /* ------------------------------------------------ */

         /* ===========================
            Función para agregar un nuevo usuario */
         $("#Btn_Agregar").click(function(){
            // Validar
            if(!validar(Usuario.value) || !validar(Psw1.value) || !validar(Psw2.value) ){
               alert("Los campos marcados con asterisco son obligatorios.")
            } else {
               if( Psw1.value != Psw2.value ){
                  alert("Contraseña y confirmación de contraseña deben coincidir.")
               } else {
                  $.get("ope/agregar_usuario.php?nombre="+Nombre.value+"&usuario="+Usuario.value+"&correo="+Correo.value+"&rol="+Rol.value+"&zonah="+ZHora.value+"&estado="+Estado.value+"&psw="+Psw1.value, function(data){
                     if( data=="ok" )
                     {
                        $("#mensaje").html("<span class='msjInfo'>Usuario agregado correctamente.</a>");
                        // Agregar fila a la tabla
                        $('#TablaUsuarios').dataTable().fnAddData( [
                           Nombre.value,
                           Usuario.value,
                           Correo.value,
                           Rol.options[Rol.selectedIndex].text,
                           ZHora.options[ZHora.selectedIndex].text,
                           Estado.options[Estado.selectedIndex].text,
                           "<button type=\"button\" class=\"tooltip ico-no\" alt=\"Eliminar\">&nbsp;</button>"
                        ] );
                        // Borrar contenido de los campos después de insertar al usuario
                     } else {
                        $("#mensaje").html("<span class='msjError'>Verifique el nombre de usuario e intente nuevamente.</a>");
                     }
                  });
                  /* ========= */
               }
            }
         });

         /* ===========================
            Función para guardar los datos modificados del usuario */
         $("#Btn_Guardar").click(function(){
            if( !validar(Usuario.value) ){
               alert("El nombre de usuario no puede esar vacío.")
            } else {
               var confirmarCambios = confirm("Por favor verifique que los datos estén correctos antes de guardar.\n Haga clic en aceptar para guardar los cambios.")
               if ( !confirmarCambios ){self.close()}
               else{
                  /* =========
                     ACTUALIZAR INFORMACIÓN DEL USUARIO */
                  $.get("ope/actualizar_usuario.php?nombre="+Nombre.value+"&usuario="+Usuario.value+"&correo="+Correo.value+"&rol="+Rol.value+"&zonah="+ZHora.value+"&estado="+Estado.value+"&psw="+Psw1.value, function(data){
                     if( data=="ok" )
                     {
                        $("#mensaje").html("<span class='msjInfo'>Datos actualizados correctamente.</a>");
                        // Borrar contenido de los campos
                        borrarCampos();
                     }else{
                        $("#mensaje").html("<span class='msjError'>No se pudieron guardar los cambios, intente m&aacute;s tarde.</a>");
                     }
                  });
               }
            }
         });

         /* ===========================
            Función para eliminar usuario y dato de la tabla */
         $("#Btn_Eliminar").click(function(){
            if( !validar(Usuario.value) ){
               alert("Seleccione un usuario para eliminar.")
            } else {
               var confirmarBorrar = confirm("Se eliminará el usuario seleccionado, haga clic en aceptar para continuar o haga clic en cancelar para cerrar este mensaje.")
               if ( !confirmarBorrar ){self.close()}
               else{
                  /* =========
                     ACTUALIZAR INFORMACIÓN DEL USUARIO */
                  $.get("ope/eliminar_usuario.php?&usuario="+Usuario.value, function(data){
                     if( data=="ok" )
                     {
                        $("#mensaje").html("<span class='msjInfo'>El usuario fue borrado del sistema.</a>");
                        /* Eliminar fila seleccionada */
                        FilaSeleccionada.remove()
                        /* ------------------------------ */
                        // Borrar contenido de los campos
                        borrarCampos();
                     }else{
                        $("#mensaje").html("<span class='msjError'>El usuario ya no existe.</a>");
                     }
                  });
               }
            }
         });

         /* =========================== */
         function validar(campo){
            if(campo.length==0 || /^\s+$/.test(campo)) // Si está vacío se regresa false
               return false;
            return true;
         }

         function marcarOpcion(elemento,opcion)
         {/*
            for( var i=0;i<elemento.options.length;i++ )
            {
               if( elemento.options[i].text== )
            }*/
         }
         /* ===========================
            Función para borrar los cuadros de texto del formulario */
         function borrarCampos(){
            Nombre.value="";
            Correo.value="";
            Usuario.value="";
            Rol.selectedIndex=1;
            ZHora.selectedIndex=7
            Estado.selectedIndex=1;
            Psw1.value= "";
            Psw2.value= "";
         }
         $("#imgCargando").addClass("oculto")
         $(".ventana").removeClass("oculto")
       });
   </script>

   <div id="imgCargando"></div>

   <div class="oculto ventana ancho900px">

      <nav class="titulo"><label>Informaci&oacute;n de usuarios</label></nav>
      <section class="informacion">
         Haga clic en la lista sobre la informaci&oacute;n del usuario que desea modificar o haga clic en el bot&oacute;n para agregar un usuario.
      </section>
      <form action="" method="post"> 
         <section class="contenido">
            <table>
               <tr>
                  <td>
                     <label>Nombre:</label>
                  </td>
                  <td colspan="3">
                     <span class="tooltip" alt="Nombre de la persona">
                        <input type="text" id="Txt_Nombre" name="Txt_Nombre" class="texto ancho100" tabindex="1"/>
                     </span>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Correo:</label>
                  </td>
                  <td colspan="3">
                     <span class="tooltip" alt="Correo electrónico del usuario">
                        <input type="text" id="Txt_Correo" name="Txt_Correo" class="texto ancho100" tabindex="2"/>
                     </span>
                  </td>
               </tr>
               <tr>
                  <td><label>Usuario*:</label></td>
                  <td>
                     <span class="tooltip" alt="Escriba un nombre de usuario">
                        <input type="text" id="Txt_Usuario" name="Txt_Usuario" class="texto" tabindex="3"/>
                     </span>
                  </td>
                  <td>
                     <label>Contraseña*:</label>
                  </td>
                  <td class="tooltip" alt="Escriba la contraseña">
                     <input type="password" id="Psw1" name="Psw1" class="texto" tabindex="4"/>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Rol:</label>
                  </td>
                  <td>
                     <select id="Sel_Rol" class="ancho100" tabindex="6">
                        <?PHP $Usuario->ListaRol(); ?>
                     </select>
                  </td>
                  <td>
                     <label>Confirmar*:</label>
                  </td>
                  <td class="tooltip" alt="Confirme la contraseña">
                     <input type="password" id="Psw2" name="Psw2" class="texto" tabindex="5"/>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label>Zona Horaria:</label>
                  </td>
                  <td>
                     <select id="ZHora" class="ancho100" tabindex="7">
                        <?PHP $Usuario->ListaZonaHoraria(); ?>
                     </select>
                  </td>
                  <td>
                     <label>Estado:</label>
                  </td>
                  <td>
                     <select name="Sel_Estado" id="Sel_Estado" tabindex="8">
                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option>
                     </select>
                  </td>
               </tr><tr colspan="6"><span id="mensaje"></span><td></tr>
            </table>
         </section>
      
      <section class="botones tabla contenido">
         <button type="button" id="Btn_Eliminar" tabindex="10" class="ico-no">Eliminar</button>
         <button type="button" id="Btn_Guardar" tabindex="10">Guardar Cambios</button>
         <button type="button" id="Btn_Agregar" tabindex="9">Agregar usuario</button>
      </section>
      <br/>

      <section class="contenido">
         <table class="tabla-cuadrada" id="TablaUsuarios">
            <thead>
               <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Rol</th>
                  <th><small>Zona horaria</small></th>
                  <th>Estado</th>
               </tr>
            </thead>

            <!-- Cuerpo de la tabla con los campos -->
            <tbody>
               <?PHP $Usuario->ListarUsuarios(); ?>
            </tbody>
         </table>
         <div style="clear:both"></div>
      </section>
   </div>