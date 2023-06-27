<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru','phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom(' https://lanserfree.github.io/sites/','J love You !');
    $mail->addAddress('malkinviktor555@gmail.com');
    $mail->Subject = 'J love You !!!';

    $hand = "Правша";
    if($_POST['hand'] == "left"){
        $hand = "Левша";
    }

    $body = '<h1>Super mail</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Imje:</strong>'.$_POST['name'].'</p>';
    }

    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>E-mail:</strong>'.$_POST['email'].'</p>';
    }

    if(trim(!empty($_POST['hand']))){
        $body.='<p><strong>Renka:</strong>'.$_hand.'</p>';
    }

    if(trim(!empty($_POST['age']))){
        $_body.='<p><strong>Wiek:</strong>'.$_POST['age'].'</p>';
    }

    if(trim(!empty($_POST['massage']))){
        $body.='<p><strong>Wiadomosc:</strong>'.$_POST['message'].'</p>';
    }

    if(!empty($_FILES['image']['top_name'])){
        $filePath = __DIR__ ."/files/". $_FILES['image']['name'];
    
    if(copy($_FILES['image']['top_name'], $filePath)){
        $fileAttach = $filePath;
        $body.='<p><strong>Zdencia w aplikacij</strong>';
        $mail->addAttachment($fileAttach);
        }
    }

    $mail->Body = $body;


    if(!$mail->send()){
        $message = 'Ошибка';
    }else{
        $message = 'Данные отправлены !';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>




