console.log('Script JS chargé !');

document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const firstSection = document.querySelector('.first-hero');

    if (!navbar || !firstSection) return;

    let lastScrollTop = 0;
    let isFirstSectionPassed = false;

    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const firstSectionBottom = firstSection.offsetTop + firstSection.offsetHeight;

        if (scrollTop > firstSectionBottom) {
            isFirstSectionPassed = true;
        } else {
            isFirstSectionPassed = false;
        }

        if (isFirstSectionPassed) {
            if (scrollTop > lastScrollTop && scrollTop > firstSectionBottom + 50) {
                navbar.classList.add('navbar-hidden');
                navbar.classList.remove('navbar-visible');
            } else {
                navbar.classList.remove('navbar-hidden');
                navbar.classList.add('navbar-visible');
            }
        } else {
            navbar.classList.remove('navbar-hidden');
            navbar.classList.add('navbar-visible');
        }

        lastScrollTop = scrollTop;
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

    if (!mobileMenuToggle || !mobileMenu) {
        console.log('Éléments du menu mobile non trouvés');
        return;
    }

    function openMobileMenu() {
        mobileMenu.classList.add('show');
        mobileMenuToggle.classList.add('active');
        if (mobileMenuOverlay) {
            mobileMenuOverlay.classList.add('show');
        }
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        mobileMenu.classList.remove('show');
        mobileMenuToggle.classList.remove('active');
        if (mobileMenuOverlay) {
            mobileMenuOverlay.classList.remove('show');
        }
        document.body.style.overflow = '';
    }

    mobileMenuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Menu burger cliqué');

        if (mobileMenu.classList.contains('show')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });

    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', function() {
            closeMobileMenu();
        });
    }

    const mobileMenuLinks = mobileMenu.querySelectorAll('a');
    mobileMenuLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            closeMobileMenu();
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains('show')) {
            closeMobileMenu();
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && mobileMenu.classList.contains('show')) {
            closeMobileMenu();
        }
    });
});

console.log('Script menu burger mobile chargé !');
