<?php

require('db.php');
session_start();
if(session_status()===PHP_SESSION_ACTIVE )
{
    session_destroy();
    session_start();
}


$err = array();
$login=$password='';

if(isset($_REQUEST['log']) && !empty($_REQUEST['log'])){
    $login = $_REQUEST['log'];
    $err['empty login']=0;
}else{
    $err['empty login']=1;
}
if(isset($_REQUEST['pass']) && !empty($_REQUEST['pass'])){
    $password=$_REQUEST['pass'];
    $err['empty password']=0;
}else{
    $err['empty password']=1;
}
$sql = "SELECT user_id, login, mail, password, nickname FROM users WHERE login = :login";
if($err['empty login']==0 && $err['empty password']==0){
try{
    $db = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
    $stmt = $db->prepare($sql);
    if($stmt){
        $stmt->bindParam(":login",$login);
       
            $res = $stmt->execute();
            if($res){
                $echo = $stmt->fetch();
                $row = $stmt->rowCount();
                if($row != 0 ){
                   
                    if(password_verify($password,$echo['password'])){
                        $_SESSION['user_id']=$echo['user_id'];
                        $_SESSION['login']=$echo['login'];
                        $_SESSION['nickname']=$echo['nickname'];
                        $err['pass']='pass';
                    }else{
                        $err['incorrect password']=1;
                    }
                    
                }else{
                    
                    $err['incorrect login']=1;
                }
            }else{
                $err['connection']=1;
            }
        
    }else{
        $err['connection']=1;
    }
}catch(Exception $e) {
    $res['connection'] = 1;
}
}
echo json_encode($err);

exit;
?>