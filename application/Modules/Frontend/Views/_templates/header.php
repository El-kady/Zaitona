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

<header>

    <!-- Following Menu -->
    <div class="ui large top fixed hidden menu">
        <div class="ui container">
            <a class="active item">Home</a>
            <a class="item">Work</a>
            <a class="item">Company</a>
            <a class="item">Careers</a>
            <div class="right menu">
                <div class="item">
                    <a class="ui button">Log in</a>
                </div>
                <div class="item">
                    <a class="ui primary button">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar menu">
        <a class="active item">Home</a>
        <a class="item">Work</a>
        <a class="item">Company</a>
        <a class="item">Careers</a>
        <a class="item">Login</a>
        <a class="item">Signup</a>
    </div>
    <div class="pusher">

        <div class="ui inverted vertical masthead center aligned segment">

            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="item"
                       href="<?php echo $this->route(["controller" => "home"]); ?>"><?php echo $this->loadImg("img/olive.png"); ?></a>
                    <a class="active item"
                       href="<?php echo $this->route(["controller" => "home"]); ?>"><?php echo $this->text("HOME"); ?></a>
                    <div class="ui pointing dropdown link item">
                        <span class="text"><?php echo $this->text("CATEGORIES"); ?></span>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="header"><?php echo $this->text("CATEGORIES"); ?></div>
                            <div class="divider"></div>
                            <?php foreach ($this->categories_tree as $category) : ?>
                                <div class="item">
                                    <i class="dropdown icon"></i>
                                    <span href="#"><?php echo $category['title']; ?></span>
                                    <?php if (isset($category['children']) && count($category['children']) > 0) : ?>
                                        <div class="menu">
                                            <div class="header"><?php echo $this->text("SUBCATEGORIES"); ?></div>
                                            <div class="divider"></div>
                                            <?php foreach ($category['children'] as $subcategory) : ?>
                                                <a class="item" href="<?php echo $this->route(["controller" => "category" , "action" => "view" , "params" => ["id" => $subcategory['id']]]); ?>"><?php echo $subcategory['title']; ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    </a>
                    <a class="item">Careers</a>
                    <a class="item">About Us</a>
                    <div class="right item">
                        <?php if($this->IsLoggedIn()){ ?>
                            <div class="ui inline labeled icon top right pointing dropdown">
                                <img class="ui avatar image"
                                     src="<?php echo $this->getConfig("URL"); ?>/assets/backend/images/avatar-default.gif">
                                <?php echo $this->getFromSession("user_name"); ?>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="<?php echo $this->route(["controller" => "user","action" => "edit"]); ?>"><i class="reply mail icon"></i><?php echo $this->text("MY_ACCOUNT"); ?></a>
                                    <a class="item" href="<?php echo $this->route(["controller" => "user","action" => "logout"]); ?>"><i class="sign out icon"></i><?php echo $this->text("LOGOUT"); ?></a>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <a class="ui inverted button"
                               href="<?php echo $this->route(["controller" => "login"]); ?>"><?php echo $this->text("LOGIN"); ?></a>
                            <a class="ui inverted button"
                               href="<?php echo $this->route(["controller" => "register"]); ?>"><?php echo $this->text("REGISTER"); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</header>
