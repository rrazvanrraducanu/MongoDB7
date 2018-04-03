<?php
require_once "connection.php";
$msg="";
$bulk = new MongoDB\Driver\BulkWrite;

if(isset($_POST['upload'])){
    $target="./images/".basename($_FILES['image']['name']);
    $data=array(
        '_id' => new MongoDB\BSON\ObjectID,
        'title'=>$_POST['text'],
        'image'=>$target, 
    );
    $bulk->insert($data);
$client->executeBulkWrite('images.images',$bulk);
if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
       header('location:index.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
}
