<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$email = $input['email'] ?? '';
$password = $input['password'] ?? '';
$userType = $input['user_type'] ?? 'lover';
$language = $input['language'] ?? 'tr';

// Validasyon
if (empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Email ve şifre gerekli']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Geçerli bir email adresi giriniz']);
    exit;
}

if (strlen($password) < 6) {
    echo json_encode(['success' => false, 'message' => 'Şifre en az 6 karakter olmalıdır']);
    exit;
}

if (!in_array($userType, ['seller', 'lover'])) {
    echo json_encode(['success' => false, 'message' => 'Geçersiz kullanıcı tipi']);
    exit;
}

try {
    $pdo = getDB();
    
    // Email'in zaten kayıtlı olup olmadığını kontrol et
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();
    
    if ($existingUser) {
        echo json_encode(['success' => false, 'message' => 'Bu email adresi zaten kullanılıyor']);
        exit;
    }
    
    // Yeni kullanıcı kaydet
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (email, password, name, user_type, language) VALUES (?, ?, ?, ?, ?)");
    $name = explode('@', $email)[0]; // Email'den isim türet
    $stmt->execute([$email, $hashedPassword, ucfirst($name), $userType, $language]);
    
    $userId = $pdo->lastInsertId();
    
    // Oturum başlat
    $_SESSION['user_id'] = $userId;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name'] = ucfirst($name);
    $_SESSION['user_type'] = $userType;
    $_SESSION['language'] = $language;
    
    echo json_encode([
        'success' => true,
        'message' => 'Kayıt başarılı',
        'user' => [
            'name' => ucfirst($name),
            'email' => $email,
            'type' => $userType,
            'language' => $language
        ],
        'redirect' => 'dashboard.php'
    ]);
    
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Veritabanı hatası: ' . $e->getMessage()]);
}

