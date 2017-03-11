<div class="ui container">
    <div class="pageHeader">
        <div class="segment">
            <h3 class="ui dividing header">
                <i class="large warning sign icon"></i>
                <div class="content">
                    <?php echo $this->text("MESSAGE_TITLE"); ?>
                </div>
            </h3>
        </div>
    </div>
    <form method="post" class="ui form error"
          action="<?php echo $this->route(["action" => "delete", "params" => [$this->get("id", 0)]]); ?>">
        <input type="hidden" name="delete" value="<?php echo $this->get("id", 0); ?>">
        <div class="ui error message">
            <p><?php echo $this->text("DELETE_CONFIRM_DESC"); ?></p>
        </div>
        <a class="ui positive submit button mini" onclick="window.history.go(-1);"><?php echo $this->text("BACK"); ?></a>
        <button class="ui negative red submit button mini" type="submit"><?php echo $this->text("DELETE"); ?></button>
    </form>
</div>


