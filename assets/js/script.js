console.log('Script JS chargé !');

// Gestion de la navbar qui se masque après la première section
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const firstSection = document.querySelector('.first-hero');

    if (!navbar || !firstSection) return;

    let lastScrollTop = 0;
    let isFirstSectionPassed = false;

    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const firstSectionBottom = firstSection.offsetTop + firstSection.offsetHeight;

        // Vérifier si on a dépassé la première section
        if (scrollTop > firstSectionBottom) {
            isFirstSectionPassed = true;
        } else {
            isFirstSectionPassed = false;
        }

        // Si on a dépassé la première section, appliquer la logique de masquage
        if (isFirstSectionPassed) {
            if (scrollTop > lastScrollTop && scrollTop > firstSectionBottom + 50) {
                // Scroll vers le bas - masquer la navbar
                navbar.classList.add('navbar-hidden');
                navbar.classList.remove('navbar-visible');
            } else {
                // Scroll vers le haut - afficher la navbar
                navbar.classList.remove('navbar-hidden');
                navbar.classList.add('navbar-visible');
            }
        } else {
            // Dans la première section, toujours afficher la navbar
            navbar.classList.remove('navbar-hidden');
            navbar.classList.add('navbar-visible');
        }

        lastScrollTop = scrollTop;
    });
});

// Gestion du menu burger mobile
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    // Vérifier que les éléments essentiels existent
    if (!mobileMenuToggle || !mobileMenu) {
        console.log('Éléments du menu mobile non trouvés');
        return;
    }

    // Fonction pour ouvrir le menu
    function openMobileMenu() {
        mobileMenuToggle.classList.add('active');
        mobileMenu.classList.add('mobile-menu-open');
    }

    // Fonction pour fermer le menu
    function closeMobileMenu() {
        mobileMenuToggle.classList.remove('active');
        mobileMenu.classList.remove('mobile-menu-open');
    }

    // Toggle du menu au clic sur le bouton burger
    mobileMenuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (mobileMenu.classList.contains('mobile-menu-open')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });

    // Fermer le menu au clic sur un lien
    const mobileMenuLinks = mobileMenu.querySelectorAll('a');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // Fermer le menu à la touche Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains('mobile-menu-open')) {
            closeMobileMenu();
        }
    });

    // Fermer le menu lors du redimensionnement vers desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768 && mobileMenu.classList.contains('mobile-menu-open')) {
            closeMobileMenu();
        }
    });

    // Fermer le menu si on clique ailleurs sur la page
    document.addEventListener('click', function(e) {
        if (!mobileMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
            if (mobileMenu.classList.contains('mobile-menu-open')) {
                closeMobileMenu();
            }
        }
    });

    // Debug - vérifier si le bouton est visible
    console.log('Menu burger initialisé:', {
        toggle: mobileMenuToggle,
        menu: mobileMenu
    });
});
