<?php 
session_start();
// if($_SESSION['player_id']!=$_SESSION['charPlayer']){
    if($_SESSION['user_id']!=$_SESSION['charMadeBy']){return;}
// }
if(isset($_REQUEST['id'])&&isset($_REQUEST['group'])){
    $id=$_REQUEST['id'];
    $group=$_REQUEST['group'];
}else{return;}
    include("db.php");
    $res;
try{
    $sql = "INSERT INTO `advance_ability`(`char_id`, `ability_id`, `group_name`) VALUES (:char_id, :ability_id,:group_name)";
    $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
    $stmt = $db->prepare($sql);

    if($stmt){
        $stmt->bindParam(":char_id",$_SESSION['charOnTable']);
        $stmt->bindParam(":ability_id",$id);
        $stmt->bindParam(":group_name",$group);

        $ex = $stmt->execute();
        // $ex = true;
        if($ex){
            $sql="SELECT * FROM ability_list WHERE ability_id = :ability_id";
            $stmt = $db->prepare($sql);

            if($stmt){
                $stmt->bindParam(":ability_id",$id);
                $ex = $stmt->execute();
                if($ex){
                    $res=$stmt->fetchAll();
                }else{
                    $res = "Bład, spróbój odświerzyć stronę";
                }
            }
        }
    }

}catch(Exception $e){}

echo json_encode($res);
?>