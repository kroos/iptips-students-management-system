<? extend('CSS3_four/main_template.php') ?>

	<? startblock('head') ?>
		<title><?=$this->config->item('title')?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="This is a System <?=$this->config->item('title')?> integrated with e-learning." />
		<meta name="keywords" content="Students Management, system, students management system, iptips, islam" />
		<meta name="author" content="Zaugola" />
		<link rel="shortcut icon" href="<?=base_url()?>images/favicon.ico" type="image/x-icon" />
		<link href="<?=base_url()?>css/jquery/jquery-ui-1.9.1.custom.css" rel="stylesheet">
	<? endblock() ?>

	<? startblock('top_nav') ?>
		<li class="selected"><?=anchor(site_url(), 'Home', array('title' => 'Home'))?></li>
	<? endblock() ?>

	<? startblock('top_sidebar') ?>
			<h3>Staff Section</h3>
			<h4>Staff</h4>
			<h5><?=date_view(now())?></h5>
			<p><?=$this->user_data->GetAll()->num_rows()?> Staff</p>
	<? endblock() ?>
	
	<? startblock('mid_sidebar') ?>
		<h3>Student Section</h3>
		<h4>No of Student</h4>
		<h5><?=date_view(now())?></h5>
		<p>berapa org student?</p>

		<ul>
			<li><a href="#">First Link</a></li>
			<li><a href="#">Another Link</a></li>
			<li><a href="#">And Another</a></li>
			<li><a href="#">One More</a></li>
			<li><a href="#">Last One</a></li>
		</ul>
	<? endblock() ?>

	<? startblock('bot_sidebar') ?>
			<h3>Contact Us</h3>
			<p>We'd love to hear from you. Call us or complete our <?=anchor('isms/contact_us', 'contact us', array('title' => 'contact us'))?>.</p>
	<? endblock() ?>

	<? startblock('content') ?>
		<p>This simple, fixed width website template is released under a <div class="demo"><a href="http://creativecommons.org/licenses/by/3.0">Creative Commons Attribution 3.0 Licence</a></div>. This means you are free to download and use it for personal and commercial projects. However, you <strong>must leave the 'design from css3templates.co.uk' link in the footer of the template</strong>.</p>
		<p>This template is written entirely in <strong>HTML5</strong> and <strong>CSS3</strong>. You can view more free CSS3 web templates <a href="http://www.css3templates.co.uk">here</a>. This template is a fully documented 5 page website, with an <a href="examples.html">examples</a> page that gives examples of all the styles available with this design. There is also a working PHP contact form on the contact page.</p>
		<h2>Browser Compatibility</h2>
		<p>This template has been tested in the following browsers:</p>
		<ul>
			<li>Internet Explorer 8</li>
			<li>Internet Explorer 7</li>
			<li>FireFox 10</li>
			<li>Google Chrome 17</li>
			<li>Safari 4</li>
		</ul>
	<? endblock() ?>

	<? startblock('jscript') ?>
		<script src="<?=base_url()?>js/jquery/jquery-ui-1.9.1.custom.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>
		<script>
			$(function() {
				$( "input[type=submit], a, button", ".demo" )
					.button();
				$( "#radioset" ).buttonset();

				// Datepicker
				$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			});
		</script>
	<? endblock() ?>

<? end_extend() ?>