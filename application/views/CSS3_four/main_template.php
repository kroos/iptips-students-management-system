<!DOCTYPE HTML>
<html>

<head>

<?php start_block_marker('head') ?>

<?php end_block_marker() ?>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/CSS3_four.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery/jquery-ui-1.9.1.custom.css" />
	<!-- modernizr enables HTML5 elements and feature detects -->
	<script type="text/javascript" src="<?=base_url()?>js/modernizr-1.5.min.js"></script>
	<title>
		<?php start_block_marker('title')?>
		IPTIP
		<?php end_block_marker()?>
	</title>
</head>

<body>
	<div id="main">
	<header>
		<div id="logo">
		<div id="logo_text">
			<!-- class="logo_colour", allows you to change the colour of the text -->
			<h1><a href="<?=site_url()?>">Students<span class="logo_colour"> Management System</span></a></h1>
			<h2>Simple. Contemporary. Reliable.</h2>
		</div>
		</div>
		<nav>
		<div id="menu_container">
			<ul class="sf-menu" id="nav">
			
<?php start_block_marker('top_nav') ?>

<?php end_block_marker() ?>

			</ul>
		</div>
		</nav>
	</header>
	<div id="site_content">
		<div id="sidebar_container">
		<div class="sidebar">

<?php start_block_marker('top_sidebar') ?>

<?php end_block_marker() ?>

		</div>
		<div class="sidebar">

<?php start_block_marker('mid_sidebar') ?>

<?php end_block_marker() ?>

		</div>
		<div class="sidebar">

<?php start_block_marker('bot_sidebar') ?>

<?php end_block_marker() ?>

		</div>
		</div>
		<div id="content">
	
<?php start_block_marker('content') ?>

<?php end_block_marker() ?>

		</div>
	</div>
	<div id="scroll">
		<a title="Scroll to the top" class="top" href="#"><img src="<?=base_url()?>images/top.png" alt="top" /></a>
	</div>
	<footer>
		<p>Page rendered in <strong>{elapsed_time}</strong> seconds using <strong>{memory_usage}</strong></p>
		<p>Copyright &copy;<?=mdate("%Y", mysql_to_unix(now()))?> Ayus Trading | <?=anchor(base_url(), 'Make Way With Us..', array('title' => 'Make Way With Us..'))?></p>
	</footer>
	</div>

	<!-- javascript at the bottom for fast page loading -->
	<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/jquery.easing-sooper.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/jquery.sooperfish.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('ul.sf-menu').sooperfish();
		$('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
	});
	</script>

<?php start_block_marker('jscript') ?>

<?php end_block_marker() ?>

</body>
</html>
