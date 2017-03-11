<div class="four wide column">
    <div class="verticalMenu">
        <div class="ui vertical pointing menu fluid">
            <?php foreach (["categories" => ["icon" => "archive", "title" => "CATEGORIES"],"courses" => ["icon" => "book", "title" => "COURSES"],"users" => ["icon" => "users", "title" => "USERS"]] as $controller_key => $menu) { ?>
                <a class="item <?php if ($controller_key == strtolower($this->controller)) {echo "active";} ?>" href="<?php echo $this->route(["controller" => $controller_key, "action" => ""]); ?>"><i class="icon <?php echo $menu["icon"]; ?>"></i> <?php echo $this->text($menu["title"]); ?></a>
            <?php } ?>
        </div>
    </div>
</div>