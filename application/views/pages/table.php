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
              <h3 class="h6 text-uppercase mb-0">Tambah Data Jabatan</h3>
            </div>
            <div class="card-body">

            </div>
          </div>
        </div>

        <div class="col-lg-8 mb-5">
        <div class="card">
          <div class="card-header">
            <h6 class="text-uppercase mb-0">Daftar Jabatan</h6>
            </div>
            <div class="card-body ">                          
              <table class="table table-striped table-sm card-text table-center">

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
        <h4 id="exampleModalLabel" class="modal-title">Edit Jabatan</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form role='form' action='<?php echo base_url()."index.php/master/jabatan_act/ubah"; ?>' method='post'>
          <input type='hidden' id='id-u' name="id-u" placeholder='ID' readonly="" required="" />
          <div class="form-group">
            <label>Nama</label>
            <input type='text' id='nama-u' name="nama-u" placeholder='Nama'class="form-control" required="" />
          </div>
          <div class="form-group">       
            <label class="form-control-label text-uppercase">Kepala</label>
            <div class="select mb-3">
              <select class="form-control" id='kepala-u' name="kepala-u" placeholder='Kepala'>
                <?php foreach ($jabatan as $j) { ?>
                <option value="<?php echo $j->ID_JABATAN ?>"><?php echo $j->NAMA; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">       
            <label class="form-control-label text-uppercase">Disposisi</label>
            <div class="select mb-3">
              <select class="form-control" id='disposisi-u' name="disposisi-u" placeholder='Disposisi'>
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
              </select>
            </div>
          </div>
          <div class="form-group">       
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
  function edit(id, nama, kepala, disposisi) {
    $('#id-u').val(id);
    $('#nama-u').val(nama);
    $('#kepala-u').val(kepala);
    $('#disposisi-u').val(disposisi);
  }
</script>
