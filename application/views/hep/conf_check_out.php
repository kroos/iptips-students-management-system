<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Pengesahan Pendaftaran Keluar Pelajar dari Asrama Kediaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Pengesahan untuk pendaftaran Keluar pelajar dari asrama</p>
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
<?php
$idbilik = $p->row()->idbilik;
$nobilik = $this->host_bilik->GetWhere(array('id' => $idbilik), NULL, NULL);
$asrama = $this->hostel->GetWhere(array('kodhostel' => $nobilik->row()->kodhostel), NULL, NULL)->row()->namahostel;

?>
	<p>Anda pasti untuk mendaftar keluar pelajar <b><?=$p->row()->matrik?></b> dari asrama kediaman <b><?=$asrama?></b> di bilik <b><?=$nobilik->row()->nobilik?></b> ?</p>
	<div class="demo"><p><?=anchor('hep/check_out/'.$this->uri->segment(3, 0), 'YA' ,'title="YA"')?>&nbsp;<?=anchor('hep/checkout_asrama', 'TIDAK', 'title="TIDAK"')?></p></div>
	<?php endblock()?>

<?php end_extend() ?>