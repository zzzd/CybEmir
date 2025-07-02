<?php
// views/public/home.php
?>

<section class="hero">
    <div class="hero-inner-content-wrapper">
        <div class="hero-content">
            <h1><span id="typing-effect-text" data-text="La donnée brute ne vaut rien. Bien exploitée, elle transforme votre entreprise. "></span></h1>
            <p class="hero-description">Nous accélérons la performance des entreprises grâce à la Data et l'Intelligence Artificielle. Conseil stratégique, Solutions automatisées, décisions fiabilisées, processus optimisés : nous transformons votre capital data en résultats concrets, quel que soit votre secteur d'activité.</p>
            <div class="hero-cta-buttons">
                <a href="<?= BASE_URL ?>contact" id="start-project-button" class="cta-button secondary-cta">Démarrer votre projet <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section id="data-expertise-section" class="section">
    <div class="container data-expertise-container">
        <div class="data-expertise-text-content">
            <h2>Butine Groupe, accélérateur de performance Data et IA pour tous les secteurs.</h2>
            <p>Nous accompagnons les organisations dans leur transformation numérique en alliant conseil stratégique, développement de solutions SaaS sur mesure et automatisation des processus métiers. Nous concevons des outils intelligents, des tableaux de bord dynamiques et des modèles d'intelligence artificielle pour valoriser les données et optimiser la performance.</p>
        </div>
        <div class="data-expertise-cards-column">
            <div class="data-expertise-cards-wrapper">
                <a href="<?= BASE_URL ?>strategie" class="data-expertise-card" role="button" tabindex="0" data-hover-image="<?= BASE_URL ?>public/img/strategie/strategie_hero.png">
                    <h3>Stratégie Data & IA</h3>
                    <div class="hover-image"></div>
                    <span class="card-arrow">&#x2192;</span>
                </a>
                <a href="<?= BASE_URL ?>conseil" class="data-expertise-card" role="button" tabindex="0" data-hover-image="<?= BASE_URL ?>public/img/conseil/conseil_hero.png">
                    <h3>Conseil en stratégie data</h3>
                    <div class="hover-image"></div>
                    <span class="card-arrow">&#x2192;</span>
                </a>
                <a href="<?= BASE_URL ?>iads" class="data-expertise-card" role="button" tabindex="0" data-hover-image="<?= BASE_URL ?>public/img/iads/iads_hero.png">
                    <h3>Intelligence Artificielle & Data Science</h3>
                    <div class="hover-image"></div>
                    <span class="card-arrow">&#x2192;</span>
                </a>
                <a href="<?= BASE_URL ?>outils" class="data-expertise-card" role="button" tabindex="0" data-hover-image="<?= BASE_URL ?>public/img/outils/outils_hero.png">
                    <h3>Développement d'outils sur mesure</h3>
                    <div class="hover-image"></div>
                    <span class="card-arrow">&#x2192;</span>
                </a>
                <a href="<?= BASE_URL ?>automatisation" class="data-expertise-card" role="button" tabindex="0" data-hover-image="<?= BASE_URL ?>public/img/automatisation/automatisation_hero.png">
                    <h3>Automatisation & Process Mining</h3>
                    <div class="hover-image"></div>
                    <span class="card-arrow">&#x2192;</span>
                </a>
                <a href="<?= BASE_URL ?>bi-data-viz" class="data-expertise-card" role="button" tabindex="0" data-hover-image="<?= BASE_URL ?>public/img/bi-data-viz/bi-data-viz_hero.png">
                    <h3>Business Intelligence & Dataviz</h3>
                    <div class="hover-image"></div>
                    <span class="card-arrow">&#x2192;</span>
                </a>
                <a href="<?= BASE_URL ?>qualite-donnees" class="data-expertise-card" role="button" tabindex="0" data-hover-image="<?= BASE_URL ?>public/img/qualite-donnees/qualite-donnees_hero.png">
                    <h3>Collecte & Qualité des Données</h3>
                    <div class="hover-image"></div>
                    <span class="card-arrow">&#x2192;</span>
                </a>
                <a href="<?= BASE_URL ?>formation" class="data-expertise-card" role="button" tabindex="0" data-hover-image="<?= BASE_URL ?>public/img/formation/formation_hero.png">
                    <h3>Accompagnement & Formation</h3>
                    <div class="hover-image"></div>
                    <span class="card-arrow">&#x2192;</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Mobile Expert Cards Section -->
