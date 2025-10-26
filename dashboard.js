// Dashboard JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Nav item click animations
    const navItems = document.querySelectorAll('.nav-item');
    
    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Active state update
            navItems.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Like button animation
    const likeButtons = document.querySelectorAll('.action-btn');
    
    likeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.innerHTML.includes('🤍')) {
                this.innerHTML = '❤️';
                this.classList.add('active');
                // Update likes count
                const postCard = this.closest('.post-card');
                const likesElement = postCard.querySelector('.post-likes');
                const currentLikes = parseInt(likesElement.textContent);
                likesElement.textContent = (currentLikes + 1) + ' beğeni';
            }
        });
    });
    
    // Story click handlers
    const storyItems = document.querySelectorAll('.story-item');
    
    storyItems.forEach(story => {
        story.addEventListener('click', function() {
            // Story view functionality would go here
            console.log('Story clicked:', this);
        });
    });
    
    // Smooth scroll for stories
    const storiesContainer = document.querySelector('.stories-container');
    if (storiesContainer) {
        storiesContainer.addEventListener('wheel', function(e) {
            if (e.deltaY !== 0) {
                e.preventDefault();
                this.scrollLeft += e.deltaY;
            }
        });
    }
});

// Floating islands background
document.addEventListener('DOMContentLoaded', function() {
    // Create floating islands for dashboard
    const body = document.body;
    const islandsHTML = `
        <div class="bg-islands">
            <div class="island island-1"></div>
            <div class="island island-2"></div>
            <div class="island island-3"></div>
            <div class="island island-4"></div>
        </div>
    `;
    
    body.insertAdjacentHTML('afterbegin', islandsHTML);
    
    // Parallax effect
    let mouseX = 0, mouseY = 0;
    
    document.addEventListener('mousemove', function(e) {
        mouseX = (e.clientX / window.innerWidth - 0.5) * 10;
        mouseY = (e.clientY / window.innerHeight - 0.5) * 10;
    });
    
    function animateParallax() {
        const islands = document.querySelectorAll('.island');
        if (islands.length > 0) {
            islands.forEach((island, index) => {
                const speed = (index + 1) * 0.1;
                const x = mouseX * speed;
                const y = mouseY * speed;
                island.style.transform = `translate(${x}px, ${y}px)`;
            });
        }
        requestAnimationFrame(animateParallax);
    }
    animateParallax();
});

