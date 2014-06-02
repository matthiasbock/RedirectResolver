<?php

// http://www.php.net/manual/en/function.get-headers.php

$url = $_GET['q'];
$headers = get_headers($url,1); 

// http://stackoverflow.com/questions/7064391/php-returning-json-to-jquery-ajax-call

header('Content-Type: application/json');
echo json_encode( $headers['Location'] );

?>

