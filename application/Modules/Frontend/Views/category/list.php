<br>
<h1>category name</h1>
<p><?php echo $this->category['title']; ?></p>
<h1>courses</h1>


<div class="ui link cards">
  <?php foreach($this->courses as $course): ?>
  <div class="card">
    <div class="image">
      <?php echo $this->loadImg($course['pic']); ?>
    </div>
    <div class="content">
      <div class="header"><?php echo $course['title']; ?></div>
      <div class="meta">
        <a>Friends</a>
      </div>
      <div class="description">
        <?php echo $course['description']; ?>
      </div>
    </div>
    <div class="extra content">
      <span class="floated">
        Created at <?php echo $course['created_at']; ?>
      </span>
      <span>
        <i class="user icon"></i>
        75 Users
      </span>
    </div>
  </div>
  <?php endforeach; ?>
</div>