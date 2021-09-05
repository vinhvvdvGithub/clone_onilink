<?php defined('ALTUMCODE') || die() ?>
<!DOCTYPE html>
<html lang="<?= \Altum\Language::$language_code ?>" dir="<?= language()->direction ?>">

<head>
    <!-- <title><?= \Altum\Title::get() ?></title> -->
    <title>OniLink</title>
    <base href="<?= SITE_URL; ?>">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-language" content="<?= \Altum\Language::$language_code  ?>" />
    <link href="https://assets.website-files.com/604b35876a71cbbd84768e36/604e34f2690126aa59d2f621_Bold-Favicon.png" rel="shortcut icon" type="image/x-icon" />
    <link href="https://assets.website-files.com/604b35876a71cbbd84768e36/604e355b69012608e9d2f7a3_Bold-Webclip.png" rel="apple-touch-icon" />


    <?php if (\Altum\Meta::$description) : ?>
        <meta name="description" content="<?= \Altum\Meta::$description ?>" />
    <?php endif ?>
    <?php if (\Altum\Meta::$keywords) : ?>
        <meta name="keywords" content="<?= \Altum\Meta::$keywords ?>" />
    <?php endif ?>

    <?php if (\Altum\Meta::$open_graph['url']) : ?>
        <!-- Open Graph / Facebook / Twitter -->
        <?php foreach (\Altum\Meta::$open_graph as $key => $value) : ?>
            <?php if ($value) : ?>
                <meta property="og:<?= $key ?>" content="<?= $value ?>" />
                <meta property="twitter:<?= $key ?>" content="<?= $value ?>" />
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

    

    <link href="https://assets.website-files.com/604b35876a71cbbd84768e36/css/az-bold.webflow.5cbac129e.css" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="<?= ASSETS_FULL_URL . 'css/app.min.css' ?>" id="app-style" rel="stylesheet" type="text/css" />


    <link rel="alternate" href="<?= SITE_URL . \Altum\Routing\Router::$original_request ?>" hreflang="x-default" />
    <?php if (count(\Altum\Language::$languages) > 1) : ?>
        <?php foreach (\Altum\Language::$languages as $language_code => $language_name) : ?>
            <?php if (settings()->default_language != $language_name) : ?>
                <link rel="alternate" href="<?= SITE_URL . $language_code . '/' . \Altum\Routing\Router::$original_request ?>" hreflang="<?= $language_code ?>" />
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

    <?php if (!empty(settings()->favicon)) : ?>
        <link href="<?= UPLOADS_FULL_URL . 'favicon/' . settings()->favicon ?>" rel="shortcut icon" />
    <?php endif ?>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= ASSETS_FULL_URL ?>images/favicon.ico">

    <!-- Icons Css -->
    <link href="<?= ASSETS_FULL_URL ?>css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= ASSETS_FULL_URL ?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="<?= ASSETS_FULL_URL . 'css/' . \Altum\ThemeStyle::get_file() . '?v=' . PRODUCT_CODE ?>" id="css_theme_style" rel="stylesheet" media="screen,print">
    <?php foreach (['custom.css', 'link-custom.css', 'animate.min.css'] as $file) : ?>
        <link href="<?= ASSETS_FULL_URL . 'css/' . $file . '?v=' . PRODUCT_CODE ?>" rel="stylesheet" media="screen,print">
    <?php endforeach ?>

    <?= \Altum\Event::get_content('head') ?>

    <?php if (!empty(settings()->custom->head_js)) : ?>
        <?= settings()->custom->head_js ?>
    <?php endif ?>

    <?php if (!empty(settings()->custom->head_css)) : ?>
        <style>
            <?= settings()->custom->head_css ?>
        </style>
    <?php endif ?>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic", "Manrope:200,300,regular,500,600,700,800"]
            }
        });
    </script>
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>



</head>

<body class="<?= language()->direction == 'rtl' ? 'rtl' : null ?> <?= \Altum\Routing\Router::$controller_settings['body_white'] ? 'bg-white' : null ?>" data-theme-style="<?= \Altum\ThemeStyle::get() ?>">
    <?php //ALTUMCODE:DEMO if(DEMO) echo include_view(THEME_PATH . 'views/partials/ac_banner.php', ['demo_url' => 'https://phpbiolinks.com/demo/', 'title_text' => 'phpBiolinks by AltumCode', 'product_url' => 'https://altumco.de/phpbiolinks-buy', 'buy_text' => 'Buy phpBiolinks']) 
    ?>

    <?php require THEME_PATH . 'views/partials/announcements.php' ?>


    <?= $this->views['menu'] ?>

    <main class="animate__animated animate__fadeIn">

        <?= $this->views['content'] ?>

    </main>

    <?php if (\Altum\Routing\Router::$controller_key != 'index') : ?>
        <?php require THEME_PATH . 'views/partials/ads_footer.php' ?>
    <?php endif ?>

    <?= $this->views['footer'] ?>



    <?= \Altum\Event::get_content('modals') ?>

    <?php require THEME_PATH . 'views/partials/js_global_variables.php' ?>

    <?php foreach (['libraries/jquery.min.js', 'libraries/popper.min.js', 'libraries/bootstrap.min.js', 'main.js', 'functions.js', 'libraries/fontawesome.min.js', 'libraries/clipboard.min.js'] as $file) : ?>
        <script src="<?= ASSETS_FULL_URL ?>js/<?= $file ?>?v=<?= PRODUCT_CODE ?>"></script>
    <?php endforeach ?>

    <?= \Altum\Event::get_content('javascript') ?>

    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=604b35876a71cbbd84768e36" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="<?= ASSETS_FULL_URL ?>js/JSmain/JStranslate/js.js"></script>
    <script src="<?= ASSETS_FULL_URL ?>js/JSmain/JS/webflow.js"></script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->



</body>

</html>