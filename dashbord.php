<?php 
session_start();
if( !isset($_SESSION['user_id'])){
     header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>    
    <title>Dashbord</title>
</head>
<?php include('header.php');?>
<body onload="loadList()">
    <div class="row justify-content-center text-center">
        <div class="feature row h-50 m-2">
            <div class="row justify-content-center text-center">
            <h3>Lista Postaci</h3>
            </div>
            <div class="row justify-content-center text-center ">
                <div class="feature col-md-6 text-center ">
                    <div class="row">
                        <div class="form-floating mb-3 col"> <!--col-7 for menu with team selecter-->
                            <input type="text" class="form-control" id="search" placeholder="Szukaj Postaci" oninput="search()">
                            <label for="search">Szukaj Postaci</label>
                        </div>
                        <!-- <div class="form-floating mb-3 col-5">
                        <div class="form-floating">
                        <select class="form-select" id="team" >
                        <option selected>Brak</option>
                        <option value="1">Pierściena</option>
                        <option value="2">siódma</option>
                        <option value="3">specialn</option>
                        </select>
                        <label for="team">Drużyna</label>
                        </div>
                        </div> -->
                    </div>
                </div>
        <div class="row justify-content-center text-center">
        <div  class="overflow-auto col-md-6 h-100  " style="max-height: 445px">
        
            
        
        <div class="list-group list-group-flush border-bottom scrollarea" id = 'list'></div>
        </div> 
                </div>
            </div>
      
        <hr class="my-4">
        
        </div>
            <div class="feature col-sm-7 col-lg-4 text-center ">
                <h1 id= 'name'>Wybierz Postać</h1>
                <div class="text-start">
                    <table class="table table-hover" id="characterInfo">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Mistrz Gry</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Gracz</th>
                            <td></td>
                        </tr>
                        <tr >
                            <th scope="row">Rasa</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Profesja</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Klasa</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Ścieżka Profesji</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Wiek</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Wzrost</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Włosy</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Oczy</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Żywotność</th>
                            <td></td>
                        </tr>
                        
                        </tbody>
                    </table>
                   
                </div>
                <h3 id="test">Cechy Główne</h1>
                <div class="text-start">
                <table class="table table-hover" id="mainStats">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Walka Wręcz</th>
                            <td>100</td>
                        </tr>
                        <tr >
                            <th scope="row">Umiejętności Strzeleckie</th>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th scope="row">Siła</th>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th scope="row">Wytrzymałość</th>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th scope="row">Iniciatywa</th>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th scope="row">Zwinność</th>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th scope="row">Zręczność</th>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th scope="row">Inteligencja</th>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th scope="row">Siła Woli</th>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th scope="row">Ogłada</th>
                            <td>100</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        
        

    </div>
    <hr class="my-4">
    
        <h3 class="text-center">Umiejętności Podstawowe</h3>
      <div class="row justify-content-center">
        <div class="feature col-sm-7 col-lg-4 p-3 text-center">
                <div class="text-start">
                <table class="table table-hover" id='abilityTable1'>
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                        <th scope="row">Atletyka</th>
                            <td>Zw</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Broń Biała(podstawowa)</th>
                            <td>WW</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Charyzma</th>
                            <td>Ogl</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Dowodzenie</th>
                            <td>Ogl</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Hazard</th>
                            <td>Int</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Intuicja</th>
                            <td>I</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Jeździectwo</th>
                            <td>Zw</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Mocna Głowa</th>
                            <td>Wt</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Nawigacja</th>
                            <td>I</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Odporność</th>
                            <td>Wt</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Opanowanie</th>
                            <td>SW</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Oswajanie</th>
                            <td>SW</td>
                            <td></td>
                        </tr>
                        <th scope="row">Percepcja</th>
                            <td>I</td>
                              <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
       
     
        <div class="feature col-sm-7 col-lg-4 p-3 text-center">
                <div class="text-start">
                    <table class="table table-hover" id="abilityTable2">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                        
                        <tr>
                        <th scope="row">Plotkowanie</th>
                            <td>Ogl</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Powożenie</th>
                            <td>Zw</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Przekupstwo</th>
                            <td>Ogl</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Skradanie</th>
                            <td>Zw</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Sztuka </th>
                            <td>Zr</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Sztuka Przetrwania</th>
                            <td>Int</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Targowanie</th>
                            <td>Ogl</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Unik</th>
                            <td>Zw</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Wioślarstwo</th>
                            <td>S</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Wspinaczka</th>
                            <td>S</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Występy</th>
                            <td>Ogl</td>
                              <td></td>
                        </tr>
                        <tr>
                        <th scope="row">Zastraszanie</th>
                            <td>S</td>
                              <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
</div>
        
        <hr class="my-4">
        <div class="row justify-content-center">
        <div class="feature col-sm-7 col-lg-4 p-3 text-center order-lg-2">
        <h3 style="height: 64px;">Umiejętności Grupowe i Zaawansowane</h3>
        <div class="d-flex flex-column text-start align-items-stretch flex-shrink-0 bg-white overflow-auto h-100 " style=" max-height: 525px">
                    <table class="table table-hover">
                        <thead>
                        </thead>
                        <tbody id="advanceAbility">
                        <tr>
                        <th scope="row">Brak</th>
                            <td></td>
                        </tr>
                        
                        
                        </tbody>
                    </table>
        </div>
    </div>
        <div class="feature col-sm-7 col-lg-4 p-3 text-center order-lg-1">
        
        
        <h3 style="height: 64px;">Talenty i Cechy Stworzenia</h3>
        <div class="d-flex flex-column text-start lign-items-stretch flex-shrink-0 bg-white overflow-auto h-100 " style=" max-height: 525px">
                    <table class="table table-hover">
                        <thead>
                        </thead>
                        <tbody id="talentsTable">
                        <tr>
                        <th scope="row">Brak</th>
                            <td></td>
                        </tr>
                        
                        
                        </tbody>
                    </table>
        </div>
        </div>
        </div>
    

    <script src="/inc/main.js"></script>
</body>
</html>