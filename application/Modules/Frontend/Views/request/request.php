<div class="ui text container main">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
           <div class="ui stacked segment">

               <?php $this->renderFeedbackMessages(); ?>

               <?php echo $this->form()->open("request", $this->route(["action" => "saveRequest"]), ["class" => "ui large form"]); ?>
                   <div class="field">
                       <label><?php echo $this->text("REQUEST_TITLE"); ?></label>
                       <textarea name="request" value="<?php echo $this->form()->valueOf("request"); ?> placeholder="<?php echo $this->text("REQUEST"); ?>"></textarea>
                   </div>

                    <input type="hidden" name="course_id" value="<?php echo $this->get("course_id",0); ?>">

                    <button class="ui fluid teal submit button"><?php echo $this->text("SEND_REQUEST"); ?></button>
                 <?php echo $this->form()->close(); ?>
           </div>
        </div>
     </div>
</div>