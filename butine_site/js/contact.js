document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    const modal = document.getElementById('contact-modal');

    // Function to close modal, needed for form success
    function closeModal() {
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `form-notification form-notification--${type}`;
        notification.textContent = message;
        document.body.appendChild(notification);

        // Trigger the animation
        setTimeout(() => {
            notification.classList.add('show');
        }, 10);

        // Hide and remove the notification after 5 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 500);
        }, 5000);
    }

    // --- FORM VALIDATION ---
    const requiredFields = ['name', 'email', 'message'];
    
    function validateField(field) {
        const input = document.getElementById(field);
        const formGroup = input.parentElement;
        let isValid = true;

        // Reset error state
        formGroup.classList.remove('error');

        if (input.type === 'email') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(input.value.trim())) {
                isValid = false;
            }
        } else {
            if (input.value.trim() === '') {
                isValid = false;
            }
        }

        if (!isValid) {
            formGroup.classList.add('error');
        }
        return isValid;
    }

    function validateForm() {
        let isFormValid = true;
        requiredFields.forEach(field => {
            if (!validateField(field)) {
                isFormValid = false;
            }
        });
        return isFormValid;
    }

    // Add event listeners to clear errors on input
    requiredFields.forEach(fieldId => {
        const input = document.getElementById(fieldId);
        if (input) {
            input.addEventListener('input', () => validateField(fieldId));
        }
    });

    // --- FORM SUBMISSION ---
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateForm()) {
                showNotification("Veuillez corriger les erreurs dans le formulaire.", 'error');
                return;
            }

            const submitButton = this.querySelector('.submit-button');
            const originalButtonText = 'Envoyer votre message';
            
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
                    submitButton.innerHTML = '<i class="fas fa-check"></i> Envoyé !';
                    showNotification("Merci ! Votre message a été envoyé. Nous reviendrons vers vous très rapidement.", 'success');
                    
                    setTimeout(() => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = `<span>${originalButtonText}</span><i class="fas fa-arrow-right"></i>`;
                        closeModal();
                        contactForm.reset();
                    }, 2000);

                } else {
                    throw new Error(data.message || 'Erreur du serveur.');
                }
            })
            .catch(error => {
                submitButton.innerHTML = 'Échec de l\'envoi';
                showNotification(error.message || "Une erreur est survenue. Veuillez réessayer.", 'error');

                setTimeout(() => {
                    submitButton.disabled = false;
                    submitButton.innerHTML = `<span>${originalButtonText}</span><i class="fas fa-arrow-right"></i>`;
                }, 3000);
                
                console.error('Error:', error);
            });
        });
    }
}); 