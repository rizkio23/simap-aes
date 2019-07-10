<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <h3 class="mt-5"><?php echo $judul; ?></h3>
    <section class="py-5">
       <div class="col-lg-12 mb-5">
        <div class="card">
          <div class="card-header">
            <h3 class="h6 text-uppercase mb-0">Unduh Laporan</h3>
          </div>
          <div class="card-body">
          <div class="form-group">
          <form action="<?php echo base_url().'index.php/laporan/filter'; ?>" method="post" class="form-horizontal">
            <label class="form-control-label text-uppercase">Laporan</label>
            <select class="form-control" id="laporan" name="laporan" required="">
                <option></option>
                <option value="1">Surat Masuk</option>
                <option value="2">Surat Keluar</option>
                <option value="3">Disposisi Arsip Surat</option>
                <option value="4">Peminjaman Arsip Surat</option>
                <option value="5">Arsip Inaktif</option>
                <option value="6">Retensi Arsip</option>
              </select>
          </div>
          <div class="form-group">
            <label class="form-control-label text-uppercase">Mulai</label>
            <input class="form-control" id="tgl_1" name="tgl_1" type="date" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y"); ?>" required="" />
          </div>
          <div class="form-group">
            <label class="form-control-label text-uppercase">Sampai</label>
            <input class="form-control" id="tgl_2" name="tgl_2" type="date" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y"); ?>" required="" />
          </div>
          <div class="form-group">
            <button class="btn btn-info pull-right" type="submit">
              <i class="ace-icon fa fa-file bigger-110"></i>
              Unduh
            </button>
          </div>
          </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>  