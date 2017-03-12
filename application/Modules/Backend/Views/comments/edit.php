<div class="ui container">
    <div class="container">
        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">

                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large comment icon"></i>
                            <div class="content">
                                <?php echo $this->text("COMMENTS"); ?>
                            </div>
                        </h3>
                    </div>
                </div>

                <?php $this->renderFeedbackMessages(); ?>

                <div class="ui form fluid vertical segment">
                <?php echo $this->form()->open("comments", $this->route(["action" => "save","params" => [$this->get("id", 0)]]), ["class" => "ui form"]); ?>
                <div class="field">
                    <label><?php echo $this->text("COMMENT_TITLE"); ?></label>
                    <textarea name="comment"  placeholder="<?php echo $this->text("COMMENT"); ?>"><?php echo $this->form()->valueOf("comment",""); ?></textarea>
                </div>

                <button class="ui fluid teal submit button"><?php echo $this->text("SAVE"); ?></button>
                <?php echo $this->form()->close(); ?>
            </div>
        </div>
    </div>
</div>


