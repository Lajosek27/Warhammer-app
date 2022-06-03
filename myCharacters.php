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
    <title>Moje Postaci</title>
</head>
<?php include('header.php');?>
<body onload="loadList()">
<div class="row justify-content-center text-center">
<div class="col-sm-8 col-lg-8">
<h1>Moje Postaci</h1>
<div id="list">


<!-- Modal -->
<div class="modal fade" id="exampleModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ostrzeżenie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" id="btn_cancel" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
        <button onClick=""type="button" id="btn_remove" class="btn btn-danger" data-bs-dismiss="modal">Usuń</button>
      </div>
    </div>
  </div>
</div>

</div>
  
</div>
    </div>  
    <script src="https://whapp.pl/inc/myCharacters.js"></script>
</body>
</html>