<?php 
if(!isset($_POST['oldPassword']) || !isset($_POST['newPassword1']) || !isset($_POST['newPassword2'])){
  header("Location: ".$_SERVER['HTTP_REFERER']);
}
$_SERVER['HTTP_REFERER']="/account.php";
session_start();
$oldPassword=trim($_POST['oldPassword']);
$newPassword1=trim($_POST['newPassword1']);
$newPassword2=trim($_POST['newPassword2']);

if(strlen($newPassword1)<6){ header("Location: ".$_SERVER['HTTP_REFERER']."?error=newPassword&message=lenght");exit();}
if($newPassword1!==$newPassword2){header("Location: ".$_SERVER['HTTP_REFERER']."?error=newPassword&message=match");exit();}

include("db.php");
try{
    $sql="SELECT password FROM users WHERE user_id={$_SESSION['user_id']}";
    $db= new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
    $stmt = $db->prepare($sql);

    if($stmt){
        $ex = $stmt->execute();
        if($ex){
            $res = $stmt->fetch();
            if(empty($res)){header("Location: ".$_SERVER['HTTP_REFERER']."?error=unknow&message=unknow");exit();}else{
                if(password_verify($oldPassword,$res[0])){
                    $sql = "UPDATE users SET password = :newPassword1 WHERE user_id={$_SESSION['user_id']}";
                    $stmt = $db->prepare($sql);
                    if($stmt){
                        $stmt->bindParam(":newPassword1",password_hash($newPassword1,PASSWORD_BCRYPT));
                        $ex = $stmt->execute();
                        if($ex){
                            
                            header("Location: https://whapp.pl/konto/sukces/haslo/");exit();
                        }
                    }
                    
                }else{
                    header("Location: ".$_SERVER['HTTP_REFERER']."?error=oldPassword&message=match");exit();

                }

            }
            
        }
    }
}catch(Exception $e){}

?>