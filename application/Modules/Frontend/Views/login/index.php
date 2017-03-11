<div class="ui text container main">

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <div class="content">
                    <?php echo $this->text("LOGIN_TITLE") ?>
                </div>
            </h2>
            <form method="post" action="<?php echo $this->route(["action" => "login"]); ?>" class="ui large form">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="<?php echo $this->text("EMAIL"); ?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="<?php echo $this->text("PASSWORD"); ?>">
                        </div>
                    </div>
                    <button class="ui fluid large teal submit button"><?php echo $this->text("LOGIN"); ?></button>
                </div>
            </form>

            <?php $this->renderFeedbackMessages(); ?>

            <div class="ui message">
                <?php echo $this->text("LOGIN_HINT"); ?> <a
                    href="<?php echo $this->route(["controller" => "register"]); ?>"> <?php echo $this->text("REGISTER"); ?></a>
            </div>
        </div>
    </div>
</div>

