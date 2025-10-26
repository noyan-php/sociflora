<?php
session_start();

// Giriş kontrolü
if (!isset($_SESSION['user_id'])) {
    header('Location: index.html');
    exit;
}

$userId = $_SESSION['user_id'];
$userEmail = $_SESSION['user_email'];
$userName = $_SESSION['user_name'] ?? 'User';
$userType = $_SESSION['user_type'] ?? 'lover';
$language = $_SESSION['language'] ?? 'tr';
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sociflora - Home</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Header -->
    <div class="header-wrapper">
        <header class="main-header">
            <div class="header-content">
                <h1 class="brand-logo">Sociflora</h1>
                <div class="header-actions">
                    <button class="header-btn" id="searchBtn" onclick="window.location.href='search.php'">🔍</button>
                    <button class="header-btn" id="activityBtn">❤️</button>
                    <button class="header-btn" id="dmBtn">📧</button>
                </div>
            </div>
        </header>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <main class="main-content" id="mainContent">
        <!-- Stories Section -->
        <section class="stories-section">
            <div class="stories-container">
                <div class="story-item active">
                    <div class="story-avatar">
                        <span class="story-emoji">🌸</span>
                    </div>
                    <span class="story-label">Sen</span>
                </div>
                <div class="story-item">
                    <div class="story-avatar">
                        <span class="story-emoji">🌺</span>
                    </div>
                    <span class="story-label">Çiçekçi1</span>
                </div>
                <div class="story-item">
                    <div class="story-avatar">
                        <span class="story-emoji">🌹</span>
                    </div>
                    <span class="story-label">Çiçekçi2</span>
                </div>
                <div class="story-item">
                    <div class="story-avatar">
                        <span class="story-emoji">🌻</span>
                    </div>
                    <span class="story-label">Çiçekçi3</span>
                </div>
            </div>
        </section>

        <!-- Feed Posts -->
        <section class="feed-section">
            <!-- Post 1 -->
            <article class="post-card">
                <div class="post-header">
                    <div class="post-user">
                        <div class="post-avatar">🌺</div>
                        <div class="post-info">
                            <h3 class="post-username">Çiçekçi Ayşe</h3>
                            <p class="post-location">İstanbul, TR</p>
                        </div>
                    </div>
                    <button class="post-more">⋯</button>
                </div>
                
                <div class="post-media">
                    <div class="post-image-placeholder">
                        <span class="post-emoji">🌹🌹🌹</span>
                        <p>Gül Buketi</p>
                    </div>
                </div>
                
                <div class="post-actions">
                    <div class="post-left-actions">
                        <button class="action-btn active">❤️</button>
                        <button class="action-btn">💬</button>
                        <button class="action-btn">📤</button>
                    </div>
                    <button class="action-btn">🔖</button>
                </div>
                
                <div class="post-stats">
                    <p class="post-likes">132 beğeni</p>
                </div>
                
                <div class="post-caption">
                    <span class="caption-username">çiçekçiayşe</span>
                    <span>Taze güllerimiz artık hazır! Hemen sipariş verebilirsiniz 🌹 #gul #çiçekçi #istanbul</span>
                </div>
                
                <div class="post-comments">
                    <p class="view-comments">12 yorumun tümünü gör</p>
                    <div class="comment-item">
                        <span class="comment-user">çiçekseve</span>
                        <span>Çok güzel! 🌹</span>
                    </div>
                </div>
            </article>

            <!-- Post 2 -->
            <article class="post-card">
                <div class="post-header">
                    <div class="post-user">
                        <div class="post-avatar">🌻</div>
                        <div class="post-info">
                            <h3 class="post-username">Çiçekçi Mehmet</h3>
                            <p class="post-location">Ankara, TR</p>
                        </div>
                    </div>
                    <button class="post-more">⋯</button>
                </div>
                
                <div class="post-media">
                    <div class="post-image-placeholder">
                        <span class="post-emoji">🌻🌻🌻</span>
                        <p>Ayçiçeği Buketi</p>
                    </div>
                </div>
                
                <div class="post-actions">
                    <div class="post-left-actions">
                        <button class="action-btn">🤍</button>
                        <button class="action-btn">💬</button>
                        <button class="action-btn">📤</button>
                    </div>
                    <button class="action-btn">🔖</button>
                </div>
                
                <div class="post-stats">
                    <p class="post-likes">89 beğeni</p>
                </div>
                
                <div class="post-caption">
                    <span class="caption-username">çiçekçimehmet</span>
                    <span>Güneş gibi güzel ayçiçeklerimiz! #ayçiçeği #çiçek #ankara</span>
                </div>
            </article>
        </section>
        </main>
    </div>

    <!-- Bottom Navigation Bar -->
    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item active">
            <span class="nav-icon">🏠</span>
            <span class="nav-label">Sociflora</span>
        </a>
        <a href="search.php" class="nav-item">
            <span class="nav-icon">🔍</span>
            <span class="nav-label">Ara</span>
        </a>
        <a href="post.php" class="nav-item">
            <span class="nav-icon">➕</span>
            <span class="nav-label">Gönder</span>
        </a>
        <a href="messages.php" class="nav-item">
            <span class="nav-icon">💬</span>
            <span class="nav-label">Mesaj</span>
        </a>
        <a href="profile.php" class="nav-item">
            <span class="nav-icon">👤</span>
            <span class="nav-label">Profil</span>
        </a>
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

