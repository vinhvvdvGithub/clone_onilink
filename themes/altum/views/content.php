<?php defined('ALTUMCODE') || die() ?>

<style>
    /* Dashboard CSS */
    iframe {
        overflow: hidden;
    }

    .images-view-frame-container {
        overflow: hidden;
        width: 200px;
        height: 400px;
        border-radius: 3rem;
        position: relative;
        border: 5px solid black;
        box-shadow: 10px 15px 10px black;
    }

    .images-view-frame {
        width: 100%;
        height: 100%;
        border: 0;
        margin: 0;
        padding: 0;
    }

    .btn-a {
        bottom: 30%;
        left: 5%;
    }

    .btn-b {
        bottom: 30%;
        right: 5%;
    }

    .btn-link {
        position: absolute;
        z-index: 100;
        border-radius: 20px;
        padding: 8px 16px;
        background: linear-gradient(45deg, orangered, orange, orangered);
        color: white;
        transition: all 0.5s;
        transform: translateY(50px);
        opacity: 0;
        font-size: 13px;
    }

    .btn-link:hover {
        text-decoration: none !important;
        color: white !important;
        background: linear-gradient(45deg, orange, orangered, orange);
    }

    .main-box {
        position: relative;
        width: 200px;
        height: 400px;
        border-radius: 3rem;
        margin: 20px 0;
    }

    .img-box:hover .btn-link {
        opacity: 1;
        transform: translateY(0);
    }

    .box-controll {
        max-height: 110vh;
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .box-controll::-webkit-scrollbar {
        width: 6px;
        background-color: #f5f5f5;
    }

    .box-controll::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, orangered, orange, orangered);
        transition: all 0.7s;
    }

    /* nav-bar */
    .kho-giao-dien {
        position: relative;
        bottom: 50px;
        text-align: center;
        text-transform: uppercase;
        font-size: 5em;
        color: aqua;
    }



    /* tile kho giao dien */

    .title-comm {
        color: #fff;
        font-size: 30px;
        position: relative;
        margin-top: 50px;
        margin-bottom: 30px;
        font-weight: 700;
        background-color: #fff;
        text-align: center;
        font-family: sans-serif;
    }

    h1.title-comm:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        margin-top: 0;
        border-top: 2px solid #fa5853;
        z-index: 1;
        display: block;
    }

    .title-comm .title-holder {
        min-width: 50px;
        height: 45px;
        background-color: #fa5853;
        height: auto;
        line-height: 45px;
        padding: 0px 20px;
        position: relative;
        z-index: 2;
        text-align: center;
        display: inline-block;
        min-width: 80px;
    }

    .title-holder:before {
        content: "";
        position: absolute;
        right: -15px;
        border-width: 0px;
        bottom: 0px;
        border-style: solid;
        border-color: #5c9efe transparent;
        display: block;
        width: 0;
        height: 0;
        border-top: 23px solid transparent;
        border-bottom: 22px solid transparent;
        border-left: 15px solid #fa5853;
    }

    .title-holder:after {
        content: "";
        position: absolute;
        left: -15px;
        border-width: 0px;
        bottom: 0px;
        border-style: solid;
        border-color: #5c9efe transparent;
        display: block;
        width: 0;
        height: 0;
        border-top: 23px solid transparent;
        border-bottom: 22px solid transparent;
        border-right: 15px solid #fa5853;
    }

    /* button-project */
    .btn-project {
        border-radius: 50px;
        background: white;
        color: #f1734f;
        transition: all .2s linear;
        margin: 6px 12px;
        padding: 5px 10px;
        font-size: 16px;
        border: 1px solid #f1734f;
    }

    .btn-project:hover {
        background: #f1734f;
        color: white;
    }
</style>

<!-- <body data-layout="horizontal" data-topbar="colored"> -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<!-- start page title -->



