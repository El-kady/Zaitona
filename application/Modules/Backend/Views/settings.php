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

                <div class="ui form fluid vertical segment">
                    <?php echo $this->form()->open("settings", $this->route(["action" => "save"]), ["class" => "ui large form"]); ?>

                    <div class="two fields">
                        <div class="field">
                            <label><?php echo $this->text("SITE_NAME"); ?></label>
                            <input type="text" name="site_name" value="<?php echo $this->form()->valueOf("site_name"); ?>">
                        </div>
                    </div>

                    <input class="ui small blue submit button" type="submit" value="save">

                    <?php echo $this->form()->close(); ?>
                </div>


            </div>
        </div>
    </div>
</div>