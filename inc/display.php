<?php 
include("character.php");
$res =[];
if(isset($_REQUEST['char_id']) && !empty($_REQUEST['char_id'])){
    $myCharacter = new character($_REQUEST['char_id']);
    $myCharacter->getInfo();
    $myCharacter->getAdvenceAbility();
    $myCharacter->getTalents();
}
echo json_encode($myCharacter);
exit;
?>