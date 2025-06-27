// JavaScript code will go here 
      // Gestion robuste du modal de contact
      (function() {
        
        var btn = document.getElementById('floating-contact-button');
        var btn2 = document.getElementById('navbar-contact-button');
        var btn3 = document.getElementById('mobile-contact-button');
        var btn4 = document.getElementById('start-project-button');
        var btn5 = document.getElementById('solutions-button');
        
        var modal = document.getElementById('contact-modal');
        var closeBtn = document.getElementById('modal-close');
        var overlay = document.querySelector('.modal-overlay');
        if (btn && modal) {
          btn.addEventListener('click', function(e) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
          });
        }
        if (btn2 && modal) {
          btn2.addEventListener('click', function(e) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
          });
        }
        if (btn3 && modal) {
          btn3.addEventListener('click', function(e) {
            // Fermer le menu mobile d'abord
            const mobileCurtain = document.getElementById('mobile-curtain');
            if (mobileCurtain) {
              mobileCurtain.classList.remove('active');
              document.body.style.overflow = '';
            }
            // Puis ouvrir le modal de contact
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
          });
        }
        if (btn4 && modal) {
          btn4.addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le comportement par défaut du lien
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
          });
        }
        function closeModal() {
          modal.classList.remove('active');
          document.body.style.overflow = '';
        }
        if (closeBtn) {
          closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            closeModal();
          });
        }
        if (overlay) {
          overlay.addEventListener('click', function(e) {
            closeModal();
          });
        }
        // Fermer avec la touche Echap
        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
          }
        });
      })();
        // Animation au scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            });

            document.querySelectorAll('.gantt-item').forEach(item => {
                observer.observe(item);
            });
        });

            // Mobile menu functionality
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileCurtain = document.getElementById('mobile-curtain');
            const mobileCurtainClose = document.getElementById('mobile-curtain-close');
            const mobileDropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');
            const bodyElement = document.body;

            // Toggle mobile menu
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileCurtain.classList.add('active');
                    bodyElement.style.overflow = 'hidden';
                });
            }

            // Close mobile menu
            if (mobileCurtainClose) {
                mobileCurtainClose.addEventListener('click', function() {
                    mobileCurtain.classList.remove('active');
                    bodyElement.style.overflow = '';
                });
            }

            // Toggle mobile dropdowns
            mobileDropdownBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const dropdownContent = this.nextElementSibling;
                    const icon = this.querySelector('i');
                    
                    // Close all other dropdowns
                    mobileDropdownBtns.forEach(otherBtn => {
                        if (otherBtn !== this) {
                            const otherContent = otherBtn.nextElementSibling;
                            const otherIcon = otherBtn.querySelector('i');
                            otherBtn.classList.remove('active');
                            if (otherContent) {
                                otherContent.style.maxHeight = null;
                            }
                            if (otherIcon) {
                                otherIcon.style.transform = '';
                            }
                        }
                    });
                    
                    // Toggle active class on the button and parent
                    this.classList.toggle('active');
                    this.parentElement.classList.toggle('active');
                    
                    // Toggle icon rotation
                    if (icon) {
                        icon.style.transform = this.classList.contains('active') ? 'rotate(180deg)' : '';
                    }
                    
                    // Toggle dropdown visibility with proper height calculation
                    if (dropdownContent) {
                        if (dropdownContent.style.maxHeight) {
                            dropdownContent.style.maxHeight = null;
                        } else {
                            // Calculate the total height including padding and margins
                            const totalHeight = Array.from(dropdownContent.children)
                                .reduce((acc, child) => {
                                    const styles = window.getComputedStyle(child);
                                    const margin = parseFloat(styles.marginTop) + parseFloat(styles.marginBottom);
                                    return acc + child.offsetHeight + margin;
                                }, 0);
                            dropdownContent.style.maxHeight = `${totalHeight}px`;
                        }
                    }
                });
            });

            // Initialize dropdown contents
            document.addEventListener('DOMContentLoaded', function() {
                const mobileDropdowns = document.querySelectorAll('.mobile-dropdown-content');
                mobileDropdowns.forEach(dropdown => {
                    dropdown.style.maxHeight = null;
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.mobile-dropdown') && !event.target.closest('.mobile-curtain-nav')) {
                    mobileDropdownBtns.forEach(btn => {
                        const dropdownContent = btn.nextElementSibling;
                        const icon = btn.querySelector('i');
                        btn.classList.remove('active');
                        if (dropdownContent) {
                            dropdownContent.style.maxHeight = null;
                        }
                        if (icon) {
                            icon.style.transform = '';
                        }
                    });
                }
            });

// Initialisation des animations au défilement
AOS.init({
    duration: 800,
    once: true,
    offset: 100
});

const navbar = document.getElementById('navbar');
const desktopLogo = document.querySelector('#navbar .logo-flex img'); // Select desktop logo
const dropdowns = document.querySelectorAll('.dropdown');
const navContainer = document.querySelector('.nav-container');
const expertisesLink = document.getElementById('expertises-link');
const enjeuxLink = document.getElementById('enjeux-link');
const solutionsLink = document.getElementById('solutions-link');
const expertisesDropdown = document.getElementById('expertises-dropdown');
const enjeuxDropdown = document.getElementById('enjeux-dropdown');
const solutionsDropdown = document.getElementById('solutions-dropdown');

const transparentLogoSrc = 'img/butine_long_bg.png';
const solidLogoSrc = 'img/butine_long_bg.png';

let dropdownTimeout;
let isDropdownOpen = false;
let navbarTimeout;

function setNavbarState(scrolled) {
    if (navbarTimeout) {
        clearTimeout(navbarTimeout);
    }

    if (scrolled) {
        navbar.classList.add('scrolled');
        desktopLogo.src = solidLogoSrc; // Change to solid logo when scrolled
    } else {
        navbarTimeout = setTimeout(() => {
            if (!isDropdownOpen) {
                navbar.classList.remove('scrolled');
                desktopLogo.src = transparentLogoSrc; // Change to transparent logo when not scrolled and no dropdown open
            }
        }, 300);
    }
}

function openDropdown(dropdown) {
    clearTimeout(dropdownTimeout);
    clearTimeout(navbarTimeout);
    isDropdownOpen = true;
    
    // Gérer l'état actif des liens
    const allLinks = document.querySelectorAll('.nav-links a');
    allLinks.forEach(link => link.classList.remove('active'));
    if (dropdown === expertisesDropdown) {
        expertisesLink.classList.add('active');
    } else if (dropdown === enjeuxDropdown) {
        enjeuxLink.classList.add('active');
    } else if (dropdown === solutionsDropdown) {
        solutionsLink.classList.add('active');
    }

    // Cacher tous les dropdowns
    expertisesDropdown.style.display = 'none';
    enjeuxDropdown.style.display = 'none';
    solutionsDropdown.style.display = 'none'; // Ensure all are hidden initially
    // Afficher le dropdown correspondant
    dropdown.style.display = 'flex';

    // Réinitialiser et ouvrir la navbar
    navContainer.classList.remove('open');
    void navContainer.offsetWidth; // Force reflow
    navContainer.classList.add('open');

    // Changer le logo
    setNavbarState(true);
}

function closeDropdown() {
    dropdownTimeout = setTimeout(() => {
        navContainer.classList.remove('open');
        isDropdownOpen = false;
        
        // Réinitialiser l'état actif des liens
        const allLinks = document.querySelectorAll('.nav-links a');
        allLinks.forEach(link => link.classList.remove('active'));

        // Cacher tous les dropdowns après la fermeture
        setTimeout(() => {
            expertisesDropdown.style.display = 'none';
            enjeuxDropdown.style.display = 'none';
            solutionsDropdown.style.display = 'none';
        }, 400);

        // Changer le logo si on est en haut de la page
        if (window.scrollY <= 50) {
            setNavbarState(true);
        }
    }, 400);
}

// Gestion des événements pour "Nos Expertises"
expertisesLink.parentElement.addEventListener('mouseenter', () => openDropdown(expertisesDropdown));
expertisesLink.parentElement.addEventListener('mouseleave', closeDropdown);
expertisesDropdown.addEventListener('mouseenter', () => openDropdown(expertisesDropdown));
expertisesDropdown.addEventListener('mouseleave', closeDropdown);
expertisesLink.addEventListener('focus', () => openDropdown(expertisesDropdown));
expertisesLink.addEventListener('blur', closeDropdown);

// Gestion des événements pour "Vos Enjeux"
enjeuxLink.parentElement.addEventListener('mouseenter', () => openDropdown(enjeuxDropdown));
enjeuxLink.parentElement.addEventListener('mouseleave', closeDropdown);
enjeuxDropdown.addEventListener('mouseenter', () => openDropdown(enjeuxDropdown));
enjeuxDropdown.addEventListener('mouseleave', closeDropdown);
enjeuxLink.addEventListener('focus', () => openDropdown(enjeuxDropdown));
enjeuxLink.addEventListener('blur', closeDropdown);

// Gestion des événements pour "Nos Solutions"
solutionsLink.parentElement.addEventListener('mouseenter', () => openDropdown(solutionsDropdown));
solutionsLink.parentElement.addEventListener('mouseleave', closeDropdown);
solutionsDropdown.addEventListener('mouseenter', () => openDropdown(solutionsDropdown));
solutionsDropdown.addEventListener('mouseleave', closeDropdown);
solutionsLink.addEventListener('focus', () => openDropdown(solutionsDropdown));
solutionsLink.addEventListener('blur', closeDropdown);

// Gestion du scroll
window.addEventListener('scroll', function() {
    setNavbarState(window.scrollY > 50);
});

// Gestion du survol de la navbar
navbar.addEventListener('mouseenter', () => {
    if (!isDropdownOpen) {
        setNavbarState(true);
    }
});

navbar.addEventListener('mouseleave', () => {
    if (!isDropdownOpen && window.scrollY <= 50) {
        setNavbarState(false);
    }
});

// Initialiser l'état du logo
setNavbarState(window.scrollY > 50);

// Typing Effect Script
const typingTextElement = document.getElementById('typing-effect-text');
const heroDescription = document.querySelector('.hero-description');
const heroCtaButtons = document.querySelector('.hero-cta-buttons');
const textToType = typingTextElement.dataset.text;
let i = 0;
typingTextElement.innerHTML = '<span class="cursor"></span>'; // Add cursor element

function typeWriter() {
    if (i < textToType.length) {
        const currentText = textToType.substring(0, i + 1);
        typingTextElement.innerHTML = currentText + '<span class="cursor"></span>';
        i++;
        // Random typing speed between 10-30ms for more natural feel
        const typingSpeed = Math.random() * 20 + 10;
        setTimeout(typeWriter, typingSpeed);
    } else {
        // Remove cursor after typing is complete
        typingTextElement.innerHTML = textToType;
        // Add a small delay before showing the elements
        setTimeout(() => {
            heroDescription.classList.add('visible');
            heroCtaButtons.classList.add('visible');
        }, 200); // Reduced delay for faster transition
    }
}

// Trigger typing effect when the page loads
window.addEventListener('load', typeWriter);

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Carrousel d'expertises
document.addEventListener('DOMContentLoaded', function() {
    // Initialisation du carrousel
    const expertiseItems = document.querySelectorAll('.expertise-item');
    
    expertiseItems.forEach(item => {
        const imageUrl = item.dataset.image;
        const imageElement = item.querySelector('.expertise-image');
        if (imageUrl) {
            imageElement.style.backgroundImage = `url(${imageUrl})`;
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.querySelector('.data-expertise-cards-wrapper');
    const cards = wrapper.querySelectorAll('.data-expertise-card');
    
    // Create container for the cards
    const container = document.createElement('div');
    container.className = 'data-expertise-cards-container';
    
    // Move all cards to the container
    while (wrapper.firstChild) {
        container.appendChild(wrapper.firstChild);
    }
    
    // Add container to wrapper
    wrapper.appendChild(container);
    
    // Clone cards for infinite scroll effect
    cards.forEach(card => {
        const clone = card.cloneNode(true);
        container.appendChild(clone);
    });

    // Add direction button
    const directionBtn = document.createElement('button');
    directionBtn.className = 'scroll-direction-btn';
    directionBtn.innerHTML = '<i class="fas fa-arrows-alt-h"></i>';
    wrapper.appendChild(directionBtn);

    // Toggle direction on click
    directionBtn.addEventListener('click', () => {
        container.classList.toggle('reversed');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const scroller = document.querySelector('.data-expertise-cards-column');
    
    if (scroller && window.innerWidth > 1024) {
        const scrollerInner = scroller.querySelector('.data-expertise-cards-wrapper');
        const scrollerContent = Array.from(scrollerInner.children);

        // Cloner chaque élément et l'ajouter au conteneur
        scrollerContent.forEach(item => {
            const duplicatedItem = item.cloneNode(true);
            duplicatedItem.setAttribute('aria-hidden', true);
            scrollerInner.appendChild(duplicatedItem);
        });

        // Appliquer les styles et l'animation
        scroller.setAttribute('data-animated', true);
    }
});

        // Gestion du formulaire de contact
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitButton = this.querySelector('.submit-button');
            const originalText = submitButton.innerHTML;
            
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
            submitButton.disabled = true;

            const formData = new FormData(contactForm);

            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    submitButton.innerHTML = '<i class="fas fa-check"></i> Message envoyé !';
                    setTimeout(() => {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                        closeModal();
                        contactForm.reset();
                    }, 2000);
                } else {
                    submitButton.innerHTML = 'Erreur <i class="fas fa-times"></i>';
                     setTimeout(() => {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                    }, 3000);
                    // Optionnel : afficher le message d'erreur
                    alert(data.message);
                }
            })
            .catch(error => {
                submitButton.innerHTML = 'Erreur <i class="fas fa-times"></i>';
                setTimeout(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                }, 3000);
                console.error('Error:', error);
                alert('Une erreur est survenue. Veuillez réessayer.');
            });
        });

        // Focus/Blur effects for form labels
        document.querySelectorAll('.form-group input, .form-group textarea').forEach(input => {
            const label = input.previousElementSibling; // Assuming label is the immediate previous sibling

            input.addEventListener('focus', () => {
                if (label) {
                    label.classList.add('focused');
                }
            });

            input.addEventListener('blur', () => {
                if (label) {
                    label.classList.remove('focused');
                }
            });
        });

