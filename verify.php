<?php
    if (isset($_GET['v_key'])) {
        include "./classes/auth.class.php";
        $register = new Auth();
        $reg = $register->verify($_GET['v_key']);
    }