<?php
//1 – Definimos Para quem vai ser enviado o email
$para = "leilaferreira.bhte@gmail.com";
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $_POST['name'];
$email = $_POST['email'];

$assunto = "Email Vindo do Site";

$mensagem  = "<strong>Nome:  </strong>".$nome;
$mensagem .= "</br>";
$mensagem .= "<strong>Email:  </strong>".$email;

echo " LOG ======= >>>>> MENSAGEM </br> ".$mensagem;
echo " </br> ";
echo " LOG ======= <<<<<";
echo " </br> </br>";

//5 – agora inserimos as codificações corretas e  tudo mais.
$headers =  "Content-Type:text/html; charset=UTF-8\n";
//$headers .= "From: leilaferreira.bhte@gmail.com\n";
//Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender: Site <leilaferreira.bhte@gmail.com>\n";
//email do servidor //que enviou
$headers .= "X-Mailer: PHP  v".phpversion()."\n";
//$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <leilaferreira.bhte@gmail.com>\n";
//caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";


ini_set("SMTP","smtp.gmail.com\n");
ini_set("smtp_port","587\n");
//ini_set("auth_password","@159487263V");
//ini_set("auth_username","leilaferreira.bhte@gmail.com");

ini_set("sendmail_from","leilaferreira.bhte@gmail.com\n");

ini_set("isplay_errors","On\n");

$result = mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.

$errLevel = error_reporting(E_ALL ^ E_NOTICE); 
error_reporting($errLevel);


if($result){
    echo " LOG ======= >>>>> ENVIADO ";
}else{
    echo " LOG ======= >>>>>  NAO ENVIADO  +".$result;
}
?>