<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Welcome to IPTIPs Students Management System</h1>
		<div class="form_settings">
		  <?=form_open()?>
            <p><span><label for="user">Username</label></span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '50', 'size' => '10', 'id' => 'user'))?>
			<br /><?=form_error('username')?>
			</p>

            <p><span><label for="pass">Password</label></span>
			<?=form_password(array('name' => 'password', 'value' => set_value('password'), 'maxlength' => '20', 'size' => '10', 'id' => 'pass'))?>
			<br /><?=form_error('password')?>
			</p>
            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('login', 'Login', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

		<div class="demo"><?=anchor('isms/forgot_password', 'Forgot Password?', array('title' => 'Forgot password?'))?></div>

	<? endblock() ?>

<? end_extend() ?>