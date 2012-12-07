<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h2>Keterangan Pemohon</h2>                
			<h3>Nama Pemohon : <strong><?=$pe->row()->nama?></strong></h3>
			<div class="info"><p><?=@$info?></p></div>

        <div class="form_settings">
			<p><span>Sesi Permohonan : </span><?=$pe->row()->sesi_mohon?></p>
			<p><span>No Kad Pengenalan : </span><?=$pe->row()->ic?></p>
			<p><span>No Passport : </span><?=$pe->row()->passport?></p>
			<p><span>Jantina : </span><?=$this->sel_gender->get($pe->row()->jantina)->row()->gender_MY?></p>
			<p><span>Tarikh Lahir : </span><?=date_view($pe->row()->dt_lahir)?></p>
			<p><span>Tempat Lahir : </span><?=$this->sel_bandar->get($pe->row()->tempat_lahir)->row()->namabandar?></p>
			<p><span>Warganegara : </span><?=$this->sel_negara->get($pe->row()->warganegara)->row()->namanegara?></p>
			<p><span>Status Warganegara : </span><?=$this->sel_warga->get($pe->row()->status_warga)->row()->warga_MY?></p>
			<p><span>Bangsa : </span><?=$this->sel_race->get($pe->row()->bangsa)->row()->bangsa_MY?></p>
			<p><span>Alamat 1 : </span><?=$pe->row()->alamat1?></p>
			<p><span>Alamat 2 : </span><?=$pe->row()->alamat2?></p>
			<p><span>Poskod : </span><?=$pe->row()->poskod?></p>
			<p><span>Bandar : </span><?=$this->sel_bandar->get($pe->row()->bandar)->row()->namabandar?></p>
			<p><span>Negeri : </span><?=$this->sel_negeri->get($pe->row()->negeri)->row()->namanegeri?></p>
			<p><span>Negara : </span><?=$this->sel_negara->get($pe->row()->negara)->row()->namanegara?></p>
			<p><span>No telefon : </span><?=$pe->row()->notel?></p>
			<p><span>No Telefon Bimbit : </span><?=$pe->row()->nohp?></p>
			<p><span>Emel : </span><?=$pe->row()->emel?></p>
		</div>

		<table>
			<thead>
				<tr>
					<th>Permohonan Program</th>
					<th>Akademik</th>
					<th>Waris</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					<!-- table program -->
					
		<table>
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>Kod Program</th>
					<th>Program</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?=$prog->row()->pilihan?></td>
					<td><?=$prog->row()->kod_prog?></td>
					<td><?=$this->program->GetWhere(array('kod_prog' => $prog->row()->kod_prog))->row()->namaprog_MY?></td>
				</tr>
			</tbody>
		</table>
					
					</td>
					<td>
					<!-- table akademik -->
					
		<table>
			<thead>
				<tr>
					<th>Institusi</th>
					<th>Tahap</th>
					<th>Subjek</th>
					<th>Gred</th>
				</tr>
			</thead>
			<tbody>
			<?foreach($akad->result() as $a):?>
				<tr>
					<td><?=$a->institusi?></td>
					<td><?=$this->sel_level->get_where(array('kodtahap' => $a->level))->row()->tahap_MY?></td>
					<td>

					<table>
					<?$j = $this->app_subjek_akademik->get_where(array('akademik_id' => $a->id))?>
					<?foreach($j->result() AS $h):?>
						<tr>
							<td><?=$this->sel_subjek->GetWhere(array('kodsubjek' => $h->subjek))->row()->subjek_MY?></td>
							<td><?=$h->gred?></td>
						</tr>
					<?endforeach?>
					</table>

					</td>
				</tr>
			<?endforeach?>
			</tbody>
		</table>
					
					</td>
					<td>
					<!-- table waris -->
					
		<table>
			<thead>
				<tr>
					<th>Waris</th>
					<th>Hubungan</th>
					<th>No Telefon Bimbit</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?=$war->row()->nama?></td>
					<td><?=$this->sel_hubungan->GetWhere(array('kodhubungan' => $war->row()->hubungan))->row()->hubungan_MY?></td>
					<td><?=$war->row()->nohp?></td>
				</tr>
			</tbody>
		</table>
					
					</td>
				</tr>
			</tbody>
		</table>

		<div class="demo"><p><?=anchor('/kemasukan/senarai_pemohon', 'Back', 'title="Back Button"')?></p></div>
	<? endblock() ?>

<? end_extend() ?>