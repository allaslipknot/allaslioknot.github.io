<?php
require 'vendor/autoload.php';


//
// $client = new GuzzleHttp\Client(['headers' => ['Content-Type' =>  'application/json' , 'Ocp-Apim-Subscription-Key' => '13hc77781f7e4b19b5fcdd72a8df7156']]);
// $res = $client->post('https://westus.api.cognitive.microsoft.com/emotion/v1.0/recognize',[
//     GuzzleHttp\RequestOptions::JSON => ['url' => 'http://ugurkazdal.com/api/api.png']
// ]);
// echo $res->getStatusCode();
// echo $res->getBody();

if(isset($_POST["submit"])) {

    $key = $_POST['key'];
    $image = $_POST['image'];

} else {
    die('API Error');
}

$headers = array('Content-Type' =>  'application/json' , 'Ocp-Apim-Subscription-Key' => "$key" );
$options = json_encode( array('url' => "$image") );
$request = Requests::post('https://westus.api.cognitive.microsoft.com/emotion/v1.0/recognize', $headers, $options);

//var_dump($request->status_code);
// int(200)

//var_dump($request->headers['content-type']);
// string(31) "application/json; charset=utf-8"

echo $request->body;
// string(26891) "[...]"
?>
