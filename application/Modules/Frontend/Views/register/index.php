<div class="ui text container main">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <div class="content">
                    <?php echo $this->text("REGISTER_TITLE") ?>
                </div>
            </h2>
            <?php echo $this->form()->open("register", $this->route(["action" => "register"]), ["class" => "ui large form"]); ?>
            <div class="ui stacked segment">

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

                <button class="ui fluid large teal submit button"><?php echo $this->text("REGISTER"); ?></button>
            </div>
            <?php echo $this->form()->close(); ?>

            <?php $this->renderFeedbackMessages(); ?>

            <div class="ui message">
                <?php echo $this->text("REGISTER_HINT"); ?> <a
                    href="<?php echo $this->route(["controller" => "login"]); ?>"> <?php echo $this->text("LOGIN"); ?></a>
            </div>
        </div>
    </div>
</div>




