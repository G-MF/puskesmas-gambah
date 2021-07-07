<?php

if (!isset($_SESSION['id_user']) || $_SESSION['id_role'] != 1) {
    header("location: " . base_url() . "", true, 301);
}
