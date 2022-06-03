<?php 
session_start();
header("www.localhost.xd/tworzenie-nowej-profesji");
if( !isset($_SESSION['user_id'])){
 header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Nowa Profesja</title>
  
</head>
<?php include('header.php');?>
<body>
  <div class="row justify-content-lg-center">
    <div class="col-lg-6">
      <div class="text-center m-2">
        <h1>Dodaj profesje</h1>
      </div>
      <div class="row m-3">
        <label for="name" class="col col-form-label">Nazwa Scieżki Profesji</label>
        <input type="text" class="form-control col" id="nameCP">
      </div>
      <div id="careerTier0">
      <hr class="my-4">
        <h3 class="text-center">Pierwszy poziom profesji</h3>
        
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody>
              <tr>
                <th scope="row">Nazwa Poziomu</th>
                <td><input type="text" class="form-control" id="nameCP0"></td>
              </tr>
              <tr>
                  <th scope="row">Cecha Główna 1</th>
                  <td>
                    <select class="form-select form-select-sm " id="careerClass0">
                      <option  selected value="WW">Walka Wręcz</option>
                      <option value="US">Umiejętności Strzeleckie</option>
                      <option value="S">Siła</option>
                      <option value="Wt">Wytrzymałość</option>
                      <option value="I">Iniciatywa</option>
                      <option value="Zw">Zwinność</option>
                      <option value="Zr">Zręczność</option>
                      <option value="Int">Inteligęcja</option>
                      <option value="SW">Siła Woli</option>
                      <option value="Ogl">Ogłada</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Cecha Główna 2</th>
                  <td>
                    <select class="form-select form-select-sm " id="careerClass1">
                      <option  selected value="WW">Walka Wręcz</option>
                      <option value="US">Umiejętności Strzeleckie</option>
                      <option value="S">Siła</option>
                      <option value="Wt">Wytrzymałość</option>
                      <option value="I">Iniciatywa</option>
                      <option value="Zw">Zwinność</option>
                      <option value="Zr">Zręczność</option>
                      <option value="Int">Inteligęcja</option>
                      <option value="SW">Siła Woli</option>
                      <option value="Ogl">Ogłada</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Cecha Główna 3</th>
                  <td>
                    <select class="form-select form-select-sm mainstat" id="careerClass2">
                      <option  selected value="WW">Walka Wręcz</option>
                      <option value="US">Umiejętności Strzeleckie</option>
                      <option value="S">Siła</option>
                      <option value="Wt">Wytrzymałość</option>
                      <option value="I">Iniciatywa</option>
                      <option value="Zw">Zwinność</option>
                      <option value="Zr">Zręczność</option>
                      <option value="Int">Inteligęcja</option>
                      <option value="SW">Siła Woli</option>
                      <option value="Ogl">Ogłada</option>
                    </select>
                  </td>
                </tr>
              </tbody>
          </table>
        <div>
          <h3 class="text-center">Umiejętności</h3>
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="abilityTable0">
              
              </tbody>
          </table>
          <div class="row">
            <button  class="btn btn-primary col m-1" onclick="addAbilitySpace('0',1)">Podstawowa</button>
            <button class="btn btn-primary col m-1" onclick="addAbilitySpace('0',0)">Zaawansowana/grupowa</button>
          </div>
        </div>
        <div>
          <h3 class="text-center">Talenty</h3>
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="talentTable0">
              
              </tbody>
          </table>
          <div class="container text-center">
            <button  class="btn btn-primary" onclick="addTalentSpace('0',3)">Dodaj Talent</button>
          </div>
        </div>
      </div>
      <div id="careerTier1">
      <hr class="my-4">
        <h3 class="text-center">Drugi poziom profesji</h3>
        
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="firstTierTable">
              <tr>
                <th scope="row">Nazwa Poziomu</th>
                <td><input type="text" class="form-control" id="nameCP1"></td>
              </tr>
              <tr>
                  <th scope="row">Cecha Główna</th>
                  <td>
                    <select class="form-select form-select-sm " id="careerClass3">
                      <option  selected value="WW">Walka Wręcz</option>
                      <option value="US">Umiejętności Strzeleckie</option>
                      <option value="S">Siła</option>
                      <option value="Wt">Wytrzymałość</option>
                      <option value="I">Iniciatywa</option>
                      <option value="Zw">Zwinność</option>
                      <option value="Zr">Zręczność</option>
                      <option value="Int">Inteligęcja</option>
                      <option value="SW">Siła Woli</option>
                      <option value="Ogl">Ogłada</option>
                    </select>
                  </td>
                </tr>
              </tbody>
          </table>
        <div>
          <h3 class="text-center">Umiejętności</h3>
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="abilityTable1">
              
              </tbody>
          </table>
          <div class="row">
            <button  class="btn btn-primary col m-1" onclick="addAbilitySpace('1',1)">Podstawowa</button>
            <button class="btn btn-primary col m-1" onclick="addAbilitySpace('1',0)">Zaawansowana/grupowa</button>
          </div>
        </div>
        <div>
          <h3 class="text-center">Talenty</h3>
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="talentTable1">
              
              </tbody>
          </table>
          <div class="container text-center">
            <button  class="btn btn-primary" onclick="addTalentSpace('1',3)">Dodaj Talent</button>
          </div>
        </div>
      </div>
      <div id="careerTier2">
      <hr class="my-4">
        <h3 class="text-center">Trzeciego poziom profesji</h3>
        
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="firstTierTable">
              <tr>
                <th scope="row">Nazwa Poziomu</th>
                <td><input type="text" class="form-control" id="nameCP2"></td>
              </tr>
              <tr>
                  <th scope="row">Cecha Główna</th>
                  <td>
                    <select class="form-select form-select-sm " id="careerClass4">
                      <option  selected value="WW">Walka Wręcz</option>
                      <option value="US">Umiejętności Strzeleckie</option>
                      <option value="S">Siła</option>
                      <option value="Wt">Wytrzymałość</option>
                      <option value="I">Iniciatywa</option>
                      <option value="Zw">Zwinność</option>
                      <option value="Zr">Zręczność</option>
                      <option value="Int">Inteligęcja</option>
                      <option value="SW">Siła Woli</option>
                      <option value="Ogl">Ogłada</option>
                    </select>
                  </td>
                </tr>
              </tbody>
          </table>
        <div>
          <h3 class="text-center">Umiejętności</h3>
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="abilityTable2">
              
              </tbody>
          </table>
          <div class="row">
            <button  class="btn btn-primary col m-1" onclick="addAbilitySpace('2',1)">Podstawowa</button>
            <button class="btn btn-primary col m-1" onclick="addAbilitySpace('2',0)">Zaawansowana/grupowa</button>
          </div>
        </div>
        <div>
          <h3 class="text-center">Talenty</h3>
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="talentTable2">
              
              </tbody>
          </table>
          <div class="container text-center">
            <button  class="btn btn-primary" onclick="addTalentSpace('2',3)">Dodaj Talent</button>
          </div>
        </div>
      </div>
      <div id="careerTier3">
      <hr class="my-4">
        <h3 class="text-center">Czwarty poziom profesji</h3>
        
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="firstTierTable">
              <tr>
                <th scope="row">Nazwa Poziomu</th>
                <td><input type="text" class="form-control" id="nameCP3"></td>
              </tr>
              <tr>
                  <th scope="row">Cecha Główna</th>
                  <td>
                    <select class="form-select form-select-sm " id="careerClass5">
                      <option  selected value="WW">Walka Wręcz</option>
                      <option value="US">Umiejętności Strzeleckie</option>
                      <option value="S">Siła</option>
                      <option value="Wt">Wytrzymałość</option>
                      <option value="I">Iniciatywa</option>
                      <option value="Zw">Zwinność</option>
                      <option value="Zr">Zręczność</option>
                      <option value="Int">Inteligęcja</option>
                      <option value="SW">Siła Woli</option>
                      <option value="Ogl">Ogłada</option>
                    </select>
                  </td>
                </tr>
              </tbody>
          </table>
        <div>
          <h3 class="text-center">Umiejętności</h3>
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="abilityTable3">
              
              </tbody>
          </table>
          <div class="row">
            <button  class="btn btn-primary col m-1" onclick="addAbilitySpace('3',1)">Podstawowa</button>
            <button class="btn btn-primary col m-1" onclick="addAbilitySpace('3',0)">Zaawansowana/grupowa</button>
          </div>
        </div>
        <div>
          <h3 class="text-center">Talenty</h3>
          <table class="table table-hover">
            <thead>
            </thead>
              <tbody id="talentTable3">
              
              </tbody>
          </table>
          <div class="container text-center">
            <button  class="btn btn-primary" onclick="addTalentSpace('3',3)">Dodaj Talent</button>
          </div>
        </div>
        <hr class="my-4">
        <div class="row m-5">
          <div class="container col text-start">
              <button  class="btn btn-outline-primary col m-1" onclick="">Wstecz </button>
          </div>
          <div class="container col text-end">
              <button  class="btn btn-primary col m-1" onclick="end()">Dodaj</button>
          </div>
        </div>
      </div>
    </div>
  </div>


      
          
  <script src="inc/addCareer.js"></script>
</body>
</html>