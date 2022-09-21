<?php
$mydir = 'attachment';
$myfiles = array_diff(scandir($mydir), array('.', '..'));
//print_r($myfiles);
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];

foreach ($myfiles as $val) {
    $files['files'][] = str_replace("pdfapi.php", "attachment", $url . '/' . $val);
}
print_r($files);
//echo json_encode($files);
