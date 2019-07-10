<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <h3 class="mt-5"><?php echo $judul; ?></h3>
    <?php if (isset($_SESSION['pesan'])) { ?>
    <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
    </div>
    <?php } ?>
    <section class="py-5">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <h6 class="text-uppercase mb-0">Daftar Pengguna Aplikasi</h6>
            </div>
            <div class="col-lg-2">
              <button class="btn btn-sm btn-success pull-right" href="#modal-tambah" data-toggle="modal">Tambah Pengguna</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-sm card-text table-center">
            <thead>
              <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Hak Akses</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pengguna as $p) { ?>
              <tr>
                <td><?php echo $p->NIP; ?></td>
                <td><?php echo $p->NAMA; ?></td>
                <td><?php echo $p->EMAIL; ?></td>
                <td><?php echo $p->PREVILAGE==1?"Admin":"Normal"; ?></td>
                <td>
                  <button class="btn btn-sm btn-warning" href="#modal-lihat" data-toggle="modal" onclick="lihat(<?php echo $p->ID_PENGGUNA; ?>)">LIHAT</button>
                  <button class="btn btn-sm btn-info" href="#modal-edit" data-toggle="modal" onclick="edit(<?php echo $p->ID_PENGGUNA; ?>)">EDIT</button>
                  <?php if($p->NIP != $this->session->userdata('nip')) { ?>
                  <a href="<?php echo base_url().'index.php/pengguna/hapus/'.$p->ID_PENGGUNA; ?>">
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin?');">HAPUS</button>                  
                  </a>
                  <button class="btn btn-sm btn-danger" href="#modal-edit" data-toggle="modal" onclick="edit(<?php echo $p->ID_PENGGUNA; ?>)">EDIT</button>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>    
        </div>
      </div>
    </section>
  </div>
</div>  

<div id="modal-tambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Tambah Pengguna
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/pengguna/tambah"; ?>' method='post'>
      <div class='modal-body no-padding'>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='nip'>NIP</label>
            <div class='col-sm-8'>
              <input type='text' id='nip' name='nip' placeholder='NIP' class='col-xs-10 col-sm-6' required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='nama'>Nama</label>
            <div class='col-sm-9'>
              <input type='text' id='nama' placeholder='Nama' class='col-xs-10 col-sm-9' readonly="" required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='pass'>Password</label>
            <div class='col-sm-9'>
              <input type='password' id='pass' name='pass' placeholder='Password' class='col-xs-10 col-sm-9' required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='email'>Email</label>
            <div class='col-sm-9'>
              <input type='text' id='email' name='email' placeholder='Email' class='col-xs-10 col-sm-9' required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='prev'>Hak Akses</label>
            <div class='col-sm-9'>
              <select id='prev' name='prev' class='col-xs-10 col-sm-9' required>
                <option>-- Pilih --</option>
                <option value='0'>Normal</option>
                <option value='1'>Admin</option>
              </select>
            </div>
          </div>
      </div>
      <div class='modal-footer no-margin-top'>
        <button class='btn btn-sm btn-danger pull-left' data-dismiss='modal'>
          <i class='ace-icon fa fa-times'></i> Tutup
        </button>&nbsp;
        <button class='btn btn-primary btn-sm' type='submit' id="btn-simpan">
          <i class='ace-icon fa fa-check'></i> Simpan
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal-lihat" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Detil Pengguna
				</div>
			</div>
			<div class="modal-body no-padding" id="lihat"></div>
      <div class="modal-footer no-margin-top">
  			<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
  				<i class="ace-icon fa fa-times"></i>
  				Tutup
  			</button>
      </div>
    </div>
  </div>
</div>

<div id="modal-edit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Edit Pengguna
				</div>
			</div>
      <div id="edit"></div>
    </div>
  </div>
</div>


