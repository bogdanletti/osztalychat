<?php
require_once(dirname(__FILE__) ."/../includes/load.php");

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    /** @var \PDO $connection */
    $connection = DatabaseConnection::getConnection();
    $stmt = $connection->prepare("SELECT user_token FROM user WHERE username = :username AND password = :password LIMIT 1");
    $stmt ->bindvalue(":username", $username, PDO::PARAM_STR);
    $stmt ->bindvalue(":password", $password, PDO::PARAM_STR);
    $stmt -> execute(); 
    header("Content-type: application/json");
    echo json_encode($stmt->fetchAll(0));
}else{
    http_response_code(403);
}


