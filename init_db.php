<?php
// SQLite veritabanı oluşturma ve yapılandırma

$dbFile = __DIR__ . '/database.sqlite';

try {
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Eski tabloyu sil ve yeniden oluştur
    $pdo->exec("DROP TABLE IF EXISTS users");
    
    // Users tablosunu oluştur
    $pdo->exec("
        CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            name TEXT,
            user_type TEXT DEFAULT 'lover',
            language TEXT DEFAULT 'tr',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");
    
    // Örnek kullanıcı ekle (password: demo123)
    $stmt = $pdo->prepare("INSERT OR IGNORE INTO users (email, password, name, user_type) VALUES (?, ?, ?, ?)");
    $demoPassword = password_hash('demo123', PASSWORD_DEFAULT);
    $stmt->execute(['demo@sociflora.com', $demoPassword, 'Demo User', 'lover']);
    
    echo "Veritabanı başarıyla oluşturuldu!\n";
    echo "Demo kullanıcı: demo@sociflora.com / Şifre: demo123\n";
    
} catch (PDOException $e) {
    die("Veritabanı hatası: " . $e->getMessage());
}

