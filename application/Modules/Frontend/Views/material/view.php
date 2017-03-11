<!-- end nav -->
<br><br><br><br>
    <main class="ui page grid">
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
    </main>
