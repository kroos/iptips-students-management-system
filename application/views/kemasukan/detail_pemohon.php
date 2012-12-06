<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h2>Keterangan Pemohon</h2>                
			<h3>Nama Pemohon : <strong><?=$pe->row()->nama?></strong></h3>
			<div class="info"><p><?=@$info?></p></div>

        <div class="form_settings">
			<p><span>No Kad Pengenalan : </span><?=$pe->row()->ic?></p>
			<p><span>No Passport : </span><?=$pe->row()->passport?></p>
			<p><span>Jantina : </span><?=$this->sel_gender->get($pe->row()->jantina)->row()->gender_MY?></p>
			<p><span>Status : </span><?=$this->sel_marital->get($pe->row()->status_kahwin)->row()->marital_MY?></p>
		</div>

		<table>
			<thead>
				<tr>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>

		<div class="demo"><p><?=anchor('/kemasukan/senarai_pemohon', 'Back', 'title="Back Button"')?></p></div>
	<? endblock() ?>

<? end_extend() ?>