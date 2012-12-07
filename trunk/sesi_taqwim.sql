KOMEN :

HEA >> PROSES PERMOHONAN -- pindah masuk modul KEMASUKAN
HEA >> PENDAFTARAN -- pindah masuk modul KEMASUKAN

BORANG PERMOHONAN - perlu ada semakan ic dulu sblm ke borang..prevent duplicate ic...
kalo cek di borang tu sendiri pon bleh gak...tp admin dah isi form sampai abeh, tekan submit baru tau ic dah wujud...mula laa nk marah kot..hehehe
cara cek wujud: select ic from app_pelajar where ic=$cek_ic AND aktif=1 >> kalo wujud, x benarkan daftar baru

SET app_pelajar.aktif=0 jika : [tujuan nk benarkan pemohon yg gagal / bekas pelajar, mohon semula..tp dgn siri mohon baru...]
1) status_mohon = 'GL'  [penah mohon tp gagal]
2) status_mohon == 'TW' && dt_transfer IS NOT NULL  [bekas pelajar nk mohon semula]


PROSES PERMOHONAN
>> perlu ada : carian by nama/ic/sirimohon/status permohonan (gagal/tawar/diproses/dll)
>> perlu ada : paparan profil pemohon -- hat skang ni ada nama, academic info & program dipohon ja..
>> perlu ada : kemaskini status permohonan [cth: tukar drp gagal kepada ditawarkan]


MAKLUMAN:

BIDANG TUGAS BHG KEMASUKAN
1) BORANG PERMOHONAN : Isi borang permohonan baru
2) SENARAI PERMOHONAN : senarai pemohon, kemaskini info pemohon
3) PROSES PERMOHONAN : Proses borang Permohonan
4) PENDAFTARAN : Pendaftaran pelajar baru, jana no matrik, assign subject
5) KONFIGURASI : sesi intake, siri matrik

BIDANG TUGAS BHG HEA
1) MAKLUMAT PELAJAR : kemaskini maklumat pelajar(profil, akademik, waris)
2) DAFTAR SUBJEK : daftar subjek
3) STATUS PELAJAR : mengemaskini status pelajar (tangguh, tarik diri, gagal berhenti, dll)
4) PENGAKTIFAN : dibuat setiap awal semester (pelajar lama sahaja)
5) PENGAJIAN   : assign lecturer-subject 
6) PEPERIKSAAN : kelayakan memasuki peperiksaan, key-in markah pelajar, jana keputusan
7) KEHADIRAN PELAJAR : rekod kehadiran pelajar di dlm kelas
5) GRADUASI    : tetapan pelajar layak bergraduat
6) KONFIGURASI : taqwim akademik, program, subjek, skema gred, skema markah, sesi_konvo

BIDANG TUGAS BHG BENDAHARI
1) PELAJAR BARU : terima bayaran utk pendaftaran
2) YURAN PELAJAR : jana caj & terima bayaran
3) KONFIGURASI : jenis-jenis caj, caj mengikut program, no invois, no resit 

BIDANG TUGAS BHG HEP
1) ASRAMA - check-in/check-out, konfigurasi asrama, bilik
2) TAJAAN & PINJAMAN
3) REKOD DISIPLIN

BIDANG TUGAS BHG PERPUSTAKAAN
1) PINJAMAN BUKU : rekod pelajar yg belum memulangkan buku ke perpustakaan

ni saja dlu...komen2 lain bakal menyusul kemudian....hehehe...