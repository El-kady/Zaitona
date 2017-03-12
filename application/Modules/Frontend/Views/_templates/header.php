<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?php echo $this->get("page_title", $this->getConfig("site_name")); ?></title>

    <?php echo $this->loadCSSLink("semantic/semantic.min.css"); ?>
    <?php echo $this->loadCSSLink("frontend/theme.css"); ?>

</head>

<body
    class="<?php echo strtolower($this->get("module")); ?>-module <?php echo strtolower($this->get("controller")); ?>-controller">

<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <a class="item"
           href="<?php echo $this->route(["controller" => "home"]); ?>"><?php echo $this->getConfig("site_name"); ?></a>

        <div class="ui dropdown item">
            <?php echo $this->text("CATEGORIES"); ?>
            <i class="dropdown icon"></i>
            <div class="menu">
                <?php foreach ($this->categories_tree as $category) : ?>
                    <?php if (isset($category['children']) && count($category['children']) > 0) { ?>
                        <div class="item">
                            <i class="dropdown icon"></i>
                            <span class="text"><?php echo $category['title']; ?></span>
                            <div class="menu">
                                <?php foreach ($category['children'] as $subcategory) : ?>
                                    <a class="item"
                                       href="<?php echo $this->route(["controller" => "category", "action" => "view", "params" => ["id" => $subcategory['id']]]); ?>"><?php echo $subcategory['title']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <a class="item"
                           href="<?php echo $this->route(["controller" => "category", "action" => "view", "params" => ["id" => $category['id']]]); ?>"><?php echo $category['title']; ?></a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>

        <a class="item"
           href="<?php echo $this->route(["controller" => "blog", "action" => "index"]); ?>"><?php echo $this->text("BLOG"); ?></a>
        <a class="item"
           href="<?php echo $this->route(["controller" => "page", "action" => "about"]); ?>"><?php echo $this->text("ABOUT_US"); ?></a>


        <div class="right menu">
            <?php if ($this->IsLoggedIn()) { ?>
                <dev class="item">
                    <div class="ui inline labeled icon top right pointing dropdown">
                        <?php echo $this->renderImage($this->getFromSession("user_photo"), "/assets/images/avatar-default.gif", true, ["class" => "ui avatar image"]); ?>

                        <?php echo $this->getFromSession("user_name"); ?>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item"
                               href="<?php echo $this->route(["controller" => "user", "action" => "edit"]); ?>"><i
                                    class="user icon"></i><?php echo $this->text("MY_ACCOUNT"); ?></a>

                            <?php if ($this->getFromSession("user_account_type") == 2) { ?>
                                <a class="item"
                                   href="<?php echo $this->route(["module" => "backend", "controller" => "home"]); ?>"><i
                                        class="setting icon"></i><?php echo $this->text("ADMIN_PANEL"); ?></a>
                            <?php } ?>

                            <a class="item"
                               href="<?php echo $this->route(["controller" => "user", "action" => "logout"]); ?>"><i
                                    class="sign out icon"></i><?php echo $this->text("LOGOUT"); ?></a>

                        </div>
                    </div>
                </dev>
            <?php } else { ?>
                <div class="item">
                    <a class="ui button"
                       href="<?php echo $this->route(["controller" => "login"]); ?>"><?php echo $this->text("LOGIN"); ?></a>
                </div>
                <div class="item">
                    <a class="ui primary button"
                       href="<?php echo $this->route(["controller" => "register"]); ?>"><?php echo $this->text("REGISTER"); ?></a>
                </div>
            <?php } ?>
        </div>

    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <a class="item"
       href="<?php echo $this->route(["controller" => "home"]); ?>"><?php echo $this->getConfig("site_name"); ?></a>

    <?php foreach ($this->categories_tree as $category) : ?>
        <?php if (isset($category['children']) && count($category['children']) > 0) { ?>
            <?php foreach ($category['children'] as $subcategory) : ?>
                <a class="item"
                   href="<?php echo $this->route(["controller" => "category", "action" => "view", "params" => ["id" => $subcategory['id']]]); ?>"><?php echo $subcategory['title']; ?></a>
            <?php endforeach; ?>
        <?php } else { ?>
            <a class="item"
               href="<?php echo $this->route(["controller" => "category", "action" => "view", "params" => ["id" => $category['id']]]); ?>"><?php echo $category['title']; ?></a>
        <?php } ?>
    <?php endforeach; ?>

    <a class="item"
       href="<?php echo $this->route(["controller" => "blog", "action" => "index"]); ?>"><?php echo $this->text("BLOG"); ?></a>
    <a class="item"
       href="<?php echo $this->route(["controller" => "page", "action" => "about"]); ?>"><?php echo $this->text("ABOUT_US"); ?></a>

</div>

<div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment">

        <div class="ui container">
            <div class="ui large secondary inverted pointing menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>

                <a class="item"
                   href="<?php echo $this->route(["controller" => "home"]); ?>"><?php echo $this->getConfig("site_name"); ?></a>

                <div class="ui dropdown item">
                    <?php echo $this->text("CATEGORIES"); ?>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <?php foreach ($this->categories_tree as $category) : ?>
                            <?php if (isset($category['children']) && count($category['children']) > 0) { ?>
                                <div class="item">
                                    <i class="dropdown icon"></i>
                                    <span class="text"><?php echo $category['title']; ?></span>
                                    <div class="menu">
                                        <?php foreach ($category['children'] as $subcategory) : ?>
                                            <a class="item"
                                               href="<?php echo $this->route(["controller" => "category", "action" => "view", "params" => ["id" => $subcategory['id']]]); ?>"><?php echo $subcategory['title']; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <a class="item"
                                   href="<?php echo $this->route(["controller" => "category", "action" => "view", "params" => ["id" => $category['id']]]); ?>"><?php echo $category['title']; ?></a>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <a class="item"
                   href="<?php echo $this->route(["controller" => "blog", "action" => "index"]); ?>"><?php echo $this->text("BLOG"); ?></a>
                <a class="item"
                   href="<?php echo $this->route(["controller" => "page", "action" => "about"]); ?>"><?php echo $this->text("ABOUT_US"); ?></a>

                <div class="right item">
                    <?php if ($this->IsLoggedIn()) { ?>
                        <div class="ui inline labeled icon top right pointing dropdown">
                            <?php echo $this->renderImage($this->getFromSession("user_photo"), "/assets/images/avatar-default.gif", true, ["class" => "ui avatar image"]); ?>

                            <?php echo $this->getFromSession("user_name"); ?>

                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item"
                                   href="<?php echo $this->route(["controller" => "user", "action" => "edit"]); ?>"><i
                                        class="setting icon"></i><?php echo $this->text("MY_ACCOUNT"); ?></a>

                                <?php if ($this->getFromSession("user_account_type") == 2) { ?>
                                    <a class="item"
                                       href="<?php echo $this->route(["module" => "backend", "controller" => "home"]); ?>"><i
                                            class="setting icon"></i><?php echo $this->text("ADMIN_PANEL"); ?></a>
                                <?php } ?>

                                <a class="item"
                                   href="<?php echo $this->route(["controller" => "user", "action" => "logout"]); ?>"><i
                                        class="sign out icon"></i><?php echo $this->text("LOGOUT"); ?></a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <a class="ui inverted button"
                           href="<?php echo $this->route(["controller" => "login"]); ?>"><?php echo $this->text("LOGIN"); ?></a>
                        <a class="ui inverted button"
                           href="<?php echo $this->route(["controller" => "register"]); ?>"><?php echo $this->text("REGISTER"); ?></a>
                    <?php } ?>
                </div>

            </div>
        </div>

        <?php if ($this->controller == "Home") { ?>
            <div class="ui text container">
                <h1 class="ui inverted header">
                    <?php echo $this->getConfig("site_name"); ?>
                </h1>
                <h2><?php echo $this->getConfig("site_slogan"); ?></h2>
                <a class="ui huge primary button">Get Started <i class="right arrow icon"></i></a>
            </div>

        <?php } ?>

    </div>