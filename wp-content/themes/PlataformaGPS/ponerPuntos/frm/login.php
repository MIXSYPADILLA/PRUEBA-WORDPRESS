   <link rel="stylesheet" type="text/css" href="css/ingreso.css"/>
   <form name="login" method="post" action="ope/ingresar.php" class="ingreso">
      <legend> Escriba su usuario y contrase&ntilde;a </legend>

      <aside class="frm-etiquetas">
         <p><label> Usuario: </label></p><br/>
         <p><label> Contrase&ntilde;a: </label></p>
      </aside>

      <aside class="frm-controles">
         <p><input type="text" name="Txt_Usuario" maxlength="50" autofocus/></p>
         <p><input type="password" name="Txt_Clave" maxlength="50" /></p>
      </aside>

      <div stlye="clear:both"></div>
      <br/>
      <div class="frm-botones">
         <input type="submit" name="submit" value="Entrar"/>
         <br/>
         <i><small> (Cookies y JavaScript deben estar habilitados en su navegador) </small></i>
      </div>
   </form>