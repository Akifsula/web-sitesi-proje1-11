<?php
// Kullanıcı adı ve şifre kontrolü
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Kullanıcı adının boş olup olmadığını kontrol et
    if (empty($username)) {
        $error = "Kullanıcı adı boş bırakılamaz!";
    }
    // Şifrenin boş olup olmadığını kontrol et
    elseif (empty($password)) {
        $error = "Şifre boş bırakılamaz!";
    }
    // Kullanıcı adının mail adresi formatına uygunluğunu kontrol et
    elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = "Geçerli bir mail adresi giriniz!";
    }
    // Kullanıcı adı ve şifre kontrolü
    elseif ($password !== substr($username, 0, strpos($username, "@"))) {
        $error = "Kullanıcı adı veya şifre yanlış!";
    }
    // Başarılı giriş
    else {
        $success = "Hoşgeldiniz " . $username . "! Giriş başarılı.";
    }
}
?>