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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashbord</title>
  
</head>
<?php include('header.php');?>
<body>
    
            
            <div class="feature col text-center">
                <h1 id= 'name'>Stwórz Postać  </h1>
                <div class="text-start">
                <div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Nazwa Postaci</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="charName">
    </div>
  </div>
  <div class="row mb-3">
    <label  class="col-sm-2 col-form-label">Wybierz rasę postaci</label>
    <div class="col-sm-10">
        <select class="form-select form-select-lg mb-3" id="race">
            <option  selected value="Człowiek">Człowiek</option>
            <option value="Krasnolud">Krasnolud</option>
            <option value="Nizołek">Nizołek</option>
            <option value="Leśny Elf">Leśny Elf</option>
            <option value="Wysoki Elf">Wysoki Elf</option>
        </select>
    </div>
  </div>
  <div class="row mb-3">
    <label  class="col-sm-2 col-form-label">Wybierz klasę profesji</label>
    <div class="col-sm-10">
        <select class="form-select form-select-lg mb-3" id="careerClass">
            <option  selected value="Uczeni">Uczeni</option>
            <option value="Mieszczanie">Mieszczanie</option>
            <option value="Dworzanie">Dworzanie</option>
            <option value="Pospólstwo">Pospólstwo</option>
            <option value="Wędrowcy">Wędrowcy</option>
            <option value="Wodniacy">Wodniacy</option>
            <option value="Łotrzykowie">Łotrzykowie</option>
            <option value="Wojownicy">Wojownicy</option>
        </select>
    </div>
  </div>
  <div class="row mb-3">
    <label  class="col-sm-2 col-form-label">Wybierz Profesje</label>
    <div class="col-sm-10">
        <div class="input-group">
            <button class="btn btn-outline-secondary" type="button" onclick="startAddCareer()">Dodaj Profesje</button>
            <select class="form-select " id="careerPath" aria-label="Example select with button addon">
            <option selected></option>
           
        </select>
        </div>
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Rodzaj postaci</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios"  value="NPC"  id='NPC'checked>
        <label class="form-check-label" for="gridRadios1">
          Postać Niezależna (NPC)
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios"  value="PC" id='PC'>
        <label class="form-check-label" for="gridRadios2">
          Postać Gracza (PC)
        </label>
      </div>
      
    </div>
  </fieldset>
  
  </div>
  <button type="submit" class="btn btn-primary" onclick="endStep1()">Dalej</button>
            
                 
    <script src="https://whapp.pl/inc/addCharacter.js"></script>
</body>
</html>