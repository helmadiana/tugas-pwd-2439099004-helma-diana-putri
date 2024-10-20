<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "tugas_pwd");

if(!$conn) {
    echo "Gagal konek!";
}

$country = ['Indonesia', 'Malaysia', 'Nigeria', 'Kolombia', 'Singapura', 'China', 'Jepang', 'Korea'];