// Nouveau code pour le menu mobile
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileCurtain = document.getElementById('mobile-curtain');
    const mobileCurtainClose = document.getElementById('mobile-curtain-close');
    const mobileDropdowns = document.querySelectorAll('.mobile-dropdown');
    const body = document.body;

    // Ouvrir le menu
    mobileMenuBtn.addEventListener('click', function() {
        mobileCurtain.classList.add('active');
        body.style.overflow = 'hidden';
    });

    // Fermer le menu
    mobileCurtainClose.addEventListener('click', function() {
        mobileCurtain.classList.remove('active');
        body.style.overflow = '';
        // Fermer tous les sous-menus
        mobileDropdowns.forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    });

    // Gérer les sous-menus
    mobileDropdowns.forEach(dropdown => {
        const button = dropdown.querySelector('.mobile-dropdown-btn');
        button.addEventListener('click', function() {
            dropdown.classList.toggle('active');
        });
    });

    // Fermer le menu quand on clique sur un lien
    const mobileLinks = mobileCurtain.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            mobileCurtain.classList.remove('active');
            body.style.overflow = '';
            // Fermer tous les sous-menus
            mobileDropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        });
    });
});

// Modal de contact
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('contact-modal');
    const modalTrigger = document.getElementById('contact-modal-trigger');
    const floatingButton = document.getElementById('floating-contact-button');
    const modalClose = document.getElementById('modal-close');
    const modalOverlay = document.querySelector('.modal-overlay');
    const contactForm = document.getElementById('contact-form');

    // Ouvrir le modal
    function openModal() {
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    // Fermer le modal
    function closeModal() {
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Event listeners
    if (modalTrigger) {
        modalTrigger.addEventListener('click', function(e) {
            e.preventDefault();
            openModal();
        });
    }
    if (floatingButton) {
        floatingButton.addEventListener('click', openModal);
    }
    if (modalClose) {
        modalClose.addEventListener('click', closeModal);
    }
    if (modalOverlay) {
        modalOverlay.addEventListener('click', closeModal);
    }

    // Fermer avec la touche Echap
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.classList.contains('active')) {
            closeModal();
        }
    });

    // Empêcher la fermeture quand on clique sur le contenu du modal
    if (modal) {
        const modalContainer = modal.querySelector('.modal-container');
        if (modalContainer) {
            modalContainer.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }
    }

    // Gestion du formulaire
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitButton = this.querySelector('.submit-button');
            const originalText = submitButton.innerHTML;
            
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
            submitButton.disabled = true;

            const formData = new FormData(contactForm);

            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    submitButton.innerHTML = '<i class="fas fa-check"></i> Message envoyé !';
                    setTimeout(() => {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                        closeModal();
                        contactForm.reset();
                    }, 2000);
                } else {
                    submitButton.innerHTML = 'Erreur <i class="fas fa-times"></i>';
                     setTimeout(() => {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                    }, 3000);
                    // Optionnel : afficher le message d'erreur
                    alert(data.message);
                }
            })
            .catch(error => {
                submitButton.innerHTML = 'Erreur <i class="fas fa-times"></i>';
                setTimeout(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                }, 3000);
                console.error('Error:', error);
                alert('Une erreur est survenue. Veuillez réessayer.');
            });
        });
    }
});

