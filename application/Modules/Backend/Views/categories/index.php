<div class="ui container">
    <div class="container">

        <div class="ui grid">

            <?php $this->loadView('_templates/sidebar.php'); ?>

            <div class="twelve wide column">
                <div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large browser icon"></i>
                            <div class="content">
                                <?php echo $this->text("CATEGORIES"); ?>
                                <!-- <div class="sub header"></div> -->
                            </div>
                        </h3>
                    </div>
                </div>

                <div class="ui vertical">
                    <a class="ui green small labeled icon add button"
                       href="<?php echo $this->route(["action" => "add"]); ?>"><i
                            class="add icon"></i> <?php echo $this->text("ADD"); ?></a>
                </div>

                <div class="ui fluid vertical segment">
                    <table class="ui basic table">
                        <thead>
                            <tr>
                                <th><?php echo $this->text("TITLE"); ?></th>
                                <th class="center aligned" width="250"><?php echo $this->text("OPTIONS"); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php if (is_array($this->tree) && count($this->tree)){ ?>

                            <?php foreach ((array) $this->tree as $cat) {?>
                                <tr>
                                    <td>+ <strong><?php echo $cat["title"]; ?></strong></td>
                                    <td class="center aligned">
                                        <div class="ui buttons mini">
                                            <a class="blue ui button" href="<?php echo $this->route(["action" => "edit","params" => [$cat["id"]]]); ?>"><i class="edit icon"></i> <?php echo $this->text("EDIT"); ?></a>
                                            <a class="negative ui button" href="<?php echo $this->route(["action" => "delete","params" => [$cat["id"]]]); ?>"><i class="trash icon"></i> <?php echo $this->text("DELETE"); ?></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php if (isset($cat["children"]) && count($cat["children"])){ ?>
                                    <?php foreach ($cat["children"] as $sub) {?>
                                        <tr>
                                            <td>|-- <?php echo $sub["title"]; ?></td>
                                            <td class="center aligned">
                                                <div class="ui buttons mini">
                                                    <a class="blue ui button" href="<?php echo $this->route(["action" => "edit","params" => [$sub["id"]]]); ?>"><i class="edit icon"></i> <?php echo $this->text("EDIT"); ?></a>
                                                    <a class="negative ui button" href="<?php echo $this->route(["action" => "delete","params" => [$sub["id"]]]); ?>"><i class="trash icon"></i> <?php echo $this->text("DELETE"); ?></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>

                        <?php }else{ ?>
                            <tr>
                                <td class="center aligned" colspan="2">
                                    <?php echo $this->text("NO_ROWS"); ?>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
</div>