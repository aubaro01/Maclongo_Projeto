<?php

function checkCredentials($db, $email, $password)
{
    $sql = "SELECT * FROM login_dash WHERE Login = ? AND password = ?";
    $args = [$email, $password];
    $result = $db->send2db($sql, $args);

    if ($result->num_rows > 0) {
        return true;
    }

    return false;
}