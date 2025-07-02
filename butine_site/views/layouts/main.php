<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
    <meta name="theme-color" content="#ffffff" />

    <title><?= isset($page_title) ? $page_title : 'Butine Groupe - Experts en Data Science & IA' ?></title>

    <meta name="description" content="<?= isset($page_description) ? $page_description : 'Butine Groupe accompagne les entreprises dans leur transformation digitale grâce à la data science, l\'intelligence artificielle et l\'automatisation.' ?>" />
    <meta name="keywords" content="<?= isset($page_keywords) ? $page_keywords : 'IA, Intelligence Artificielle, Data Science, Automatisation, Transformation Digitale' ?>" />

    <meta name="author" content="Butine Groupe" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link rel="canonical" href="<?= BASE_URL ?>" />

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="<?= isset($page_title) ? $page_title : 'Butine Groupe - Experts Data & IA' ?>" />
    <meta property="og:description" content="<?= isset($page_description) ? $page_description : 'Transformez votre entreprise grâce à la data et l\'intelligence artificielle avec Butine Groupe.' ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= BASE_URL ?>" />
    <meta property="og:image" content="<?= BASE_URL ?>public/img/og-banner.jpg" />
    <meta property="og:site_name" content="Butine Groupe" />
    <meta property="og:locale" content="fr_FR" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= isset($page_title) ? $page_title : 'Butine Groupe - Experts en IA & Data Science' ?>" />
    <meta name="twitter:description" content="<?= isset($page_description) ? $page_description : 'Experts en IA, Data Science et Automatisation. Boostez vos projets avec Butine Groupe.' ?>" />
    <meta name="twitter:image" content="<?= BASE_URL ?>public/img/og-banner.jpg" />
    <meta name="twitter:site" content="@butinegroupe" />

    <link rel="icon" href="<?= BASE_URL ?>favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= BASE_URL ?>public/img/apple-touch-icon.png" />

    <!-- Fonts / CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Butine Groupe",
        "url": "<?= BASE_URL ?>",
        "logo": "<?= BASE_URL ?>public/img/butine_long_bg.png",
        "description": "Experts en IA, Data Science et Automatisation. Solutions d'intelligence artificielle pour entreprises.",
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+33-1-23-45-67-89",
                "contactType": "Customer Service",
                "areaServed": "FR",
                "availableLanguage": ["fr", "en"]
            }
        ],
        "sameAs": [
            "https://www.linkedin.com/company/butinegroupe",
            "https://twitter.com/butinegroupe"
        ]
    }
    </script>

    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/expertise-cards-fix.css">
</head>

<body>
    <div class="body-overlay"></div>

    <?php include ROOT_PATH . 'includes/navbar.php'; ?>

    <!-- Contenu principal de la page -->
    <?= $content ?>

    <?php include ROOT_PATH . 'includes/footer.php'; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="<?= BASE_URL ?>public/js/main.js"></script>
</body>
</html>