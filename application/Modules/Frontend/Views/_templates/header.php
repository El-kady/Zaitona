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
            <a class="item" href="<?php echo $this->route(["controller" => "home"]); ?>"><?php echo $this->loadImg("img/olive.png"); ?></a>
            <a class="active item" href="<?php echo $this->route(["controller" => "home"]); ?>"><?php echo $this->text("HOME"); ?></a>
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
                  <?php if (count($category['subcategories']) > 0) :?>
                  <div class="menu">
                    <div class="header"><?php echo $this->text("SUBCATEGORIES"); ?></div>
                    <div class="divider"></div>
                    <?php foreach ($category['subcategories'] as $subcategory) : ?>
                    <div class="item" href="<?php echo $this->route(["controller" => "category" , "action" => "list"]); ?>"><?php echo $subcategory['title']; ?></div>
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
              <a class="ui inverted button" href="<?php echo $this->route(["controller" => "login"]); ?>"><?php echo $this->text("LOGIN"); ?></a>
              <a class="ui inverted button" href="<?php echo $this->route(["controller" => "register"]); ?>"><?php echo $this->text("REGISTER"); ?></a>
            </div>
          </div>
        </div>
       </div>
    </div>
    


</header>
