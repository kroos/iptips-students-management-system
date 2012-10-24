<? extend('CSS3_four/main_template.php') ?>

	<? startblock('head') ?>
		<title><?=$this->config->item('title')?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="This is a System <?=$this->config->item('title')?> integrated with e-learning." />
		<meta name="keywords" content="Students Management, system, students management system, iptips, islam" />
		<meta name="author" content="Zaugola" />
		<link rel="shortcut icon" href="<?=base_url()?>images/favicon.ico" type="image/x-icon" />
	<? endblock() ?>

	<? startblock('top_nav') ?>
				<li class="selected"><a href="index.html">Home</a></li>
				<li><a href="examples.html">Examples</a></li>
				<li><a href="page.html">A Page</a></li>
				<li><a href="another_page.html">Another Page</a></li>
				<li><a href="#">Example Drop Down</a>
					<ul>
						<li><a href="#">Drop Down One</a></li>
						<li><a href="#">Drop Down Two</a>
							<ul>
								<li><a href="#">Sub Drop Down One</a></li>
								<li><a href="#">Sub Drop Down Two</a></li>
								<li><a href="#">Sub Drop Down Three</a></li>
								<li><a href="#">Sub Drop Down Four</a></li>
								<li><a href="#">Sub Drop Down Five</a></li>
							</ul>
						</li>
						<li><a href="#">Drop Down Three</a></li>
						<li><a href="#">Drop Down Four</a></li>
						<li><a href="#">Drop Down Five</a></li>
					</ul>
				</li>
				<li><a href="contact.php">Contact Us</a></li>
	<? endblock() ?>

	<? startblock('top_sidebar') ?>
			<h3>Latest News</h3>
			<h4>New Website Launched</h4>
			<h5>March 1st, 2012</h5>
			<p>2012 sees the redesign of our website. Let us know what you think..... <a href="#">read more</a></p>
	<? endblock() ?>
	
	<? startblock('mid_sidebar') ?>
		<h3>Special Offers</h3>
		<h4>20% Discount</h4>
		<p>For the month of March 2012, we are offering a 20% discount for all new customers.</p>
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
			<p>We'd love to hear from you. Call us, <a href="#">email us</a> or complete our <a href="contact.php">contact form</a>.</p>
	<? endblock() ?>

	<? startblock('content') ?>
		<h1>Welcome to the CSS3_four template</h1>
		<p>This simple, fixed width website template is released under a <a href="http://creativecommons.org/licenses/by/3.0">Creative Commons Attribution 3.0 Licence</a>. This means you are free to download and use it for personal and commercial projects. However, you <strong>must leave the 'design from css3templates.co.uk' link in the footer of the template</strong>.</p>
		<p>This template is written entirely in <strong>HTML5</strong> and <strong>CSS3</strong>. You can view more free CSS3 web templates <a href="http://www.css3templates.co.uk">here</a>. This template is a fully documented 5 page website, with an <a href="examples.html">examples</a> page that gives examples of all the styles available with this design. There is also a working PHP contact form on the contact page.</p>
		<h2>Browser Compatibility</h2>
		<p>This template has been tested in the following browsers:</p>
		<ul>
			<li>Internet Explorer 8</li>
			<li>Internet Explorer 7</li>
			<li>FireFox 10</li>
			<li>Google Chrome 17</li>
			<li>Safari 4</li>
	<? endblock() ?>

<? end_extend() ?>