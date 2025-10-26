<?php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: index.html'); exit; }
$userName = $_SESSION['user_name'] ?? 'User';
$userEmail = $_SESSION['user_email'] ?? 'user@sociflora.com';
$userType = $_SESSION['user_type'] ?? 'lover';
$experience = rand(5, 20); // Random experience between 5-20 years
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Sociflora</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Header -->
    <div class="header-wrapper">
        <header class="main-header">
            <div class="header-content">
                <h1 class="brand-logo">Sociflora</h1>
                <div class="header-actions">
                    <button class="header-btn" id="shareProfileBtn">📤</button>
                    <a href="logout.php" class="header-btn" style="font-size: 14px; padding: 8px 16px; background: rgba(107, 70, 193, 0.2); border: 1px solid rgba(107, 70, 193, 0.5); border-radius: 12px; text-decoration: none; color: var(--text-white); font-weight: 600;">Çıkış Yap</a>
                </div>
            </div>
        </header>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <main class="main-content">
            <!-- Profile Header -->
            <section class="profile-header">
                <div class="profile-avatar-container">
                    <div class="profile-avatar <?php echo $userType; ?>">
                        <?php echo $userType === 'seller' ? '🌺' : '🌸'; ?>
                    </div>
                </div>
                
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Gönderi</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">1.2k</div>
                        <div class="stat-label">Takipçi</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">156</div>
                        <div class="stat-label">Takip</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $experience; ?></div>
                        <div class="stat-label">Yıllık Çiçekçi</div>
                    </div>
                </div>
            </section>

            <!-- Profile Bio Card -->
            <div class="profile-bio-card">
                <div class="bio-header">
                    <h2 class="profile-username"><?php echo htmlspecialchars($userName); ?></h2>
                    <button class="edit-profile-btn">Profil Düzenle</button>
                </div>
                <p class="profile-email"><?php echo htmlspecialchars($userEmail); ?></p>
                <p class="profile-type-badge">
                    <?php echo $userType === 'seller' ? '🌺 Çiçekçiyim - Ürünlerimi paylaşıyorum' : '🌸 Çiçek Seviyorum - Çiçekçileri takip ediyorum'; ?>
                </p>
                <p class="bio-text">
                    <?php echo $userType === 'seller' ? 'Taze ve özenle seçilmiş çiçekler...' : 'Dünyanın en güzel çiçeklerini keşfediyorum 🌸'; ?>
                </p>
            </div>

            <!-- Profile Actions -->
            <div class="profile-actions">
                <button class="action-btn-primary">Gönderiler</button>
                <button class="action-btn-secondary">Beğenilenler</button>
            </div>

            <!-- Profile Posts Grid -->
            <div class="profile-posts-grid">
                <div class="post-grid-item">
                    <div class="post-placeholder">
                        <span class="placeholder-icon">🌸</span>
                    </div>
                </div>
                <div class="post-grid-item">
                    <div class="post-placeholder">
                        <span class="placeholder-icon">🌺</span>
                    </div>
                </div>
                <div class="post-grid-item">
                    <div class="post-placeholder">
                        <span class="placeholder-icon">🌹</span>
                    </div>
                </div>
            </div>
            
        </main>
    </div>
    
    <nav class="bottom-nav">
        <a href="dashboard.php" class="nav-item"><span class="nav-icon">🏠</span><span class="nav-label">Sociflora</span></a>
        <a href="search.php" class="nav-item"><span class="nav-icon">🔍</span><span class="nav-label">Ara</span></a>
        <a href="post.php" class="nav-item"><span class="nav-icon">➕</span><span class="nav-label">Gönder</span></a>
        <a href="messages.php" class="nav-item"><span class="nav-icon">💬</span><span class="nav-label">Mesaj</span></a>
        <a href="profile.php" class="nav-item active"><span class="nav-icon">👤</span><span class="nav-label">Profil</span></a>
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

