<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?php echo $this->get("page_title", $this->getConfig("site_name")); ?></title>

    <?php echo $this->loadCSSLink("semantic/semantic.min.css"); ?>
    <?php echo $this->loadCSSLink("backend/theme.css"); ?>

</head>

<body
    class="<?php echo strtolower($this->get("module")); ?>-module <?php echo strtolower($this->get("controller")); ?>-controller">

<div class="ui container">
    <!--header begin-->
    <header>
        <div id="logo">
            <a href="<?php echo $this->route(["module" => "Frontend", "controller" => "home", "action" => ""]); ?>">
                <?php echo $this->getConfig("site_name"); ?>
            </a>
        </div>
        <div class="user">
            <div class="ui inline labeled icon top right pointing dropdown">
                <?php echo $this->renderImage($this->getFromSession("user_photo"), "/assets/images/avatar-default.gif", true, ["class" => "ui avatar image"]); ?>

                <?php echo $this->getFromSession("user_name"); ?>

                <i class="dropdown icon"></i>
                <div class="menu">

                    <a class="item"
                       href="<?php echo $this->route(["module" => "backend", "controller" => "users","action" => "edit","params" => [$this->getFromSession("user_id")]]); ?>"><i
                            class="setting icon"></i><?php echo $this->text("MY_ACCOUNT"); ?></a>

                    <a class="item"
                       href="<?php echo $this->route(["module" => "frontend", "controller" => "home", "action" => "index"]); ?>"><i
                                class="block layout icon"></i><?php echo $this->text("WEBSITE"); ?></a>


                    <a class="item"
                       href="<?php echo $this->route(["module" => "frontend", "controller" => "user", "action" => "logout"]); ?>"><i
                            class="sign out icon"></i><?php echo $this->text("LOGOUT"); ?></a>

                </div>
            </div>
        </div>
    </header>


    <div class="ui teal inverted menu fluid">
        <div class="bigcontainer">
            <div class="right menu">
                <?php foreach (["home" => ["icon" => "home", "title" => "HOME_PAGE"], "settings" => ["icon" => "settings", "title" => "SETTINGS"], "blog" => ["icon" => "talk", "title" => "BLOG"]] as $controller_key => $menu) { ?>
                    <a class="item <?php if ($controller_key == strtolower($this->controller)) {
                        echo "active";
                    } ?>" href="<?php echo $this->route(["controller" => $controller_key, "action" => ""]); ?>"><i
                            class="icon <?php echo $menu["icon"]; ?>"></i> <?php echo $this->text($menu["title"]); ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
