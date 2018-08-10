   <link rel="stylesheet" type="text/css" href="css/interfaz.css"/>
   <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>
      $(document).ready(function(){
         Usuario = document.getElementById("Txt_Usuario");
         Clave = document.getElementById("Txt_Clave");
         Mensaje = document.getElementById("Mensaje");

         $("#Btn_Login").click(function(){
            /* Validar campos */
            validar()
         });

         /* =======================================
            Función para validar datos de usuario */
         function validar()
         {
            if( Usuario!="" && Clave!="" )
            {
               $.get("ope/ingresar.php?usuario="+Usuario.value+"&clave="+Clave.value, function(data){
                  if( data!="error" )
                  { /* Enviar a página de inicio */
                     $(Mensaje).removeClass("msjError")
                     $(Mensaje).addClass("msjInfo")
                     Mensaje.textContent="Bienvenido, cargando página de inicio..."
                     $(location).attr('href','index.php');
                  }else{
                     $(Mensaje).removeClass("msjInfo")
                     $(Mensaje).addClass("msjError")
                     Mensaje.textContent="Datos de acceso incorrectos"
                  }
               });
            };
         }

         /* =======================================
            Al presionar 'Enter' se envía el formulario */
         $(Usuario).keypress(function(e) {
             if(e.which == 13) {
                 validar()
             }
         });

         $(Clave).keypress(function(e) {
             if(e.which == 13) {
                 validar()
             }
         });
         /* ------------------------------------ */
      });
   </script>

   <div class="ventana">
      <nav class="titulo"><label>Ingreso</label></nav>
      <form name="login" method="get" class="">
         <section class="informacion">
            Escriba su usuario y contrase&ntilde;a para acceder.
         </section>

         <section class="contenido ancho50 centro">
            <div class="fila">
               <div class="celda">
                  <label>Usuario:</label>
                  <br/>
                  <label>Contrase&ntilde;a:</label>
               </div>

               <div class="celda">
                  <input type="text" id="Txt_Usuario" maxlength="50" autofocus/>
                  <br/>
                  <input type="password" id="Txt_Clave" maxlength="50"/>
               </div>
            </div>
            <span id="Mensaje"></span>
         </section>

         <section class="botones">
            <button type="button" id="Btn_Login">Entrar</button>
         </section>
         <div style="clear:both"></div>
      </form>
   </div>