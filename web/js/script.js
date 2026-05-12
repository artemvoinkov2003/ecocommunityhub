document.addEventListener('DOMContentLoaded', function() {
    const scrollButton = document.getElementById('scrollToTop');


    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollButton.classList.add('show');
        } else {
            scrollButton.classList.remove('show');
        }
    });


    scrollButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const scrollButton = document.getElementById('scrollToTop');


    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollButton.classList.add('show');
        } else {
            scrollButton.classList.remove('show');
        }
    });


    scrollButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

// document.addEventListener('DOMContentLoaded', function() {
//     const themeToggle = document.getElementById('themeToggle');
//     const sunIcon = themeToggle.querySelector('.sun');
//     const moonIcon = themeToggle.querySelector('.moon');
//
//
//     if (!themeToggle || !sunIcon || !moonIcon) {
//         console.error('Не найдены элементы кнопки темы!');
//         return;
//     }
//
//     const savedTheme = localStorage.getItem('theme') || 'light';
//     document.body.dataset.theme = savedTheme;
//     sunIcon.style.display = savedTheme === 'light' ? 'none' : 'block';
//     moonIcon.style.display = savedTheme === 'dark' ? 'block' : 'none';
//
//     themeToggle.addEventListener('click', () => {
//         const newTheme = document.body.dataset.theme === 'dark' ? 'light' : 'dark';
//         document.body.dataset.theme = newTheme;
//         sunIcon.style.display = newTheme === 'light' ? 'none' : 'block';
//         moonIcon.style.display = newTheme === 'dark' ? 'block' : 'none';
//         localStorage.setItem('theme', newTheme);
//     });
// });

/*
document.addEventListener('DOMContentLoaded', function() {
    const playButtons = document.querySelectorAll('.play-button');
    const videoModal = document.getElementById('video-modal');
    const closeModal = document.getElementById('close-modal');
    const videoIframe = document.getElementById('video-iframe');
    
    playButtons.forEach(button => {
        button.addEventListener('click', function() {
            const videoId = this.getAttribute('data-video-id');
            videoIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            videoModal.style.display = 'flex';
        });
    });
    
    closeModal.addEventListener('click', function() {
        videoIframe.src = '';
        videoModal.style.display = 'none';
    });
    
    window.addEventListener('click', function(event) {
        if (event.target === videoModal) {
            videoIframe.src = '';
            videoModal.style.display = 'none';
        }
    });
});
*/

document.addEventListener('DOMContentLoaded', function() {
    const scrollButton = document.getElementById('scrollToTop');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollButton.classList.add('show');
        } else {
            scrollButton.classList.remove('show');
        }
    });

    scrollButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const adminDropdown = document.getElementById('adminDropdown');
    if (adminDropdown) {
        adminDropdown.addEventListener('click', function(e) {
            e.preventDefault();
            const menu = this.nextElementSibling;
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });
        
        
        document.addEventListener('click', function(e) {
            if (!adminDropdown.contains(e.target)) {
                adminDropdown.nextElementSibling.style.display = 'none';
            }
        });
    }
});