<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="container-ct">
                <div class="page-title"></div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="container">

    <!-- Start page content-wrapper -->
    <div class="page-content-wrapper">
        <!-- Tên header của link -->
        <!-- <?= language()->links->header ?> -->


        <h1 class="title-comm"><span class="title-holder">KHO GIAO DIỆN</span></h1>
        <div class="col-md-8">
            <?php foreach ($data->projects as $project) : ?>
                <button id="btnProject" class="btn-project"><?= $project->name ?></button>
            <?php endforeach ?>

        </div>

        <?php if (count($data->links)) : ?>
            <div class="row">

                <div class="col-md-8">
                    <div class="box-controll">
                        <div class="row link-data">
                            <?php foreach ($data->links as $row) : ?>

                                <div class="col-md-4 img-box">
                                    <div class="main-box">
                                        <div class="images-view-frame-container">
                                            <iframe class="images-view-frame" scrolling="no" src="<?= url('l/link?link_id=' . $row->link_id . '&preview=' . md5($row->link_id)) ?>"></iframe>
                                        </div>
                                       <input type="hidden" value="<?= $this->user->user_id?>">
                                        <button id="btnUsing" class="btn-a btn-link">Sử dụng</button>
                                        <input type="hidden" value="<?= $row->link_id?>">
                                        <input type="hidden" value="<?= url('l/link?link_id=' . $row->link_id . '&preview=' . md5($row->link_id)) ?>">
                                        <button id="try_show" class="btn-b btn-link">Xem thử</button>
                                       
                                    </div>
                                </div>

                            <?php endforeach ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="biolink-preview-container">
                        <div class="biolink-preview">
                            <div class="biolink-preview-iframe-container">
                                <iframe id="biolink_preview_iframe" class="biolink-preview-iframe" src=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="mt-3"><?= $data->pagination ?></div>

        <?php else : ?>

            <div class="d-flex flex-column align-items-center justify-content-center mt-5">
                <img src="<?= ASSETS_FULL_URL . 'images/no_rows.svg' ?>" class="col-10 col-md-6 col-lg-4 mb-4" alt="<?= language()->links->no_data ?>" />
                <h2 class="h4 text-muted mb-4"><?= language()->links->no_data ?></h2>
            </div>

        <?php endif ?>
    </div>
    <!-- end page-content-wrapper-->
</div>
<!-- end main content-->


<!-- END layout-wrapper -->


<?php ob_start() ?>
<!-- Lib modalbox -->
<script src="<?= ASSETS_FULL_URL . 'js/sweetalert2.all.min.js' ?>"></script>

<script src="<?= ASSETS_FULL_URL . 'libs/jquery/jquery.min.js' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'libs/bootstrap/js/bootstrap.bundle.min.js;' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'libs/metismenu/metisMenu.min.js' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'libs/simplebar/simplebar.min.js' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'libs/node-waves/waves.min.js' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'libs/jquery-sparkline/jquery.sparkline.min.js' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'js/addLinkAjax.js' ?>"></script>


<!-- Peity JS -->
<script src="<?= ASSETS_FULL_URL . 'libs/peity/jquery.peity.min.js' ?>"></script>

<script src="<?= ASSETS_FULL_URL . 'libs/morris.js/morris.min.js' ?>"></script>

<script src="<?= ASSETS_FULL_URL . 'libs/raphael/raphael.min.js' ?>"></script>

<!-- Dashboard init JS -->
<script src="<?= ASSETS_FULL_URL . 'js/pages/dashboard.init.js' ?>"></script>

<!-- App js -->
<script src="<?= ASSETS_FULL_URL . 'js/app.js' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'js/searchAjax.js' ?>"></script>
<script>
    const try_show = document.querySelectorAll("#try_show");
    const biolink_preview_iframe = document.querySelector("#biolink_preview_iframe");

    try_show.forEach(e => {
        e.addEventListener("click", () => {
            biolink_preview_iframe.src = e.previousElementSibling.value

        });
    });

 const btnProject = document.querySelectorAll("#btnProject");
    const btnUsing = document.querySelectorAll("#btnUsing");
    
    btnProject.forEach(e => {
        e.addEventListener("click", () => {
            getResult(e.innerHTML);
        });
    });

    // btnUsing.forEach(e => {
    //     e.addEventListener("click", () => {
    //       addData(e.previousElementSibling.value, e.nextElementSibling.value);
    //     })
    // });

    btnUsing.forEach(e => {

    e.addEventListener("click", () => {
        const user_id = e.previousElementSibling.value;
        const id = e.nextElementSibling.value;
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Save`,
            denyButtonText: `Don't save`,
        }).then((result) => {
            
            if (result.isConfirmed) {
                addData(false, user_id, id);
                 
            } else if (result.isDenied) { 
                addData(true, user_id, id);
            }
        })

    });
});
</script>


<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>