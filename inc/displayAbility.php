<?php 
include('db.php');
$bool=$name=$res='';


if(isset($_REQUEST['q']) && !empty($_REQUEST['q'])){$bool=trim($_REQUEST['q']);}
if($_REQUEST['q']!=3){
$sql = "SELECT ability_id, ability_name, base_stat FROM ability_list WHERE base=:bool ORDER BY ability_name ASC";

try{
    $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
    $stmt = $db->prepare($sql);
    if($stmt){
        $stmt->bindParam(":bool",$bool);
        $ex= $stmt->execute();
        if($ex){
            $res=$stmt->fetchAll();
            
        }
    }
}catch(Exception $e){
  echo  $e->getmessage();
}
}else{
    $sql = "SELECT talent_id, talent_name, description, max_expansion FROM talent_list ORDER BY talent_name ASC";

try{
    $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
    $stmt = $db->prepare($sql);
    if($stmt){
        $ex= $stmt->execute();
        if($ex){
            $res=$stmt->fetchAll();
            
        }
    }
}catch(Exception $e){
  echo  $e->getmessage();
}
}
echo json_encode($res);
?>