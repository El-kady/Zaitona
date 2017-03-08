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
        <div class="bigcontainer">
            <div id="logo">
                <a href="<?php echo $this->route(["module" => "Frontend","controller" => "home","action" => ""]); ?>">
                    <?php echo $this->getConfig("site_name"); ?>
                </a>
            </div>
            <div class="user">
                <div class="ui inline labeled icon top right pointing dropdown">
                    <img class="ui avatar image"
                         src="<?php echo $this->getConfig("URL"); ?>/assets/backend/images/avatar-default.gif">
                    欢迎，$用户名
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="#"><i class="reply mail icon"></i>返回首页</a>
                        <a class="item" href="#"><i class="sign out icon"></i>注销登录</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="ui teal inverted menu fluid">
        <div class="bigcontainer">
            <div class="right menu">
                <?php foreach (["home" => ["icon" => "home", "title" => "HOME_PAGE"], "settings" => ["icon" => "settings", "title" => "SETTINGS"]] as $controller_key => $menu) { ?>
                    <a class="item <?php if ($controller_key == strtolower($this->controller)) {echo "active";} ?>" href="<?php echo $this->route(["controller" => $controller_key, "action" => ""]); ?>"><i class="icon <?php echo $menu["icon"]; ?>"></i> <?php echo $this->text($menu["title"]); ?></a>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
