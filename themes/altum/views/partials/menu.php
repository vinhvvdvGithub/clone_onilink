<?php defined('ALTUMCODE') || die() ?>
<title>OniLink</title>
<meta content="Bold - Webflow HTML website template" name="description" />
<meta content="Bold - Webflow HTML website template" property="og:title" />
<meta content="Bold - Webflow HTML website template" property="og:description" />
<meta content="Bold - Webflow HTML website template" property="twitter:title" />
<meta content="Bold - Webflow HTML website template" property="twitter:description" />
<meta property="og:type" content="website" />

<meta content="summary_large_image" name="twitter:card" />
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="Webflow" name="generator" />
<link href="https://assets.website-files.com/604b35876a71cbbd84768e36/css/az-bold.webflow.5cbac129e.css" rel="stylesheet" type="text/css" />

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
<script type="text/javascript">
    WebFont.load({
        google: {
            families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic",
                "Manrope:200,300,regular,500,600,700,800"
            ]
        }
    });
</script>
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
<script type="text/javascript">
    ! function(o, c) {
        var n = c.documentElement,
            t = " w-mod-";
        n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className +=
            t + "touch")
    }(window, document);
</script>
<link href="https://assets.website-files.com/604b35876a71cbbd84768e36/604e34f2690126aa59d2f621_Bold-Favicon.png" rel="shortcut icon" type="image/x-icon" />
<link href="https://assets.website-files.com/604b35876a71cbbd84768e36/604e355b69012608e9d2f7a3_Bold-Webclip.png" rel="apple-touch-icon" />
<link rel="stylesheet" href="<?= ASSETS_FULL_URL . 'css/mainCSS.css' ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=vietnamese" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

<style>
    body {
        font-family: roboto;
        font-weight: 300;
    }

    li {
        list-style: none;
    }

    .navbar-item a {
        position: relative;
        padding: 5px;
        text-decoration: none;
    }

    .navbar-item a::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0%;
        height: 2.5px;
        background: #fa5853;
        transition: all .5s linear;
    }

    .navbar-item a:hover::before {
        width: 100%;
    }

</style>

