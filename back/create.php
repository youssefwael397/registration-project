<?php 

// headers
header("Content-Type: JSON");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-Requested-with");

include_once './database.php';

$id;
$name;
$img;

// create query
$query = 'INSERT INTO users (id, name, img) VALUES ( :id, :name, :img );';

// prepare statement
$stmt = $conn->prepare($query);

// clean data
$id = htmlspecialchars(strip_tags($id));
$name = htmlspecialchars(strip_tags($name));
$img = htmlspecialchars(strip_tags($img));


// bind data
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':img', $img);


// Execute query
// if($stmt->execute()){
//     return true;
// }else{
//     return false;
// }
if($stmt->execute()){
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

?>