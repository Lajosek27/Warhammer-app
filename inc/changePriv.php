<?php 

 session_start();
if(!isset($_REQUEST['q']) || !isset($_REQUEST['p'])){return;}
if($_SESSION['user_id']!=$_REQUEST['p']){return;}

include('db.php');
include('character.php');
$myCharacter = new character($_REQUEST['q']);

$newValue;
if($myCharacter->privateChar==0){$newValue=1;}else{$newValue=0;} 



    try{
        $sql = "UPDATE `characters` SET privateChar=:newValue WHERE char_id = :char_id";
        $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        $stmt = $db->prepare($sql);
    
        if($stmt){
            $stmt->bindParam(":char_id",$_REQUEST['q']);
            $stmt->bindParam(":newValue",$newValue);
            $ex = $stmt->execute();
            
        }
    }catch(Exception $e){}



?>