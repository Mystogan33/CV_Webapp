<?php
$array = array(
  "firstname" => "",
  "name" => "",
  "email" => "",
  "phone" => "",
  "message" => "",
  "firstnameError" => "",
  "nameError" => "",
  "emailError" => "",
  "phoneError" => "",
  "messageError" => "",
  "isSuccess" => false
);

$emailTo = "mystogan40@gmail.com";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $array["firstname"] = verifyInput($_POST['firstname']);
  $array["name"] = verifyInput($_POST['name']);
  $array["email"] = verifyInput($_POST['email']);
  $array["phone"] = verifyInput($_POST['phone']);
  $array["message"] = verifyInput($_POST['message']);
  $array["isSuccess"] = true;
  $emailText = "";

  if(empty($array["firstname"])) {
    $array["firstnameError"] = "Bonjour Mr Nobody...";
    $array["isSuccess"] = false;
  } else $emailText .= "Firstname: {$array["firstname"]}\n";

  if(empty($array["name"])) {
    $array["nameError"] = "Rémi sans famille ?";
    $array["isSuccess"] = false;
  } else $emailText .= "Name: {$array["name"]}\n";

  if(!isEmailValid($array["email"])) {
    $array["emailError"] = "It's naht a emailah !";
    $array["isSuccess"] = false;
  } else $emailText .= "Email: {$array["email"]}\n";

  if(!isPhoneValid($array["phone"])) {
    $array["phoneError"] = "Si j'appelle avec ça, ça va marcher ?";
    $array["isSuccess"] = false;
  } else $emailText .= "Phone number: {$array["phone"]}\n";

  if(empty($array["message"])) {
    $array["messageError"] = "Multipass ?";
    $array["isSuccess"] = false;
  } else $emailText .= "Message: {$array["message"]}\n";

  if($array["isSuccess"]) {
    $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
    mail($emailTo, "Un message de votre site", $emailText, $headers);
    $array["firstname"] = $array["name"] = $array["email"] = $array["phone"] = $array["message"] = "";
    $array["firstnameError"] = $array["nameError"] = $array["emailError"] = $array["phoneError"] = $array["messageError"] = "";
  }

  echo json_encode($array);

}

function verifyInput($var) {
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $var;
}

function isEmailValid($var) {
  return filter_var($var, FILTER_VALIDATE_EMAIL);
}

function isPhoneValid($var) {
  return preg_match("/^[0-9\s.]*$/", $var);
}

?>
