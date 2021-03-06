<?php defined('ALTUMCODE') || die() ?>

<div class="d-flex justify-content-between mb-4">
    <h1 class="h3 mr-3"><i class="fa fa-fw fa-xs fa-box-open text-primary-900 mr-2"></i> <?= language()->admin_plan_create->header ?></h1>
</div>

<?= \Altum\Alerts::output_alerts() ?>

<div class="card">
    <div class="card-body">

        <form action="" method="post" role="form">
            <input type="hidden" name="token" value="<?= \Altum\Middlewares\Csrf::get() ?>" />

            <div class="row">
                <div class="col-12 col-md-4">
                    <h2 class="h4"><?= language()->admin_plans->main->header ?></h2>
                    <p class="text-muted"><?= language()->admin_plans->main->subheader ?></p>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="name"><?= language()->admin_plans->main->name ?></label>
                        <input type="text" id="name" name="name" class="form-control form-control-lg" />
                    </div>

                    <div class="form-group">
                        <label for="status"><?= language()->admin_plans->main->status ?></label>
                        <select id="status" name="status" class="form-control form-control-lg">
                            <option value="1"><?= language()->global->active ?></option>
                            <option value="0"><?= language()->global->disabled ?></option>
                            <option value="2"><?= language()->global->hidden ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="order"><?= language()->admin_plans->main->order ?></label>
                        <input type="number" min="0" id="order" name="order" class="form-control form-control-lg" value="" />
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-xl-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="monthly_price"><?= language()->admin_plans->main->monthly_price ?> <small class="form-text text-muted"><?= settings()->payment->currency ?></small></label>
                                    <input type="text" id="monthly_price" name="monthly_price" class="form-control form-control-lg" />
                                    <small class="form-text text-muted"><?= sprintf(language()->admin_plans->main->price_help, language()->admin_plans->main->monthly_price) ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-4">
                            <div class="form-group">
                                <label for="annual_price"><?= language()->admin_plans->main->annual_price ?> <small class="form-text text-muted"><?= settings()->payment->currency ?></small></label>
                                <input type="text" id="annual_price" name="annual_price" class="form-control form-control-lg" />
                                <small class="form-text text-muted"><?= sprintf(language()->admin_plans->main->price_help, language()->admin_plans->main->annual_price) ?></small>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-4">
                            <div class="form-group">
                                <label for="lifetime_price"><?= language()->admin_plans->main->lifetime_price ?> <small class="form-text text-muted"><?= settings()->payment->currency ?></small></label>
                                <input type="text" id="lifetime_price" name="lifetime_price" class="form-control form-control-lg" />
                                <small class="form-text text-muted"><?= sprintf(language()->admin_plans->main->price_help, language()->admin_plans->main->lifetime_price) ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <span><?= language()->admin_plans->main->taxes_ids ?></span>
                        <div><small class="form-text text-muted"><?= sprintf(language()->admin_plans->main->taxes_ids_help, '<a href="' . url('admin/taxes') .'">', '</a>') ?></small></div>
                    </div>

                    <?php if($data->taxes): ?>
                        <div class="row">
                            <?php foreach($data->taxes as $row): ?>
                                <div class="col-12 col-xl-6">
                                    <div class="custom-control custom-switch my-3">
                                        <input id="<?= 'tax_id_' . $row->tax_id ?>" name="taxes_ids[<?= $row->tax_id ?>]" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="<?= 'tax_id_' . $row->tax_id ?>"><?= $row->internal_name ?></label>
                                        <div><span><small><?= $row->name ?></small> - <small class="text-muted"><?= $row->description ?></small></span></div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                </div>
            </div>

            <div class="mt-5"></div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <h2 class="h4"><?= language()->admin_plans->plan->header ?></h2>
                    <p class="text-muted"><?= language()->admin_plans->plan->subheader ?></p>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="projects_limit"><?= language()->admin_plans->plan->projects_limit ?></label>
                        <input type="number" id="projects_limit" name="projects_limit" min="-1" class="form-control form-control-lg" value="0" required="required" />
                        <small class="form-text text-muted"><?= language()->admin_plans->plan->projects_limit_help ?></small>
                    </div>

                    <div class="form-group">
                        <label for="pixels_limit"><?= language()->admin_plans->plan->pixels_limit ?></label>
                        <input type="number" id="pixels_limit" name="pixels_limit" min="-1" class="form-control form-control-lg" value="0" required="required" />
                        <small class="form-text text-muted"><?= language()->admin_plans->plan->pixels_limit_help ?></small>
                    </div>

                    <div class="form-group">
                        <label for="biolinks_limit"><?= language()->admin_plans->plan->biolinks_limit ?></label>
                        <input type="number" id="biolinks_limit" name="biolinks_limit" min="-1" class="form-control form-control-lg" value="0" required="required" />
                        <small class="form-text text-muted"><?= language()->admin_plans->plan->biolinks_limit_help ?></small>
                    </div>

                    <div class="form-group" <?= !settings()->links->shortener_is_enabled ? 'style="display: none"' : null ?>>
                        <label for="links_limit"><?= language()->admin_plans->plan->links_limit ?></label>
                        <input type="number" id="links_limit" name="links_limit" min="-1" class="form-control form-control-lg" value="0" />
                        <small class="form-text text-muted"><?= language()->admin_plans->plan->links_limit_help ?></small>
                    </div>

                    <div class="form-group" <?= !settings()->links->domains_is_enabled ? 'style="display: none"' : null ?>>
                        <label for="domains_limit"><?= language()->admin_plans->plan->domains_limit ?></label>
                        <input type="number" id="domains_limit" name="domains_limit" min="-1" class="form-control form-control-lg" value="0" />
                        <small class="form-text text-muted"><?= language()->admin_plans->plan->domains_limit_help ?></small>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="additional_global_domains" name="additional_global_domains" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="additional_global_domains"><?= language()->admin_plans->plan->additional_global_domains ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->additional_global_domains_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="custom_url" name="custom_url" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="custom_url"><?= language()->admin_plans->plan->custom_url ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->custom_url_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="deep_links" name="deep_links" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="deep_links"><?= language()->admin_plans->plan->deep_links ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->deep_links_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="no_ads" name="no_ads" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="no_ads"><?= language()->admin_plans->plan->no_ads ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->no_ads_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="removable_branding" name="removable_branding" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="removable_branding"><?= language()->admin_plans->plan->removable_branding ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->removable_branding_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="custom_branding" name="custom_branding" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="custom_branding"><?= language()->admin_plans->plan->custom_branding ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->custom_branding_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="custom_colored_links" name="custom_colored_links" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="custom_colored_links"><?= language()->admin_plans->plan->custom_colored_links ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->custom_colored_links_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="statistics" name="statistics" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="statistics"><?= language()->admin_plans->plan->statistics ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->statistics_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="custom_backgrounds" name="custom_backgrounds" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="custom_backgrounds"><?= language()->admin_plans->plan->custom_backgrounds ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->custom_backgrounds_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="verified" name="verified" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="verified"><?= language()->admin_plans->plan->verified ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->verified_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="temporary_url_is_enabled" name="temporary_url_is_enabled" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="temporary_url_is_enabled"><?= language()->admin_plans->plan->temporary_url_is_enabled ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->temporary_url_is_enabled_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="seo" name="seo" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="seo"><?= language()->admin_plans->plan->seo ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->seo_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="utm" name="utm" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="utm"><?= language()->admin_plans->plan->utm ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->utm_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="socials" name="socials" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="socials"><?= language()->admin_plans->plan->socials ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->socials_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="fonts" name="fonts" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="fonts"><?= language()->admin_plans->plan->fonts ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->fonts_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="password" name="password" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="password"><?= language()->admin_plans->plan->password ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->password_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="sensitive_content" name="sensitive_content" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="sensitive_content"><?= language()->admin_plans->plan->sensitive_content ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->sensitive_content_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="leap_link" name="leap_link" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="leap_link"><?= language()->admin_plans->plan->leap_link ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->leap_link_help ?></small></div>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input id="api_is_enabled" name="api_is_enabled" type="checkbox" class="custom-control-input">
                        <label class="custom-control-label" for="api_is_enabled"><?= language()->admin_plans->plan->api_is_enabled ?></label>
                        <div><small class="form-text text-muted"><?= language()->admin_plans->plan->api_is_enabled_help ?></small></div>
                    </div>

                    <h3 class="h5 mt-4"><?= language()->admin_plans->plan->enabled_biolink_blocks ?></h3>
                    <p class="text-muted"><?= language()->admin_plans->plan->enabled_biolink_blocks_help ?></p>

                    <div class="row">
                        <?php foreach(require APP_PATH . 'includes/biolink_blocks.php' as $biolink_block): ?>
                            <div class="col-6 mb-3">
                                <div class="custom-control custom-switch">
                                    <input id="enabled_biolink_blocks_<?= $biolink_block ?>" name="enabled_biolink_blocks[]" value="<?= $biolink_block ?>" type="checkbox" class="custom-control-input">
                                    <label class="custom-control-label" for="enabled_biolink_blocks_<?= $biolink_block ?>"><?= language()->link->biolink->{mb_strtolower($biolink_block)}->name ?></label>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4"></div>

                <div class="col">
                    <button type="submit" name="submit" class="btn btn-lg btn-block btn-primary mt-4"><?= language()->global->create ?></button>
                </div>
            </div>
        </form>

    </div>
</div>

