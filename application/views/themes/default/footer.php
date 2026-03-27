<?php if ($this->authority->check_right('manage-all')) { ?>
    <div class="footer z-index-1002">
        <div id="admin-nav" class="uk-visible-large">
            <?php $this->load->view('themes/' . $this->selected_theme . '/admin/admin-menu'); ?>
        </div>
    </div>
<?php } ?>
<br />
<hr />
<div class="uk-grid">
    <div class="uk-width-1-1 uk-text-center uk-text-bold uk-link-muted">
        <p>
            <a href="<?php echo base_url('HowItWorks/index') ?>">How It Works</a>
            <a class="uk-margin-left" href="#about-us" data-uk-modal>About Us</a>
            <a class="uk-margin-left" href="#contact" data-uk-modal>Contact</a>`
            <a class="uk-margin-left" href="<?php echo base_url('Terms/index') ?>">Terms & Conditions</a>`
        </p>
        <p>
            <a href="<?php echo base_url() ?>">
                <img width="150" height="34" src="<?php echo $this->option->get('site-logo') ?>" alt="<?php echo $this->option->get('website-name') ?>" />
            </a>
        </p>
        <p class="uk-text-muted">
            © 2015
        </p>
    </div>
</div>
<div id="How-It-Works" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="#" class="uk-modal-close uk-close"></a>
        <?php echo $this->option->get('how-it-works') ?>
    </div>
</div>
<div id="about-us" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="#" class="uk-modal-close uk-close"></a>
        <?php echo $this->option->get('about') ?>
    </div>
</div>
<div id="contact" class="uk-modal">
    <div class="uk-modal-dialog">
        <a href="#" class="uk-modal-close uk-close"></a>
        <?php echo $this->option->get('contact') ?>
    </div>
</div>
</div>
</body>

</html>