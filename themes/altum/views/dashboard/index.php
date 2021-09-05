<?php defined('ALTUMCODE') || die() ?>

<!-- App favicon -->
<link rel="shortcut icon" href="<?= ASSETS_FULL_URL ?>images/favicon.ico">
<!-- Icons Css -->
<link href="<?= ASSETS_FULL_URL ?>css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?= ASSETS_FULL_URL ?>css/mainCSS.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?= ASSETS_FULL_URL ?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

<style>
    .kho-giao-dien {
        position: relative;
        bottom: 50px;
        text-align: center;
        text-transform: uppercase;
        font-size: 5em;
        color: aqua;
    }


</style>

<body data-topbar="colored" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title"></div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Start page content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 ">
                            <div class="card bg-primary mini-stat position-relative">
                                <div class="card-body">
                                    <div class="mini-stat-desc">
                                        <h5 class="text-uppercase verti-label font-size-16  text-white-50">
                                        </h5>
                                        <div class="text-white">
                                            <h5 class="text-uppercase font-size-16 text-white-50">Total domainl</h5>
                                            <div class="card-title h4 m-0">
                                                <h4 style="color: white;"><?= nr($data->domains_total) ?></h4>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <i class="fa fa-fw fa-globe fa-lg"></i>
                                                <span class=""><?= language()->dashboard->header->domains ?></span>
                                            </div>
                                        </div>
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-cube-outline display-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary mini-stat position-relative">
                                <div class="card-body">
                                    <div class="mini-stat-desc">
                                        <h5 class="text-uppercase font-size-16 verti-label text-white-50">
                                        </h5>
                                        <div class="text-white">
                                            <h5 class="text-uppercase font-size-16 text-white-50">Total projects</h5>
                                            <div class="card-title h4 m-0">
                                                <h4 style="color: white;"><?= nr($data->projects_total) ?></h4>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <i class="fa fa-fw fa-project-diagram fa-lg"></i>
                                                <span class=""><?= language()->dashboard->header->projects ?></span>
                                            </div>
                                        </div>
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-buffer display-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary mini-stat position-relative">
                                <div class="card-body">
                                    <div class="mini-stat-desc">
                                        <h5 class="text-uppercase font-size-16 verti-label text-white-50">
                                        </h5>
                                        <div class="text-white">
                                            <h5 class="text-uppercase font-size-16 text-white-50">Total links
                                            </h5>
                                            <div class="card-title h4 m-0">
                                                <h4 style="color: white;"><?= nr($data->links_total) ?></h4>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <i class="fa fa-fw fa-link fa-lg"></i>
                                                <span class=""><?= language()->dashboard->header->links ?></span>
                                            </div>
                                        </div>
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-tag-text-outline display-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary mini-stat position-relative">
                                <div class="card-body">
                                    <div class="mini-stat-desc">
                                        <h5 class="text-uppercase verti-label font-size-16 text-white-50">
                                        </h5>
                                        <div class="text-white">
                                            <h5 class="text-uppercase font-size-16 text-white-50">Total clicks
                                            </h5>
                                            <div class="card-title h4 m-0">
                                                <h4 style="color: white;"><?= nr($data->links_clicks_total) ?></h4>
                                            </div>

                                            <!-- <div class=" p-3 d-flex align-items-center justify-content-between">
                                                <i class="fa fa-fw fa-chart-bar fa-lg"></i>
                                                <span class="text-muted"><?= language()->dashboard->header->clicks ?></span>
                                            </div> -->
                                            <div class=" p-2 bd-highlight">
                                                <i class="fa fa-fw fa-chart-bar fa-lg"></i>
                                                <span class=""><?= language()->dashboard->header->clicks ?></span>
                                            </div>
                                        </div>
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-briefcase-check display-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                    <?= \Altum\Alerts::output_alerts() ?>

                    <div class="row justify-content-between">
                        <?php if (settings()->links->domains_is_enabled) : ?>
                            <!-- <div class="col-12 col-lg mb-3 mb-xl-0">
                                    <div class="card h-100">
                                        <div class="card-body d-flex">
                                            <div>
                                                <div class="card border-0 bg-primary-100 text-primary-600 mr-3">
                                                   
                                                </div>
                                            </div>

                                            <div>
                                                <div class="card-title h4 m-0"><?= nr($data->domains_total) ?></div>
                                                
                                            </div>  
                                        </div>
                                    </div>
                                </div> 
                            <?php endif ?>

                            <div class="col-12 col-lg mb-3 mb-xl-0">
                                <div class="card h-100">
                                    <div class="card-body d-flex">

                                        <div>
                                            <div class="card border-0 bg-primary-100 text-primary-600 mr-3">
                                                
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="card-title h4 m-0"><?= nr($data->projects_total) ?></div>
                                           
                                    </div>
                                </div>
                            </div> 

                            <div class="col-12 col-lg mb-3 mb-xl-0">
                                <div class="card h-100">
                                    <div class="card-body d-flex">

                                        <div>
                                            <div class="card border-0 bg-primary-100 text-primary-600 mr-3">
                                               
                                            </div>
                                        </div>

                                        <div>
                                            <div class="card-title h4 m-0"><?= nr($data->links_total) ?></div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-12 col-lg mb-3 mb-xl-0">
                                <div class="card h-100">
                                    <div class="card-body d-flex">

                                        <div>
                                            <div class="card border-0 bg-primary-100 text-primary-600 mr-3">
                                                
                                            </div>
                                        </div>

                                        <div>
                                            <div class="card-title h4 m-0"><?= nr($data->links_clicks_total) ?></div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                    </div>

                    <?php if ($data->links_chart) : ?>
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="clicks_chart"></canvas>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>



                    <!-- Links library -->

                    <section class="container-links">
                        <?= \Altum\Alerts::output_alerts() ?>

                        <?= $this->views['links_content'] ?>

                    </section>
                    <!--    END Links library -->

                </div>
                <!-- end page-content-wrapper-->

            </div>
            <!-- Container-fluid -->

            <!-- End Page-content -->



        </div>
        <!-- end main content-->


        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.png" class="img-fluid img-thumbnail" alt="">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.png" class="img-fluid img-thumbnail" alt="">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                </div>

            </div>
            <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>



        <!-- App js -->
        <script src="<?= ASSETS_FULL_URL ?>js/app.js"></script>

