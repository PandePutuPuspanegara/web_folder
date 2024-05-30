<?php

require 'config/constants.php';

//destroy session

session_destroy();
header('location: ' . ROOT_URL);
die();