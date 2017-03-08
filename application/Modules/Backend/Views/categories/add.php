<div class="ui container">
    <div class="container">

        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">
                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large add icon"></i>
                            <div class="content">
                                <?php echo $this->text("CATEGORIES");?>
                                <!-- <div class="sub header"></div> -->
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="ui form fluid vertical segment">
                    <form name="form" action="/user/new_sensor/" method="post">
                        <div class="field">
                            <div class="field">
                                <label><?php echo $this->text("TITLE"); ?></label>
                                <div class="ui small left labeled icon input">
                                    <input type="text" placeholder="<?php echo $this->text("TITLE"); ?>" id="title" name="title" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label><?php echo $this->text("PARENT_CATEGORY"); ?></label>
                            <div class="ui dropdown selection">
                                <input type="hidden" name="gender" value="1">
                                <div class="default text"><?php echo $this->text("PARENT_CATEGORY"); ?></div>
                                <i class="dropdown icon"></i>
                                <div class="menu" name="sensor_type" id="sensor_type">
                                    <div class="item active" data-value="数值型" value="0">数值型</div>
                                </div>
                            </div>
                        </div>

                        <input class="ui small blue submit button" type="submit" value="<?php echo $this->text("ADD"); ?>">
                    </form>
                    <!--the form end-->
                </div>




            </div>
        </div>
    </div>
</div>