<div class="ui text container main">
    <div class="ui middle center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <div class="content">
                    <?php echo $this->text("MY_ACCOUNT") ?>
                </div>
            </h2>

            <?php $this->renderFeedbackMessages(); ?>

            <?php echo $this->form()->open("user_edit", $this->route(["action" => "save"]), ["class" => "ui large form","enctype" => "multipart/form-data"]); ?>
            <div class="ui stacked segment left aligned">

                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="name" value="<?php echo $this->form()->valueOf("name"); ?>"
                               placeholder="<?php echo $this->text("NAME"); ?>">
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="text" name="email" value="<?php echo $this->form()->valueOf("email"); ?>"
                               placeholder="<?php echo $this->text("EMAIL"); ?>">
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="<?php echo $this->text("PASSWORD"); ?>">
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="retype_password"
                               placeholder="<?php echo $this->text("RETYPE_PASSWORD"); ?>">
                    </div>
                </div>

                <div class="field">
                    <label><?php echo $this->text("USER_PHOTO"); ?></label>
                    <input type="file" name="user_photo"/>
                </div>

                <button class="ui fluid large teal submit button"><?php echo $this->text("SAVE"); ?></button>
            </div>
            <?php echo $this->form()->close(); ?>

        </div>
    </div>
</div>




