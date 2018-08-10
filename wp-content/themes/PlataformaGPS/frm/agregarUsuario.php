   <link rel="stylesheet" type="text/css" href="css/ingreso.css"/>
   <form name="login" method="post" action="ope/ingresar.php" class="ingreso">
      <legend> Escriba los datos de acceso del usuario a continuaci&oacute;n </legend>

      <aside class="frm-etiquetas">
         <p><label> Nombre de Usuario: </label></p><br/>
         <p><label> Contrase&ntilde;a: </label></p><br/>
         <p><label> Confirmar Contrase&ntilde;a: </label></p>
      </aside>

      <aside class="frm-controles">
         <p><input type="text" name="Txt_Usuario" maxlength="50" autofocus/></p>
         <p><input type="password" name="Txt_Psw1" maxlength="50" /></p>
         <p><input type="password" name="Txt_Psw2" maxlength="50" /></p>
      </aside>

      <div stlye="clear:both"></div>
      <br/>
      <div class="frm-botones">
         <input type="submit" name="submit" value="Agregar"/>
      </div>
   </form>