<?php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: index.html'); exit; }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gönderi - Sociflora</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Header -->
    <div class="header-wrapper">
        <header class="main-header">
            <div class="header-content">
                <a href="dashboard.php" style="text-decoration: none; color: white; font-size: 24px; margin-right: 12px;">←</a>
                <h1 class="brand-logo">Yeni Gönderi</h1>
            </div>
        </header>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <main class="main-content">
            <!-- Create Post Form -->
            <div class="create-post-container">
                <!-- Upload Area -->
                <div class="upload-area">
                    <div class="upload-placeholder">
                        <span class="upload-icon">📷</span>
                        <p class="upload-text">Fotoğraf veya Video Ekle</p>
                        <p class="upload-hint">Dokunarak seç</p>
                    </div>
                </div>

                <!-- Post Info -->
                <div class="post-info-section">
                    <textarea class="post-caption-input" placeholder="Açıklama yazın..." rows="4"></textarea>
                    
                    <!-- Location -->
                    <div class="post-location-field">
                        <span class="location-icon">📍</span>
                        <input type="text" placeholder="Konum ekle" class="location-input">
                    </div>

                    <!-- Tags -->
                    <div class="post-tags-section">
                        <div class="tag-input-wrapper">
                            <span class="tag-icon">🏷️</span>
                            <input type="text" placeholder="Etiket ekle..." class="tag-input">
                            <button class="add-tag-btn">Ekle</button>
                        </div>
                        <div class="tags-display">
                            <span class="tag-item">#çiçek</span>
                            <span class="tag-item">#gül</span>
                            <span class="tag-item">#buket</span>
                        </div>
                    </div>

                    <!-- Visibility -->
                    <div class="post-visibility-section">
                        <div class="visibility-option">
                            <span class="visibility-icon">🌍</span>
                            <div class="visibility-info">
                                <p class="visibility-title">Herkese Açık</p>
                                <p class="visibility-desc">Herkes gönderinizi görebilir</p>
                            </div>
                            <button class="visibility-toggle active">✓</button>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="post-actions-section">
                    <button class="save-draft-btn">Taslak Olarak Kaydet</button>
                    <button class="post-share-btn">Paylaş</button>
                </div>
            </div>
        </main>
    </div>
    
    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item"><span class="nav-icon">🏠</span><span class="nav-label">Sociflora</span></a>
        <a href="search.php" class="nav-item"><span class="nav-icon">🔍</span><span class="nav-label">Ara</span></a>
        <a href="post.php" class="nav-item active"><span class="nav-icon">➕</span><span class="nav-label">Gönder</span></a>
        <a href="messages.php" class="nav-item"><span class="nav-icon">💬</span><span class="nav-label">Mesaj</span></a>
        <a href="profile.php" class="nav-item"><span class="nav-icon">👤</span><span class="nav-label">Profil</span></a>
    </nav>

    <!-- Floating Islands Background -->
    <div class="bg-islands">
        <div class="island island-1"></div>
        <div class="island island-2"></div>
        <div class="island island-3"></div>
        <div class="island island-4"></div>
    </div>

    <script src="dashboard.js"></script>
</body>
</html>

