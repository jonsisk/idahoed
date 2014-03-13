<?php global $npdv_options, $currentcat; ?>
<div id="footer">
	<div id="footer_nav">
			<?php wp_nav_menu( array('depth' => '1', 'menu' => 'Footer Menu', 'container' => false));?>
	</div>
	<div id="foot_copyright">Copyright &copy; 2012-<?php echo date(Y);?> Idaho Education News. All Rights Reserved.</div>
	<div class=clear></div>
</div>
<div id="footerlogos">
	<a href="http://www.jkaf.org/" target="_blank"><img src="<?php bloginfo('stylesheet_directory')?>/images/f-albertson.png" /></a>
	<a href="http://www.boisestate.edu/" target="_blank"><img src="<?php bloginfo('stylesheet_directory')?>/images/f-boisestate.png" /></a>
	<a href="https://education.boisestate.edu/idaholeads/" target="_blank"><img src="<?php bloginfo('stylesheet_directory')?>/images/f-idaholeads.png" /></a>
	<a href="http://csi.boisestate.edu/" target="_blank"><img src="<?php bloginfo('stylesheet_directory')?>/images/f-centernew1.png" /></a>
</div>
<?php wp_footer(); ?>
<?php echo $npdv_options["stattracker"]; ?>
<script type="text/javascript"> Cufon.now(); </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36893761-1', 'idahoednews.org');
  ga('send', 'pageview');

</script>