<?php

// Veritabanı bağlantı bilgileri
$servername = "localhost"; // Veritabanı sunucu adı
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "db"; // Veritabanı adı


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}


$kullanici_adi = $_POST['kullanici_adi'];
$sifre = $_POST['sifre'];


$sql = "INSERT INTO kullanici (kullanici_adi, sifre) VALUES ('$kullanici_adi', '$sifre')";
if ($conn->query($sql) === TRUE) {

  echo "Kayıt başarıyla tamamlandı.";
    header("Location: login.php");
    exit();
    
} 
else {
    echo "Kayıt tamamlanamadı: " . $conn->error;
}

$conn->close();
?> 