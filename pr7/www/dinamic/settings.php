<?php

function openmysqli(): mysqli {
    $connection = new mysqli("datab", "user", "password", "appDB");
    return $connection;
}