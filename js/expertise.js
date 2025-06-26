document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });

    // Hero section animations
    const heroTitle = document.querySelector('.hero-title');
    const heroSubtitle = document.querySelector('.hero-subtitle');
    
    if (heroTitle && heroSubtitle) {
        setTimeout(() => {
            heroTitle.style.opacity = '1';
            heroTitle.style.transform = 'translateY(0)';
        }, 100);

        setTimeout(() => {
            heroSubtitle.style.opacity = '1';
            heroSubtitle.style.transform = 'translateY(0)';
        }, 300);
    }

    // Scroll animations for content sections
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with fade-up class
    document.querySelectorAll('.fade-up').forEach(element => {
        observer.observe(element);
    });

    // Apparition animée pour l'accordéon et l'image expertise
    const pyramideAccordion = document.querySelector('.pyramide-accordion');
    const expertiseImg = document.querySelector('.data-expertise-img');
    if (pyramideAccordion) observer.observe(pyramideAccordion);
    if (expertiseImg) observer.observe(expertiseImg);

    // Accordéon pyramide
    const accordionItems = document.querySelectorAll('.pyramide-accordion .accordion-item');
    accordionItems.forEach(item => {
        const title = item.querySelector('.accordion-title');
        const content = item.querySelector('.accordion-content');
        const icon = title.querySelector('.icon');
        
        title.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Fermer tous les autres accordéons
            accordionItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.accordion-content').style.maxHeight = '0';
                }
            });
            
            // Toggle l'accordéon actuel
            item.classList.toggle('active');
            
            if (!isActive) {
                content.style.maxHeight = content.scrollHeight + 'px';
            } else {
                content.style.maxHeight = '0';
            }
        });
    });
});
