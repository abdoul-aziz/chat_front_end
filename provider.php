<?php
require './vendor/autoload.php';
//session_start();
$client = new \GuzzleHttp\Client();

if(isset($_GET['username'])){

    $id = $_GET['username'];
    $_SESSION['username']  = $id;
    //echo $id;
    $response = $client->request('GET', 'http://localhost:8000/api/v1/chats/store/'.$id);
    $content = json_decode($response->getBody(), true);

    $response = $client->request('GET', 'http://localhost:8000/api/v1/chats');
    $datas = json_decode($response->getBody(), true);
   // var_dump($data);
}else {
    # code...
    $response = $client->request('GET', 'http://localhost:8000/api/v1/chats');
    $datas = json_decode($response->getBody(), true);
    //var_dump($datas);
}

if (isset($_POST['content']) && isset($_POST['sender_id']) && isset($_POST['username'])) {
    # code...
    $id = $_POST['username'];
    $sender_id = $_POST['sender_id'];
    //echo $id;
    $save = $client->request('POST', 'http://localhost:8000/api/v1/chats/store/'.$id , ['form_params' => [
        'sender_id' => $sender_id,
        'receiver_id' => $id,
        'content' => $_POST['content'],
        ]
    ]);
   //$save = json_decode($response->getBody(), true);

    $response = $client->request('GET', 'http://localhost:8000/api/v1/chats/store/' . $id);
    $content = json_decode($response->getBody(), true);

    $response = $client->request('GET', 'http://localhost:8000/api/v1/chats');
    $datas = json_decode($response->getBody(), true);

}


?>