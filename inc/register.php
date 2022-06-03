<?php 
require('db.php');
$Message="";

$errorMessage ="";
$login = 'admin';
$password = 'admin';
$mail = 'ex@op.pl';
$nickname = 'best Admin :)';



if(isset($_REQUEST['log'])&& strlen($_REQUEST['log']) >= 4 ){
    $login = trim($_REQUEST['log']);
}else{
    $errorMessage .="<p>Błedny login. Musi zawierać conajmniej 5 znaków</p> \n";
}
if(isset($_REQUEST['pass'])&& strlen($_REQUEST['pass']) >= 5 ){
    $password = trim($_REQUEST['pass']);
    if(isset($_REQUEST['pass2'])){
        $password2 = trim($_REQUEST['pass2']);
        if($password2 == $password){
           $password = password_hash($password,PASSWORD_BCRYPT);
        
        }else{
            $errorMessage .="<p>Hasła nie są takie same </p>\n";
        }
    }else{
        $errorMessage .="<p>Wpisz ponownie hasło</p>\n";
    }
    
}else{
    $errorMessage .="<p>Błedne hasło. Musi zawierać conajmniej 6 znaków</p>\n";
}
if(isset($_REQUEST['mail'])&&  filter_var(trim($_REQUEST['mail']),FILTER_VALIDATE_EMAIL) ){
    $mail = filter_var(trim($_REQUEST['mail']),FILTER_VALIDATE_EMAIL);
}else{
    $errorMessage .="<p>Błedny mail.</p>\n";
}
if(isset($_REQUEST['nickname'])&& strlen($_REQUEST['nickname']) >= 4 ){
    $nickname = trim($_REQUEST['nickname']);
}else{
    $errorMessage .="<p>Błędny Nick. Musi zawierać conajmniej 5 znaków</p> \n";
}


if(empty($errorMessage)){
    $sql = "SELECT login , mail , nickname FROM users WHERE login = :login OR mail = :mail OR nickname = :nickname";
    try{
        $db= new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
        $stmt = $db->prepare($sql);

        if($stmt){
            $stmt->bindParam(":login",$login);
            $stmt->bindParam(":mail",$mail);
            $stmt->bindParam(":nickname",$nickname);

            $ex= $stmt->execute(); 
            if($ex){
                $res = $stmt->fetch();
                $row = $stmt->rowCount();
                if($row > 0){
                    if($res['login'] === $login){
                        $Message .= "<p>Taki login już jest zajęty</p>\n";
                    }
                    if($res['mail'] === $mail){
                        $Message .= "<p>Ten mail jest już w użyciu</p>\n";
                    }
                    if($res['nickname'] === $nickname){
                        $Message .= "<p>Taki Nick już jest zajęty</p>\n";
                    }
                }
            }
        }
    }catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

if(empty($errorMessage)&&empty($Message)){
    $sql = "INSERT INTO users (login, password, mail, nickname)
    VALUES (:login, :password, :mail, :nickname)";
    try{
        $db= new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
        $stmt = $db->prepare($sql);

        if($stmt){
            $stmt->bindParam(":login",$login);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":mail",$mail);
            $stmt->bindParam(":nickname",$nickname);

            $ex= $stmt->execute(); 
            echo null;
        }
    }catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

}
    
    
if(empty($errorMessage)){
    echo $Message;
}else{
    echo $errorMessage;
}



?>