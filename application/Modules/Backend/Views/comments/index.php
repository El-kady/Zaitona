<div class="ui container">

    <div class="ui grid">

        <?php $this->loadView('_templates/sidebar.php'); ?>

        <div class="twelve wide column">
            <div class="pageHeader">
                <div class="segment">
                    <h3 class="ui dividing header">
                        <i class="large comment icon"></i>
                        <div class="content">
                            <?php echo $this->text("COMMENTS"); ?>
                            <!-- <div class="sub header"></div> -->
                        </div>
                    </h3>
                </div>
            </div>


            <div class="ui fluid vertical segment">

                <?php if (is_array($this->rows) && count($this->rows)) { ?>

                    <?php foreach ($this->rows as $row) { ?>
                        <div class="ui device two column middle aligned vertical grid segment">
                            <div class="column verborder">
                                <div class="ui info">
                                    <h5 class="ui header">
                                        <?php  echo $row['user_name']['name'];?>
                                        <div class="sub header"><?php echo $this->strDate($row["created_at"]);?></div>
                                    </h5>
                                    <p>
                                        <?php echo $this->beautifyText($row["comment"]); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="center aligned column">
                                <a class="ui mini red button" href="<?php echo $this->route(["action" => "delete_confirm","params" => [$row["id"]]]); ?>" ><i class="trash icon"></i> <?php echo $this->text("DELETE"); ?></a>
                                <a class="ui mini green button" href="<?php echo $this->route(["action" => "edit","params" => [$row["id"]]]); ?>" ><i class="edit icon"></i> <?php echo $this->text("EDIT"); ?></a>
                            </div>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <p><?php echo $this->text("NO_ROWS"); ?></p>
                <?php } ?>

            </div>


        </div>
    </div>
</div>