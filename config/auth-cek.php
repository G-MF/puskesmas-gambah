<?php

if (!isset($_SESSION['id_user']) || $_SESSION['id_role'] != 1) {
    header("location: http://puskesmas-gambah.test", true, 301);
}
