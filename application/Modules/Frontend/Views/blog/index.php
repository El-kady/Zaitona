<br>

<h1>Blog Posts</h1>


<div class="ui link seven cards container">

    <?php foreach ($this->rows as $row): ?>
        <div class="ui fluid card">

            <div class="content">
                <div class="header">
                    <a href="<?php echo $this->route(["action" => "view", "params" => [$row["id"]]]); ?>" class="image">
                        <?php echo $row['title']; ?>
                    </a>
                </div>
                <div class="description">
                    <?php echo $row['content']; ?>
                </div>
            </div>
            <div class="extra content">
                <!-- <span class="floated">
        Created at
      </span> -->
                <span>
        <i class="user icon"></i>
                    <?php echo $row['created_at']; ?>
      </span>
            </div>
        </div>
    <?php endforeach; ?>
</div>
