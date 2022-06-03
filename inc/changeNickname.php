<?php 
if(!isset($_POST['nickname']) || !isset($_POST['password'])){
  header("Location: ".$_SERVER['HTTP_REFERER']);
}
$_SERVER['HTTP_REFERER']="/account.php";
session_start();
$nickname=trim($_POST['nickname']);
$password=trim($_POST['password']);

if(strlen($nickname)<5){ header("Location: ".$_SERVER['HTTP_REFERER']."?error=nickname&message=lenght");exit();}

include("db.php");
try{
    $sql="SELECT nickname FROM users ";
    $db= new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
    $stmt = $db->prepare($sql);

    if($stmt){
        $ex = $stmt->execute();
        if($ex){
            $res = $stmt->fetchAll();
            foreach($res as &$nick){
                if($nick[0] === $nickname){
                    header("Location: ".$_SERVER['HTTP_REFERER']."?error=nickname&message=exist");
                    exit();
                }
            }
            $sql="SELECT password FROM users WHERE user_id={$_SESSION['user_id']}";
            $stmt = $db->prepare($sql);

            if($stmt){
                $ex = $stmt->execute();
                if($ex){
                    $res = $stmt->fetch();
                    if(empty($res)){header("Location: ".$_SERVER['HTTP_REFERER']."?error=nickname&message=unknow");exit();
                    }else{
                        if(password_verify($password,$res[0])){
                            $sql = "UPDATE users SET nickname = :nickname WHERE user_id={$_SESSION['user_id']}";
                            $stmt = $db->prepare($sql);
                            if($stmt){
                                $stmt->bindParam(":nickname",$nickname);
                                $ex = $stmt->execute();
                                    if($ex){
                                       header("Location: https://whapp.pl/konto/sukces/nick/");exit();
                                    }
                            }
                        }else{
                            header("Location: ".$_SERVER['HTTP_REFERER']."?error=password&message=match");exit();

                        }
                    }
                }
            }
        }
    }
}catch(Exception $e){}


?>