<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Pengesahan Pendaftaran Pelajar ke Asrama Kediaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Pengesahan untuk pendaftaran kemasukan pelajar ke asrama<br />
			Sila pastikan pelajar didaftarkan ke asrama kediaman yang betul<br />
			Contoh : pelajar lelaki didaftarkan ke asrama lelaki dan pelajar perempuan didaftarkan ke asrama kediaman perempuan
			</p>
        </div>

        <div class="info"><?=@$info?></div>

<?/*?> 		<?=form_open()?>
		<div class="form_settings">

			<p><span><?=form_label('Kod Hostel', 'kodhostel')?></span>
			<?=form_input(array('name' => 'kodhostel', 'value' => set_value('kodhostel'), 'id' => 'kodhostel'))?>
			<br /><?=form_error('kodhostel')?></p>

			<p><span>&nbsp;</span><?=form_submit('simpan', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>
 <?//*/?>
	<p>Anda pasti untuk mendaftarkan pelajar <b><?=$p->row()->nama?></b> bermatrik <b><?=$p->row()->matrik?></b> ke asrama kediaman <b><?=$this->hostel->GetWhere(array('kodhostel' => $b->row()->kodhostel), NULL, NULL)->row()->namahostel?></b> di bilik <b><?=$b->row()->nobilik?></b> ?</p>
	<div class="demo"><p><?=anchor('hep/registered/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0), 'YA' ,'title="YA"')?>&nbsp;<?=anchor('hep/daftar_pelajar/'.$this->uri->segment(3, 0), 'TIDAK', 'title="TIDAK"')?></p></div>
	<?php endblock()?>

<?php end_extend() ?>