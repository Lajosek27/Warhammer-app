<?php 
session_start();
if(!isset($_REQUEST['q'])){return;}

include('db.php');
include('character.php');
$myCharacter = new character($_REQUEST['q']);
if($myCharacter->made_by != $_SESSION['user_id']){return;}






    try{
        $sql = "DELETE FROM `characters` WHERE char_id=:char_id AND made_by ={$_SESSION['user_id']}";
        $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        $stmt = $db->prepare($sql);
    
        if($stmt){
            $stmt->bindParam(":char_id",$_REQUEST['q']);
            

           
    
            $ex = $stmt->execute();
            
        }
    }catch(Exception $e){}



?>