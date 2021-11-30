<?php 
include_once('../Base62.php');
$base62 = new Base62();
isset($_POST['decimal']) ? $char = $base62->encodeBase62($_POST['decimal']) :  $char = '';
echo $char;