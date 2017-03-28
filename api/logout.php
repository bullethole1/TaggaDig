<?php

require 'session.php';
session_destroy();
header('Refresh: 1;url=start_page.php');