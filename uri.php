<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
echo $uriSegments[1]; //returns codex
echo $uriSegments[2]; //returns foo
 //returns bar

?>