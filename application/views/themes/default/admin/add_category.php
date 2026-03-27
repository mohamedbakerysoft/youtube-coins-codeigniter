<br/>
<div class="content">
    <div class="wrap uk-width-6-10">
        <div class="single-page uk-animation-fade">
            <div class="single-page-artical">
                <div class="artical-content">
                    <a href="<?php echo site_url('admin/categories') ?>" class="uk-button uk-button-large"><i
                            class="uk-icon-arrow-circle-left"></i> Go to Languages list</a>

                    <h2><i class="uk-icon-plus"></i> <?php echo $form_title ?> </h2>
                    <hr class="uk-article-divider">
                    <?php $this->load->view('user/template/default/flash_data') ?>
                    <?php
                    $attributes = array(
                        'class' => 'uk-form uk-form-stacked',
                        'method' => 'post'
                    );
                    echo form_open('admin/' . $form_action, $attributes) ?>
                    <div class="uk-form-controls">
                        <div class="uk-form-controls uk-margin-bottom">
                            <label class="uk-form-label"> Language name</label>
                            <input name="category_name"
                                   value="<?php echo set_value('category_name', @$category->category_name) ?>"
                                   class="uk-width-100 uk-form-large" type="text"
                                   placeholder="Write the language name">
                            <?php echo form_error('category_name'); ?>
                        </div>
                    </div>
                    <div class="uk-form-controls uk-margin-top">
                        <div class="uk-margin-bottom uk-form-controls">
                            <label class="uk-form-label" for="category_active">Active</label>
                            <input name="category_active" type="checkbox" value="1" id="category_active"
                                <?php echo $checked ?>/>
                            <?php echo form_error('category_active'); ?>
                        </div>
                        <br/>
                        <button
                            class="uk-button uk-button-primary uk-button-large"><?php echo $form_submit ?></button>
                    </div>
                    </form>
                </div>
            </div>