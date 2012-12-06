<? extend('base_template') ?>

	<? startblock('top_nav') ?>
		<li class="selected"><?=anchor(site_url(), 'Home', array('title' => 'Home'))?></li>
	<? endblock() ?>

	<? startblock('content') ?>
		<h2>Log Masuk</h2>
		<p>Sila masukkan nama pengguna dan kata laluan.</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		  <?=form_open()?>
            <p><span><label for="user">Nama Pengguna : </label></span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '12', 'size' => '12', 'id' => 'user'))?>
			<br /><?=form_error('username')?>
			</p>

            <p><span><label for="pass">Kata Laluan : </label></span>
			<?=form_password(array('name' => 'password', 'value' => set_value('password'), 'maxlength' => '10', 'size' => '10', 'id' => 'pass'))?>
			<br /><?=form_error('password')?>
			</p>
            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('login', 'Login', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

		<div class="demo"><?=anchor('isms/forgot_password', 'Terlupa Kata Laluan?', array('title' => 'Forgot password?'))?></div>

	<? endblock() ?>

<? end_extend() ?>