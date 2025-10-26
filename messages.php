<?php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: index.html'); exit; }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesajlar - Sociflora</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Header -->
    <div class="header-wrapper">
        <header class="main-header">
            <div class="header-content">
                <h1 class="brand-logo">Sociflora</h1>
            </div>
        </header>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <main class="main-content">
            <!-- Message List -->
            <div class="message-list">
                <!-- Message 1 -->
                <div class="message-item" data-chat-id="ayse">
                    <div class="message-avatar">🌺</div>
                    <div class="message-content">
                        <div class="message-header">
                            <h3 class="message-sender">Çiçekçi Ayşe</h3>
                            <span class="message-time">2 saat</span>
                        </div>
                        <p class="message-preview">Merhaba! Yeni güllerimiz geldi, isterseniz...</p>
                    </div>
                    <div class="message-status">
                        <span class="unread-badge">3</span>
                    </div>
                </div>

                <!-- Message 2 -->
                <div class="message-item">
                    <div class="message-avatar">🌻</div>
                    <div class="message-content">
                        <div class="message-header">
                            <h3 class="message-sender">Çiçekçi Mehmet</h3>
                            <span class="message-time">5 saat</span>
                        </div>
                        <p class="message-preview">Ayçiçekleri taze geldi! 🌻</p>
                    </div>
                </div>

                <!-- Message 3 -->
                <div class="message-item">
                    <div class="message-avatar">🌹</div>
                    <div class="message-content">
                        <div class="message-header">
                            <h3 class="message-sender">Bahçe Çiçekleri</h3>
                            <span class="message-time">1 gün</span>
                        </div>
                        <p class="message-preview">Bugün hangi çiçeği sipariş etmek istersiniz?</p>
                    </div>
                    <div class="message-status">
                        <span class="unread-badge">1</span>
                    </div>
                </div>

                <!-- Message 4 -->
                <div class="message-item">
                    <div class="message-avatar">🌷</div>
                    <div class="message-content">
                        <div class="message-header">
                            <h3 class="message-sender">Tulip Garden</h3>
                            <span class="message-time">2 gün</span>
                        </div>
                        <p class="message-preview">Yeni sezon lalelerimiz hazır!</p>
                    </div>
                </div>

                <!-- Message 5 -->
                <div class="message-item">
                    <div class="message-avatar">🌺</div>
                    <div class="message-content">
                        <div class="message-header">
                            <h3 class="message-sender">Exotic Flowers</h3>
                            <span class="message-time">3 gün</span>
                        </div>
                        <p class="message-preview">Egzotik çiçekler koleksiyonumuz...</p>
                    </div>
                    <div class="message-status">
                        <span class="unread-badge">2</span>
                    </div>
                </div>

                <!-- Message 6 -->
                <div class="message-item">
                    <div class="message-avatar">🌼</div>
                    <div class="message-content">
                        <div class="message-header">
                            <h3 class="message-sender">Wild Blooms</h3>
                            <span class="message-time">1 hafta</span>
                        </div>
                        <p class="message-preview">Doğal çiçeklerimiz için teşekkürler</p>
                    </div>
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

    <script src="messages.js"></script>
</body>
</html>

