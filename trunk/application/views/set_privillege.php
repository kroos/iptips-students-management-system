<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Penetapan kebenaran capaian untuk pengguna <?=$u->row()->name?></h2>
		<p>Klik di function samada untuk memberi kebenaran kepada <strong><?=$u->row()->name?></strong></p>
		<p><font color="#FF0000"><?=@$info?></font></p>
		<table style="width:100%; border-spacing:0;">
			<tr>
				<td>&nbsp;</td>
				<td>Jabatan</td>
				<td>Fungsi</td>
				<td>Keterangan</td>
				<td>Kebenaran</td>
			</tr>
			<?foreach($u->result() as $l):?>
				<tr>
					<td><?=$l->id?></td>
					<td><?=$l->dept?></td>
					<td><?=$l->function?></td>
					<td><?=$l->remarks?></td>
					<td><div class="demo"><?=($l->active == 1 ? anchor('isms/update_privillege/'.$l->id.'/'.$l->id_user_data.'/0', 'Aktif', array('title' => 'Aktif')) : anchor('isms/update_privillege/'.$l->id.'/'.$l->id_user_data.'/1', 'Tidak Aktif', array('title' => 'Tidak Aktif')))?></div></td>
				</tr>
			<?endforeach?>
		</table>


	<? endblock() ?>

<? end_extend() ?>