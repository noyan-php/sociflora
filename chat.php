<?php
session_start();
if (!isset($_SESSION['user_id'])) { 
    header('Location: index.html'); 
    exit; 
}

// Chat kimliğini al
$chatId = $_GET['id'] ?? 'ayse';
$chatData = [
    'ayse' => [
        'name' => 'Çiçekçi Ayşe',
        'avatar' => '🌺',
        'online' => true,
        'messages' => [
            ['type' => 'received', 'text' => 'Merhaba! Yeni güllerimiz geldi, isterseniz size gönderirim 🌹', 'time' => '10:30'],
            ['type' => 'received', 'text' => 'Çok taze ve güzel görünüyorlar!', 'time' => '10:32'],
            ['type' => 'sent', 'text' => 'Harika! Çok güzel görünüyorlar 😊', 'time' => '11:15'],
            ['type' => 'received', 'text' => 'Teşekkürler! Hangi renkleri seviyorsunuz?', 'time' => '11:20'],
            ['type' => 'sent', 'text' => 'Kırmızı ve pembe tonları favorim 🌹', 'time' => '11:25'],
        ]
    ]
];

$currentChat = $chatData[$chatId] ?? $chatData['ayse'];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($currentChat['name']); ?> - Sociflora</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body class="chat-body">
    <!-- Header -->
    <div class="header-wrapper">
        <header class="main-header">
            <div class="header-content" style="justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <a href="messages.php" style="text-decoration: none; color: white;">←</a>
                    <div class="message-avatar" style="width: 40px; height: 40px; font-size: 24px;">
                        <?php echo $currentChat['avatar']; ?>
                    </div>
                    <div>
                        <h2 style="font-size: 16px; margin: 0;"><?php echo htmlspecialchars($currentChat['name']); ?></h2>
                        <?php if ($currentChat['online']): ?>
                        <p style="font-size: 12px; color: var(--text-gray); margin: 0;">Çevrimiçi</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <button class="header-btn" style="font-size: 24px; margin-right: 12px;">📞</button>
                    <button class="header-btn" style="font-size: 26px; color: var(--text-white);">⋯</button>
                </div>
            </div>
        </header>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <main class="main-content">
            <div class="chat-container">
                <?php foreach ($currentChat['messages'] as $message): ?>
                <div class="chat-message <?php echo $message['type']; ?>">
                    <div class="chat-bubble">
                        <p class="chat-text"><?php echo htmlspecialchars($message['text']); ?></p>
                        <span class="chat-time"><?php echo $message['time']; ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Chat Input -->
            <div class="chat-input-container">
                <div class="chat-input-wrapper">
                    <button class="chat-attach-btn">📎</button>
                    <div class="chat-input-box">
                        <input type="text" class="chat-input" placeholder="Mesaj yazın..." id="chatInput">
                    </div>
                    <button class="chat-send-btn-round">➤</button>
                </div>
            </div>
        </main>
    </div>

    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item"><span class="nav-icon">🏠</span><span class="nav-label">Sociflora</span></a>
        <a href="search.php" class="nav-item"><span class="nav-icon">🔍</span><span class="nav-label">Ara</span></a>
        <a href="post.php" class="nav-item"><span class="nav-icon">➕</span><span class="nav-label">Gönder</span></a>
        <a href="messages.php" class="nav-item active"><span class="nav-icon">💬</span><span class="nav-label">Mesaj</span></a>
        <a href="profile.php" class="nav-item"><span class="nav-icon">👤</span><span class="nav-label">Profil</span></a>
    </nav>

    <!-- Floating Islands Background -->
    <div class="bg-islands">
        <div class="island island-1"></div>
        <div class="island island-2"></div>
        <div class="island island-3"></div>
        <div class="island island-4"></div>
    </div>

    <script>
        function scrollToBottom() {
            const chat = document.querySelector('.chat-container');
            if (chat) {
                chat.scrollTop = chat.scrollHeight;
            }
        }
        window.addEventListener('load', scrollToBottom);
    </script>
    <script src="dashboard.js"></script>
</body>
</html>

