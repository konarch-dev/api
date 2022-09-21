<?php
header('Content-type:application/json;charset=utf-8');

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
    $filename = explode("/", $url . '/' . $val);
    $filecount = count($filename);
    //  $filename[$filecount-1];
    $files['data'][] = [
        'file' => str_replace("pdfapi.php", "attachment", $url . '/' . $val),
        'name' => str_replace(".pdf", "", $filename[$filecount - 1])
    ];
}
//print_r($files);
echo json_encode($files);
