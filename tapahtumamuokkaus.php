<?php

require 'libs/common.php';

if (isset($_SESSION['tutor'])) {

    $id = (int) $_POST['tapahtumatunnus'];
    $tapahtuma = new event($_POST['nimi'], $_POST['paikka'], $_POST['pvm'], $_POST['aika'], $_POST['linkki'], $_POST['pisteet'], $_POST['kuvaus']);
    $tapahtuma->setId($id);

    if ($tapahtuma->onkoKelvollinen()) {
        $tapahtuma->paivitaKantaan();

        //Asetetaan istuntoon ilmoitus siitä, että tapahtuma on päivitetty.
        $_SESSION['ilmoitus'] = "Tapahtuman tiedot päivitetty onnistuneesti.";

        header("Location: tapahtuma.php?id=" . $id);
    } else {

        unset($_SESSION['ilmoitus']);
        $virheet = $tapahtuma->getVirheet();

        onkoKirjautunut('tapahtumamuokkausform', array(
            'virheet' => $virheet,
            'muokattavatapahtuma' => $tapahtuma));
    }
} else {
    onkoKirjautunut('index', array(
        'virheet' => "Hups! Tapahtui virhe!"
    ));
}