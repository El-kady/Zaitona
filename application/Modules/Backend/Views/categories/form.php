<div class="ui container">
    <div class="container">

        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">
                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large archive icon"></i>
                            <div class="content">
                                <?php echo $this->text("CATEGORIES"); ?>
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="ui fluid vertical segment">

                    <?php $this->renderFeedbackMessages(); ?>

                    <?php echo $this->form()->open("categories", $this->route([ "action" => "save","params" => [ $this->get("id",0) ] ]), ["class" => "ui large form"]); ?>
                    <div class="field">
                        <div class="field">
                            <label><?php echo $this->text("TITLE"); ?></label>
                            <div class="ui small left labeled icon input">
                                <input type="text" placeholder="<?php echo $this->text("TITLE"); ?>" id="title"
                                       name="title" value="<?php echo $this->form()->valueOf("title"); ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label><?php echo $this->text("PARENT_CATEGORY"); ?></label>
                        <div class="ui dropdown selection">
                            <input type="hidden" name="parent_id"
                                   value="<?php echo $this->form()->valueOf("parent_id", 0); ?>">
                            <div class="default text"><?php echo $this->text("PARENT_CATEGORY"); ?></div>
                            <i class="dropdown icon"></i>
                            <div class="menu" name="parent_id" id="parent_id">
                                <div class="item active" data-value="0"
                                     value="0"><?php echo $this->text("PRIMARY_CATEGORY"); ?></div>
                                <?php foreach ($this->parent_cats as $category) { ?>
                                    <div class="item <?php if ($category["id"] == $this->form()->valueOf("id", 0)) {
                                        echo "disabled";
                                    } ?>" data-value="<?php echo $category["id"]; ?>"
                                         value="<?php echo $category["id"]; ?>"><?php echo $category["title"]; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="back" value="<?php echo $this->route([ "action" => $this->action,"params" => $this->params ]); ?>">

                    <input class="ui small blue submit button" type="submit" value="<?php echo $this->text("SAVE"); ?>">
                    <?php echo $this->form()->close(); ?>

                </div>

            </div>
        </div>
    </div>
</div>