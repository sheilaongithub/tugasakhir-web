<?php 
require_once '../config.php'; 
 
 function register($data) 
{ 
    global $koneksi_db; 
 
    $username = $data['username']; 
    $password = $data['password']; 
 
    $passwordHash = password_hash($password, PASSWORD_DEFAULT); 
 
    $query = "INSERT INTO tb_user (username, password, level) VALUES ( 
        '$username', '$passwordHash', 'user')"; 
 
    return mysqli_query($koneksi_db, $query); 
} 
 
function login($data) 
{ 
    global $koneksi_db; 
 
    $username = $data['username']; 
    $password = $data['password']; 
 
    $querySelect = "SELECT * FROM tb_user WHERE username = '$username'"; 
 
    $rawSelectResult = mysqli_query($koneksi_db, $querySelect); 
    $selectResult = mysqli_fetch_assoc($rawSelectResult); 
    if (is_null($selectResult)) { 
        return null; 
    } 
 
    $passwordHash = $selectResult['password']; 
 
    if (password_verify($password, $passwordHash)) { 
        return true; 
    } else { 
        return false; 
    } 
}

function getUserData($username) 
{ 
    global $koneksi_db; 
 
    $query = "SELECT username, level FROM tb_user WHERE username = '$username'"; 
    $rawResult = mysqli_query($koneksi_db, $query); 
    $result = mysqli_fetch_assoc($rawResult); 
    return $result; 
 
    // $userLevel = ['level']; 
}