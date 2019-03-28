<?php 

$database = new PDO('mysql:host=localhost;dbname=relais-du-phare;charset=utf8', 'root', '');

$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);