<section id="expertise" class="section">
    <div class="container">
        <div class="data-expertise-text-content">
            <h2>Nous aidons les entreprises à améliorer concrètement leurs processus en exploitant leurs données de façon intelligente.</h2>
            <p>Automatisation, visualisation, structuration de la collecte… Nous créons aussi des tunnels de données complets, de la source jusqu'à l'analyse, pour garantir des bases solides. Nous intervenons là où la donnée fait la différence : optimisation des opérations, création de solutions sur mesure, formations ciblées et outils activables rapidement, pensés pour apporter de la valeur dès le premier jour.</p>
        </div>
        <div class="expertise-grid">
            <a href="<?= BASE_URL ?>strategie" class="expertise-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-content">
                    <h3>Stratégie Data & IA</h3>
                    <span class="card-icon"><i class="fas fa-arrow-right"></i></span>
                </div>
                <div class="card-bg" style="background-image: url('<?= BASE_URL ?>public/img/strategie/strategie_hero.png')"></div>
            </a>
            <a href="<?= BASE_URL ?>conseil" class="expertise-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-content">
                    <h3>Conseil en stratégie data</h3>
                    <span class="card-icon"><i class="fas fa-arrow-right"></i></span>
                </div>
                <div class="card-bg" style="background-image: url('<?= BASE_URL ?>public/img/conseil/conseil_hero.png')"></div>
            </a>
            <a href="<?= BASE_URL ?>iads" class="expertise-card" data-aos="fade-up" data-aos-delay="300">
                <div class="card-content">
                    <h3>Intelligence Artificielle & Data Science</h3>
                    <span class="card-icon"><i class="fas fa-arrow-right"></i></span>
                </div>
                <div class="card-bg" style="background-image: url('<?= BASE_URL ?>public/img/iads/iads_hero.png')"></div>
            </a>
            <a href="<?= BASE_URL ?>outils" class="expertise-card" data-aos="fade-up" data-aos-delay="400">
                <div class="card-content">
                    <h3>Développement d'outils sur mesure</h3>
                    <span class="card-icon"><i class="fas fa-arrow-right"></i></span>
                </div>
                <div class="card-bg" style="background-image: url('<?= BASE_URL ?>public/img/outils/outils_hero.png')"></div>
            </a>
            <a href="<?= BASE_URL ?>automatisation" class="expertise-card" data-aos="fade-up" data-aos-delay="500">
                <div class="card-content">
                    <h3>Automatisation & Process Mining</h3>
                    <span class="card-icon"><i class="fas fa-arrow-right"></i></span>
                </div>
                <div class="card-bg" style="background-image: url('<?= BASE_URL ?>public/img/automatisation/automatisation_hero.png')"></div>
            </a>
            <a href="<?= BASE_URL ?>bi-data-viz" class="expertise-card" data-aos="fade-up" data-aos-delay="600">
                <div class="card-content">
                    <h3>Business Intelligence & Dataviz</h3>
                    <span class="card-icon"><i class="fas fa-arrow-right"></i></span>
                </div>
                <div class="card-bg" style="background-image: url('<?= BASE_URL ?>public/img/bi-data-viz/bi-data-viz_hero.png')"></div>
            </a>
            <a href="<?= BASE_URL ?>qualite-donnees" class="expertise-card" data-aos="fade-up" data-aos-delay="700">
                <div class="card-content">
                    <h3>Collecte & Qualité des Données</h3>
                    <span class="card-icon"><i class="fas fa-arrow-right"></i></span>
                </div>
                <div class="card-bg" style="background-image: url('<?= BASE_URL ?>public/img/qualite-donnees/qualite-donnees_hero.png')"></div>
            </a>
            <a href="<?= BASE_URL ?>formation" class="expertise-card" data-aos="fade-up" data-aos-delay="800">
                <div class="card-content">
                    <h3>Accompagnement & Formation</h3>
                    <span class="card-icon"><i class="fas fa-arrow-right"></i></span>
                </div>
                <div class="card-bg" style="background-image: url('<?= BASE_URL ?>public/img/formation/formation_hero.png')"></div>
            </a>
        </div>
    </div>
