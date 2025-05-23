<?php
    setcookie("user_id", "", time() - 3600, "/");
    setcookie("light_mode", "", time() - 3600, "/");
    header("Location: /animazing/");
?>