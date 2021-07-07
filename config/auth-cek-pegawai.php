<?php

if (!isset($_SESSION['id_user']) || $_SESSION['id_role'] != 2) {
    header("location: " . base_url() . "", true, 301);
}
