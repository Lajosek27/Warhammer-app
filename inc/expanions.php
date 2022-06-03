<?php 

    session_start();
    $gmMode=false;
    // if($_SESSION['player_id']!=$_SESSION['charPlayer']){
        if($_SESSION['user_id']!=$_SESSION['charMadeBy']){return;}else{$gmMode=true;}
    // }
    
    if($_SESSION['charOnTable']!=$_REQUEST['q']){return;}
    if(isset($_REQUEST['p'])&&isset($_REQUEST['n'])){
        $p=$_REQUEST['p'];
        $n=$_REQUEST['n'];
    }else{return;}
    include('db.php');
    include('character.php');
    $myCharacter = new character($_REQUEST['q']);
    $res = [];
    $column;
    $tableName = 'characters';
    $endAbilityValue=null;
    switch($n){                                       //switch z odczytem który elemen zmieniamy xd 
        case 1000:
            $column = "WW";
            
            break;
        case 1001:
            $column = "US";
            
            break;
        case 1002:
            $column = "K";
            
            break;
        case 1003:
            $column = "Wt";
            
            break;
        case 1004:
            $column = "I";
            
            break;
        case 1005:
            $column = "Zw";
            
            break;
        case 1006:
            $column = "Zr";
            
            break;
        case 1007:
            $column = "Inte";
           
            break;
        case 1008:
            $column = "SW";
           
            break;
        case 1009:
            $column = "Ogl";
            
            break;
        case 1010:
            $column = "WW_expanions";
            $p += intval($myCharacter->mainStats['WW_expanions']);
            break;
        case 1011:
            $column = "US_expanions";
            $p += intval($myCharacter->mainStats['US_expanions']);
            break;
        case 1012:
            $column = "K_expanions";
            $p += intval($myCharacter->mainStats['K_expanions']);
            break;
        case 1013:
            $column = "Wt_expanions";
            $p += intval($myCharacter->mainStats['Wt_expanions']);
            break;
        case 1014:
            $column = "I_expanions";
            $p += intval($myCharacter->mainStats['I_expanions']);
            break;
        case 1015:
            $column = "Zw_expanions";
            $p += intval($myCharacter->mainStats['Zw_expanions']);
            break;
        case 1016:
            $column = "Zr_expanions";
            $p += intval($myCharacter->mainStats['Zr_expanions']);
            break;
        case 1017:
            $column = "Inte_expanions";
            $p += intval($myCharacter->mainStats['Inte_expanions']);
            break;
        case 1018:
            $column = "SW_expanions";
            $p += intval($myCharacter->mainStats['SW_expanions']);
            break;
        case 1019:
            $column = "Ogl_expanions";
            $p += intval($myCharacter->mainStats['Ogl_expanions']);
            break;
        case 38:
            $column = "ability1";
            $p += intval($myCharacter->ability['ability1']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Zw'])+intval($myCharacter->mainStats['Zw_expanions']);
            break;
        case 39:
            $column = "ability2";
            $p += intval($myCharacter->ability['ability2']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['WW'])+intval($myCharacter->mainStats['WW_expanions']);
            break;
        case 40:
            $column = "ability3";
            $p += intval($myCharacter->ability['ability3']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Ogl'])+intval($myCharacter->mainStats['Ogl_expanions']);
            break;
        case 41:
            $column = "ability4";
            $p += intval($myCharacter->ability['ability4']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Ogl'])+intval($myCharacter->mainStats['Ogl_expanions']);
            break;
        case 42:
            $column = "ability5";
            $p += intval($myCharacter->ability['ability5']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Inte'])+intval($myCharacter->mainStats['Inte_expanions']);
            break;
        case 43:
            $column = "ability6";
            $p += intval($myCharacter->ability['ability6']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['I'])+intval($myCharacter->mainStats['I_expanions']);
            break;
        case 44:
            $column = "ability7";
            $p += intval($myCharacter->ability['ability7']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Zw'])+intval($myCharacter->mainStats['Zw_expanions']);
            break;
        case 45:
            $column = "ability8";
            $p += intval($myCharacter->ability['ability8']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Wt'])+intval($myCharacter->mainStats['Wt_expanions']);
            break;
        case 46:
            $column = "ability9";
            $p += intval($myCharacter->ability['ability9']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['I'])+intval($myCharacter->mainStats['I_expanions']);
            break;
        case 47:
            $column = "ability10";
            $p += intval($myCharacter->ability['ability10']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Wt'])+intval($myCharacter->mainStats['Wt_expanions']);
            break;
        case 48:
            $column = "ability11";
            $p += intval($myCharacter->ability['ability11']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['SW'])+intval($myCharacter->mainStats['SW_expanions']);
            break;
        case 49:
            $column = "ability12";
            $p += intval($myCharacter->ability['ability12']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['SW'])+intval($myCharacter->mainStats['SW_expanions']);
            break;
        case 50:
            $column = "ability13";
            $p += intval($myCharacter->ability['ability13']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['I'])+intval($myCharacter->mainStats['I_expanions']);
            break;
        case 51:
            $column = "ability14";
            $p += intval($myCharacter->ability['ability14']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Ogl'])+intval($myCharacter->mainStats['Ogl_expanions']);
            break;
        case 52:
            $column = "ability15";
            $p += intval($myCharacter->ability['ability15']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Zw'])+intval($myCharacter->mainStats['Zw_expanions']);
            break;
        case 53:
            $column = "ability16";
            $p += intval($myCharacter->ability['ability16']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Ogl'])+intval($myCharacter->mainStats['Ogl_expanions']);
            break;
        case 54:
            $column = "ability17";
            $p += intval($myCharacter->ability['ability17']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Zw'])+intval($myCharacter->mainStats['Zw_expanions']);
            break;
        case 55:
            $column = "ability18";
            $p += intval($myCharacter->ability['ability18']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Zr'])+intval($myCharacter->mainStats['Zr_expanions']);
            break;
        case 56:
            $column = "ability19";
            $p += intval($myCharacter->ability['ability19']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Inte'])+intval($myCharacter->mainStats['Inte_expanions']);
            break;
        case 57:
            $column = "ability20";
            $p += intval($myCharacter->ability['ability20']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Ogl'])+intval($myCharacter->mainStats['Ogl_expanions']);
            break;
        case 58:
            $column = "ability21";
            $p += intval($myCharacter->ability['ability21']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Zw'])+intval($myCharacter->mainStats['Zw_expanions']);
            break;
        case 59:
            $column = "ability22";
            $p += intval($myCharacter->ability['ability22']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['K'])+intval($myCharacter->mainStats['K_expanions']);
            break;
        case 60:
            $column = "ability23";
            $p += intval($myCharacter->ability['ability23']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['K'])+intval($myCharacter->mainStats['K_expanions']);
            break;
        case 61:
            $column = "ability24";
            $p += intval($myCharacter->ability['ability24']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['Ogl'])+intval($myCharacter->mainStats['Ogl_expanions']);
            break;
        case 62:
            $column = "ability25";
            $p += intval($myCharacter->ability['ability25']);
            $endAbilityValue = $p+ intval($myCharacter->mainStats['K'])+intval($myCharacter->mainStats['K_expanions']);
            break;
            case 62:
                $column = "ability25";
                $p += intval($myCharacter->ability['ability25']);
                $endAbilityValue = $p+ intval($myCharacter->mainStats['K'])+intval($myCharacter->mainStats['K_expanions']);
                break;
        
    } 
    if(!(($p<0) || $p>100)){
        if(!$gmMode){ 
                // pobieranie expa jesnie nie jestesmy w trybie mistrza gry 
                //zawsze bedzie ustawiało $res[1] czyli strate pdków ale jeśli bedzie ze sie nie da to bedzie to 0 
                //tak samo jak gdy bedzie gmMode włączony 
        }else{
            
        }
    
        try{   
            $sql = "UPDATE ".$tableName." SET ".$column." = :variable WHERE char_id = {$_SESSION['charOnTable']}";
            $db = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
            $stmt = $db->prepare($sql);

            if($stmt){
                $stmt->bindParam(":variable",$p);

                $ex = $stmt->execute();
                if($ex){
                    array_push($res,1);
                    array_push($res,'zajebało 0'); // tu bedzie tylko zmienna z expem do zajebania jesli różne od 0 
                    array_push($res,$endAbilityValue);
                }
            }
        }catch(Exception $e){

        }
}else{
    
}
echo json_encode($res);
// 0 - nie rozwiniete brak expa 1- rowinięte 2- nie można cofac takiej zmiany 3 - nie rozwiniete, niedozwolona wartość 
// number koszt expa jaki wydano wiec trzeva odjąć 
// number jeśli jest to umiejętność to da wartość aktualna do wyswietlenia
?>

