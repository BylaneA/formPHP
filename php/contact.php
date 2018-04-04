<?php

  $array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "", "firstnameError" => "",
  "nameError" => "", "emailError" => "", "messageError" => "", "isSuccess" => false);


  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $array["firstname"] = $_POST["firstname"];
    $array["name"] = $_POST["name"];
    $array["email"] = $_POST["email"];
    $array["phone"] = $_POST["phone"];
    $array["message"] = $_POST["message"];
    $array["isSuccess"] = true;

    if (empty($array["firstname"])) {
      $array["firstnameError"] = "Votre prénom est requis";
      $array["isSuccess"] = false;
    }


    if (empty($array["name"])) {
      $array["nameError"] = "Votre nom est requis";
      $array["isSuccess"] = false;
    }



    if (!isEmail($array["email"])) {
      $array["emailError"] = "Une adresse email correcte est requise";
      $array["isSuccess"] = false;
    }


    if (empty($array["message"])) {
      $array["messageError"] = "Un message est requis";
      $array["isSuccess"] = false;
    }

    echo json_encode($array);
  }


  function isEmail($var){
    return filter_var($var, FILTER_VALIDATE_EMAIL);
  }

 ?>
