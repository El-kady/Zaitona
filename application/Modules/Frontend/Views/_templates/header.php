<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?php echo $this->get("page_title",$this->getConfig("site_name")); ?></title>

    <?php echo $this->loadCSSLink("semantic/semantic.min.css"); ?>
    <?php echo $this->loadCSSLink("frontend/theme.css"); ?>

</head>

<body class="<?php echo strtolower($this->get("module")); ?>-module <?php echo strtolower($this->get("controller")); ?>-controller">

<header>

    <div class="ui main text container">
        <h1 class="ui header">Sticky Example</h1>
        <p>This example shows how to use lazy loaded images, a sticky menu, and a simple text container</p>
    </div>


    <div class="ui borderless main menu">
        <div class="ui text container">
            <div href="#" class="header item">
                Project Name
            </div>
            <a href="#" class="item">Blog</a>
            <a href="#" class="item">Articles</a>
            <a href="#" class="ui right floated dropdown item">
                Dropdown <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item">Link Item</div>
                    <div class="item">Link Item</div>
                    <div class="divider"></div>
                    <div class="header">Header Item</div>
                    <div class="item">
                        <i class="dropdown icon"></i>
                        Sub Menu
                        <div class="menu">
                            <div class="item">Link Item</div>
                            <div class="item">Link Item</div>
                        </div>
                    </div>
                    <div class="item">Link Item</div>
                </div>
            </a>
        </div>
    </div>
</header>

