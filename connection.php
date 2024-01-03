<?php
$servername = "localhost";  // Veritabanı sunucusu (genellikle localhost)
$username = "ayessuat_35"; // Veritabanı kullanıcı adı
$password = "135790Ab.";         // Veritabanı şifresi
$dbname = "ayessuat_1912";  // Veritabanı adı

try {
    // PDO bağlantı nesnesi oluştur
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Hata raporlarını etkinleştir
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Veritabanı işlemlerinizi gerçekleştirin
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

// Bağlantıyı kapat

?>