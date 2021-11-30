<?php 
include_once('../Base62.php');
$base62 = new Base62();
isset($_POST['base62']) ? $char = $base62->decodeBase62($_POST['base62']) :  $char = '';
echo $char;