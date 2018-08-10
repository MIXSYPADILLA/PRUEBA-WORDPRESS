<?PHP
   @session_start();
   $Usuario = $_POST['Txt_Usuario'];
   $Clave = $_POST['Txt_Clave'];

   if( isset($Usuario) && isset($Clave) )
   {
      if( ($Usuario != "") && ($Clave != "") )
      {
         if( ($Usuario == "admin") && ($Clave == "admin") ) {
            $_SESSION['usuario'] = $Usuario;
            header("Location: ../.?ver=panel");
         }
         else {
            //echo "Información incorrecta. \n";
            header("Location: ../.?ver=infoincorrecta");
         }
      }
      else
      {
         // echo "Ingrese información para acceder";
         header("Location: ../.?ver=datosvacios");
      }
   }
   else {
      // echo "Ingrese un valor válido";
      header("Location: ../.?ver=ingresevalor");
   }
?>