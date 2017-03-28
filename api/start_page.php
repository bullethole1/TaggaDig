<?php
require 'session.php';
require 'database.php';

//This is the file you end up on if you are not logged in
echo error_message();

session_destroy();