<div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="fixed-nav w-nav">
    <div class="container nav-container w-container">
        <a href="/" aria-current="page" class="brand w-nav-brand w--current"><img src="https://assets.website-files.com/604b35876a71cbbd84768e36/604b3661a1a5614a691a9615_Bold.svg" alt="" class="nav-logo" /></a>

        <nav role="navigation" class="nav-menu w-nav-menu">
            <li class="site-main-menu">
                <?php if (\Altum\Plugin::is_active('affiliate') && settings()->affiliate->is_enabled) : ?>
            <li class="nav-item d-flex align-items-center"><a class="nav-link" href="<?= url('affiliate') ?>">
                    <?= language()->affiliate->menu ?></a></li>
        <?php endif ?>
        <?php if (\Altum\Middlewares\Authentication::check()) : ?>
        
            <li class="nav-link  inline-block navbar-item">
                <a href="<?= url('dashboard') ?>"> <?= language()->dashboard->menu ?></a>
            </li>

            <li class="nav-link  inline-block navbar-item">
                <a href="<?= url('interface-repository') ?>"> Kho giao diện</a>
            </li>

            <li class="nav-link dropdown-toggle">
                <a class="dropdown show mr-1 animated" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="true">
                    <img src="<?= get_gravatar($this->user->email) ?>" class="navbar-avatar mr-1" />
                    <?= $this->user->name ?> <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu">
                    <?php if (\Altum\Middlewares\Authentication::is_admin()) : ?>
                        <a class="dropdown-item" href="<?= url('admin') ?>"><i class="fa fa-fw fa-sm fa-user-shield mr-1"></i> <?= language()->global->menu->admin ?></a>
                    <?php endif ?>

                    <?php if (settings()->links->domains_is_enabled) : ?>
                        <a class="dropdown-item" href="<?= url('domains') ?>"><i class="fa fa-fw fa-sm fa-globe mr-1"></i>
                            <?= language()->domains->menu ?></a>
                    <?php endif ?>
                    <a class="dropdown-item" href="<?= url('links') ?>"><i class="fa fa-fw fa-sm fa-link mr-1"></i>
                        <?= language()->links->menu ?></a>

                    <a class="dropdown-item" href="<?= url('projects') ?>"><i class="fa fa-fw fa-sm fa-project-diagram mr-1"></i> <?= language()->projects->menu ?></a>

                    <a class="dropdown-item" href="<?= url('pixels') ?>"><i class="fa fa-fw fa-sm fa-adjust mr-1"></i>
                        <?= language()->pixels->menu ?></a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="<?= url('account') ?>"><i class="fa fa-fw fa-sm fa-wrench mr-1"></i>
                        <?= language()->account->menu ?></a>

                    <a class="dropdown-item" href="<?= url('account-plan') ?>"><i class="fa fa-fw fa-sm fa-box-open mr-1"></i> <?= language()->account_plan->menu ?></a>

                    <?php if (settings()->payment->is_enabled) : ?>
                        <a class="dropdown-item" href="<?= url('account-payments') ?>"><i class="fa fa-fw fa-sm fa-dollar-sign mr-1"></i>
                            <?= language()->account_payments->menu ?></a>

                        <?php if (\Altum\Plugin::is_active('affiliate') && settings()->affiliate->is_enabled) : ?>
                            <a class="dropdown-item" href="<?= url('referrals') ?>"><i class="fa fa-fw fa-sm fa-wallet mr-1"></i> <?= language()->referrals->menu ?></a>
                        <?php endif ?>
                    <?php endif ?>

                    <a class="dropdown-item" href="<?= url('account-api') ?>"><i class="fa fa-fw fa-sm fa-code mr-1"></i> <?= language()->account_api->menu ?></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= url('logout') ?>"><i class="fa fa-fw fa-sm fa-sign-out-alt mr-1"></i> <?= language()->global->menu->logout ?></a>
                </div>
            </li>
            </li>

        <?php else : ?>
            <li class="nav-link inline-block">
                <a href="#About" style="text-decoration: none;">
                    <div class="nav-link-text">About</div>

                </a>
            </li>
            <li class="nav-link inline-block">
                <a href="#DarkMode" style="text-decoration: none;">
                    <div class="nav-link-text">Night</div>
                </a>
            </li>
            <li class="nav-link inline-block">
                <a href="#FeatureList" style="text-decoration: none;">
                    <div class="nav-link-text">Feature</div>
                </a>
            </li>
            <li class="nav-link inline-block">
                <div class="dropdown show mr-4 animated" data-animation="fadeInDown" data-animation-delay="1.7s">
                    <a class="dropdown-toggle" href="#" role="button" id="language" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> English</a>

                    <div class="dropdown-menu" aria-labelledby="language">

                        <a class="dropdown-item" onclick="doGTranslate('en|en');document.querySelector('#language').textContent='English'" href="#"><span class="flag-icon flag-icon-us"> </span> English</a>
                        <a class="dropdown-item" onclick="doGTranslate('en|vi');document.querySelector('#language').textContent='Vietnamese'" href="#"><span class="flag-icon flag-icon-vn"> </span> Vietnamese</a>

                    </div>
                    <div id="google_translate_element2"></div>
                </div>
            </li>
            <div class="btn1">
                <li style="list-style: none; padding: 15px 3px;">
                    <a href="<?= url('login') ?>" class="button"><strong>Login</strong></a>
                </li>

                <?php if (settings()->register_is_enabled) : ?>
                    <li style="list-style: none; padding: 15px 3px;">
                        <a href="<?= url('register') ?>" class="button"><strong>Register</strong></a>
                    </li>
            </div>


        <?php endif ?>

    <?php endif ?>
    </li>
    </li>
        </nav>
    </div>

    <div class="menu-button w-nav-button"><img src="https://assets.website-files.com/604b35876a71cbbd84768e36/604b35876a71cb400b768e66_menu-icon-white.svg" loading="lazy" alt="" /></div>
</div>