<div class="uk-grid uk-margin-top" >
    <div class="uk-width-medium-3-4">
        <article class="uk-article uk-panel-box uk-panel-box-secondary">
            <h3>Add Video</h3>
            <hr class="uk-article-divider">
            <?php
            $attributes = array(
                'class' => 'uk-form uk-form-stacked',
                'method' => 'post'
            );
            echo form_open_multipart($action, $attributes) ?>
            <div class="uk-form-row uk-panel-box">
                <label class="uk-form-label" for="bridge_category_id">Language</label>

                <div class="uk-form-controls">
                    <select name='bridge_category_id' id="bridge_category_id"
                            class="uk-form-large uk-width-1-1">
                        <option value="" <?php echo set_select("page_category", 0); ?> >-- Select Language
                        </option>
                        <?php
                        $article_id = '';

                        if (is_object($article)) {
                            $article_id = $article->bridge_category_id;
                        }
                        foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat->category_id ?>"
                                <?php echo ($this->input->post('bridge_category_id') == $cat->category_id || $article_id == $cat->category_id) ? 'selected="true"' : ''; ?>><?php echo $cat->category_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('bridge_category_id') ?>
                </div>
            </div>
            <br>
            <div class="uk-form-row uk-panel-box">
                <label class="uk-form-label" for="url"> URL Type </label>
                <br>
                <div class="uk-form-controls">
                    <?php
                    echo form_label('<span class="uk-h3">Video</span> ','video');
                    echo form_radio('url-type','youtube',true,"id='video' class='uk-margin-right'");
                    ?>
                    <div class="uk-badge uk-badge-danger">
                        <i class="uk-icon-youtube uk-icon-large"></i>
                        <i class="uk-icon-vimeo-square uk-margin-left uk-icon-large"></i>
                        <span class="uk-text-large uk-text-bold uk-margin-left">DailyMotion</span>
                    </div>
                    <br>
                    <br>
                    <?php
                    echo form_label('<span class="uk-h3">Image</span> ','image');
                    echo form_radio('url-type','image',false,"id='image' class='uk-margin-right' data-uk-toggle=\"{target:'#image-title'}\"");
                    ?><i class="uk-icon-link uk-icon-medium"></i>
                </div>
            </div>
            <br/>
            <div class="uk-form-row uk-panel-box uk-hidden" id="image-title">
                <label class="uk-form-label"
                       for="title">Title</label>
                <div class="uk-form-controls">
                    <input type='text' value='<?php echo set_value('title') ?>'
                           name='title'
                           class='uk-width-100 uk-form-large uk-margin-bottom'
                           id='title'
                           placeholder="Title ..."/>
                    <?php echo form_error('title') ?>
                </div>
                <BR>
            </div>
            <div class="uk-form-row uk-panel-box">
                <label class="uk-form-label"
                       for="url"><?php echo $this->option->get('infront-article-message') ?></label>
                <div class="uk-form-controls">
                    <input type='text' value='<?php echo set_value('url') ?>'
                           name='url'
                           class='uk-width-100 uk-form-large uk-margin-bottom'
                           id='url'
                           placeholder="Youtube,Vimeo and Daily Motion Or Image Url"/>
                    <?php echo form_error('url') ?>
                </div>
            </div>
            <div class="uk-margin-top uk-margin-large-bottom uk-panel-box">
                <button
                    class="uk-button  uk-button-large uk-button-success"><?php echo $submit_value ?></button>
                <a href="<?php echo site_url('articles/discard') ?>"
                   class="uk-button uk-align-right uk-button-large uk-button-danger"><?php echo $reset_button ?></a>
                <input type="hidden" name="submit_input" value="1"/>

            </div>
            </form>
        </article>
    </div>
    <div class="uk-width-medium-1-4">
        <?php $this->load->view(SELECTED_THEME . '/right-column') ?>
    </div>
</div>