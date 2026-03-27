<div class="uk-margin-top uk-panel-box uk-panel-box-secondary">
    <div class="">
        <h3><i class="uk-icon-cog"></i> Website setting</h3>
        <hr class="uk-article-divider">
        <?php
        $attributes = array(
            'class' => 'uk-form uk-form-stacked',
            'method' => 'post'
        );
        echo form_open_multipart('', $attributes) ?>
        <div class="uk-form-row uk-margin-top uk-panel-box uk-text-center">
            <button class="uk-button uk-width-1-1 uk-button-large uk-button-success"><span class="uk-h3">Save</span>
                <i class="uk-icon-save"></i></button>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="website-name">Scheme type</label>

            <div class="uk-form-controls">
                <select name="uk-theme" class="uk-width-1-1">
                    <option value="uikit.min.css" <?php echo ($this->option->get('uk-theme') == 'uikit.min.css') ? 'selected="true"' : '' ?>>
                        Default
                    </option>
                    <option value="uikit.almost-flat.min.css" <?php echo ($this->option->get('uk-theme') == 'uikit.almost-flat.min.css') ? 'selected="true"' : '' ?>>
                        Flat
                    </option>
                    <option value="uikit-dark.min.css" <?php echo ($this->option->get('uk-theme') == 'uikit-dark.min.css') ? 'selected="true"' : '' ?>>
                        Dark
                    </option>
                    <option value="uikit.gradient.min.css" <?php echo ($this->option->get('uk-theme') == 'uikit.gradient.min.css') ? 'selected="true"' : '' ?>>
                        Gradient
                    </option>
                </select>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box uk-panel-box-secondary">
            <h3 class="uk-text-success">
                Points Setting
            </h3>
            <hr />
            <div class="uk-grid">
                <div class="uk-form-controls uk-width-1-2">
                    <label class="uk-form-label" for="register-points">
                        Register Points ( + )
                    </label>
                    <input type="text" placeholder="Register Points" name="register-points" id="register-points" value="<?php echo set_value(
                                                                                                                            'register-points',
                                                                                                                            $this->option->get('register-points')
                                                                                                                        ) ?>" />
                </div>
                <div class="uk-form-controls uk-width-1-2">
                    <label class="uk-form-label" for="login-points">
                        Login Points( + )
                    </label>
                    <input type="text" placeholder="Login Points" name="login-points" id="login-points" value="<?php echo set_value(
                                                                                                                    'login-points',
                                                                                                                    $this->option->get('login-points')
                                                                                                                ) ?>" />
                </div>
                <div class="uk-form-controls uk-width-1-2">
                    <label class="uk-form-label" for="add-new-article-points">
                        Add New Video Points ( - )
                    </label>
                    <input type="text" placeholder="add new article points" name="add-new-article-points" id="add-new-article-points" value="<?php echo set_value(
                                                                                                                                                    'add-new-article-points',
                                                                                                                                                    $this->option->get('add-new-article-points')
                                                                                                                                                ) ?>" />
                </div>
                <div class="uk-form-controls uk-width-1-2">
                    <label class="uk-form-label" for="earned-views-points">
                        Views Points ( + )
                    </label>
                    <input type="text" placeholder="earned views points" name="earned-views-points" id="earned-views-points" value="<?php echo set_value(
                                                                                                                                        'earned-views-points',
                                                                                                                                        $this->option->get('earned-views-points')
                                                                                                                                    ) ?>" />
                </div>
            </div>
        </div>

        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-form-label">Logo: <span class="uk-text-muted uk-text-small"> recommended (~154x52)</span></label>
            <?php if ($this->option->get('site-logo')) { ?>
                <img src="<?php echo $this->option->get('site-logo') ?>" class="width-20" />
            <?php } ?><br /><br />
            <label class="uk-form-label"><i class="uk-icon-image uk-icon-large"></i></label>
            <input type="file" name="site-logo" />
            <?php if ($site_logo_msg) { ?>
                <span class="uk-alert-danger"><?php echo $site_logo_msg ?></span>
            <?php } ?>
        </div>

        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-form-label"> Favicon:</label>
            <?php if ($this->option->get('favicon')) { ?>
                <img class="favicon" src="<?php echo $this->option->get('favicon') ?>" />
            <?php } ?><br /><br />

            <label class="uk-form-label"><i class="uk-icon-image uk-icon-small"></i></label>
            <input type="file" name="favicon" />
            <?php if ($favicon_msg) { ?>
                <span class="uk-alert-danger"><?php echo $favicon_msg ?></span>
            <?php } ?>
        </div>
        <br />

        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="website-name">Website name</label>

            <div class="uk-form-controls">
                <input class="uk-width-100 uk-form-large" type="text" placeholder="Website name" name="website-name" id="website-name" value="<?php echo set_value(
                                                                                                                                                    'website-name',
                                                                                                                                                    $this->option->get('website-name')
                                                                                                                                                ) ?>" />
                <?php echo form_error('website-name') ?>
            </div>
        </div>
        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-text-bold" for="website-email">Contact E-mail</label>
            <input class="uk-form-large uk-width-1-1" name="website-email" id="website-email" value="<?php echo option_get('website-email') ?>" />
            <?php echo form_error('website-email') ?>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="description">Website description</label>

            <div class="uk-form-controls">
                <textarea name='description' id='description' class="uk-width-100 uk-form-large uk-margin-bottom" placeholder="description..."><?php echo set_value(
                                                                                                                                                    'description',
                                                                                                                                                    $this->option->get('description')
                                                                                                                                                ) ?></textarea>
                <?php echo form_error('description') ?>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="keywords">Keywords</label>

            <div class="uk-form-controls">
                <textarea name='keywords' id='keywords' class="uk-width-100 uk-form-large uk-margin-bottom" placeholder="keywords for search engines"><?php echo set_value(
                                                                                                                                                            'keywords',
                                                                                                                                                            $this->option->get('keywords')
                                                                                                                                                        ) ?></textarea>
                <?php echo form_error('keywords') ?>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="title">Default page title</label>

            <div class="uk-form-controls">
                <input class="uk-width-100 uk-form-large" type="text" placeholder="title" name="title" value="<?php echo set_value('title', $this->option->get('title')) ?>" />
                <?php echo form_error('title') ?>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="ads-header">Header advertisement (~900x100px) you can add
                html below:</label>

            <div class="uk-form-controls">
                <textarea name='ads-header' id='ads-header' class="uk-width-100 uk-form-large uk-margin-bottom" placeholder="Html code"><?php echo set_value(
                                                                                                                                            'ads-header',
                                                                                                                                            $this->option->get('ads-header')
                                                                                                                                        ) ?></textarea>
                <?php echo form_error('ads-header') ?>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="ads-footer">Content advertisement (~700x100px) you can add
                html below:</label>

            <div class="uk-form-controls">
                <textarea name='ads-article' id='ads-article' class="uk-width-100 uk-form-large uk-margin-bottom" placeholder="Html code"><?php echo set_value(
                                                                                                                                                'ads-article',
                                                                                                                                                $this->option->get('ads-article')
                                                                                                                                            ) ?></textarea>
                <?php echo form_error('ads-article') ?>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="about">About page (HTML):</label>

            <div class="uk-form-controls">
                <textarea name='about' id='about' class="uk-width-100 uk-form-large uk-margin-bottom" placeholder="Html code"><?php echo set_value(
                                                                                                                                    'about',
                                                                                                                                    $this->option->get('about')
                                                                                                                                ) ?></textarea>
                <?php echo form_error('about') ?>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="contact">Contact page (HTML):</label>

            <div class="uk-form-controls">
                <textarea name='contact' id='contact' class="uk-width-100 uk-form-large uk-margin-bottom" placeholder="Html code"><?php echo set_value(
                                                                                                                                        'contact',
                                                                                                                                        $this->option->get('contact')
                                                                                                                                    ) ?></textarea>
                <?php echo form_error('contact') ?>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-form-label" for="how-it-works">how it works page (HTML):</label>

            <div class="uk-form-controls">
                <textarea name='how-it-works' id='how-it-works' class="uk-width-100 uk-form-large uk-margin-bottom" placeholder="Html code"><?php echo set_value(
                                                                                                                                                'how-it-works',
                                                                                                                                                $this->option->get('how-it-works')
                                                                                                                                            ) ?></textarea>
                <?php echo form_error('how-it-works') ?>
            </div>
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-text-bold" for="auto-approve-article">Auto approve:</label>
            <input type="checkbox" name="auto-approve-article" id="auto-approve-article" value="1" <?php echo ($this->option->get('auto-approve-article') == '1') ? 'checked="true"' : '' ?> />
        </div>
        <div class="uk-form-row uk-panel-box">
            <label class="uk-text-bold" for="infront-article-message">In front Article title message</label>
            <input class="uk-width-100 uk-form-large" name="infront-article-message" id="infront-article-message" value="<?php echo $this->option->get('infront-article-message') ?>" />
        </div>
        <h3>Google Api: </h3>

        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="recapatcha-api-key">Google ReCaptcha Website Key: (
                <small><a title="Click here to get your google re captcha api key" href="https://www.google.com/recaptcha/intro/index.html" target="_blank">Google
                        RECAPTCHA</a></small>
                )</label>
            <input class="uk-width-80 uk-form-large" name="recapatcha-api-key" id="recapatcha-api-key" value="<?php echo option_get('recapatcha-api-key') ?>" />
        </div>

        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="google-login-state">Enable login via Google Account:</label>
            <input title="If you no longer wish to cache a file you can remove the caching tag via un check this and it will no longer be refreshed when it expires. Note: Un check cache will not delete the cache immediately. It will have to expire normally. If you need to remove it earlier you will need to manually delete it from your cache folder(application/cache)." type="checkbox" name="google-login-state" id="google-login-state" value="1" <?php echo ($this->option->get('google-login-state') == '1') ? 'checked="true"' : '' ?> />
        </div>
        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="google-api-key">Google Api Key:</label>
            <input class="uk-width-80 uk-form-large" name="google-api-key" id="google-api-key" value="<?php echo $this->option->get('google-api-key') ?>" />
        </div>
        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="google-client-id">Client id:</label>
            <input class="uk-width-100 uk-form-large" name="google-client-id" id="google-client-id" value="<?php echo $this->option->get('google-client-id') ?>" />
        </div>
        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="google-client-secret">Client secret:</label>
            <input class="uk-width-100 uk-form-large" name="google-client-secret" id="google-client-secret" value="<?php echo $this->option->get('google-client-secret') ?>" />
        </div>

        <h3>Facebook Api: </h3>

        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="facebook-login-state">Enable login via Facebook Account:</label>
            <input title="If you no longer wish to cache a file you can remove the caching tag via un check this and it will no longer be refreshed when it expires. Note: Un check cache will not delete the cache immediately. It will have to expire normally. If you need to remove it earlier you will need to manually delete it from your cache folder(application/cache)." type="checkbox" name="facebook-login-state" id="facebook-login-state" value="1" <?php echo (option_get('facebook-login-state') == '1') ? 'checked="true"' : '' ?> />
        </div>
        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="fb-appId">App ID:</label>
            <input class="uk-width-80 uk-form-large" name="fb-appId" id="fb-appId" value="<?php echo option_get('fb-appId') ?>" />
        </div>
        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="fb-secret">Secret:</label>
            <input class="uk-width-100 uk-form-large" name="fb-secret" id="fb-secret" value="<?php echo option_get('fb-secret') ?>" />
        </div>

        <h3><i class="uk-icon-paypal"></i> Paypal Settings</h3>

        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-text-bold" for="paypal-email">E-mail</label>
            <input class="uk-form-large uk-width-1-1" name="paypal-email" id="paypal-email" value="<?php echo option_get('paypal-email') ?>" />
            <?php echo form_error('paypal-email') ?>
        </div>
        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-text-bold" for="paypal-product-name">Product name</label>
            <input class="uk-form-large uk-width-1-1" name="paypal-product-name" id="paypal-product-name" value="<?php echo option_get('paypal-product-name') ?>" />
            <?php echo form_error('paypal-product-name') ?>
        </div>
        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-text-bold" for="paypal-amount">Amount</label>
            <input class="uk-form-large uk-width-1-1" name="paypal-amount" id="paypal-amount" value="<?php echo option_get('paypal-amount') ?>" />
            <?php echo form_error('paypal-amount') ?>
        </div>

        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-text-bold" for="paypal-currency">Default Currency</label>
            <input class="uk-form-large uk-width-1-1" name="paypal-currency" id="paypal-currency" value="<?php echo option_get('paypal-currency') ?>" />
            <?php echo form_error('paypal-currency') ?>
        </div>
        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-text-bold" for="paypal-price">Price</label>
            <input class="uk-form-large uk-width-1-1" name="paypal-price" id="paypal-price" value="<?php echo option_get('paypal-price') ?>" />
            <?php echo form_error('paypal-price') ?>
        </div>
        <div class="uk-form-controls uk-panel-box uk-margin-top">
            <label class="uk-text-bold" for="paypal-sand-box">enable sandbox (Just for test your
                application)</label>
            <input type="checkbox" name="paypal-sand-box" id="paypal-sand-box" value="1" <?php echo ($this->option->get('paypal-sand-box') == '1') ? 'checked="true"' : '' ?> />
            <?php echo form_error('paypal-sand-box') ?>
        </div>
        <h3>Website Performance: </h3>

        <div class="uk-form-row uk-panel-box-primary uk-panel-box">
            <label class="uk-text-bold" for="cache-state">Turn Cache On</label>
            <input title="If you no longer wish to cache a file you can remove the caching tag via un check this and it will no longer be refreshed when it expires. Note: Un check cache will not delete the cache immediately. It will have to expire normally. If you need to remove it earlier you will need to manually delete it from your cache folder(application/cache)." type="checkbox" name="cache-state" id="cache-state" value="1" <?php echo ($this->option->get('cache-state') == '1') ? 'checked="true"' : '' ?> />
            <br />
            <br />
            <label class="uk-text-bold" for="cache-period">Cache Period:</label>
            <input class="uk-width-1-6 uk-form-large" name="cache-period" id="cache-period" value="<?php echo $this->option->get('cache-period') ?>" />
        </div>
        <div class="uk-form-row uk-margin-top uk-panel-box  uk-text-center">
            <input type="hidden" name="submit_input" value="1" />
            <button class="uk-button uk-button-large uk-width-1-1 uk-button-success"><span class="uk-h3">Save</span>
                <i class="uk-icon-save"></i></button>

        </div>
        </form>
        <h3> Website Upgrade </h3>
        <hr />
        <?php
        $attributes = array(
            'class' => 'uk-form uk-form-stacked',
            'method' => 'post'
        );
        echo form_open_multipart('admin/upgrade', $attributes) ?>
        <div id="upgrade" class="uk-form-row uk-margin-top uk-panel-box uk-panel-box-primary">
            <input type="file" name="hdphp" class="uk-form-large uk-display-inline-block" />
            <button class="uk-button uk-button-large uk-button-primary">
                <span class="uk-h3">Upgrade</span>
                <i class="uk-icon-cloud-upload"></i>
            </button>
        </div>
        </form>
    </div>
</div>