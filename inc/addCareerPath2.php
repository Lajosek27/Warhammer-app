<?php 
include('db.php');
if(!empty($_POST['x'])){
    $x=json_decode($_POST['x']);

    $sql = 'INSERT INTO career_path (career_name, tier1, tier2, tier3, tier4, tier1_ability, tier1_talent, tier2_ability, tier2_talent, tier3_ability, tier3_talent, tier4_ability, tier4_talent) 
    VALUES (:career_name,:tier1,:tier2,:tier3,:tier4,:tier1_ability,:tier1_talent,:tier2_ability,:tier2_talent,:tier3_ability,:tier3_talent,:tier4_ability,:tier4_talent)';

    try{
        $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        $stmt = $db->prepare($sql);
        if($stmt){

            $stmt->bindParam(":career_name",$x[0]);
            $stmt->bindValue(":tier1",json_encode($x[1]));
            $stmt->bindValue(":tier1_ability",json_encode($x[2]));
            $stmt->bindValue(":tier1_talent",json_encode($x[3]));
            $stmt->bindValue(":tier2",json_encode($x[4]));
            $stmt->bindValue(":tier2_ability",json_encode($x[5]));
            $stmt->bindValue(":tier2_talent",json_encode($x[6]));
            $stmt->bindValue(":tier3",json_encode($x[7]));
            $stmt->bindValue(":tier3_ability",json_encode($x[8]));
            $stmt->bindValue(":tier3_talent",json_encode($x[9]));
            $stmt->bindValue(":tier4",json_encode($x[10]));
            $stmt->bindValue(":tier4_ability",json_encode($x[11]));
            $stmt->bindValue(":tier4_talent",json_encode($x[12]));

            $stmt->execute();
        }
    }catch( Exception $e){
        echo $e->getmessage();
    }
    
    

}
    
?>