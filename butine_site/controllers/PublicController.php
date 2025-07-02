<?php

class PublicController extends Controller {

    public function home() {
        $data = [
            'page_title' => 'Butine Groupe - Experts en Data Science & IA',
            'page_description' => 'Butine Groupe accompagne les entreprises dans leur transformation digitale grâce à la data science, l\'intelligence artificielle et l\'automatisation.',
            'page_keywords' => 'IA, Intelligence Artificielle, Data Science, Automatisation, Transformation Digitale'
        ];

        $this->render('public/home', $data);
    }

    public function strategie() {
        $data = [
            'page_title' => 'Stratégie Data & IA - Butine Groupe',
            'page_description' => 'Conseil en stratégie data et intelligence artificielle pour votre entreprise.',
            'page_keywords' => 'Stratégie Data, IA, Conseil'
        ];

        $this->render('public/strategie', $data);
    }

    public function contact() {
        $data = [
            'page_title' => 'Contact - Butine Groupe',
            'page_description' => 'Contactez nos experts en data science et intelligence artificielle.',
            'page_keywords' => 'Contact, Devis, Data Science'
        ];

        $this->render('public/contact', $data);
    }

    public function formation() {
        $data = [
            'page_title' => 'Formation Data & IA - Butine Groupe',
            'page_description' => 'Formations en data science et intelligence artificielle.',
            'page_keywords' => 'Formation, Data Science, IA'
        ];

        $this->render('public/formation', $data);
    }

    public function conseil() {
        $data = [
            'page_title' => 'Conseil en stratégie data - Butine Groupe',
            'page_description' => 'Conseil stratégique en data et transformation digitale.',
            'page_keywords' => 'Conseil, Data, Stratégie'
        ];

        $this->render('public/conseil', $data);
    }

    public function automatisation() {
        $data = [
            'page_title' => 'Automatisation & Process Mining - Butine Groupe',
            'page_description' => 'Solutions d\'automatisation et process mining.',
            'page_keywords' => 'Automatisation, Process Mining, RPA'
        ];

        $this->render('public/automatisation', $data);
    }

    public function outils() {
        $data = [
            'page_title' => 'Développement d\'outils sur mesure - Butine Groupe',
            'page_description' => 'Développement d\'outils personnalisés pour vos besoins.',
            'page_keywords' => 'Développement, Outils, SaaS'
        ];

        $this->render('public/outils', $data);
    }

    public function qualiteDonnees() {
        $data = [
            'page_title' => 'Collecte & Qualité des Données - Butine Groupe',
            'page_description' => 'Services de collecte et amélioration de la qualité des données.',
            'page_keywords' => 'Qualité données, Collecte, Data Quality'
        ];

        $this->render('public/qualite-donnees', $data);
    }

    public function biDataViz() {
        $data = [
            'page_title' => 'Business Intelligence & Dataviz - Butine Groupe',
            'page_description' => 'Solutions de business intelligence et visualisation de données.',
            'page_keywords' => 'BI, Business Intelligence, Dataviz'
        ];

        $this->render('public/bi-data-viz', $data);
    }

    public function iads() {
        $data = [
            'page_title' => 'Intelligence Artificielle & Data Science - Butine Groupe',
            'page_description' => 'Solutions d\'intelligence artificielle et data science.',
            'page_keywords' => 'IA, Data Science, Machine Learning'
        ];

        $this->render('public/iads', $data);
    }
}