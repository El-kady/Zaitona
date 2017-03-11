
<br>
<h1>category name</h1>
<p><?php echo $this->category['title']; ?></p>
<h1>courses</h1>


<div class="ui link seven cards container">

  <?php foreach($this->courses as $course): ?>
  <div class="ui fluid card">
    <a href="<?php echo $this->route(["controller" => "course" , "action" => "view" , "params" => ["id" => $course['id']]]); ?>" class="image">
      <?php echo $this->loadImg($course['feature_image']); ?>
    </a>
    <div class="content">
      <div class="header"><?php echo $course['title']; ?></div>
      <div class="description">
        <?php echo $course['introduction']; ?>
      </div>
    </div>
    <div class="extra content">
      <!-- <span class="floated">
        Created at <?php echo $course['created_at']; ?>
      </span> -->
      <span>
        <i class="user icon"></i>
        75 Users
      </span>
    </div>
  </div>
  <?php endforeach; ?>
</div>
