<?php
session_start();
session_unset();
session_destroy();
echo __FILE__;
echo '<meta http-equiv=REFRESH CONTENT=1;url="C:/AppServ/www/manage_system/index.html">';
?>