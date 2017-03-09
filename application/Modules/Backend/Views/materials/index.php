<div class="ui container">

    <div class="ui grid">

        <?php $this->loadView('_templates/sidebar.php'); ?>

        <div class="twelve wide column">
            <div class="pageHeader">
                <div class="segment">
                    <h3 class="ui dividing header">
                        <i class="large file video outline icon"></i>
                        <div class="content">
                            <?php echo $this->text("MATERIALS"); ?>
                        </div>
                    </h3>
                </div>
            </div>

            <div class="ui vertical">

                <div class="ui teal mini buttons">
                    <div class="ui green mini labeled icon add button dropdown top left pointing" href="<?php echo $this->route(["action" => "add", "params" => [$this->row["id"]]]); ?>">
                        <i class="add icon"></i> <?php echo $this->text("ADD"); ?>
                        <div class="menu">
                            <a class="item" href="<?php echo $this->route(["action" => "add","params" => ["file",$this->row["id"]]]); ?>"><i class="file video outline icon"></i> <?php echo $this->text("UPLOAD_VIDEO"); ?></a>
                        </div>

                    </div>
                </div>


            </div>

            <div class="ui fluid vertical segment">
                <table class="ui table">
                    <thead>
                    <tr>
                        <th colspan="2">
                            <?php echo $this->row["title"]; ?>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if (is_array($this->rows) && count($this->rows)) { ?>

                        <?php foreach ((array)$this->rows as $row) { ?>
                            <tr>
                                <td><?php echo $row["title"]; ?></td>
                                <td width="250" class="center aligned">
                                    <div class="ui buttons mini">
                                        <a class="ui button"
                                           href="<?php echo $this->route(["action" => "edit", "params" => [$row["id"]]]); ?>"><i
                                                class="edit icon"></i> <?php echo $this->text("EDIT"); ?></a>
                                        <a class="ui button"
                                           href="<?php echo $this->route(["action" => "delete_confirm", "params" => [$row["id"]]]); ?>"><i
                                                class="trash icon"></i> <?php echo $this->text("DELETE"); ?></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php } else { ?>
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