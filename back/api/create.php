<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../connect.php';
include_once '../config.php';

// instantiate DB & connect
$database = new Database();
$db = $database->connect();

// instantiate user obj
$user = new User($db);

// get raw posted data
$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;
$user->name = $data->name;
$user->img = $data->img;

// create user
if($user->create()){
    echo json_encode(
        [
            'msg'=> 'New User is been Created'
        ]
        );
}else{
    echo json_encode(
        [
            'msg'=> 'failed to Create new user'
        ]
        );
}