</section>

<!-- Section Notre Approche -->
<section id="our-approach" class="section">
    <div class="container" style="max-width: 100%; padding: 0 4rem;">
        <div class="expertise-main-wrapper" style="max-width: 1400px; margin: 0 auto;">
            <div class="gantt-container" data-aos="fade-up">
                <div class="gantt-chart">
                    <div class="gantt-item" data-aos="fade-right" data-aos-delay="100">
                        <div class="gantt-header">
                            <div class="gantt-number">1</div>
                            <h3>Audit stratégique - Diagnostic sur mesure</h3>
                        </div>
                        <div class="gantt-bar">
                            <div class="gantt-progress"></div>
                        </div>
                        <div class="gantt-content">
                            <p>Diagnostic de vos flux, outils et données. Identification des leviers d'automatisation et d'intelligence artificielle. Analyse de vos processus métiers, outils actuels et organisation interne pour identifier les points d'amélioration prioritaires.</p>
                        </div>
                    </div>
                    <div class="gantt-item" data-aos="fade-right" data-aos-delay="200">
                        <div class="gantt-header">
                            <div class="gantt-number">2</div>
                            <h3>Automatisation des processus - Recommandations concrètes</h3>
                        </div>
                        <div class="gantt-bar">
                            <div class="gantt-progress"></div>
                        </div>
                        <div class="gantt-content">
                            <p>Élaboration d'un plan d'action structuré, avec des propositions claires : automatisation, fiabilisation des données, outils de pilotage…</p>
                        </div>
                    </div>
                    <div class="gantt-item" data-aos="fade-right" data-aos-delay="300">
                        <div class="gantt-header">
                            <div class="gantt-number">3</div>
                            <h3>Développement SaaS sur mesure - Conception de solutions adaptées</h3>
                        </div>
                        <div class="gantt-bar">
                            <div class="gantt-progress"></div>
                        </div>
                        <div class="gantt-content">
                            <p>Développement d'outils personnalisés, simples à utiliser et pensés pour vos équipes : Tableaux de bord personnalisés, indicateurs clés, fichiers automatisés, reporting, etc. Suivez en temps réel vos opérations</p>
                        </div>
                    </div>
                    <div class="gantt-item" data-aos="fade-right" data-aos-delay="400">
                        <div class="gantt-header">
                            <div class="gantt-number">4</div>
                            <h3>Déploiement et accompagnement</h3>
                        </div>
                        <div class="gantt-bar">
                            <div class="gantt-progress"></div>
                        </div>
                        <div class="gantt-content">
                            <p>Mise en œuvre dans votre environnement, formation des équipes et suivi post-déploiement pour garantir la bonne adoption des solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="expertise-left-content" data-aos="fade-up">
                <h2>Chez Butine Groupe, nous accompagnons les entreprises dans la structuration et la mise en œuvre de leur stratégie data, de l'audit initial jusqu'à la Data Science opérationnelle.</h2>
                <p>Nos domaines d'intervention couvrent la stratégie data, les diagnostics IA, la Business Intelligence, la connaissance et le parcours client, la collecte et la valorisation des données. Toujours à l'écoute de vos besoins, nous vous aidons à clarifier votre vision et à transformer vos ambitions en projets concrets.</p><br>
                <p>Notre approche est conçue pour identifier rapidement les leviers de performance, construire des solutions adaptées à vos enjeux, et en assurer le déploiement opérationnel. Grâce à des indicateurs fiables et des analyses ancrées dans le réel, vous prenez des décisions éclairées et anticipez les évolutions de votre activité. Boostez vos résultats en faisant de vos données un atout stratégique.</p>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Applique l'image de fond à chaque carte au chargement
    const expertiseCards = document.querySelectorAll('.data-expertise-card');
    expertiseCards.forEach(card => {
        const hoverImage = card.querySelector('.hover-image');
        if (hoverImage) {
            const imageUrl = card.getAttribute('data-hover-image');
            if (imageUrl) {
                hoverImage.style.backgroundImage = `url('${imageUrl}')`;
            }
        }
    });
});
</script>