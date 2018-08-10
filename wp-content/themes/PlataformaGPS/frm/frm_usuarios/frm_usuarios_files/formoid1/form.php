<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

require_once str_replace('\\', '/', __DIR__) . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-default-dark-gray.css" type="text/css" />
<span class="alert alert-success"><?=FINISH_MESSAGE;?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?=dirname($form_path)?>/formoid-default-dark-gray.css" type="text/css" />
<script type="text/javascript" src="<?=dirname($form_path)?>/jquery.min.js"></script>
<form class="formoid-default-dark-gray" style="background-color:#f1edea;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Datos de usuario</h2></div>
	<div class="element-input"  <?frmd_add_class("input")?>><label class="title">Nombre</label><input class="large" type="text" name="input" /></div>
	<div class="element-email"  <?frmd_add_class("email")?>><label class="title">Correo</label><input class="large" type="email" name="email" value="" /></div>
	<div class="element-input"  title="Nombre de usuario para ingresar al sistema" <?frmd_add_class("input2")?>><label class="title">Usuario<span class="required">*</span></label><input class="medium" type="text" name="input2" required="required"/></div>
	<div class="element-password"  <?frmd_add_class("password")?>><label class="title">Contraseña<span class="required">*</span></label><input class="medium" type="password" name="password" value="" required="required"/></div>
	<div class="element-password"  title="Confirmar contraseña" <?frmd_add_class("password1")?>><label class="title">Confirmar</label><input class="medium" type="password" name="password1" value="" /></div>
	<div class="element-select"  title="Nivel de usuario" <?frmd_add_class("select")?>><label class="title">Rol</label><div class="medium"><span><select name="select" >

		<option value="Usuario">Usuario</option><br/>
		<option value="Administrador">Administrador</option><br/></select><i></i></span></div></div>
	<div class="element-select"  <?frmd_add_class("select1")?>><label class="title">Zona Horaria</label><div class="medium"><span><select name="select1" >

		<option value="UTC +3">UTC +3</option><br/>
		<option value="UTC +4">UTC +4</option><br/></select><i></i></span></div></div>
	<div class="element-radio"  <?frmd_add_class("radio")?>><label class="title">Estado</label>		<div class="column column2"><input type="radio" name="radio" value="Activo" /><span>Activo</span><br/></div><span class="clearfix"></span>
		<div class="column column2"><input type="radio" name="radio" value="Inactivo" /><span>Inactivo</span><br/></div><span class="clearfix"></span>
</div>

<div class="submit"><input type="submit" value="Agregar Usuario"/></div></form>
<script type="text/javascript" src="<?=dirname($form_path)?>/formoid-default-dark-gray.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>