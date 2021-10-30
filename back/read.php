<?php

include_once './database.php';

// headers
header("Content-Type: JSON");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: X-Requested-with");


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