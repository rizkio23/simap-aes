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
      <div class="row">
        <div class="col-lg-12 mb-5">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-10">
                <h6 class="text-uppercase mb-0">Daftar Pegawai</h6>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo base_url().'index.php/master/pegawai_tambah'?>">
                  <button class="btn btn-sm btn-success pull-right">Tambah Pegawai</button>
                </a>
              </div>
            </div>
            </div>
            <div class="card-body ">                          
              <table class="table table-striped table-sm card-text table-center">
              <thead>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Jabatan</th>
                  <th>Unit Kerja</th>
                  <th>Alamat</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pegawai as $k) { ?>
                <tr>
                  <td><?php echo $k->NIP; ?></td>
                  <td><?php echo $k->NAMA; ?></td>
                  <td><?php echo $k->JENIS_KELAMIN=='L'?"Laki-laki":"Perempuan"; ?></td>
                  <td><?php echo $k->JABATAN; ?></td>
                  <td><?php echo $k->UNIT_KERJA; ?></td>
                  <td><?php echo $k->ALAMAT; ?></td>
                  <td style="text-align: center;">
                    <a href="<?php echo base_url().'index.php/master/pegawai_edit/'.$k->NIP; ?>">
                      <button class="btn btn-sm btn-info">EDIT</button>
                    </a>
                    <button class="btn btn-sm btn-danger" href="<?php echo base_url().'index.php/master/pegawai_act/hapus-'.$k->NIP; ?>"onclick="return confirm('Anda yakin?');">HAPUS</button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>  