// Désactive le scroll automatique vers #contact (section supprimée)
document.querySelectorAll('a[href="#contact"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        // Ouvre le modal si possible
        const floatingButton = document.getElementById('floating-contact-button');
        if (floatingButton) {
            floatingButton.click();
        }
    });
});

// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileCurtain = document.getElementById('mobile-curtain');
    const mobileCurtainClose = document.getElementById('mobile-curtain-close');
    const mobileDropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');

    // Mobile menu toggle
    if (mobileMenuBtn && mobileCurtain) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileCurtain.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    // Mobile menu close
    if (mobileCurtainClose && mobileCurtain) {
        mobileCurtainClose.addEventListener('click', function() {
            mobileCurtain.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    // Mobile dropdown toggles
    mobileDropdownBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Toggle active class
            this.classList.toggle('active');
            
            // Toggle icon
            if (icon) {
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            }
            
            // Toggle content height
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });

    // Animation au scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    });

    document.querySelectorAll('.gantt-item').forEach(item => {
        observer.observe(item);
    });

    // Initialisation des animations au défilement
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }

    // Initialize navbar elements
    const navbar = document.getElementById('navbar');
    const desktopLogo = navbar ? navbar.querySelector('.logo-flex img') : null;
    const dropdowns = document.querySelectorAll('.dropdown');
    const navContainer = document.querySelector('.nav-container');
    const expertisesLink = document.getElementById('expertises-link');
    const enjeuxLink = document.getElementById('enjeux-link');
    const solutionsLink = document.getElementById('solutions-link');
    const expertisesDropdown = document.getElementById('expertises-dropdown');
    const enjeuxDropdown = document.getElementById('enjeux-dropdown');
    const solutionsDropdown = document.getElementById('solutions-dropdown');

    const transparentLogoSrc = 'img/butine_long_bg.png';
    const solidLogoSrc = 'img/butine_long_bg.png';

    let dropdownTimeout;
    let isDropdownOpen = false;
    let navbarTimeout;

    function setNavbarState(scrolled) {
        if (!navbar || !desktopLogo) return;

        if (navbarTimeout) {
            clearTimeout(navbarTimeout);
        }

        if (scrolled) {
            navbar.classList.add('scrolled');
            desktopLogo.src = solidLogoSrc;
        } else {
            navbarTimeout = setTimeout(() => {
                if (!isDropdownOpen) {
                    navbar.classList.remove('scrolled');
                    desktopLogo.src = transparentLogoSrc;
                }
            }, 300);
        }
    }

    function openDropdown(dropdown) {
        if (!dropdown || !navContainer) return;

        clearTimeout(dropdownTimeout);
        clearTimeout(navbarTimeout);
        isDropdownOpen = true;
        
        // Gérer l'état actif des liens
        const allLinks = document.querySelectorAll('.nav-links a');
        allLinks.forEach(link => link.classList.remove('active'));
        
        if (expertisesLink && dropdown === expertisesDropdown) {
            expertisesLink.classList.add('active');
        } else if (enjeuxLink && dropdown === enjeuxDropdown) {
            enjeuxLink.classList.add('active');
        } else if (solutionsLink && dropdown === solutionsDropdown) {
            solutionsLink.classList.add('active');
        }

        // Cacher tous les dropdowns
        if (expertisesDropdown) expertisesDropdown.style.display = 'none';
        if (enjeuxDropdown) enjeuxDropdown.style.display = 'none';
        if (solutionsDropdown) solutionsDropdown.style.display = 'none';
        
        // Afficher le dropdown correspondant
        dropdown.style.display = 'flex';

        // Réinitialiser et ouvrir la navbar
        navContainer.classList.remove('open');
        void navContainer.offsetWidth; // Force reflow
        navContainer.classList.add('open');

        // Changer le logo
        setNavbarState(true);
    }

    function closeDropdown() {
        if (!navContainer) return;

        dropdownTimeout = setTimeout(() => {
            navContainer.classList.remove('open');
            isDropdownOpen = false;
            
            // Réinitialiser l'état actif des liens
            const allLinks = document.querySelectorAll('.nav-links a');
            allLinks.forEach(link => link.classList.remove('active'));

            // Cacher tous les dropdowns après la fermeture
            setTimeout(() => {
                if (expertisesDropdown) expertisesDropdown.style.display = 'none';
                if (enjeuxDropdown) enjeuxDropdown.style.display = 'none';
                if (solutionsDropdown) solutionsDropdown.style.display = 'none';
            }, 400);

            // Changer le logo si on est en haut de la page
            if (window.scrollY <= 50) {
                setNavbarState(true);
            }
        }, 400);
    }

    // Add event listeners only if elements exist
    if (expertisesLink && expertisesDropdown) {
        const expertisesParent = expertisesLink.parentElement;
        if (expertisesParent) {
            expertisesParent.addEventListener('mouseenter', () => openDropdown(expertisesDropdown));
            expertisesParent.addEventListener('mouseleave', closeDropdown);
        }
        expertisesDropdown.addEventListener('mouseenter', () => openDropdown(expertisesDropdown));
        expertisesDropdown.addEventListener('mouseleave', closeDropdown);
        expertisesLink.addEventListener('focus', () => openDropdown(expertisesDropdown));
        expertisesLink.addEventListener('blur', closeDropdown);
    }

    if (enjeuxLink && enjeuxDropdown) {
        const enjeuxParent = enjeuxLink.parentElement;
        if (enjeuxParent) {
            enjeuxParent.addEventListener('mouseenter', () => openDropdown(enjeuxDropdown));
            enjeuxParent.addEventListener('mouseleave', closeDropdown);
        }
        enjeuxDropdown.addEventListener('mouseenter', () => openDropdown(enjeuxDropdown));
        enjeuxDropdown.addEventListener('mouseleave', closeDropdown);
        enjeuxLink.addEventListener('focus', () => openDropdown(enjeuxDropdown));
        enjeuxLink.addEventListener('blur', closeDropdown);
    }

    if (solutionsLink && solutionsDropdown) {
        const solutionsParent = solutionsLink.parentElement;
        if (solutionsParent) {
            solutionsParent.addEventListener('mouseenter', () => openDropdown(solutionsDropdown));
            solutionsParent.addEventListener('mouseleave', closeDropdown);
        }
        solutionsDropdown.addEventListener('mouseenter', () => openDropdown(solutionsDropdown));
        solutionsDropdown.addEventListener('mouseleave', closeDropdown);
        solutionsLink.addEventListener('focus', () => openDropdown(solutionsDropdown));
        solutionsLink.addEventListener('blur', closeDropdown);
    }

    // Gestion du scroll
    window.addEventListener('scroll', function() {
        setNavbarState(window.scrollY > 50);
    });

    // Gestion du survol de la navbar
    if (navbar) {
        navbar.addEventListener('mouseenter', () => {
            if (!isDropdownOpen) {
                setNavbarState(true);
            }
        });

        navbar.addEventListener('mouseleave', () => {
            if (!isDropdownOpen && window.scrollY <= 50) {
                setNavbarState(false);
            }
        });
    }

    // Initialiser l'état du logo
    setNavbarState(window.scrollY > 50);

    // Typing Effect Script
    const typingTextElement = document.getElementById('typing-effect-text');
    const heroDescription = document.querySelector('.hero-description');
    const heroCtaButtons = document.querySelector('.hero-cta-buttons');

    if (typingTextElement) {
        const textToType = typingTextElement.dataset.text;
        let i = 0;
        typingTextElement.innerHTML = '<span class="cursor"></span>';

        function typeWriter() {
            if (i < textToType.length) {
                const currentText = textToType.substring(0, i + 1);
                typingTextElement.innerHTML = currentText + '<span class="cursor"></span>';
                i++;
                const typingSpeed = Math.random() * 20 + 10;
                setTimeout(typeWriter, typingSpeed);
            } else {
                typingTextElement.innerHTML = textToType;
                if (heroDescription) heroDescription.classList.add('visible');
                if (heroCtaButtons) heroCtaButtons.classList.add('visible');
            }
        }

        typeWriter();
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetElement = document.querySelector(this.getAttribute('href'));
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Carrousel d'expertises
    const expertiseItems = document.querySelectorAll('.expertise-item');
    
    expertiseItems.forEach(item => {
        const imageUrl = item.dataset.image;
        const imageElement = item.querySelector('.expertise-image');
        if (imageUrl && imageElement) {
            imageElement.style.backgroundImage = `url(${imageUrl})`;
        }
    });

    // Data expertise cards
    const wrapper = document.querySelector('.data-expertise-cards-wrapper');
    if (!wrapper) return;

    const cards = wrapper.querySelectorAll('.data-expertise-card');
    if (cards.length === 0) return;
    
    // Create container for the cards
    const container = document.createElement('div');
    container.className = 'data-expertise-cards-container';
    
    // Move all cards to the container
    while (wrapper.firstChild) {
        container.appendChild(wrapper.firstChild);
    }
    
    // Add container to wrapper
    wrapper.appendChild(container);
    
    // Clone cards for infinite scroll effect
    cards.forEach(card => {
        const clone = card.cloneNode(true);
        container.appendChild(clone);
    });

    // Add direction button
    const directionBtn = document.createElement('button');
    directionBtn.className = 'scroll-direction-btn';
    directionBtn.innerHTML = '<i class="fas fa-arrows-alt-h"></i>';
    wrapper.appendChild(directionBtn);

    // Toggle direction on click
    directionBtn.addEventListener('click', () => {
        container.classList.toggle('reversed');
    });
});

