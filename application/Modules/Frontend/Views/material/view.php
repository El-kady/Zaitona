<!-- end nav -->

<div class="ui container main">
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui vertical steps">
                <div class="step">
                    <img class="ui image" src="<?php echo $this->uploadedFile($this->course["featured_image"]); ?>">
                </div>
                <div class="step">
                    <i class="list layout icon"></i>
                    <div class="content">
                        <div class="title"><?php echo $this->text("COURSE"); ?></div>
                        <div class="description">
                            <?php echo $this->course['title']; ?>
                        </div>
                    </div>
                </div>
                <div class="step">
                    <i class="user icon"></i>
                    <div class="content">
                        <div class="title"><?php echo $this->text("INSTRUCTOR"); ?></div>
                        <div class="description">

                            <?php echo $this->instructor["name"]; ?>
                        </div>
                    </div>
                </div>
                <div class="step">
                    <i class="calendar icon"></i>
                    <div class="content">
                        <div class="title"><?php echo $this->text("DATE"); ?></div>
                        <div class="description">
                            <?php echo $this->strDate($this->material["created_at"]); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="ten wide column">



        <?php if ($this->material['type'] == 2) : ?>
        <div class="row">
            <div class="column">
                <div class="ui embed" data-source="<?php echo $this->material['provider'];?>" data-id="<?php echo $this->material['link_id'];?>" data-icon="video" ></div>
            </div>
        </div>
        <?php else : ?>
        <div class="row">
            <div class="column">
                <div class="ui vertical segments container">
                    <h4 class="ui attached top block header">
                        <?php echo $this->material['title']; ?>
                    </h4>
                    <div class="ui very padded attached segment">
                        
                        size : <?php echo ($this->material['file_size']/1000)," kb";?>
                        <br>created at : <?php echo ($this->material['created_at']);?>
                        <a class="ui button right floated" href="<?php echo $this->route(["controller" => "material" , "action" => "download" , "params" => ["id" => $this->material['id']]]); ?>">Download</a>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="ui divider"></div>

        <div class="three column row">
            <div class="ui centered column">
                <div class="ui piled blue segment">
                    <h2 class="ui header">
                        <i class="icon inverted circular blue comment"></i> Comments
                    </h2>
                    <div class="ui comments">
                        <?php foreach ($this->comments as $comment) : ?>
                        <div class="comment">
                            <div class="content">
                                <a class="author"><?php echo $comment['user_name']['name']; ?></a>
                                <div class="metadata">
                                    <span class="date"><?php echo $comment['created_at']; ?></span>
                                </div>
                                <div class="text">
                                    <?php echo $comment['comment']; ?>
                                </div>
                                <?php if ($this->getFromSession("user_id") == $comment['user_name']['id']) : ?>
                                <div class="actions">
                                    <a class="ui red button delete" href="<?php echo $this->route(["controller" => "comment" , "action" => "delete" , "params" => ["id" => $comment['id'], "material" => $this->material['id']]]); ?>">Delete</a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ui divider"></div>
                        <?php endforeach; ?>

                        <?php if ($this->IsLoggedIn()) : ?>
                        <form class="ui reply form" method="post" action="<?php echo $this->route(["controller" => "comment" , "action" => "save"]); ?>" >
                            <div class="field">
                                <textarea name="comment"></textarea>
                                <input type="hidden" name="user" value="<?php echo $this->getFromSession("user_id"); ?>">
                                <input type="hidden" name="material" value="<?php echo $this->material['id']; ?>">
                                <input type="hidden" name="back" value="<?php echo $this->selfRoute(); ?>">
                            </div>
                            <button class="ui fluid blue labeled submit icon button" type="submit">
                                <i class="icon edit"></i> Add Comment
                            </button>
                        </form>
                        <?php else : ?>
                            <div class="ui divider"></div>
                            <p>Please <a href="<?php echo $this->route(["controller" => "login"]); ?>">LOGIN</a> to leave a comment</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

