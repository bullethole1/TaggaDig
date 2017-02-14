<!--<form action="logout.php" method="POST">

    <button type="submit" name="">LOGGA UT</button>
</form> -->
<?php
require_once'session.php';
include_once'database.php';
require_once'create_order.php';

var_dump( $_SESSION['userid']);
?>