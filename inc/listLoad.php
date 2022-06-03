<?php 

require('db.php');

$mysqli = mysqli_connect("localhost", "root", "", "whAPP");
if (!mysqli_connect_errno()) {
    
    $querry = mysqli_query($mysqli,"SELECT * FROM `listtotest` ORDER BY `name`");

    while($row = mysqli_fetch_assoc($querry)){
        echo  "<li id='numberOfChar{$row['id']}' value = '{$row['name']}'>{$row['name']} </li>" ;
    }
    
  }else{exit();}
  mysqli_close($mysqli);




?>