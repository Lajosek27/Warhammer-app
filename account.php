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
<body>
<div class="row justify-content-center text-center">
<div class="col-sm-5 col-lg-3">
<form  action="https://whapp.pl/inc/changePassword.php" method="post"> 

  <h1>Zmień hasło</h1>
  <div class="form-floating mb-3">
  <input type="password" class="form-control <?php if(isset($_GET['error']) && $_GET['error']=='oldPassword'){echo "is-invalid";} ?>" id="oldPassword" name="oldPassword" placeholder="Stare hasło" required>
  <label for="oldPassword">Stare hasło</label>
</div>
<div class="form-floating mb-3">
<div class="form-floating">
  <input type="password" class="form-control <?php if(isset($_GET['error']) && $_GET['error']=='newPassword'){echo "is-invalid";}?>" id="floatingPassword" name="newPassword1" placeholder="Password" required>
  <label for="floatingPassword">Nowe hasło</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control <?php if(isset($_GET['error']) && $_GET['error']=='newPassword'){echo "is-invalid";}?>" id="floatingPassword" name="newPassword2" placeholder="Password" required>
  <label for="floatingPassword">Powtórz nowe hasło</label>
</div>
</div>
<button type="submit" class="btn btn-primary">Zmień hasło</button>
<?php if(isset($_GET['error']) && ($_GET['error']=='newPassword' || $_GET['error']=='oldPassword')){
  if(isset($_GET['message']) && $_GET['message']=='lenght'){echo '<div class=" alert alert-danger m-2">Nowe hasło musi mieć conajmniej 6 znaków</div>';}
  
  if(isset($_GET['message']) && $_GET['message']=='match' && $_GET['error']=='newPassword'){ echo '<div class=" alert alert-danger m-2">Hasła nie pasuja do siebie</div>';}
 
  if(isset($_GET['message']) && $_GET['message']=='match' && $_GET['error']=='oldPassword'){  echo '<div class=" alert alert-danger m-2">Nie prawidłowe hasło</div>';}

  if(isset($_GET['message']) && $_GET['message']=='unknow'){  echo '<div class=" alert alert-danger m-2">Coś poszło nie tak :/ Spróbuj ponownie po odświeżeniu strony</div>';   }
  
}
if(isset($_GET['success']) && $_GET['success']=='newPassword'){
  echo '<div class=" alert alert-success m-2">Hasło zostało zmienione </div>'; 
}
   ?>
</form>  
<hr class="my-4">
<form  action="https://whapp.pl/inc/changeNickname.php" method="post"> 

  <h1>Zmień nick</h1>
  <div class="form-floating mb-3">
  <input type="password" class="form-control <?php if(isset($_GET['error']) && $_GET['error']=='oldPassword'){echo "is-invalid";} ?>" id="password" name="password" placeholder="password" required>
  <label for="password">Hasło</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control <?php if(isset($_GET['error']) && $_GET['error']=='newPassword'){echo "is-invalid";}?>" id="nickname" name="nickname" placeholder="nickname" required>
  <label for="nickname">Nowy nick</label>
</div>
<button type="submit" class="btn btn-primary">Zmień nick</button>
<?php 
  if(isset($_GET['error']) && $_GET['error']=='nickname' && isset($_GET['message']) && $_GET['message']=='lenght')
  echo '<div class=" alert alert-danger m-2">Nowy nick musi mieć conajmniej 5 znaków</div>';
  if(isset($_GET['error']) && $_GET['error']=='nickname' && isset($_GET['message']) && $_GET['message']=='exist')
  echo '<div class=" alert alert-danger m-2">Ten nick jest już zajęty</div>';
  if(isset($_GET['error']) && $_GET['error']=='nickname' && isset($_GET['message']) && $_GET['message']=='unknow')
  echo '<div class=" alert alert-danger m-2">Coś poszło nie tak :/ Spróbuj ponownie po odświeżeniu strony</div>';
  if(isset($_GET['error']) && $_GET['error']=='password' && isset($_GET['message']) && $_GET['message']=='match')
  echo '<div class=" alert alert-danger m-2">Nie prawidłowe hasło</div>';
  if(isset($_GET['success']) && $_GET['success']=='nickname'){
  echo '<div class=" alert alert-success m-2">Zmieniono Nick </div>'; 
  }

   ?>
</form>  

</div>
    </div>  
</body>
</html>