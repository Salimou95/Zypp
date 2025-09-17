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
