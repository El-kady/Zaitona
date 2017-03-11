<main class="ui page grid">
	<!-- Non-responsive main left menu -->
    <div class="ui bottom attached segment pushable">
		<div class="ui padded visible left vertical sidebar menu">
			<a class="item ui medium rounded image">
			<img src="<?php echo $this->uploadedFile($this->course["featured_image"]); ?>">
		      
		    </a>
		    <a class="item" href="<?php echo $this->route(["controller" => "category" , "action" => "view" , "params" => ["id" => $this->category['id']]]); ?>">
		      <i class="block layout icon"></i>
		      <?php echo $this->text("CATEGORY"); ?> :<br><br>
		      <?php echo $this->category_parent['title']; ?> / <?php echo $this->category['title']; ?>
		    </a>
		    <a class="item">
		      <i class="user circle icon"></i>
		      <?php echo $this->text("INSTRUCTOR"); ?> :<br><br>

		    </a>
		    <a class="item">
		      <i class="calendar icon"></i>
		      Created at:<br><br>
			  <?php echo $this->course['created_at']; ?>
		    </a>
		</div>
		
		<div class="ui padded pusher">
		<div class="ui padded grid container">

		<div class="ui breadcrumb row">
  <div class="section"><?php echo $this->category_parent['title']; ?></a>
  <i class="right angle icon divider"></i>
  <a class="section" href="<?php echo $this->route(["controller" => "category" , "action" => "view" , "params" => ["id" => $this->category['id']]]); ?>"><?php echo $this->category['title']; ?></a>
  <i class="right angle icon divider"></i>
  <div class="active section"><?php echo $this->course['title']; ?></div>
</div>

			<div class="ui vertical segments container">
		      
				<div class="ui raised very padded segment">
        
          			<h1 class="header">
          				<div class="ui mini image">
          				<?php echo $this->loadImg($this->course['feature_image']); ?>
          				</div>
          				<?php echo $this->course['title']; ?>
          			</h1>
          			<h4 class="header">description</h4>
          			<div class="description">
          				<p>
          				<?php echo $this->course['introduction']; ?><br><br>
          				<?php echo nl2br($this->course['description']); ?>
          				</p>
          			</div>
          			<h4 class="header">
          			course requirements
          			</h4>
          			<div class="description">
          				<p>
          				<?php echo nl2br($this->course['requirement']); ?>
          				</p>
          			</div>
         			<h4 class="header">What is the target audience</h4>
          			<div class="description">
          				<p>
          				<?php echo nl2br($this->course['audience']); ?>
          				</p>
          			</div>
          		</div>

          		<div class="ui raised very padded segment">
          		    <h4>LESSONS</h4>
					<div class="ui vertical segments container">
						<?php for ($i=0; $i<count($this->sections); $i++) : ;?>
						<h4 class="ui attached block header">
 							SECTION <?php echo $i+1; ?> : <?php echo $this->sections[$i]['title']; ?>
   						</h4>
  						<div class="ui attached segment">
  						<?php foreach ($this->sections[$i]['materials'] as $material) :?>
						<a href="<?php echo $this->route(["controller" => "material" , "action" => "view" , "params" => ["id" => $material['id']]]); ?>">
						<?php echo $material['title'],$material['file_name'];?>
    					
						</a>
						<?php endforeach;?>
  						</div>
  						<?php endfor;?>
  					</div>

          			
         		</div>
         		</div>
	         	

          	</div>
    	</div>
    </div>
</div>
</main>



