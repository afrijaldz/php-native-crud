<?php
$koneksi = new mysqli('localhost', 'root', '','crud_php');

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} 
?>