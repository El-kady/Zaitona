<div class="ui grid container">
	<!-- Non-responsive main left menu -->
    <div class="ui bottom attached segment pushable">
		<div class="ui visible left vertical sidebar menu">
			<a class="item ui medium rounded image">
		      <?php echo $this->loadImg($this->course['feature_image']); ?>
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
		
		<div class="pusher">
		<div class="grid container">
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
          			<ul>
          			<?php for ($i=0; $i<count($this->sections); $i++) : ;?>
          		      	
          		        <li class="chap-title"><b> SECTION <?php echo $i+1; ?> : </b>
          		        	<h5> <?php echo $this->sections[$i]['title']; ?> </h5>
          		        </li>
		
                			<div class="lec-left">
                      			<span class="course-no">1.1 </span>
                    		</div>
                    		<div class="lec-right">
                      			<div class="lec-url">
                        			<div class="lec-main fxac">
                          				<div class="lec-title">
											<i class="link icon"></i> 
											<a href="https://laravel.com/docs/5.2/providers" target="_blank">
												<?php foreach ($this->sections[$i]['materials'] as $material) {
													echo $material['title'],$material['file_name'];
												}  ?>
											</a>
				                            <span class="label label-default pull-right">Free</span>
				                            <span class="help-block small">Type:   external link  | Added: Mar 11, 2017 </span>
                          				</div>
                        			</div>
                      			</div>
                    		</div>
                  	<?php endfor;?>
        			</ul>
         			</div>
         		</div>
	         	

          	</div>
    	</div>
    	</div>
    </div>
</div>

