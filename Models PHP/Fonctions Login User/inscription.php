
<!DOCTYPE  html>
 
 <html>
 <head>
 <meta  charset="utf-8"  />
 <style>
 * {
 font-family: arial;
 }
 body {
 margin: 20px;
 }
 form {
 position: absolute;
 top: 50%;
 left: 50%;
 margin-left: -150px;
 margin-top: -100px;
 }
 h1 {
 text-align: center;
 color: #FFFAFA;
 background: gray;
 }
 input[type=submit] {
 border: solid  1px  violet;
 margin-bottom: 10px;
 float: right;
 padding: 15px;
 outline: none;
 border-radius: 7px;
 width: 120px;
 }
 input[type=text],
 [type=password],[type=email] {
 border: solid  1px  violet;
 margin-bottom: 10px;
 padding: 16px;
 outline: none;
 border-radius: 7px;
 width: 300px;
 }
 .erreur {
 text-align: center;
 color: red;
 margin-top: 10px;
  
 }
 a {
 font-size: 14pt;
 color: blue;
 text-decoration: none;
 font-weight: normal;
 }
 a:hover {
 text-decoration: underline;
 }
 </style>
 </head>





<?php
session_start();
include("infos.php");
include('model_user.php');
verifUser();
?>
</html>