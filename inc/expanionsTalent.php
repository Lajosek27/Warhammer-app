<?php 

 session_start();
$gmMode=false;
if($_SESSION['user_id']!=$_SESSION['charMadeBy']){return;}else{$gmMode=true;}
if(isset($_REQUEST['id'])&&isset($_REQUEST['group'])&&isset($_REQUEST['step'])){
    $talent_id=$_REQUEST['id'];
    if($_REQUEST['group']=="0"){$group="";}else{$group=$_REQUEST['group'];}
    $step=$_REQUEST['step'];
}else{return;}
include('db.php');
include('character.php');
$myCharacter = new character($_SESSION['charOnTable']);
$myCharacter->getTalents();
$res=[];
$index=0;
$newValue;
$maxValue;
$flag = false;
foreach($myCharacter->talents as &$talent ){
    if($talent_id == $talent['talent_id'] && $group == $talent['group_name']){
           if(Intval($talent['expansions'])+Intval($step)>=0 && Intval($talent['expansions'])+Intval($step)<=100){
            $newValue = Intval($talent['expansions'])+Intval($step);
            if($talent['max_expansion']!='brak'){
                if(intval($talent['max_expansion'])==0){
                    if($talent['max_expansion']=='Int'){$talent['max_expansion']="Inte";}
                    if($talent['max_expansion']=='S'){$talent['max_expansion']="K";}
                    $maxValue = Intval($myCharacter->mainStats[$talent['max_expansion']]) + Intval($myCharacter->mainStats[$talent['max_expansion']."_expanions"]);
                    $maxValue=floor($maxValue/10);
                    if(($newValue<=$maxValue)){$flag=true;}else{$newValue=$maxValue;$flag=true;}
                }else{
                    $maxValue= intval($talent['max_expansion']);
                    if(($newValue<=$maxValue)){$flag=true;}else{$newValue=$maxValue;$flag=true;}
                }
               }else{$flag = true;}
                
               
           }
            }
}
if($flag){
    try{
        $sql = "UPDATE `talents` SET expansions=:newValue WHERE char_id = :char_id AND talent_id = :talent_id AND group_name = :group";
        $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        $stmt = $db->prepare($sql);
    
        if($stmt){
            $stmt->bindParam(":char_id",$_SESSION['charOnTable']);
            $stmt->bindParam(":talent_id",$talent_id);
            $stmt->bindParam(":newValue",$newValue);

            $stmt->bindParam(":group",$group);
    
            $ex = $stmt->execute();
            if($ex){
                
                array_push($res,1);//status completed
                array_push($res,$newValue);//new value
                array_push($res,$group);//new value
            

            }
        }
    }catch(Exception $e){}
}else{
    array_push($res,"0");
}

echo json_encode($res);
?>