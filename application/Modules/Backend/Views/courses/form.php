<div class="ui container">
    <div class="container">

        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">
                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large book icon"></i>
                            <div class="content">
                                <?php echo $this->text("COURSES"); ?>
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="ui fluid vertical segment">

                    <?php $this->renderFeedbackMessages(); ?>

                    <?php echo $this->form()->open("courses", $this->route(["action" => "save", "params" => [$this->get("id", 0)]]), ["class" => "ui large form"]); ?>

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
                        <label><?php echo $this->text("CATEGORY"); ?></label>
                        <div class="ui dropdown selection">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $this->form()->valueOf("category_id", ""); ?>">
                            <div class="default text"><?php echo $this->text("CATEGORY"); ?></div>
                            <i class="dropdown icon"></i>
                            <div class="menu" name="category_id" id="category_id">
                                <div class="item active" data-value="" value=""><?php echo $this->text("CHOOSE_ONE"); ?></div>
                                <?php foreach ($this->get("cats_tree", []) as $category) { ?>
                                    <div
                                        class="item <?php if (isset($category["children"]) && count($category["children"])) {
                                            echo "disabled";
                                        } ?>" data-value="<?php echo $category["id"]; ?>"
                                        value="<?php echo $category["id"]; ?>"><?php echo $category["title"]; ?></div>

                                    <?php if (isset($category["children"]) && count($category["children"])) { ?>
                                        <?php foreach ($category["children"] as $child_category) { ?>
                                            <div class="item" data-value="<?php echo $child_category["id"]; ?>"
                                                 value="<?php echo $child_category["id"]; ?>"><?php echo $child_category["title"]; ?></div>
                                        <?php } ?>
                                    <?php } ?>

                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("INTRODUCTION"); ?></label>
                        <textarea rows="2" name="introduction" placeholder="<?php echo $this->text("INTRODUCTION"); ?>"><?php echo $this->form()->valueOf("introduction", ""); ?></textarea>
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("DESCRIPTION"); ?></label>
                        <textarea rows="2" name="description" placeholder="<?php echo $this->text("DESCRIPTION"); ?>"><?php echo $this->form()->valueOf("description", ""); ?></textarea>
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("REQUIREMENT"); ?></label>
                        <textarea rows="2" name="requirement" placeholder="<?php echo $this->text("REQUIREMENT"); ?>"><?php echo $this->form()->valueOf("requirement", ""); ?></textarea>
                    </div>

                    <div class="field">
                        <label><?php echo $this->text("AUDIENCE"); ?></label>
                        <textarea rows="2" name="audience" placeholder="<?php echo $this->text("AUDIENCE"); ?>"><?php echo $this->form()->valueOf("audience", ""); ?></textarea>
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