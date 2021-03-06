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
		<li <?=($this->uri->segment(1, 0) == 'isms' ? 'class="selected"' : '')?>><?=anchor('isms/home', 'Home', array('title' => 'Home'))?>
			<ul>
				<li><?=anchor('#', 'User', array('title' => 'User'))?>
					<ul>
						<li><?=anchor('isms/profile', 'Profail', array('title' => 'Profail'))?></li>
						<li><?=anchor('isms/change_pass', 'Tukar Kata Laluan', array('title' => 'Tukar Kata Laluan'))?></li>
					</ul>
				</li>
				<li><?=anchor('#', 'Admin', array('title' => 'Admin'))?>
					<ul>
						<li><?=anchor('isms/add_user', 'Tambah Pengguna', array('title' => 'Tambah Pengguna'))?></li>
						<li><?=anchor('isms/user_cat', 'Tambah Jabatan Kepada Pengguna', array('title' => 'Tambah Jabatan Kepada Pengguna'))?></li>
						<li><?=anchor('isms/user_perm_edit', 'Edit Capaian Pengguna', array('title' => 'Edit Capaian Pengguna'))?></li>
					</ul>
				</li>
				<li><?=anchor('#', 'Developer', array('title' => 'Developer'))?>
					<ul>
						<li><?=anchor('isms/devel', 'Setup Function', array('title' => 'Setup Function'))?></li>
						<li><?=anchor('isms/truncate', 'Truncate System', array('title' => 'Truncate System'))?></li>
					</ul>
				</li>
			</ul>
		</li>

<?$t = $this->user_department->GetAllXISMS()?>
<?foreach($t->result() as $g):?>
	<li <?=($this->uri->segment(1, 0) == $g->dept_ctrlr ? 'class="selected"' : '')?>>
		<?=anchor($g->dept_ctrlr.'/index', $g->dept, array('title' => $g->dept))?>
		<ul>
			<?$u = $this->view->menu($g->id)?>
			<?foreach($u->result() as $d):?>
				<li><?=anchor($g->dept_ctrlr.'/'.$d->function, $d->menu, array('title' => $d->menu))?></li>
			<?endforeach?>
		</ul>
	</li>
<?endforeach?>

		<li><?=anchor('isms/logout', 'Log Keluar', array('title' => 'Log Keluar'))?></li>
	<? endblock() ?>

	<? startblock('top_sidebar') ?>
			<h3>Staff</h3>
		<?$r = $this->user_data->id($this->session->userdata('id_user'))?>
			<h4>Hello <?=$r->row()->name?></h4>
			<h5><?=date_view(now())?></h5>
			<p><?=$this->user_data->GetAll()->num_rows()?> Staff</p>
	<? endblock() ?>
	
	<? startblock('mid_sidebar') ?>
		<h3>Jabatan Staff</h3>
		<h4>Jabatan : </h4>
		<?$g = $this->user_dept->id_user_data($this->session->userdata('id_user'))?>
		<ul>
			<?foreach($g->result() as $l):?>
				<?$u = $this->user_department->id($l->id_user_department)?>
				<li><?=$u->row()->dept?></li>
			<?endforeach?>
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
		<script type="text/javascript" src="<?=base_url()?>js/jquery/ucwords.js"></script>
		<script>
			$(function() {
				$( "input[type=submit], a, button", ".demo" )
					.button();
				$( "#radioset" ).buttonset();

				// Datepicker
				$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			
				$( "#accordion" ).accordion({
					collapsible: true
				});

				//ucwords
				$("input[type=text], textarea").keyup(function() {
					toUpper(this);
				});
			});
		</script>
	<? endblock() ?>

<? end_extend() ?>