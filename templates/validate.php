<?php
require 'class.MathsCaptcha.php';
$C = new MathsCaptcha();
if($C->isValid($_POST['code'])){
    header('Location: index.php?success=Code Validated');
} else {
    header('Location: index.php?error=Invalid Code');
}