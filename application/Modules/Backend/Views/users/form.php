<div class="ui container">
    <div class="container">

        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">
                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large users icon"></i>
                            <div class="content">
                                <?php echo $this->text("USERS"); ?>
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="ui fluid vertical segment">

                    <?php $this->renderFeedbackMessages(); ?>

                    <?php echo $this->form()->open("users", $this->route(["action" => "save", "params" => [$this->get("id", 0)]]), ["class" => "ui large form"]); ?>

                    <div class="field">
                        <div class="field">
                            <label><?php echo $this->text("NAME"); ?></label>
                            <div class="ui small left labeled icon input">
                                <input type="text" placeholder="<?php echo $this->text("NAME"); ?>" id="name"
                                       name="name" value="<?php echo $this->form()->valueOf("name"); ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field">
                            <label><?php echo $this->text("EMAIL"); ?></label>
                            <div class="ui small left labeled icon input">
                                <input type="email" placeholder="<?php echo $this->text("EMAIL"); ?>" id="name"
                                       name="email" value="<?php echo $this->form()->valueOf("email"); ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field">
                            <label><?php echo $this->text("PASSWORD"); ?></label>
                            <div class="ui small left labeled icon input">
                                <input type="password" placeholder="<?php echo $this->text("PASSWORD"); ?>" id="name"
                                       name="password"/>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field">
                            <label><?php echo $this->text("RETYPE_PASSWORD"); ?></label>
                            <div class="ui small left labeled icon input">
                                <input type="password" placeholder="<?php echo $this->text("RETYPE_PASSWORD"); ?>"
                                       id="name"
                                       name="retype_password"/>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field">
                            <label><?php echo $this->text("ACCOUNT_TYPE"); ?></label>
                            <div class="ui dropdown selection">
                                <input type="hidden" name="account_type" value="<?php echo $this->form()->valueOf("account_type",2); ?>">
                                <div class="default text"><?php echo $this->text("ACCOUNT_TYPE"); ?></div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="1"><?php echo $this->text("STUDENT"); ?></div>
                                    <div class="item" data-value="2"><?php echo $this->text("ADMIN"); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field">
                            <label><?php echo $this->text("STATUS"); ?></label>
                            <div class="ui dropdown selection">
                                <input type="hidden" name="status" value="<?php echo $this->form()->valueOf("status",1); ?>">
                                <div class="default text"><?php echo $this->text("STATUS"); ?></div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="1"><?php echo $this->text("ACTIVE"); ?></div>
                                    <div class="item" data-value="3"><?php echo $this->text("BANNED"); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="back"
                           value="<?php echo $this->route(["action" => $this->action, "params" => $this->params]); ?>">

                    <input class="ui small blue submit button" type="submit" value="<?php echo $this->text("SAVE"); ?>">
                    <?php echo $this->form()->close(); ?>

                </div>

            </div>
        </div>
    </div>
</div>