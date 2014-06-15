<?php

require 'libs/common.php';
require 'libs/models/event.php';
require 'libs/tietokantayhteys.php';

$id = (int) $_POST['tapahtumatunnus'];
$tapahtuma = new event($id, $_POST['nimi'], $_POST['paikka'], $_POST['pvm'], $_POST['aika'], $_POST['linkki'], $_POST['pisteet'], $_POST['kuvaus']);

if ($tapahtuma->onkoKelvollinen()) {
    $tapahtuma->paivitaKantaan();

    //Asetetaan istuntoon ilmoitus siitä, että tapahtuma on päivitetty.
    $_SESSION['ilmoitus'] = "Tapahtuman tiedot päivitetty onnistuneesti.";

    onkoKirjautunut('tapahtuma', array('naytettavatapahtuma' => $tapahtuma));
    
} else {

    unset($_SESSION['ilmoitus']);
    $virheet = $tapahtuma->getVirheet();

    onkoKirjautunut('tapahtumamuokkausform', array(
        'virheet' => $virheet,
        'muokattavatapahtuma' => $tapahtuma));
}