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
        <div class="col-lg-4 mb-5">
          <div class="card">
            <div class="card-header">
              <h3 class="h6 text-uppercase mb-0">Tambah Data Lokasi</h3>
            </div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url().'index.php/master/lokasi_act/tambah' ?>">
                <input type='hidden' id='id' name="id" placeholder='ID'value="<?php echo $id; ?>" readonly="" required="" />
                <div class="form-group">
                  <label class="form-control-label text-uppercase">Nama</label>
                  <input type="text" placeholder="Nama" name="nama" class="form-control" required="">
                </div>
                <div class="form-group">       
                  <button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check"></i> Simpan</button>
                  <button type="reset" class="btn btn-warning"><i class="ace-icon fa fa-undo"></i> Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-8 mb-5">
        <div class="card">
          <div class="card-header">
            <h6 class="text-uppercase mb-0">Daftar Lokasi</h6>
            </div>
            <div class="card-body ">                          
              <table class="table table-striped table-sm card-text table-center">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach($lokasi as $l) { ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?php echo $l->NAMA; ?></td>
                  <td>
                    <button class="btn btn-sm btn-info" href="#modal-edit" data-toggle="modal"
                        onclick="edit('<?php echo $l->ID_LOKASI; ?>', '<?php echo $l->NAMA; ?>')">EDIT</button>
                    <button class="btn btn-sm btn-danger" href="<?php echo base_url().'index.php/master/lokasi_act/hapus-'.$l->ID_LOKASI; ?>"
                        onclick="return confirm('Anda yakin?');">HAPUS</button>
                  </td>
                </tr>
                <?php $no++; } ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>  


<div id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Edit Lokasi</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form role='form' action='<?php echo base_url()."index.php/master/lokasi_act/ubah"; ?>' method='post'>
          <input type='hidden' id='id-u' name="id-u" placeholder='ID' readonly="" required="" />
          <div class="form-group">
            <label>Nama</label>
            <input type='text' id='nama-u' name="nama-u" placeholder='Nama'class="form-control" required="" />
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        <input type="submit" value="Simpan" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function edit(id, nama) {
    $('#id-u').val(id);
    $('#nama-u').val(nama);
  }
</script>