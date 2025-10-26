<?php
// Veritabanı bağlantı ayarları

$dbFile = __DIR__ . '/database.sqlite';

function getDB() {
    global $dbFile;
    try {
        $pdo = new PDO('sqlite:' . $dbFile);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Veritabanı bağlantı hatası: " . $e->getMessage());
    }
}

// Session başlat
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

