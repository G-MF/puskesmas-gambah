<?php
include_once "config/config.php";

unset($_SESSION['id_user']);
unset($_SESSION['nama_user']);
unset($_SESSION['id_role']);
unset($_SESSION['role']);

session_unset();
session_destroy();

header("location: " . base_url() . "", true, 301);
