<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json");

include_once '../connect.php';
include_once '../config.php';

// instantiate DB & connect
$database = new Database();
$db = $database->connect();

// instantiate user obj
$user = new User($db);

// user query
$result = $user->read();

// get row count
$num = $result->rowCount();

// check if any posts
if($num > 0){
	// user array
	$users_arr = array();
	$users_arr['data'] = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$user_item = array(
			'id'=>$id,
			'name'=>$name,
			'img'=>$img
		);
		// push to 'data'
		array_push($users_arr['data'], $user_item);
	}

	// turn to json & output
	echo json_encode($users_arr);

}else {
	// no users
	echo json_encode(
		['msg'=>'No Users found']
	);
}




//////////////////////////////////////////////////////////////////////////////////////////




// $name = $_GET["name"];
// $id = $_GET["id"];
// $img = $_GET["img"];


// function Error_msg_json($text){
// 	echo json_encode(
// 		[
// 			"ok"=>false,
// 			"msg_error"=>$text
// 		]
// 	);
// }




// if (isset($_GET)){
// 	if(isset($name) and !empty($name) and isset($id) and !empty($id) and isset($img) and !empty($img) ){
		
// 		echo json_encode(
// 			[
// 				"ok"=>true,
// 				"id"=>$id,
// 				"name"=>$name,
// 				"img"=>$img
// 			]
// 		);

// 	}else{
// 		echo Error_msg_json("add ?name=joseph&id=12345678901234&img=imgs/test.jpg"); 
// 	}


// }else{
// 	echo Error_msg_json("only GET");
// }





//////////////////////////////////////////////////////////////////////////////////////







// if (isset($_GET['id']) && $_GET['id']!="") {
// 	include('connect.php');
// 	$id = $_GET['id'];
// 	$result = mysqli_query(
// 	$conn,
// 	"SELECT * FROM `users` WHERE id=$id");
// 	if(mysqli_num_rows($result)>0){
// 	$row = mysqli_fetch_array($result);
// 	$amount = $row['amount'];
// 	$response_code = $row['response_code'];
// 	$response_desc = $row['response_desc'];
// 	response($id, $amount, $response_code,$response_desc);
// 	mysqli_close($con);
// 	}else{
// 		response(NULL, NULL, 200,"No Record Found");
// 		}
// }else{
// 	response(NULL, NULL, 400,"Invalid Request");
// 	}

// function response($id,$amount,$response_code,$response_desc){
// 	$response['id'] = $id;
// 	$response['amount'] = $amount;
// 	$response['response_code'] = $response_code;
// 	$response['response_desc'] = $response_desc;
	
// 	$json_response = json_encode($response);
// 	echo $json_response;
// }
?>