<?php
$path = pathinfo(__FILE__) ['dirname'];

include ($path . '/config.php');

$event = ($href == '#') ? 'onclick="return false"' : '';

$class = $el_class;
$class .= ' ' . $visibility;

?>

<span class="mk-tooltip <?php echo $class; ?> js-el" data-mk-component="Tooltip">
	<a href="<?php echo $href; ?>" <?php echo $event; ?> class="mk-tooltip--link"><?php echo $text; ?></a>
	<span class="mk-tooltip--text"><?php echo $tooltip_text; ?></span>
</span>
