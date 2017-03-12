<div class="ui text container main">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h1 class="ui teal image header">
                Latest Courses
            </h1>


            <div class="ui grid">

                <?php if (count($this->get("courses",[]))) { ?>
                    <?php foreach ($this->get("courses",[]) as $course) { ?>
                        <div class="four wide column">

                            <div class="ui card">
                                <a class="image" href="<?php echo $this->route(["controller" => "course" , "action" => "view" , "params" => ["id" => $course['id']]]); ?>">
                                    <img src="<?php echo $this->uploadedFile($course["featured_image"]); ; ?>">
                                </a>
                                <div class="content">
                                    <a href="<?php echo $this->route(["controller" => "course" , "action" => "view" , "params" => ["id" => $course['id']]]); ?>" class="header"><?php echo $course["title"]; ?></a>
                                    <div class="meta">
                                        <span class="date"><?php echo $this->strDate($course["created_at"]); ?></span>
                                    </div>
                                </div>
                                <div class="extra content">
                                    <a href="<?php echo $this->route(["controller" => "course" , "action" => "view" , "params" => ["id" => $course['id']]]); ?>" class="ui blue button"><?php echo $this->text("VIEW_COURSE"); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php }else{ ?>
                    <p class="aligned center">
                        <?php echo $this->text("NO_ROWS"); ?>
                    </p>
                <?php } ?>

            </div>

        </div>
    </div>
</div>




