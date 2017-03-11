<div class="ui inverted vertical footer segment">
	<div class="ui container">
		&copy; <?php echo date("Y"); ?>
	</div>
</div>

</div>

<?php echo $this->loadJSFile("jquery/jquery-3.1.1.min.js"); ?>
<?php echo $this->loadJSFile("semantic/semantic.min.js"); ?>

<script type="text/javascript">
    $(document)
        .ready(function() {
            $('.ui.dropdown').dropdown();
            // fix menu when passed
            $('.masthead')
                .visibility({
                    once: false,
                    onBottomPassed: function() {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function() {
                        $('.fixed.menu').transition('fade out');
                    }
                })
            ;
            $('.ui.sidebar').sidebar('attach events', '.toc.item');
        });
</script>

</body>
    
</html>