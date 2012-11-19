<? extend('base_template') ?>

	<? startblock('top_nav') ?>
		<li class="selected"><?=anchor(site_url(), 'Home', array('title' => 'Home'))?></li>
	<? endblock() ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Lupa Kata Laluan</h3>
		<p>Masukan nama pengguna dan juaga email anda untuk mengetahui kata laluan. Kata laluan akan dihantar ke email anda.</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		  <?=form_open()?>
            <p><span><label for="user">Nama Pengguna : </label></span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '12', 'size' => '12', 'id' => 'user'))?>
			<br /><?=form_error('username')?>
			</p>

            <p><span><label for="pass">Email : </label></span>
			<?=form_input(array('name' => 'email', 'value' => set_value('email'), 'maxlength' => '50', 'size' => '20', 'id' => 'pass'))?>
			<br /><?=form_error('email')?>
			</p>
            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('for_pass', 'Send Password', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

	<? endblock() ?>

<? end_extend() ?>