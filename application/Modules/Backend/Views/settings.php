<div class="ui container">
    <div class="container">
        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">

                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large settings icon"></i>
                            <div class="content">
                                <?php echo $this->text("SETTINGS"); ?>
                            </div>
                        </h3>
                    </div>
                </div>

                <?php $this->renderFeedbackMessages(); ?>

                <div class="ui form fluid vertical segment">
                    <?php echo $this->form()->open("settings", $this->route(["action" => "save"]), ["class" => "ui large form"]); ?>

                    <div class="field">
                        <label><?php echo $this->text("SITE_NAME"); ?></label>
                        <input type="text" name="site_name" value="<?php echo $this->form()->valueOf("site_name"); ?>">
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("SITE_LANG"); ?></label>
                        <div class="ui dropdown selection">
                            <input type="hidden" name="site_lang" value="<?php echo $this->form()->valueOf("site_lang","en"); ?>">
                            <div class="default text"><?php echo $this->text("SITE_LANG"); ?></div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="item" data-value="en"><?php echo $this->text("ENGLISH"); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("SITE_SLOGAN"); ?></label>
                        <input type="text" name="site_slogan"
                               value="<?php echo $this->form()->valueOf("site_slogan"); ?>">
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("SITE_EMAIL"); ?></label>
                        <input type="text" name="site_email" value="<?php echo $this->form()->valueOf("site_email"); ?>">
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("SMTP_SERVER"); ?></label>
                        <input type="text" name="smtp_server" value="<?php echo $this->form()->valueOf("smtp_server"); ?>">
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("SMTP_PORT"); ?></label>
                        <input type="text" name="smtp_port" value="<?php echo $this->form()->valueOf("smtp_port"); ?>">
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("SMTP_EMAIL"); ?></label>
                        <input type="text" name="smtp_email" value="<?php echo $this->form()->valueOf("smtp_email"); ?>">
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("SMTP_PASSWORD"); ?></label>
                        <input type="password" name="smtp_password" value="<?php echo $this->form()->valueOf("smtp_password"); ?>">
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("WELCOME_EMAIL_TEMPLATE"); ?></label>
                        <textarea rows="2" name="welcome_email_template"><?php echo $this->form()->valueOf("welcome_email_template"); ?></textarea>
                    </div>

                    <input class="ui small blue submit button" type="submit" value="save">

                    <?php echo $this->form()->close(); ?>
                </div>


            </div>
        </div>
    </div>
</div>