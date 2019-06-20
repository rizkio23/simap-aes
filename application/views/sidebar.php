<div id="sidebar" class="sidebar py-3">
	<div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MENU</div>
	<!-- MENU ADMIN -->
	<?php if($this->session->userdata('role') == 1) { ?>
	<ul class="sidebar-menu list-unstyled">
		<li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#master" aria-expanded="false" aria-controls="master" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Data Master</span></a>
		<div id="master" class="collapse">
			<ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/master/jabatan'; ?>" class="sidebar-link text-muted pl-lg-5">Jabatan</a></li>
				<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/master/unit_kerja' ?>" class="sidebar-link text-muted pl-lg-5">Unit Kerja</a></li>
				<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/master/pegawai'; ?>" class="sidebar-link text-muted pl-lg-5">Pegawai</a></li>
				<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/master/jenis_surat'; ?>" class="sidebar-link text-muted pl-lg-5">Jenis Surat</a></li>
				<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/master/lokasi'; ?>" class="sidebar-link text-muted pl-lg-5">Lokasi</a></li>
				<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/master/media'; ?>" class="sidebar-link text-muted pl-lg-5">Media</a></li>
				<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/master/retensi'; ?>" class="sidebar-link text-muted pl-lg-5">Retensi</a></li>
				<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/master/inaktif'; ?>" class="sidebar-link text-muted pl-lg-5">Inaktif</a></li>
			</ul>
		</div>
		</li>
	</ul>
	<ul class="sidebar-menu list-unstyled">
		<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/page/pengguna'; ?>" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Atur Pengguna</span></a></li>
	</ul>
	<?php } ?>

	<!-- MENU PEGAWAI -->
	<?php if($this->session->userdata('role') == 0) { ?>
	<ul class="sidebar-menu list-unstyled">
		<li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#surat" aria-expanded="false" aria-controls="surat" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Surat Masuk & Keluar</span></a>
		<div id="surat" class="collapse">
			<ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/surat/masuk'; ?>" class="sidebar-link text-muted pl-lg-5">Surat Masuk</a></li>
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/surat/keluar'; ?>" class="sidebar-link text-muted pl-lg-5">Surat Keluar</a></li>
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/surat/masuk_list' ?>" class="sidebar-link text-muted pl-lg-5">Daftar Surat Masuk</a></li>
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/surat/keluar_list'; ?>" class="sidebar-link text-muted pl-lg-5">Daftar Surat Keluar</a></li>
			</ul>
		</div>
		</li>
	</ul>
	<!-- MENU PINJAM -->
	<ul class="sidebar-menu list-unstyled">
		<li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#pinjam" aria-expanded="false" aria-controls="pinjam" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Peminjaman</span></a>
		<div id="pinjam" class="collapse">
			<ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/peminjaman'; ?>" class="sidebar-link text-muted pl-lg-5">Peminjaman</a></li>
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/peminjaman/konfirmasi' ?>" class="sidebar-link text-muted pl-lg-5">Konfirmasi Peminjaman</a></li>
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/peminjaman/riwayat'; ?>" class="sidebar-link text-muted pl-lg-5">Riwayat Peminjaman</a></li>
			</ul>
		</div>
		</li>
	</ul>
	<!-- MENU DISPOSISI -->
	<ul class="sidebar-menu list-unstyled">
		<li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#dispo" aria-expanded="false" aria-controls="dispo" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Disposisi</span></a>
		<div id="dispo" class="collapse">
			<ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/disposisi'; ?>" class="sidebar-link text-muted pl-lg-5">Disposisi Arsip</a></li>
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/disposisi/riwayat' ?>" class="sidebar-link text-muted pl-lg-5">Riwayat Disposisi</a></li>
			</ul>
		</div>
		</li>
	</ul>
	<!-- MENU AKTIF SURAT -->
	<ul class="sidebar-menu list-unstyled">
		<li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#aktif" aria-expanded="false" aria-controls="aktif" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Masa Aktif Surat</span></a>
		<div id="aktif" class="collapse">
			<ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/retensi/arsip_aktif'; ?>" class="sidebar-link text-muted pl-lg-5">Arsip Aktif</a></li>
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/retensi/arsip_inaktif' ?>" class="sidebar-link text-muted pl-lg-5">Arsip Inaktif</a></li>
			<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/index.php/retensi/retensi_arsip'; ?>" class="sidebar-link text-muted pl-lg-5">Retensi Arsip</a></li>
			</ul>
		</div>
		</li>
	</ul>
	<ul class="sidebar-menu list-unstyled">
		<li class="sidebar-list-item"><a href="<?php echo base_url().'index.php/laporan'; ?>" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Laporan</span></a></li>
	</ul>
	<?php } ?>
</div>