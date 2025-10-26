// Global state
let currentMode = 'login';
let currentLang = 'tr';

// Translations
const translations = {
    tr: {
        welcomeLogin: 'Hoş geldiniz',
        welcomeRegister: 'Hesap oluşturun',
        loginBtn: 'Giriş Yap',
        registerBtn: 'Kayıt Ol',
        loginProcess: 'Giriş yapılıyor...',
        registerProcess: 'Kayıt yapılıyor...',
        successLogin: 'Giriş başarılı!',
        successRegister: 'Kayıt başarılı!'
    },
    en: {
        welcomeLogin: 'Welcome back',
        welcomeRegister: 'Create account',
        loginBtn: 'Login',
        registerBtn: 'Register',
        loginProcess: 'Logging in...',
        registerProcess: 'Registering...',
        successLogin: 'Login successful!',
        successRegister: 'Registration successful!'
    }
};

// Function to update UI based on language
function updateLanguage() {
    const welcomeText = document.getElementById('welcomeText');
    const submitBtn = document.getElementById('submitBtn');
    const userTypeSection = document.getElementById('userTypeSection');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const toggleButtons = document.querySelectorAll('.toggle-btn');
    
    // Update placeholders and labels
    if (currentLang === 'tr') {
        emailInput.placeholder = 'Email adresiniz';
        passwordInput.placeholder = 'Şifreniz';
    } else {
        emailInput.placeholder = 'Your email address';
        passwordInput.placeholder = 'Your password';
    }
    
    // Update welcome text and button
    if (currentMode === 'login') {
        welcomeText.textContent = translations[currentLang].welcomeLogin;
        submitBtn.textContent = translations[currentLang].loginBtn;
        userTypeSection.style.display = 'none';
    } else {
        welcomeText.textContent = translations[currentLang].welcomeRegister;
        submitBtn.textContent = translations[currentLang].registerBtn;
        userTypeSection.style.display = 'block';
    }
    
    // Update toggle buttons text
    toggleButtons.forEach(btn => {
        if (btn.dataset.mode === 'login') {
            btn.textContent = translations[currentLang].loginBtn;
        } else {
            btn.textContent = translations[currentLang].registerBtn;
        }
    });
    
    // Update all text with data-lang attributes
    document.querySelectorAll('[data-tr], [data-en]').forEach(element => {
        if (element.hasAttribute(`data-${currentLang}`)) {
            element.textContent = element.getAttribute(`data-${currentLang}`);
        }
    });
}

// Language Toggle Handler
document.addEventListener('DOMContentLoaded', function() {
    const langButtons = document.querySelectorAll('.lang-btn');
    const toggleButtons = document.querySelectorAll('.toggle-btn');
    const userTypeSection = document.getElementById('userTypeSection');
    
    // Language toggle
    langButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            currentLang = this.dataset.lang;
            
            // Update active state
            langButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Update language
            updateLanguage();
        });
    });
    
    // Mode toggle
    toggleButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            currentMode = this.dataset.mode;
            
            // Update active state
            toggleButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Show/hide user type section
            if (currentMode === 'register') {
                userTypeSection.style.display = 'block';
            } else {
                userTypeSection.style.display = 'none';
            }
            
            // Update UI
            updateLanguage();
        });
    });
    
    // Initial language update
    updateLanguage();
    
    // Input focus animasyonu
    const inputs = document.querySelectorAll('.glass-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
            this.parentElement.style.transition = 'transform 0.3s ease';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });
    
    // Mouse move parallax effect
    let mouseX = 0, mouseY = 0;
    
    document.addEventListener('mousemove', function(e) {
        mouseX = (e.clientX / window.innerWidth - 0.5) * 20;
        mouseY = (e.clientY / window.innerHeight - 0.5) * 20;
    });
    
    // Smooth parallax animation
    function animateParallax() {
        const islands = document.querySelectorAll('.island');
        islands.forEach((island, index) => {
            const speed = (index + 1) * 0.15;
            const x = mouseX * speed;
            const y = mouseY * speed;
            island.style.transform = `translate(${x}px, ${y}px)`;
        });
        requestAnimationFrame(animateParallax);
    }
    animateParallax();
});

// Auth Form Handler
document.getElementById('authForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const userType = currentMode === 'register' ? document.querySelector('input[name="user_type"]:checked')?.value : null;
    const btn = document.querySelector('.btn-primary');
    const originalText = btn.textContent;
    
    // Validation for register mode
    if (currentMode === 'register' && !userType) {
        alert(currentLang === 'tr' ? 'Lütfen bir seçenek seçin' : 'Please select an option');
        return;
    }
    
    // Loading state
    btn.textContent = currentMode === 'login' 
        ? translations[currentLang].loginProcess 
        : translations[currentLang].registerProcess;
    btn.disabled = true;
    
    try {
        const endpoint = currentMode === 'login' ? 'login_handler.php' : 'register_handler.php';
        
        const body = currentMode === 'register' 
            ? { email, password, user_type: userType, language: currentLang }
            : { email, password };
        
        const response = await fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(body)
        });
        
        const data = await response.json();
        
        if (data.success) {
            // Başarılı
            btn.textContent = currentLang === 'tr' ? 'Başarılı!' : 'Success!';
            btn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
            
            setTimeout(() => {
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    alert(currentMode === 'login' 
                        ? translations[currentLang].successLogin 
                        : translations[currentLang].successRegister);
                    location.reload();
                }
            }, 500);
        } else {
            // Hata durumu
            btn.textContent = originalText;
            btn.disabled = false;
            alert(data.message || (currentLang === 'tr' ? 'İşlem başarısız. Lütfen tekrar deneyin.' : 'Operation failed. Please try again.'));
        }
    } catch (error) {
        console.error('Error:', error);
        btn.textContent = originalText;
        btn.disabled = false;
        alert(currentLang === 'tr' ? 'Bir hata oluştu. Lütfen tekrar deneyin.' : 'An error occurred. Please try again.');
    }
});
