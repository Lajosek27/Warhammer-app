<?php 
session_start();
$_SESSION['charOnTable']=0;
$_SESSION['charMadeBy']=0;
include('inc/character.php');
if(!isset($_SESSION['user_id'])){
     header("Location: index.html");
}
if(!isset($_REQUEST['q'])){header('Location: dashbord.php');}
$myCharacter = new character(intval($_REQUEST['q']));
if($_SESSION['user_id']!=$myCharacter->made_by){header('Location: dashbord.php');}
$_SESSION['charMadeBy']=$myCharacter->made_by;
$myCharacter->getInfo();
$myCharacter->getAdvenceAbility();
$myCharacter->getTalents();
$_SESSION['charOnTable']=$myCharacter->char_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>    
    <title>Edycja</title>
    <style>
        .btn-sm{
            height: 33px;
            
        }
    </style>
</head>
<?php include('header.php');?>
<body onload="display()">
<div class="row justify-content-center">
    <div class="">
      <div class="text-center m-2">
      <div class="feature col text-center">
                <h1 id= 'name' value='<?php echo $myCharacter->char_id?>'><?php if(empty($myCharacter->name)){echo $_REQUEST['n'];}else{echo $myCharacter->name;} ?> </h1>
                <div class="text-start">
                    <table class="table table-hover" id="characterInfo">
                        <thead>
                            
                           
                            
                        </thead>
                        <tbody>
                        <tr >
                            <th scope="row">Rasa</th>
                            <td><input type="text" class="form-control" oninput="changeInfo('race',this)" value="<?php if(empty($myCharacter->charInfo['race'])){echo $_REQUEST['r'];}else{echo $myCharacter->charInfo['race'];}?>" id="race"></td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Profesja</th>
                            <td><input type="text" class="form-control" oninput="changeInfo('career',this)" value="<?php echo $myCharacter->charInfo['career'] ?>" id="career"></td>
                        </tr>
                        <tr>
                            <th scope="row">Klasa</th>
                            <td><input type="text" class="form-control" oninput="changeInfo('class',this)" value="<?php if(empty($myCharacter->charInfo['class'])){echo $_REQUEST['cc'];}else{echo $myCharacter->charInfo['class'];}?>" id="class"></td>
                        </tr>
                        <tr>
                            <th scope="row">Wiek</th>
                            <td><input type="text" class="form-control" oninput="changeInfo('age',this)" value="<?php if(!empty($myCharacter->charInfo['age'])){ echo $myCharacter->charInfo['age'];} ?>" id="age"></td>
                           
                        </tr>
                        <tr>
                            <th scope="row">Wzrost</th>
                            <td><input type="text" class="form-control" oninput="changeInfo('height',this)" value="<?php if(!empty($myCharacter->charInfo['height'])){ echo $myCharacter->charInfo['height'];} ?>" id="height"></td>
                        </tr>
                        <tr>
                            <th scope="row">Włosy</th>
                            <td> <input type="text" class="form-control" oninput="changeInfo('hair',this)" value="<?php if(!empty($myCharacter->charInfo['hair'])){ echo $myCharacter->charInfo['hair'];} ?>" id="hair"> </td>
                        </tr>
                        <tr>
                            <th scope="row">Oczy</th>
                            <td>
                            <input type="text" class="form-control" oninput="changeInfo('eyes',this)" value="<?php if(!empty($myCharacter->charInfo['eyes'])){ echo $myCharacter->charInfo['eyes'];} ?>" id="height">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Żywotność</th>
                            <td><input type="text" class="form-control"  oninput="changeInfo('hp',this)" value="<?php if(isset($myCharacter->hp)){echo $myCharacter->hp;}?>" id="hp"></td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
                <div>
      <hr class="my-4">
      <div class="row justify-content-center text-center">
      <h3 class="text-center">Cechy Główne</h3>
      <div class=" col-sm-6 col-md-6">
        
        
          <table class="table table-hover">
            <thead>
                <th>Nazwa</th>
                <th class="col-3">Baza</th>
              
            </thead>
              <tbody id="mainStat">
              <tr class="p-1">
                <th scope="row">Walka Wręcz</th>
                <td><input type="text" class="form-control-sm " base="WW" value="<?php echo $myCharacter->mainStats['WW']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1000)"></input></td>
                </tr>
            <tr class="p-1">
                <th scope="row">U. Strzeleckie</th>
                <td><input type="text" class="form-control-sm " base="US" value="<?php echo $myCharacter->mainStats['US']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1001)"></input></td>
                 </tr>
            <tr class="p-1">
                <th scope="row">Siła</th>
                <td><input type="text" class="form-control-sm " base="S" value="<?php echo $myCharacter->mainStats['K']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1002)"></input></td>
                 </tr>
            <tr class="p-1">
                <th scope="row">Wytrzymałość</th>
                <td><input type="text" class="form-control-sm " base="Wt" value="<?php echo $myCharacter->mainStats['Wt']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1003)"></input></td>
                </tr>
            <tr class="p-1">
                <th scope="row">Iniciatywa</th>
                <td><input type="text" class="form-control-sm " base="I" value="<?php echo $myCharacter->mainStats['I']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1004)"></input></td>
                </tr>
            <tr class="p-1">
                <th scope="row">Zwinność</th>
                <td><input type="text" class="form-control-sm " base="Zw" value="<?php echo $myCharacter->mainStats['Zw']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1005)"></input></td>
                 </tr>
            <tr class="p-1">
                <th scope="row">Zręczność</th>
                <td><input type="text" class="form-control-sm " base="Zr" value="<?php echo $myCharacter->mainStats['Zr']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1006)"></input></td>
                </tr>
            <tr class="p-1">
                <th scope="row">Inteligencja</th>
                <td><input type="text" class="form-control-sm " base="Int" value="<?php echo $myCharacter->mainStats['Inte']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1007)"></input></td>
                 </tr>
            <tr class="p-1">
                <th scope="row">Siła Woli</th>
                <td><input type="text" class="form-control-sm " base="SW" value="<?php echo $myCharacter->mainStats['SW']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1008)"></input></td>
                </tr>
            <tr class="p-1">
                <th scope="row" class="">Ogłada</th>
                <td><input type="text" class="form-control-sm " base="Ogl" value="<?php echo $myCharacter->mainStats['Ogl']?>" oninput="btnValidation(this,<?php echo $myCharacter->char_id?>,1009)"></input></td>
                 </tr>
            
              </tbody>
          </table>
      </div>
      <div class="col-sm-6 col-md-6">
          <table class="table table-hover">
            <thead>
                <th class="d-table-cell d-sm-none">Nazwa</th>
                <th>Rozwinięcia</th>
                <th>Suma</th>
            </thead>
              <tbody id="mainStatEx">
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none ">WW</th>
                <td class="d-flex justify-content-center">
                <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1010)" class="btn btn-sm btn-danger">-1</button>
                <label class="col-1 mx-2" mainExpanions="WW"><?php echo $myCharacter->mainStats['WW_expanions']?></label> 
                <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1010)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td  baseStat="WW"><?php echo $myCharacter->mainStats['WW'] + $myCharacter->mainStats['WW_expanions'] ?></td>
            </tr >
                
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none">US</th>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1011)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="US"><?php echo $myCharacter->mainStats['US_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1011)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="US"><?php echo $myCharacter->mainStats['US'] + $myCharacter->mainStats['US_expanions'] ?></td>
            </tr>
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none">S</th>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1012)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="S"><?php echo $myCharacter->mainStats['K_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1012)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="S"><?php echo $myCharacter->mainStats['K'] + $myCharacter->mainStats['K_expanions'] ?></td>
            </tr>
            <tr class="p-1" >
                <th scope="row" class="d-table-cell d-sm-none">Wt</th>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1013)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="Wt"><?php echo $myCharacter->mainStats['Wt_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1013)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="Wt"><?php echo $myCharacter->mainStats['Wt'] + $myCharacter->mainStats['Wt_expanions'] ?></td>
            </tr>
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none">I</th>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1014)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="I"><?php echo $myCharacter->mainStats['I_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1014)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="I"><?php echo $myCharacter->mainStats['I'] + $myCharacter->mainStats['I_expanions'] ?></td>
            </tr>
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none"> Zw</th>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1015)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="Zw"><?php echo $myCharacter->mainStats['Zw_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1015)" class="btn btn-sm btn-success">+1</button>

                </td>
                <td baseStat="Zw"><?php echo $myCharacter->mainStats['Zw'] + $myCharacter->mainStats['Zw_expanions'] ?>

                </td>
            </tr>
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none">Zr</th>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1016)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="Zr"><?php echo $myCharacter->mainStats['Zr_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1016)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="Zr"><?php echo $myCharacter->mainStats['Zr'] + $myCharacter->mainStats['Zr_expanions'] ?></td>
            </tr>
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none">Int</th>
                <td class="d-flex justify-content-center">                   
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1017)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="Int"><?php echo $myCharacter->mainStats['Inte_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1017)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="Int"><?php echo $myCharacter->mainStats['Inte'] + $myCharacter->mainStats['Inte_expanions'] ?></td>
            </tr>
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none">SW</th>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1018)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="SW"><?php echo $myCharacter->mainStats['SW_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1018)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="SW"><?php echo $myCharacter->mainStats['SW'] + $myCharacter->mainStats['SW_expanions'] ?></td>
            </tr>
            <tr class="p-1">
                <th scope="row" class="d-table-cell d-sm-none">Ogl</th>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,1019)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2" mainExpanions="Ogl"><?php echo $myCharacter->mainStats['Ogl_expanions']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,1019)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="Ogl"><?php echo $myCharacter->mainStats['Ogl'] + $myCharacter->mainStats['Ogl_expanions'] ?></td>
            </tr>
            
              </tbody>
          </table>
          </div>
          </div>
        <div>
          <h3 class="text-center">Umiejętności Podstawowe</h3>
          <table class="table table-hover">
            <thead>
                <th>Nazwa</th>
                <th class="d-none d-sm-table-cell" >Baza</th>
                <th>Rozwinięcia</th>
                <th class="col-2">Suma</th>
            </thead>
              <tbody id="basicAbility" >
              <tr class="p-1">
                <th scope="row">Atletyka</th>
                <td class="d-none d-sm-table-cell">Zw</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,38)" class="btn btn-sm   btn-danger">-1</button>
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability1']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,38)" class="btn btn-sm btn-success">+1</button>
                    
                </td>
                <td baseStat="Zw">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Broń Biała Podstawowa</th>
                <td class="d-none d-sm-table-cell">WW</td>
                <td  class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,39)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability2']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,39)" class="btn btn-sm btn-success">+1</button>
                    
                </td>
                <td baseStat="WW">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Charyzma</th>
                <td class="d-none d-sm-table-cell">Ogl</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,40)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability3']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,40)" class="btn btn-sm btn-success">+1</button>
                    
                </td>
                <td baseStat="Ogl">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Dowodzenie</th>
                <td class="d-none d-sm-table-cell">Ogl</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,41)" class="btn btn-sm btn-danger">-1</button>
                 
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability4']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,41)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="Ogl">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Hazard</th>
                <td class="d-none d-sm-table-cell">Int</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,42)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability5']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,42)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="Int">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Intuicja</th>
                <td class="d-none d-sm-table-cell">I</td>
                <td class="d-flex justify-content-center">
                   <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,43)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability6']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,43)" class="btn btn-sm btn-success">+1</button>
                 
                </td>
                <td baseStat="I">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Jeździectwo</th>
                <td class="d-none d-sm-table-cell">Zw</td>
                <td class="d-flex justify-content-center">
                   <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,44)" class="btn btn-sm btn-danger">-1</button>
               
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability7']?></label> 
                   <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,44)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="Zw">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Mocna Głowa</th>
                <td class="d-none d-sm-table-cell">Wt</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,45)" class="btn btn-sm btn-danger">-1</button>
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability8']?></label> 
                     <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,45)" class="btn btn-sm btn-success">+1</button>
                  
                </td>
                <td baseStat="Wt">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Nawigacja</th>
                <td class="d-none d-sm-table-cell">I</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,46)" class="btn btn-sm btn-danger">-1</button>
                   <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability9']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,46)" class="btn btn-sm btn-success">+1</button>
                </td>
                <td baseStat="I">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Odporność</th>
                <td class="d-none d-sm-table-cell">Wt</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,47)" class="btn btn-sm btn-danger">-1</button>
                
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability10']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,47)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Wt">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Opanowanie</th>
                <td class="d-none d-sm-table-cell">SW</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,48)" class="btn btn-sm btn-danger">-1</button>
              
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability11']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,48)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="SW">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Oswajanie</th>
                <td class="d-none d-sm-table-cell">SW</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,49)" class="btn btn-sm btn-danger">-1</button>
                
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability12']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,49)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="SW">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Percepcja</th>
                <td class="d-none d-sm-table-cell">I</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,50)" class="btn btn-sm btn-danger">-1</button>
            
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability13']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,50)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="I">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Plotkowanie</th>
                <td class="d-none d-sm-table-cell">Ogl</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,51)" class="btn btn-sm btn-danger">-1</button>
               
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability14']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,51)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Ogl">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Powożenie</th>
                <td class="d-none d-sm-table-cell">Zw</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,52)" class="btn btn-sm btn-danger">-1</button>
                 
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability15']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,52)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Zw">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Przekupstwo</th>
                <td class="d-none d-sm-table-cell">Ogl</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,53)" class="btn btn-sm btn-danger">-1</button>
                
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability16']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,53)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Ogl">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Skradanie</th>
                <td class="d-none d-sm-table-cell">Zw</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,54)" class="btn btn-sm btn-danger">-1</button>
            
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability17']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,54)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Zw">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Sztuka</th>
                <td class="d-none d-sm-table-cell">Zr</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,55)" class="btn btn-sm btn-danger">-1</button>
               
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability18']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,55)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Zr">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Sztuka Przetrwania</th>
                <td class="d-none d-sm-table-cell">Int</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,56)" class="btn btn-sm btn-danger">-1</button>
               
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability19']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,56)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Int">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Targowanie</th>
                <td class="d-none d-sm-table-cell">Ogl</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,57)" class="btn btn-sm btn-danger">-1</button>
              
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability20']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,57)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Ogl">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Unik</th>
                <td class="d-none d-sm-table-cell">Zw</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,58)" class="btn btn-sm btn-danger">-1</button>
                
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability21']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,58)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Zw">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Wioślarstwo</th>
                <td class="d-none d-sm-table-cell">S</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,59)" class="btn btn-sm btn-danger">-1</button>
                 
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability22']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,59)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="S">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Wspinaczka</th>
                <td class="d-none d-sm-table-cell">S</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,60)" class="btn btn-sm btn-danger">-1</button>
               
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability23']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,60)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="S">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Występy</th>
                <td class="d-none d-sm-table-cell">Ogl</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,61)" class="btn btn-sm btn-danger">-1</button>
                
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability24']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,61)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="Ogl">0</td>
            </tr>
            <tr class="p-1">
                <th scope="row">Zastraszanie</th>
                <td class="d-none d-sm-table-cell">S</td>
                <td class="d-flex justify-content-center">
                    <button type="button" onclick="change(-1,<?php echo $myCharacter->char_id?>,this,62)" class="btn btn-sm btn-danger">-1</button>
                  
                    <label class="col-1 mx-2"><?php echo $myCharacter->ability['ability25']?></label> 
                    <button type="button" onclick="change(1,<?php echo $myCharacter->char_id?>,this,62)" class="btn btn-sm btn-success">+1</button>
                   
                </td>
                <td baseStat="S">0</td>
            </tr>
           
              </tbody>
          </table>
          <div class="row">
          <h3 class="text-center">Umiejętności Zaawansowana/grupowe</h3>
          <table class="table table-hover">
            <thead>
                <th>Nazwa</th>
                <th class="col-2 d-none d-sm-table-cell" >Baza</th>
                <th>Rozwinięcia</th>
                <th class="col-2">Suma</th>
            </thead>
              <tbody id="advanceAbility">
              <?php 
                foreach($myCharacter->advanceAbility as &$ability ){
                    if($ability['group_name']==''){$ability['group_name']='0';}
                    echo '<tr class="p-1">';
                    echo '<th  value="'.$ability['ability_id'].'"  group="'.$ability['group_name'].'"scope="row">'.$ability['ability_name'].' </th>';
                    echo '<th class="d-none d-sm-table-cell">'.$ability['base_stat'].'</th>';
                    echo '<td  class="d-flex justify-content-center">';
                    echo '<button type="button" onclick="expansionsAdvanceAbility('.$ability['ability_id'].',\''.$ability['group_name'].'\',-1,this)" class="btn btn-sm btn-danger">-1</button>';
                    echo '<label class="col-1 mx-2">'.$ability['expansions'].'</label> ';
                    echo '<button type="button" onclick="expansionsAdvanceAbility('.$ability['ability_id'].',\''.$ability['group_name'].'\',1,this)" class="btn btn-sm btn-success">+1</button>';
                    echo '</td>';
                    echo '<td basestat="'.$ability['base_stat'].'">0</td>';
                    echo '<td><button type="button" onclick="removeAdvanceAbility(this)" class="d-none d-sm-table-cell btn-sm btn-outline-danger mx-1">Usuń</button></td>';
                    echo '</tr>';
                   
                }
              ?>
              </tbody></table>
          <div class="container text-center">
            <button  class="btn btn-primary col-3 m-1" onclick="addAdvanceAbility()">Dodaj </button>
            
          </div>
        </div>
        <div>
          <h3 class="text-center">Talenty</h3>
          <table class="table table-hover">
            <thead>
                <Th class="col-6">Nazwa</Th>
                <Th class="col-5">Rozwinięcia</Th>
                <Th></Th>
                </thead>
              <tbody id="talentTable">
              <?php 
             
                foreach($myCharacter->talents as &$talent ){
                    if($talent['group_name']==''){$talent['group_name']='0';}
                    echo '<tr class="p-1">';
                    echo '<th value="'.$talent['talent_id'].'" max="'.$talent['max_expansion'].'"  group="'.$talent['group_name'].'"scope="row" data-bs-toggle="popover" title="Max rozwinięć: " data-bs-content="'.$talent['description'].'" data-popover="false">'.$talent['talent_name'].' </th>';
                    echo '<td  class="d-flex justify-content-center">';
                    echo '<button type="button" onclick="expansionsTalents('.$talent['talent_id'].',\''.$talent['group_name'].'\',-1,this)" class="btn btn-sm btn-danger">-1</button>';
                    echo '<label class="col-1 mx-2">'.$talent['expansions'].'</label> ';
                    echo '<button type="button" onclick="expansionsTalents('.$talent['talent_id'].',\''.$talent['group_name'].'\',1,this)" class="btn btn-sm btn-success">+1</button>';
                    echo '</td>';
                    echo '<td><button type="button" onclick="removeTalents(this)" class="d-none d-sm-table-cell btn-sm btn-outline-danger  mx-1">Usuń</button></td>';
                    echo '</tr>';
                   
                }
              ?>
              </tbody>
          </table>
          <div class="container text-center">
            <button  class="btn btn-primary" onclick="addTalent()">Dodaj Talent</button>
          </div>
        </div>
      </div>
            </div>
      </div>
    </div>
</div>
    <script src="https://whapp.pl/inc/addCharacter1.js"></script>
</body>
</html>