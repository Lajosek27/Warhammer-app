<?php 
require('db.php');
session_start();

if(!isset($_REQUEST['name']) || empty($_REQUEST['name'])){return ;}
if(!isset($_REQUEST['race']) || empty($_REQUEST['race'])){return ;}
if(!isset($_REQUEST['careerClass']) || empty($_REQUEST['careerClass'])){return ;}
if(!isset($_REQUEST['careerPath']) || empty($_REQUEST['careerPath'])){return ;}
$sql = 'INSERT INTO characters (name, made_by, race,class,career_path, complete)
        VALUES (:name, :made_by, :race, :class, :careerPath,1)';
    

 try{
    $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
    $stmt = $db->prepare($sql);

    if($stmt){
        $stmt->bindParam(':name',$_REQUEST['name']);
        $stmt->bindParam(':made_by',$_SESSION['user_id']);
        $stmt->bindParam(':race',$_REQUEST['race']);
        $stmt->bindParam(':class',$_REQUEST['careerClass']);
        $stmt->bindParam(':careerPath',$_REQUEST['careerPath']);

        $stmt->execute();
        
        $sql = 'SELECT char_id FROM characters WHERE  made_by = :made_by ORDER BY char_id DESC';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':made_by',$_SESSION['user_id']);
        $ex =$stmt->execute();
         if($ex){
            $res=$stmt->fetch();
            echo $res[0];
         }
    }
 }catch(Exception $e){
    echo"coś poszło nie tak";
 }
?>