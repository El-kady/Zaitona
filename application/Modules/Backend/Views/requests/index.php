<div class="ui container">

    <div class="ui grid">

        <?php $this->loadView('_templates/sidebar.php'); ?>

        <div class="twelve wide column">
            <div class="pageHeader">
                <div class="segment">
                    <h3 class="ui dividing header">
                        <i class="large pointing up icon"></i>
                        <div class="content">
                            <?php echo $this->text("REQUESTS"); ?>
                            <!-- <div class="sub header"></div> -->
                        </div>
                    </h3>
                </div>
            </div>


            <div class="ui fluid vertical segment">
                <table class="ui table">
                    <thead>
                    <tr>
                        <th><?php echo $this->text("TITLE"); ?></th>
                        <th class="center aligned" width="350"><?php echo $this->text("OPTIONS"); ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if (is_array($this->rows) && count($this->rows)) { ?>

                        <?php foreach ((array)$this->rows as $row) { ?>
                            <tr>
                                <td><?php echo $row["request"]; ?></td>
                                <td class="center aligned">
                                    <div class="ui buttons mini">
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