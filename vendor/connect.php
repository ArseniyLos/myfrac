<?php

    $connect = mysqli_connect('localhost', 'root', '', 'myfrac');

    if (!$connect) {
        die('Error connect to DataBase!');
    }