</body>

<?php ob_start() ?>
<!-- JAVASCRIPT -->
<script src="<?= ASSETS_FULL_URL ?>libs/jquery/jquery.min.js"></script>
<script src="<?= ASSETS_FULL_URL ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS_FULL_URL ?>libs/metismenu/metisMenu.min.js"></script>
<script src="<?= ASSETS_FULL_URL ?>libs/simplebar/simplebar.min.js"></script>
<script src="<?= ASSETS_FULL_URL ?>libs/node-waves/waves.min.js"></script>
<script src="<?= ASSETS_FULL_URL ?>libs/jquery-sparkline/jquery.sparkline.min.js"></script>


<!-- Peity JS -->
<script src="<?= ASSETS_FULL_URL ?>libs/peity/jquery.peity.min.js"></script>

<script src="<?= ASSETS_FULL_URL ?>libs/morris.js/morris.min.js"></script>
<script src="<?= ASSETS_FULL_URL ?>libs/raphael/raphael.min.js"></script>

<script src="<?= ASSETS_FULL_URL ?>js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?= ASSETS_FULL_URL ?>js/app.js"></script>

<script src="<?= ASSETS_FULL_URL . 'js/libraries/Chart.bundle.min.js' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'js/chartjs_defaults.js' ?>"></script>


<script>
    if (document.getElementById('clicks_chart')) {
        let clicks_chart = document.getElementById('clicks_chart').getContext('2d');

        let gradient = clicks_chart.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, 'rgba(56, 178, 172, 0.6)');
        gradient.addColorStop(1, 'rgba(56, 178, 172, 0.05)');

        let gradient_white = clicks_chart.createLinearGradient(0, 0, 0, 250);
        gradient_white.addColorStop(0, 'rgba(56,62,178,0.6)');
        gradient_white.addColorStop(1, 'rgba(56, 62, 178, 0.05)');

        new Chart(clicks_chart, {
            type: 'line',
            data: {
                labels: <?= $data->links_chart['labels'] ?? '[]' ?>,
                datasets: [{
                        label: <?= json_encode(language()->link->statistics->pageviews) ?>,
                        data: <?= $data->links_chart['pageviews'] ?? '[]' ?>,
                        backgroundColor: gradient,
                        borderColor: '#38B2AC',
                        fill: true
                    },
                    {
                        label: <?= json_encode(language()->link->statistics->visitors) ?>,
                        data: <?= $data->links_chart['visitors'] ?? '[]' ?>,
                        backgroundColor: gradient_white,
                        borderColor: '#383eb2',
                        fill: true
                    }
                ]
            },
            options: chart_options
        });
    }
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>