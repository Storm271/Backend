<?php

//initialisation de la session
session_start();
define('RACINE_WEB', ''); //ici mettez le nom du repertoire de votre appli
define('PHOTO_DIR', $_SERVER['DOCUMENT_ROOT'] . '/photo/');

define('PHOTO_WEB', RACINE_WEB . 'photo/');
define('IMG_WEB', RACINE_WEB . 'img/');
define(
    'PHOTO_DEFAULT',
    'https://dummyimage.com/600x400/cccccc/ffffff&text=Pas+d\'image'
);

require_once __DIR__. '/cnx.php';
require_once __DIR__.'/fonctions.php';


//
// FAIT PAR MAGALI
//
function isUserSAVtech()
{
    return isUserConnected()
    && $_SESSION['utilisateur']['role']== 'SAVtech';
}

function isUserHotlineTech()
{
    return isUserConnected()
 && $_SESSION['utilisateur']['role']=='HotlineTech';
}

function techSavSecurity()
{
    if (!isUserSAVtech() && !isUserVisitor()) {
        if (!isUserConnected()) {
            header('location: ' . RACINE_WEB . 'updateRetour.php');
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Vous n'avez pas le droit d'acceder à cette page";
        }
    }
}

function hotlineTechSecurity()
{
    if (!isUserHotlineTech() && !isUserVisitor()) {
        if (!isUserConnected()) {
            header('location: ' . RACINE_WEB . 'connexion.php');
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Vous n'avez pas le droit d'acceder à cette page";
        }
    }
}

//
//  FIN
//
