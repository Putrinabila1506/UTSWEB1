<?php
session_start();
<<<<<<< HEAD
session_destroy();
header("Location: login.php");
exit;
?>
=======
session_unset(); // Hapus semua data session
session_destroy(); // Hapus session dari server

header("Location: index.php");
exit;
?>
>>>>>>> 52bdaf8cbfa7b6e29880b7f3a1facde88d8e969e
