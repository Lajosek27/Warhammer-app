<?php 

 session_start();
$gmMode=false;
if($_SESSION['user_id']!=$_SESSION['charMadeBy']){return;}else{$gmMode=true;}
if(isset($_REQUEST['id'])&&isset($_REQUEST['group'])&&isset($_REQUEST['step'])){
    $ability_id=$_REQUEST['id'];
    if($_REQUEST['group']=="0"){$group="";}else{$group=$_REQUEST['group'];}
    $step=$_REQUEST['step'];
}else{return;}
include('db.php');
include('character.php');
$myCharacter = new character($_SESSION['charOnTable']);
$myCharacter->getAdvenceAbility();
$res=[];
$index=0;
$newValue;
$base;
$flag = false;
foreach($myCharacter->advanceAbility as &$ability ){
    if($ability_id == $ability['ability_id'] && $group == $ability['group_name']){
           if(Intval($ability['expansions'])+Intval($step)>=0 && Intval($ability['expansions'])+Intval($step)<=100){
               $flag = true;
               $newValue = Intval($ability['expansions'])+Intval($step);
               $base = $ability['base_stat'];
           }
            }
}
if($flag){
    try{
        $sql = "UPDATE `advance_ability` SET expansions=:newValue WHERE char_id = :char_id AND ability_id = :ability_id AND group_name = :group";
        $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        $stmt = $db->prepare($sql);
    
        if($stmt){
            $stmt->bindParam(":char_id",$_SESSION['charOnTable']);
            $stmt->bindParam(":ability_id",$ability_id);
            $stmt->bindParam(":newValue",$newValue);

            $stmt->bindParam(":group",$group);
    
            $ex = $stmt->execute();
            if($ex){
                
                array_push($res,1);//status completed
                array_push($res,$newValue);//new value
                array_push($res,$group);//new value
                array_push($res,$base);//new value

            }
        }
    }catch(Exception $e){}
}

echo json_encode($res);
?>