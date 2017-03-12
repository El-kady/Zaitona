
<div class="ui container main">
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui vertical steps">
                <div class="step">
                    <img class="ui image" src="<?php echo $this->uploadedFile($this->course["featured_image"]); ?>">
                </div>
                <div class="step">
                    <i class="list layout icon"></i>
                    <div class="content">
                        <div class="title"><?php echo $this->text("CATEGORY"); ?></div>
                        <div class="description">
                            <?php echo $this->category['title']; ?>
                        </div>
                    </div>
                </div>
                <div class="step">
                    <i class="user icon"></i>
                    <div class="content">
                        <div class="title"><?php echo $this->text("INSTRUCTOR"); ?></div>
                        <div class="description">
                            <?php echo $this->instructor["name"]; ?>
                        </div>
                    </div>
                </div>
                <div class="step">
                                    <i class="pointing up icon"></i>
                                    <div class="content">
                                        <a href="<?php echo $this->route(["controller" => "course", "action" => "request", "params" => ["id" => $this->course['id']]]); ?>">
                                        <div class="title"><?php echo $this->text("REQUEST_MATERIAL"); ?>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                <div class="step">
                    <i class="calendar icon"></i>
                    <div class="content">
                        <div class="title"><?php echo $this->text("DATE"); ?></div>
                        <div class="description">
                            <?php echo $this->strDate($this->course["created_at"]); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="ten wide column">

            <h1><?php echo $this->course["title"]; ?></h1>

            <div class="ui small breadcrumb">
                <a href="<?php echo $this->getConfig("URL"); ?>"
                   class="section"><i class="home icon divider"></i> <?php echo $this->getConfig("site_name"); ?></a>

                <?php if ($this->category_parent) { ?>
                    <i class="right chevron icon divider"></i>
                    <a href="<?php echo $this->route(["controller" => "category", "action" => "view", "params" => ["id" => $this->category_parent['id']]]); ?>"
                       class="section"><?php echo $this->category_parent['title']; ?></a>
                <?php } ?>

                <i class="right chevron icon divider"></i>
                <a href="<?php echo $this->route(["controller" => "category", "action" => "view", "params" => ["id" => $this->category['id']]]); ?>"
                   class="section"><?php echo $this->category['title']; ?></a>
            </div>

            <h4 class="ui header"><?php echo $this->text("DESCRIPTION"); ?></h4>
            <p>
                <?php echo nl2br($this->course["description"]); ?>
            </p>

            <h4 class="ui header"><?php echo $this->text("INTRODUCTION"); ?></h4>
            <p>
                <?php echo nl2br($this->course["introduction"]); ?>
            </p>

            <h4 class="ui header"><?php echo $this->text("REQUIREMENT"); ?></h4>
            <p>
                <?php echo nl2br($this->course["requirement"]); ?>
            </p>

            <h4 class="ui header"><?php echo $this->text("AUDIENCE"); ?></h4>
            <p>
                <?php echo nl2br($this->course["audience"]); ?>
            </p>


            <h2>LESSONS</h2>
            <div class="ui vertical segments container">
                <?php foreach ($this->sections as $section) : ; ?>
                    <h4 class="ui attached block header">
                        SECTION  : <?php echo $section['title']; ?>
                    </h4>
                    <div class="ui attached segment">
                        <div class="ui relaxed divided list">
                            <?php if (count($section['materials'])) { ?>
                                <?php foreach ($section['materials'] as $material) { ?>
                                    <div class="item">
                                        <i class="large file middle aligned icon"></i>
                                        <div class="content">
                                            <a href="<?php echo $this->route(["controller" => "material", "action" => "view", "params" => ["id" => $material['id']]]); ?>"
                                               class="header">
                                                <?php echo $material["title"]; ?>
                                            </a>
                                            <div class="description"><?php echo $this->strDate($material["created_at"]);?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php }else{ ?>
                                <?php echo $this->text("NO_ROWS"); ?>
                           <?php } ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <div class="two wide column">

            <p>
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $this->selfRoute(); ?>" class="ui fluid mini facebook button">
                    <i class="facebook icon"></i>
                    Facebook
                </a>
            </p>
            <p>
                <a target="_blank" href="https://twitter.com/intent/tweet?&text=<?php echo $this->course["title"]; ?>&url=<?php echo $this->selfRoute(); ?>" class="ui fluid mini twitter button">
                    <i class="twitter icon"></i>
                    Twitter
                </a>
            </p>

            <p>
                <a target="_blank" href="https://plus.google.com/share?url=<?php echo $this->course["title"]; ?>" class="ui fluid mini google plus button">
                    <i class="google plus icon"></i>
                    Google Plus
                </a>
            </p>
        </div>
    </div>

</div>


