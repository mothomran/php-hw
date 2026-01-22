<?php
if (isset($_GET['name'])) {
    echo "مرحباً يا: " . htmlspecialchars($_GET['name']);
}
?>