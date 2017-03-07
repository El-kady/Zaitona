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
                    <form name="form" action="<?php echo $this->route(["action" => "save"]); ?>" method="post">

                        <div class="two fields">
                            <div class="field">
                                <label>test</label>
                                <input type="text" name="sensor_tags">
                            </div>
                        </div>

                        <input class="ui small blue submit button" type="submit" value="save">
                    </form>
                    <!--the form end-->
                </div>


            </div>
        </div>
    </div>
</div>