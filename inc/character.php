<?php 
class character{
 

    public function __construct(int $charId){
        include("db.php");
        $sql = 'SELECT * FROM `characters` WHERE char_id = :char_id';
        try{
        $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        $stmt = $db->prepare($sql);
            if($stmt){
                $stmt->bindParam("char_id",$charId);
                $ex = $stmt->execute();
                if($ex){
                    $res = $stmt->fetch();
                    $this->privateChar =$res['privateChar'];
                    $this->char_id =$charId;
                    $this->charInfo = Array(
                        'race' => $res['race'],
                        'career' => $res['career'],
                        'class' => $res['class'],
                        'careerPath' => $res['career_path'],
                        'age' => $res['age'],
                        'height' => $res['height'],
                        'hair' => $res['hair'],
                        'eyes' => $res['eyes']
                    );
                    $this->hp= $res['hp'];
                    $this->made_by = $res['made_by'];
                    $this->mainStats = Array(
                        'WW' => $res['WW'],
                        "US" => $res['US'],
                        "K"=> $res['K'],
                        "Wt" => $res['Wt'],
                        "I"=> $res['I'],
                        "Zw" => $res['Zw'],
                        "Zr" => $res['Zr'],
                        "Inte" => $res['Inte'],
                        "SW" => $res['SW'],
                        "Ogl" => $res['Ogl'],
                        'WW_expanions' => $res['WW_expanions'],
                        "US_expanions" => $res['US_expanions'],
                        "K_expanions"=> $res['K_expanions'],
                        "Wt_expanions" => $res['Wt_expanions'],
                        "I_expanions"=> $res['I_expanions'],
                        "Zw_expanions" => $res['Zw_expanions'],
                        "Zr_expanions" => $res['Zr_expanions'],
                        "Inte_expanions" => $res['Inte_expanions'],
                        "SW_expanions" => $res['SW_expanions'],
                        "Ogl_expanions" => $res['Ogl_expanions']
                    );
                    $this->ability = Array(
                        'ability1' => $res['ability1'],
                        'ability2' => $res['ability2'],
                        'ability3' => $res['ability3'],
                        'ability4' => $res['ability4'],
                        'ability5' => $res['ability5'],
                        'ability6' => $res['ability6'],
                        'ability7' => $res['ability7'],
                        'ability8' => $res['ability8'],
                        'ability9' => $res['ability9'],
                        'ability10' => $res['ability10'],
                        'ability11' => $res['ability11'],
                        'ability12' => $res['ability12'],
                        'ability13' => $res['ability13'],
                        'ability14' => $res['ability14'],
                        'ability15' => $res['ability15'],
                        'ability16' => $res['ability16'],
                        'ability17' => $res['ability17'],
                        'ability18' => $res['ability18'],
                        'ability19' => $res['ability19'],
                        'ability20' => $res['ability20'],
                        'ability21' => $res['ability21'],
                        'ability22' => $res['ability22'],
                        'ability23' => $res['ability23'],
                        'ability24' => $res['ability24'],
                        'ability25' => $res['ability25'],
                        
                    );
                    $this->name = $res['name'];
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    } 

    public function getName(){
        return $this->name;
    }
    public function getStats(string $str){
        switch ($str){
            case 'WW':
                return $this->WW;
            
        }
    } 
    public function getInfo(){
        include("db.php");
        $sql = 'SELECT nickname FROM `users` WHERE user_id = :user_id';
        try{
        $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        $stmt = $db->prepare($sql);
            if($stmt){
                $stmt->bindParam("user_id",$this->made_by);
                $ex = $stmt->execute();
                if($ex){
                $this->made_by = $stmt->fetch();
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getAdvenceAbility(){
        include("db.php");
        $this->advanceAbility = Array();
        $sql = 'SELECT ability_id, expansions, group_name FROM `advance_ability` WHERE char_id = :char_id ORDER BY ability_id ASC';
        try{
        $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        $stmt = $db->prepare($sql);
            if($stmt){
                $stmt->bindParam("char_id",$this->char_id);
                $ex = $stmt->execute();
                if($ex){
                $res = $stmt->fetchAll();
                
                $sql="SELECT ability_name, base_stat FROM `ability_list` WHERE ability_id = :ability_id";
                $stmt = $db->prepare($sql);
               for($i=0;$i<count($res);$i++){
                    
                    $stmt->bindParam("ability_id",$res[$i][0]);
                    $stmt->execute();
                    $abilityRes = $stmt->fetch();
                    $abilityRes['ability_name'] .=" " .$res[$i]['group_name'];
                    array_push($this->advanceAbility,  Array(
                        'ability_name' => $abilityRes['ability_name']  ,
                        'base_stat' => $abilityRes['base_stat'],
                        'expansions' => $res[$i]['expansions'],
                        'group_name' => $res[$i]['group_name'],
                        'ability_id' =>$res[$i]['ability_id']
                        ));
               }
                
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function getTalents(){
        include('db.php');
        $this->talents = Array();
        $sql = 'SELECT talent_id, expansions, group_name FROM `talents` WHERE char_id = :char_id ORDER BY talent_id ASC';
        try{
            $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
            $stmt = $db->prepare($sql);
                if($stmt){
                    $stmt->bindParam("char_id",$this->char_id);
                    $ex = $stmt->execute();
                    if($ex){
                    $res = $stmt->fetchAll();
                    
                    $sql="SELECT talent_name, description, max_expansion  FROM `talent_list` WHERE talent_id = :talent_id";
                    $stmt = $db->prepare($sql);
                   for($i=0;$i<count($res);$i++){
                        
                        $stmt->bindParam("talent_id",$res[$i][0]);
                        $stmt->execute();
                        $talentRes = $stmt->fetch();
                        $talentRes['talent_name'] .=" " .$res[$i]['group_name'];
                        array_push($this->talents,  Array(
                            'talent_name' => $talentRes['talent_name']  ,
                            'max_expansion' => $talentRes['max_expansion'],
                            'expansions' => $res[$i]['expansions'],
                            'description'=> $talentRes['description'],
                            'talent_id' => $res[$i]['talent_id'],
                            'group_name' => $res[$i]['group_name']
                            )    );
                   }
                    
                    }
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
    }
    public function expanions($num){
     
       return  '""';
    }
}


?>