<div class="ui text container main">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <div class="ui stacked segment">

                <?php $this->renderFeedbackMessages(); ?>

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