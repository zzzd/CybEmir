<?php

class Controller {

    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    protected function render($view, $data = [], $useLayout = true) {
        // Fusionner les données de la navbar avec les données de la page
        $data = array_merge($this->getNavbarData(), $data);
        
        $this->view->render($view, $useLayout, $data);
    }
    
    /**
     * Données communes pour la navbar
     */
    protected function getNavbarData() {
        return [
            'base_url' => $this->getBaseUrl(),
            'current_page' => $this->getCurrentPage(),
            'navbar_links' => $this->getNavbarLinks()
        ];
    }
    
    /**
     * Configuration des liens de navigation
     */
    protected function getNavbarLinks() {
        return [
            'enjeux' => [
                'title' => 'Vos Enjeux',
                'items' => [
                    'Performance commerciale & pilotage digital',
                    'Exploitation intelligente de vos données',
                    'Automatisation & efficacité opérationnelle',
                    'Fiabilisation du reporting & aide à la décision',
                    'Acculturation & montée en compétence data',
                    'Innovation & transformation par l\'IA',
                    'Structuration & modernisation des outils métiers',
                    'Réduction des coûts par la data & l\'automatisation'
                ]
            ],
            'expertises' => [
                'title' => 'Nos Expertises',
                'items' => [
                    [
                        'title' => 'Stratégie Data & IA',
                        'url' => 'strategie',
                        'sub_items' => [
                            'Audit stratégique data & IA',
                            'Structuration de la gouvernance data',
                            'Feuille de route IA & automatisation',
                            'Conseil en architecture décisionnelle'
                        ]
                    ],
                    [
                        'title' => 'Conseil en stratégie data',
                        'url' => 'conseil',
                        'sub_items' => [
                            'Clarification des besoins et des cas d\'usage',
                            'Identification des opportunités à fort ROI',
                            'Structuration d\'une vision long terme data/IA',
                            'Alignement stratégique et pilotage global'
                        ]
                    ],
                    [
                        'title' => 'Intelligence Artificielle & Data Science',
                        'url' => 'iads',
                        'sub_items' => [
                            'Modèles prédictifs & scoring',
                            'Analyse sémantique & NLP',
                            'IA générative & assistants métier',
                            'Industrialisation de modèles IA'
                        ]
                    ],
                    [
                        'title' => 'Développement d\'outils sur mesure',
                        'url' => 'outils',
                        'sub_items' => [
                            'Conception de solutions SaaS personnalisées',
                            'Intégration d\'outils métiers',
                            'Reporting automatisé & fichiers intelligents',
                            'Tableaux de bord interactifs'
                        ]
                    ],
                    [
                        'title' => 'Automatisation & Process Mining',
                        'url' => 'automatisation',
                        'sub_items' => [
                            'Cartographie des processus',
                            'Automatisation de tâches (RPA, scripts, API)',
                            'Optimisation des workflows',
                            'Détection d\'anomalies & alertes intelligentes'
                        ]
                    ],
                    [
                        'title' => 'Business Intelligence & Dataviz',
                        'url' => 'bi-data-viz',
                        'sub_items' => [
                            'Conception de dashboards clairs & pertinents',
                            'KPI personnalisés',
                            'Suivi en temps réel de l\'activité',
                            'Accès multi-profil & multi-device'
                        ]
                    ],
                    [
                        'title' => 'Collecte & Qualité des Données',
                        'url' => 'qualite-donnees',
                        'sub_items' => [
                            'Structuration & normalisation des sources',
                            'Data pipelines & ingestion multi-canal',
                            'Détection d\'erreurs, doublons, manquants',
                            'Mise en conformité RGPD / DCP'
                        ]
                    ],
                    [
                        'title' => 'Accompagnement & Formation',
                        'url' => 'formation',
                        'sub_items' => [
                            'Formation à la data, à l\'IA et à la Business Intelligence',
                            'Ateliers d\'acculturation IA pour les équipes métiers et dirigeantes',
                            'Transfert de compétences sur les outils livrés',
                            'Support post-déploiement et accompagnement au changement'
                        ]
                    ]
                ]
            ],
            'solutions' => [
                'title' => 'Built-In Solutions',
                'items' => [
                    ['title' => 'BUTINE Santé', 'url' => 'btp-pro-max.html'],
                    ['title' => 'BUTINE Construction', 'url' => 'btp-pro-max.html'],
                    ['title' => 'BUTINE Logistique', 'url' => 'btp-pro-max.html'],
                    ['title' => 'BUTINE Conseils', 'url' => 'btp-pro-max.html']
                ]
            ]
        ];
    }
    
    /**
     * Obtenir l'URL de base
     */
    protected function getBaseUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $script = $_SERVER['SCRIPT_NAME'];
        $path = dirname($script);
        return $protocol . '://' . $host . $path;
    }
    
    /**
     * Obtenir la page courante pour la navigation active
     */
    protected function getCurrentPage() {
        return basename($_SERVER['REQUEST_URI'], '.php');
    }
    
    /**
     * Helper pour générer les URLs
     */
    protected function url($path = '') {
        return $this->getBaseUrl() . '/' . ltrim($path, '/');
    }
    
    /**
     * Helper pour les URLs d'images
     */
    protected function imgUrl($filename) {
        return $this->getBaseUrl() . '/public/img/' . $filename;
    }
}