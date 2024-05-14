<?php
// Veritabanı bağlantı bilgileri
$servername = "localhost"; // Veritabanı sunucu adı
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "db"; // Veritabanı adı

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);
// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Giriş formundan verileri alma
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    // Veritabanında kullanıcının var olup olmadığını kontrol etme
    $sql = "SELECT * FROM kullanici WHERE kullanici_adi = ? AND sifre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $kullanici_adi, $sifre);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      header("Location: index.php");
        // Giriş başarılıysa yapılacak işlemler
        // Örneğin, kullanıcıya özel bir sayfaya yönlendirme gibi
    } else {
      echo "Kullanıcı adı veya şifre hatalı!";
    header("Location: login.php"); // login.php sayfasına yönlendir
    exit();
    }
    $stmt->close();
}

$conn->close();
?>
