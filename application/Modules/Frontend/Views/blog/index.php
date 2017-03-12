<br>

<div class="ui main container">

    <h2 class="ui dividing header">Blog Posts</h2>


    <h3 class="ui header">
        <?php foreach ($this->rows as $row): ?>
        <a href="<?php echo $this->route(["action" => "view", "params" => [$row["id"]]]); ?>" class="image">
            <?php echo $row['title']; ?>
        </a>
    </h3>

    <div>
        <p>
            <br>
            <?php echo wordwrap($row['content'], 200, "<br />\n"); ?>
        </p>

        <span>
        <i class="user icon"></i>
            <?php echo $row['created_at']; ?>
        </span>

    </div>
    <br>
    <h4 class="ui horizontal divider header">
        <i class="bar chart icon"></i>
        Zaitona
    </h4>

    <?php endforeach; ?>
</div>

