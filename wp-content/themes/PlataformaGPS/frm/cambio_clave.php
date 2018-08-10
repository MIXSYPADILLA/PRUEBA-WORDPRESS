<link rel="stylesheet" type="text/css" href="css/cambio_clave.css"/>

<script>
   function validar()
   {
      var psw1 = document.getElementById("psw1").value
      var psw2 = document.getElementById("psw2").value
      if( psw1 == psw2 ){
         document.frm_actualizarclave.submit()
      }else{
         alert("La contraseña nueva no coincide con la confirmación.")
      }
   }
</script>

<form name="frm_actualizarclave" method="post">
   <h3><small>Cambiar contrase&ntilde;a</small></h3>
   <aside class="frm-etiquetas">
      <span>Nueva Contraseña:</span>
      <br/><br/>
      <span>Confirmar contraseña:</span>
   </aside>
   <aside class="frm-controles">
      <input type="password" name="psw1" id="psw1" autofocus/><br/>
      <input type="password" name="psw2" id="psw2" />
   </aside>
   <div style="clear:both;"></div>
   <div class="frm-botones">
      <input type="button" value="Cambiar contraseña" onclick="validar()"/>
   </div>
</form>