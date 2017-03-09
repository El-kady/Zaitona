<div class="ui container">

    <div class="ui grid">

        <?php $this->loadView('_templates/sidebar.php'); ?>

        <div class="twelve wide column">
            <div class="pageHeader">
                <div class="segment">
                    <h3 class="ui dividing header">
                        <i class="large list layout icon"></i>
                        <div class="content">
                            <?php echo $this->text("SECTIONS"); ?>
                        </div>
                    </h3>
                </div>
            </div>

            <div class="ui vertical">
                <a class="ui green mini labeled icon add button"
                   href="<?php echo $this->route(["action" => "add","params" => [$this->row["id"]]]); ?>"><i
                        class="add icon"></i> <?php echo $this->text("ADD"); ?></a>
            </div>

            <div class="ui fluid vertical segment">
                <table class="ui basic table">
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
                                        <a class="blue ui button"
                                           href="<?php echo $this->route(["action" => "edit", "params" => [$row["id"]]]); ?>"><i
                                                class="edit icon"></i> <?php echo $this->text("EDIT"); ?></a>
                                        <a class="negative ui button"
                                           href="<?php echo $this->route(["action" => "delete", "params" => [$row["id"]]]); ?>"><i
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