<?php
session_start();
session_unset(); // Hapus semua data session
session_destroy(); // Hapus session dari server

header("Location: index.php");
exit;
?>
