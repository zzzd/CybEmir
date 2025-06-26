<!-- footer.php -->
 <button class="floating-contact-button" id="floating-contact-button">
        <i class="fas fa-comments"></i>
        Contactez-nous
    </button>
<!-- Section Contact -->
     <!-- Modal de Contact -->
     <div id="contact-modal" class="contact-modal">
        <div class="modal-overlay"></div>
        <div class="modal-container">
            <button class="modal-close" id="modal-close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Contactez-nous</h2>
                    <p class="modal-subtitle">Notre équipe d'experts est à votre écoute pour vous accompagner dans vos projets</p>
                </div>
                <form id="contact-form" class="contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" id="name" name="name" required placeholder=" ">
                            <label for="name">Nom complet *</label>
                            <span class="form-error-message">Ce champ est requis.</span>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" required placeholder=" ">
                            <label for="email">Email *</label>
                            <span class="form-error-message">Veuillez entrer un email valide.</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" placeholder=" ">
                            <label for="phone">Téléphone</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="company" name="company" placeholder=" ">
                            <label for="company">Entreprise</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" required placeholder=" " rows="4"></textarea>
                        <label for="message">Votre message *</label>
                        <span class="form-error-message">Ce champ est requis.</span>
                    </div>
                    <div class="form-footer">
                        <div class="privacy-notice">
                            <p>
                                Butine Groupe s'engage à protéger et à respecter votre vie privée. Consultez notre 
                                <a href="#" class="privacy-link">Politique de confidentialité</a> 
                                pour en savoir plus sur nos modalités de désabonnement et de confidentialité et sur notre engagement sur la protection et le respect de la vie privée.
                            </p>
                        </div>
                        <button type="submit" class="submit-button">
                            <span>Envoyer votre message</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Section Clients -->
    <section id="clients" class="section clients-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Nous les avons accompagnés dans leurs projets Data et IA</h2>
                
            </div>
            <div class="clients-grid" data-aos="fade-up" data-aos-delay="100">
                <img src="img/logo-stellantis.png" alt="Stellantis - Partenaire de Butine Groupe en transformation digitale et solutions IA" loading="lazy">
                <img src="img/logo-schneider.png" alt="Schneider Electric - Client de Butine Groupe en automatisation et intelligence artificielle" loading="lazy">
                <img src="img/logo-bpvf.png" alt="Banque Populaire Val de France - Partenaire de Butine Groupe en solutions bancaires innovantes" loading="lazy">
                <img src="img/logo-havelsan.png" alt="Havelsan - Client de Butine Groupe en solutions technologiques avancées" loading="lazy">
                <img src="img/logo-snrb.png" alt="SNRB - Partenaire de Butine Groupe en transformation numérique" loading="lazy">
            </div>
        </div>
    </section>
 <!-- Section Footer -->
<footer class="footer" style="margin-top: 0;">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <img src="img/butine_long_bg.png" alt="Butine Groupe Logo" class="footer-logo">
                    <p>Transformez votre entreprise avec l'Intelligence Artificielle</p>
                </div>
                <div class="footer-section">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="#data-expertise-section">Nos Expertises</a></li>
                        <li><a href="#our-approach">Notre Approche</a></li>
                        <li><a href="#" id="contact-modal-trigger">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <ul class="contact-info">
                        <li><i class="fas fa-envelope"></i> em.karaguzel@gmail.com</li>
                        <li><i class="fas fa-phone"></i> +33 6 67 04 59 79</li>
                        <li><i class="fas fa-map-marker-alt"></i> Paris, France</li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Suivez-nous</h4>
                    <div class="social-links">
                        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Butine Groupe. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
