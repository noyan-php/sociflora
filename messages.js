// Messages JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Message item click handler
    const messageItems = document.querySelectorAll('.message-item');
    
    messageItems.forEach(item => {
        item.addEventListener('click', function() {
            // Open chat page
            const chatId = this.dataset.chatId || 'ayse';
            window.location.href = `chat.php?id=${chatId}`;
        });
    });
    
    // Create floating islands
    const body = document.body;
    const islandsHTML = `
        <div class="bg-islands">
            <div class="island island-1"></div>
            <div class="island island-2"></div>
            <div class="island island-3"></div>
            <div class="island island-4"></div>
        </div>
    `;
    
    if (!document.querySelector('.bg-islands')) {
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
    }
});

function openChat(chatId) {
    window.location.href = `chat.php?id=${chatId}`;
}

