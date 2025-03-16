<?php
$errors = isset($_GET['error']) ? json_decode($_GET['error'], true) : [];
$success = $_GET['success'] ?? '';

if ($errors) {  
    foreach ($errors as $error) {
        echo "<p class='error'>$error</p>";
    }
} elseif ($success) {
    echo "<p class='success'>$success</p>";
}
?>
 
