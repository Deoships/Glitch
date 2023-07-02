<?php
session_start();
if (isset($_SESSION['user'])) {
    include('../html/profile.html');
    echo($_SESSION['user']['nick']);
} else {
    echo("Вы не авторизированы.");
}