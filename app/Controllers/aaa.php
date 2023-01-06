<?php

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: http://bankas_2.lt/');
    die;
}