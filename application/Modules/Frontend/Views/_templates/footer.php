<?php echo $this->loadJSFile("jquery/jquery-3.1.1.min.js"); ?>
<?php echo $this->loadJSFile("semantic/semantic.min.js"); ?>
<script type="text/javascript">
	$('document').ready(function(){
		$('.ui.dropdown').dropdown();
	})
	$('.visible.example .ui.sidebar')
  .sidebar({
    context: '.visible.example .bottom.segment'
  })
  .sidebar('hide')
;
</script>

</body>
    
</html>