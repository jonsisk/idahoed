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