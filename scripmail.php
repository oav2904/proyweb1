<?php 

  use PHPMailer\PHPMailer\PHPMailer;
  require './vendor/autoload.php';
  require_once './shared/db.php';

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPDebug = 2;
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = '';
  $mail->Password = '';
  $mail->SetFrom('oscariasv@gmail.com');
  $mail->addAddress('');
  $mail->Subject = 'Low stock';
  $file = fopen("archivo.txt", "w");
  fwrite($file, "ID Producto | Nombre | Stock \r\n");
  $mail->Body = 'This is the CV of ';
  $stock = $argv[1];
  $producto = $product_model->revisarStock($stock);
  foreach($productos as $producto){
    fwrite($file,$producto["id"] . "   " .  $producto["name"] . "  " .  $producto["stock"] . "\r\n");
}
fclose($file);
  $mail->addAttachment('archivo.txt');

  if(!$mail->send()){
    echo "Error";

  }
  else{
    echo "Send";
  }