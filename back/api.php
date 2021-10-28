<?php
// headers
header("Content-Type: JSON");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-with");

// DB params
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";
$table = 'users';

// connect to database
$conn = mysqli_connect($servername,$username,$password,$dbname);

$response = array();

if ($conn){

    // echo 'Database connected successfully';
    $query = 'SELECT *  from ' . $table;
    $result = mysqli_query($conn, $query);

    if($result){
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['name'] = $row['name'];
            $response[$i]['img'] = $row['img'];
            $i++;
        }
    }

    echo json_encode($response, JSON_PRETTY_PRINT);
}else{
    echo 'database failed to connect';
}

?>