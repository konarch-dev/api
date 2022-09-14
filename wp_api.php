<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://vihaldham.org/?rest_route=/wp/v2/media&page=1&per_page=10',

    // CURLOPT_URL => 'http://localhost/wp-vihaldham/public_html/?rest_route=/wp/v2/media&page=1&per_page=10',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_encode($response, true);

$arr = json_decode(json_decode($data, true), true);
foreach ($arr as $key => $val) {
    $image['image'][] = $arr[$key]['guid']['rendered'];
    //  echo $arr[$key]['guid']['rendered'];
    //   echo '<br>';
}
echo json_encode($image);
