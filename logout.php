<?php
session_start();

unset($_SESSION['id_user']);
unset($_SESSION['nama_user']);
unset($_SESSION['id_role']);
unset($_SESSION['role']);

session_unset();
session_destroy();

header("location: http://puskesmas-gambah.test", true, 301);
