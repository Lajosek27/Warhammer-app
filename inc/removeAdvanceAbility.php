<?php 
session_start();
// if($_SESSION['player_id']!=$_SESSION['charPlayer']){
    if($_SESSION['user_id']!=$_SESSION['charMadeBy']){return;}
// }
if(isset($_REQUEST['id'])&&isset($_REQUEST['group'])){
    $id=$_REQUEST['id'];
    if($_REQUEST['group']=="0"){$group="";}else{$group=$_REQUEST['group'];}
}else{return;}
    include("db.php");
try{
    $sql = "DELETE FROM `advance_ability` WHERE char_id = :char_id AND ability_id = :ability_id AND group_name = :group_name";
    $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
    $stmt = $db->prepare($sql);

    if($stmt){
        $stmt->bindParam(":char_id",$_SESSION['charOnTable']);
        $stmt->bindParam(":ability_id",$id);
        $stmt->bindParam(":group_name",$group);

        $ex = $stmt->execute();
        
    }

}catch(Exception $e){}


?>