const dropdownLinks = [expertisesLink, enjeuxLink, solutionsLink];
const dropdownContents = [expertisesDropdown, enjeuxDropdown, document.getElementById('solutions-dropdown')];

dropdownLinks.forEach((link, idx) => {
    if (!link) return;
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const dropdown = dropdownContents[idx];
        const isActive = link.classList.contains('active');
        // Ferme tout
        dropdownLinks.forEach(l => l && l.classList.remove('active'));
        dropdownContents.forEach(d => d && (d.style.display = 'none'));
        if (!isActive) {
            link.classList.add('active');
            if (dropdown) dropdown.style.display = 'block';
        }
    });
});
// Fermer le dropdown si on clique ailleurs
window.addEventListener('click', function(e) {
    if (!e.target.closest('.nav-links') && !e.target.closest('.dropdown-content')) {
        dropdownLinks.forEach(l => l && l.classList.remove('active'));
        dropdownContents.forEach(d => d && (d.style.display = 'none'));
    }
});

document.addEventListener('DOMContentLoaded', function() {

    // Initialisation des animations au défilement
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // --- NAVBAR LOGIC ---
    const navbar = document.getElementById('navbar');
    const desktopLogo = document.querySelector('#navbar .logo-flex img');
    const transparentLogoSrc = 'img/butine_long_bg.png';
    const solidLogoSrc = 'img/butine_long_bg.png'; // Same logo for now

    if (navbar) {
        // Handle navbar state on scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
                if(desktopLogo) desktopLogo.src = solidLogoSrc;
            } else {
                navbar.classList.remove('scrolled');
                if(desktopLogo) desktopLogo.src = transparentLogoSrc;
            }
        });
    }

    // --- MOBILE MENU LOGIC ---
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileCurtain = document.getElementById('mobile-curtain');
    const mobileCurtainClose = document.getElementById('mobile-curtain-close');
    const mobileContactBtn = document.getElementById('mobile-contact-button');

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', () => {
            if(mobileCurtain) mobileCurtain.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    if (mobileCurtainClose) {
        mobileCurtainClose.addEventListener('click', () => {
            if(mobileCurtain) mobileCurtain.classList.remove('active');
            document.body.style.overflow = '';
        });
    }
    
    // --- CONTACT MODAL LOGIC ---
    const modal = document.getElementById('contact-modal');
    const modalClose = document.getElementById('modal-close');
    const overlay = document.querySelector('.modal-overlay');

    const contactTriggers = [
        document.getElementById('floating-contact-button'),
        document.getElementById('navbar-contact-button'),
        document.getElementById('start-project-button'),
        document.getElementById('contact-modal-trigger'),
        mobileContactBtn
    ];

    function openModal() {
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            if (mobileCurtain && mobileCurtain.classList.contains('active')) {
                mobileCurtain.classList.remove('active');
            }
        }
    }

    function closeModal() {
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    contactTriggers.forEach(trigger => {
        if (trigger) {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                openModal();
            });
        }
    });

    if (modalClose) modalClose.addEventListener('click', closeModal);
    if (overlay) overlay.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && modal.classList.contains('active')) {
            closeModal();
        }
    });

    if (modal) {
        const modalContainer = modal.querySelector('.modal-container');
        if(modalContainer) {
            modalContainer.addEventListener('click', e => e.stopPropagation());
        }
    }

    // --- TYPING EFFECT ---
    const typingElement = document.getElementById('typing-effect-text');
    if (typingElement) {
        const text = typingElement.getAttribute('data-text');
        let i = 0;
        typingElement.innerHTML = ""; // Clear content before typing

        function typeWriter() {
            if (i < text.length) {
                typingElement.innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWriter, 50); // Adjust typing speed here
            }
        }
        typeWriter();
    }

    // --- GANTT CHART ANIMATION ---
    const ganttItems = document.querySelectorAll('.gantt-item');
    if (ganttItems.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        });

        ganttItems.forEach(item => {
            observer.observe(item);
        });
    }
});


