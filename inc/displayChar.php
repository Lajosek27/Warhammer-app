<?php 
include('character.php');
include('db.php');
session_start();
$res = array();

$sql = "SELECT char_id, race, career,name FROM characters WHERE complete = 1 AND  (privateChar = 0 OR (privateChar=1 AND made_by= {$_SESSION['user_id']})) ORDER BY name ASC";
try{
    $db = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
    $stmt = $db->prepare($sql);
    if($stmt){
        $ex = $stmt->execute();
            if($ex){
                $res = $stmt->fetchAll();
                $row = $stmt->rowCount();
                if($row != 0 ){
                
                }else{$ress['connection'] = "Ups :/ coś poszło nie tak";}
            }else{$ress['connection'] = "Ups :/ coś poszło nie tak";}
    }
}catch(Exception $e) {
    $res['connection'] = 'Caught exception: '. $e->getMessage() .'\n';
}
echo json_encode($res);
?>