<?php
session_start();
session_cache_expire();
session_destroy();
header("Location: ./../views/login.php?cierre_de_session");

?>