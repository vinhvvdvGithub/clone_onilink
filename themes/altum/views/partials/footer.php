<?php defined('ALTUMCODE') || die() ?>

<div class="footer-main">
    <div class="container w-container">
        <div class="footer-social-media-container">
            <div class="social-media-content">
            

            </div>
        </div>
        <div class="footer-flex-container">
            <div class="footer-brand-content">
                <a href="/" data-w-id="9a452d70-0c5d-8400-4e47-0636058de353" aria-current="page" class="footer-logo-link w-inline-block w--current"><img src="https://assets.website-files.com/604b35876a71cbbd84768e36/604df1a12bdd860f83172820_Bold-Logo-Grey.svg" alt="" class="footer-image" /></a>
                <ul role="list" class="footer-list w-list-unstyled">

                    <?php foreach($data->pages as $data): ?>
                        <li class="footer-list-item">
                            <a href="<?= $data->url ?>"  target="<?= $data->target ?>" class="link w-inline-block">
                                <div><?= $data->title ?></div>
                                <div class="link-underline"></div>
                            </a>
                        </li>
                    <?php endforeach ?>    

                  
                    <li class="footer-list-item">
                        <a href="info@onicorn.vn" class="link w-inline-block">
                            <div>info@onicorn.vn</div>
                           
                        </a>
                    </li>
            </div>

           

            <div class="social-media-content">
                    <div class="w-inline-block">
                            
                        <div class="mb-2">
                            <?php foreach(require APP_PATH . 'includes/admin_socials.php' as $key => $value): ?>

                                <?php if(isset(settings()->socials->{$key}) && !empty(settings()->socials->{$key})): ?>
                                    <span class="mr-2">
                                        <a target="_blank" href="<?= sprintf($value['format'], settings()->socials->{$key}) ?>" title="<?= $value['name'] ?>" class="no-underline">
                                            <i class="<?= $value['icon'] ?> fa-fw fa-lg"></i>
                                        </a>
                                    </span>
                                <?php endif ?>

                            <?php endforeach ?>
                        </div>

                    </div>

                   
            </div>
        </div>
         <div class="center" >
                <li>
                    Copyright ©<a href="https://onicorn.vn">Onicorn</a>
                </li>
            </div>
    </div>
</div>
