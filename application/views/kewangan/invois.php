<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Invois Pelajar</h2>
			<div class="info"><?=@$info?></div>
			<div id="accordion">
			<h3>Bantuan</h3>
			<p>Pembayaran Yuran Pelajar</p>
			</div>

		<div class="form_settings">
		  <?=form_open()?>
            <p><span><label for="noresit">No Resit : </label></span>
			<?=form_input(array('name' => 'noresit', 'value' => set_value('noresit'), 'maxlength' => '30', 'size' => '12', 'id' => 'noresit'))?>
			<br /><?=form_error('noresit')?>
			</p>

            <p><span><label for="ktr_bayaran">Catatan : </label></span>
			<?=form_input(array('name' => 'ktr_bayaran', 'value' => set_value('ktr_bayaran'), 'size' => '12', 'id' => 'ktr_bayaran'))?>
			<br /><?=form_error('ktr_bayaran')?>
			</p>

            <p><span><label for="jumlah">Jumlah (RM) : </label></span>
			<?=form_input(array('name' => 'jumlah', 'value' => set_value('jumlah'), 'maxlength' => '30', 'size' => '12', 'id' => 'jumlah'))?>
			<br /><?=form_error('jumlah')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('simpan', 'Simpan', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

			<div class="demo">
				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>No Invois</th>
						<th>Tarikh</th>
						<th>Catatan</th>
						<th>Item</th>
					</tr>
					<?$j = 0?>
					<?foreach($all->result() AS $v):?>
						<tr>
							<td><?=$v->no_inv?></td>
							<td><?=date_view($v->tarikh_inv)?></td>
							<td><?=$v->ktr_invois?></td>
							<td>
								<table style="width:100%; border-spacing:0;">
									<tr>
										<th>Item</th>
										<th>Jumlah</th>
									</tr>
									<?$r = $this->pel_item_invois->GetWhere(array('no_inv' => $v->no_inv) , NULL, NULL)?>
									<?$i = 0?>
									<?foreach ($r->result() as $s):?>
										<tr>
											<td><?=$this->akaun->GetWhere(array('kod_akaun' => $s->kod_akaun) , NULL, NULL)->row()->keterangan_MY?></td>
											<td>RM <?=$s->jumlah?><?$i += $s->jumlah?></td>
										</tr>
									<?endforeach?>
									<tr>
										<td>Jumlah</td>
										<td><strong>RM <?=$v->jumlah == $i ? $i : 'Kira Tak Betui...'?><?$j += $i?></strong></td>
									</tr>
								</table>
							</td>
						</tr>
					<?endforeach?>
					<tr>
						<td colspan="3">Jumlah Keseluruhan Invois</td>
						<td><strong>RM <?=$j?></strong></td>
					</tr>
				</table>
			</div>

			<div class="demo">
				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>No Resit</th>
						<th>Tarikh</th>
						<th>Catatan</th>
						<th>Jumlah</th>
					</tr>
					<?$p = 0?>
					<?foreach($res->result() as $r):?>
						<tr>
							<td><?=$r->noresit?></td>
							<td><?=datetime_view($r->tarikhmasa_resit)?></td>
							<td><?=$r->ktr_bayaran?></td>
							<td><strong>RM <?=$r->jumlah?></strong><?$p += $r->jumlah?></td>
						</tr>
					<?endforeach?>
					<tr>
						<td colspan="3">Jumlah Keseluruhan Resit</td>
						<td><strong>RM <?=$p?></strong></td>
					</tr>
				</table>
			</div>
			<p>Baki : RM<?=$j?> - RM<?=$p?> = <strong>RM <?=($j - $p)?></strong></p>
	<?php endblock()?>

<?php end_extend() ?>