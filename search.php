<?php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: index.html'); exit; }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ara - Sociflora</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Header -->
    <div class="header-wrapper">
        <header class="main-header">
            <div class="header-content">
                <button class="header-btn filter-btn">🎛️</button>
                <h1 class="brand-logo">Sociflora</h1>
                <div class="header-actions">
                    <button class="header-btn search-icon-btn">🔍</button>
                </div>
            </div>
        </header>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <main class="main-content">
            <!-- Nearby Florists Section -->
            <section class="search-section">
                <h2 class="section-title">Yakındaki Çiçekçiler</h2>
                
                <div class="florist-list">
                    <!-- Florist 1 -->
                    <div class="florist-card">
                        <div class="florist-avatar">🌺</div>
                        <div class="florist-info">
                            <h3 class="florist-name">Ayşe Çiçek Evi</h3>
                            <p class="florist-location">📍 2 km uzaklıkta</p>
                            <p class="florist-specialty">Gül ve lale uzmanı</p>
                        </div>
                        <button class="florist-follow-btn">Takip</button>
                    </div>

                    <!-- Florist 2 -->
                    <div class="florist-card">
                        <div class="florist-avatar">🌹</div>
                        <div class="florist-info">
                            <h3 class="florist-name">Mehmet Gülnar Çiçek</h3>
                            <p class="florist-location">📍 5 km uzaklıkta</p>
                            <p class="florist-specialty">Düğün buketleri</p>
                        </div>
                        <button class="florist-follow-btn">Takip</button>
                    </div>

                    <!-- Florist 3 -->
                    <div class="florist-card">
                        <div class="florist-avatar">🌻</div>
                        <div class="florist-info">
                            <h3 class="florist-name">Doğal Çiçekler</h3>
                            <p class="florist-location">📍 3 km uzaklıkta</p>
                            <p class="florist-specialty">Organik çiçekler</p>
                        </div>
                        <button class="florist-follow-btn following">Takip Ediliyor</button>
                    </div>

                    <!-- Florist 4 -->
                    <div class="florist-card">
                        <div class="florist-avatar">🌷</div>
                        <div class="florist-info">
                            <h3 class="florist-name">Lale Bahçesi</h3>
                            <p class="florist-location">📍 7 km uzaklıkta</p>
                            <p class="florist-specialty">Kokusuz aranjmanlar</p>
                        </div>
                        <button class="florist-follow-btn">Takip</button>
                    </div>
                </div>
            </section>

            <!-- Most Liked Posts Section -->
            <section class="search-section">
                <h2 class="section-title">En Beğenilen Gönderiler</h2>
                
                <div class="featured-posts">
                    <!-- Post 1 -->
                    <div class="featured-post-card">
                        <div class="post-image">
                            <span class="post-emoji">🌺🌺🌺</span>
                        </div>
                        <div class="post-details">
                            <div class="post-header-small">
                                <div class="post-avatar-small">🌺</div>
                                <div>
                                    <h4 class="post-user-name">Ayşe Çiçek Evi</h4>
                                    <p class="post-time">2 saat önce</p>
                                </div>
                            </div>
                            <div class="post-stats-small">
                                <span class="stat-icon">❤️ 1.2k</span>
                                <span class="stat-icon">💬 89</span>
                            </div>
                        </div>
                    </div>

                    <!-- Post 2 -->
                    <div class="featured-post-card">
                        <div class="post-image">
                            <span class="post-emoji">🌹🌹🌹</span>
                        </div>
                        <div class="post-details">
                            <div class="post-header-small">
                                <div class="post-avatar-small">🌹</div>
                                <div>
                                    <h4 class="post-user-name">Mehmet Çiçek</h4>
                                    <p class="post-time">5 saat önce</p>
                                </div>
                            </div>
                            <div class="post-stats-small">
                                <span class="stat-icon">❤️ 892</span>
                                <span class="stat-icon">💬 56</span>
                            </div>
                        </div>
                    </div>

                    <!-- Post 3 -->
                    <div class="featured-post-card">
                        <div class="post-image">
                            <span class="post-emoji">🌻🌻🌻</span>
                        </div>
                        <div class="post-details">
                            <div class="post-header-small">
                                <div class="post-avatar-small">🌻</div>
                                <div>
                                    <h4 class="post-user-name">Doğal Çiçekler</h4>
                                    <p class="post-time">1 gün önce</p>
                                </div>
                            </div>
                            <div class="post-stats-small">
                                <span class="stat-icon">❤️ 2.1k</span>
                                <span class="stat-icon">💬 124</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    
    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item"><span class="nav-icon">🏠</span><span class="nav-label">Sociflora</span></a>
        <a href="search.php" class="nav-item active"><span class="nav-icon">🔍</span><span class="nav-label">Ara</span></a>
        <a href="post.php" class="nav-item"><span class="nav-icon">➕</span><span class="nav-label">Gönder</span></a>
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

