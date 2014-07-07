<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// http://www.php.net/manual/en/function.get-headers.php

if (array_key_exists('q',$_GET)) {
	$url = $_GET['q'];
} else if (array_key_exists('b', $_GET)) {
	$url = base64_decode($_GET['b']);
} else {
	return '""';
}

//echo $url;
$headers = get_headers($url,1); 

$loc = $headers['Location'];

// if link starts later in line, e.g. /goto.php?url=http://redirectedto.com/
$i = strpos($loc,"http");
if ($i > 0) {
	$loc = substr($loc, $i);
}

// if is link quoted
if (substr($loc, 0, 7) == "http%3A") {
	$loc = urldecode($loc);
}

// http://stackoverflow.com/questions/7064391/php-returning-json-to-jquery-ajax-call
echo json_encode($loc);

?>

