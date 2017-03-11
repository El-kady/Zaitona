<div class="ui container main">
  <div class="ui grid">
    <div class="three wide column">
        <div class="ui fluid vertical menu">
            <?php foreach ($this->categories_tree as $category) : ?>
                <?php if (isset($category['children']) && count($category['children']) > 0) { ?>
                    <div class="ui dropdown item">
                        <?php echo $category['title']; ?>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <?php foreach ($category['children'] as $subcategory) : ?>
                                <a class="item" href="<?php echo $this->route(["controller" => "category" , "action" => "view" , "params" => ["id" => $subcategory['id']]]); ?>"><?php echo $subcategory['title']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <a class="item" href="<?php echo $this->route(["controller" => "category" , "action" => "view" , "params" => ["id" => $category['id']]]); ?>"><?php echo $category['title']; ?></a>
                <?php } ?>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="thirteen wide column">
       <h1><?php echo $this->row['title']; ?></h1>

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
                                <a href="<?php echo $this->route(["controller" => "course" , "action" => "view" , "params" => ["id" => $course['id']]]); ?>" class="ui blue button"><?php echo $this->text("START"); ?></a>
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