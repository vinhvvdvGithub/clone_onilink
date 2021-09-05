<?php defined('ALTUMCODE') || die() ?>

<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<body data-topbar="colored" data-layout="horizontal">


    <!-- Begin page -->
    <div class="container-bg">
        <div id="layout-wrapper">


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="container-fluid">

                    <?= \Altum\Alerts::output_alerts() ?>

                    <?= $this->views['content'] ?>
                </div>
            </div>
        </div>
    </div>
    


    <?php ob_start() ?>
    <!-- JAVASCRIPT -->
  

    <script src="<?= ASSETS_FULL_URL . 'libs/bootstrap/js/bootstrap.bundle.min.js;' ?>"></script>
    <script src="<?= ASSETS_FULL_URL . 'libs/metismenu/metisMenu.min.js' ?>"></script>
    <script src="<?= ASSETS_FULL_URL . 'libs/simplebar/simplebar.min.js' ?>"></script>
    <script src="<?= ASSETS_FULL_URL . 'libs/node-waves/waves.min.js' ?>"></script>
    <script src="<?= ASSETS_FULL_URL . 'libs/jquery-sparkline/jquery.sparkline.min.js' ?>"></script>

    <!-- Peity JS -->
    <script src="<?= ASSETS_FULL_URL . 'libs/peity/jquery.peity.min.js' ?>"></script>

    <script src="<?= ASSETS_FULL_URL . 'libs/morris.js/morris.min.js' ?>"></script>

    <script src="<?= ASSETS_FULL_URL . 'libs/raphael/raphael.min.js' ?>"></script>

    <!-- Dashboard init JS -->
    <script src="<?= ASSETS_FULL_URL . 'js/pages/dashboard.init.js' ?>"></script>

    <!-- App js -->
    <script src="<?= ASSETS_FULL_URL . 'js/app.js' ?>"></script>
    <?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>