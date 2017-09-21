<?php
session_start();

$persoon = [];

$persoon = $_SESSION['persoon'];

$naam = $persoon[0][0];
$nummer = $persoon[0][1];
$borg = $persoon[0][2];
$ophaal = $persoon[0][3];
$inlever = $persoon[0][4];
$werknemer = $_SESSION['username'];



echo $naam . " " . $nummer . " " . $borg . " " . $ophaal . " " . $inlever . " " . $werknemer;

?>