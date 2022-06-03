<?php 
if(!isset($_REQUEST['what']) || !isset($_REQUEST['newValue']) ){return;}
$what = $_REQUEST['what'];
$newValue = $_REQUEST['newValue'];
session_start();
    // if($_SESSION['player_id']!=$_SESSION['charPlayer']){
        if($_SESSION['user_id']!=$_SESSION['charMadeBy']){return;}
    // }
    $column;
        switch($what){
            case 'race':
                $column= 'race';
            break;
            case 'class':
                $column= 'class';
            break;
            case 'career':
                $column= 'career';
            break;
            case 'age':
                $column= 'age';
            break;
            case 'height':
                $column= 'height';
            break;
            case 'hair':
                $column= 'hair';
            break;
            case 'eyes':
                $column= 'eyes';
            break;
            case 'hp':
                $column= 'hp';
            break;
        }

    include("db.php");
try{
    $sql="UPDATE characters SET {$column} = :newValue WHERE char_id = {$_SESSION['charOnTable']}";
    $db= new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
    $stmt = $db->prepare($sql);

    if($stmt){
        
        $stmt->bindParam(":newValue",$newValue);

        $ex = $stmt->execute();
        

    }
}catch(Exception $e){}
?>