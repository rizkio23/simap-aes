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
              <h3 class="h6 text-uppercase mb-0">Tambah Data Jadwal Retensi</h3>
            </div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url().'index.php/master/retensi_act/tambah' ?>">
                <input type='hidden' id='id' name="id" placeholder="ID" value="<?php echo $id; ?>" readonly="" required="" />
                <div class="form-group">       
                  <label class="form-control-label text-uppercase">Jenis</label>
                  <div class="select mb-3">
                    <select class="form-control" id='jenis' name="jenis" placeholder='Jenis'>
                      <?php foreach ($available_jenis as $j) {  
                        echo "<option value='".$j->ID_JENIS."'>".$j->NAMA."</option>";
                      }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-control-label text-uppercase" for='masa'>Masa Retensi (Tahun)</label>
                  <input type='number' id='masa' name="tahun" placeholder='XX' class="form-control" required="" />
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
            <h6 class="text-uppercase mb-0">Daftar Jadwal Retensi</h6>
            </div>
            <div class="card-body ">                          
              <table class="table table-striped table-sm card-text table-center">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jenis SUrat</th>
                    <th>Masa Retensi</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach($retensi as $r) { ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?php echo $r->JENIS; ?></td>
                  <td><?php echo $r->MASA_RETENSI; ?> Tahun</td>
                  <td><?php echo empty($j->KEPALA)?"<center>-</center>":$j->KEPALA; ?></td>
                  <td>
                    <button class="btn btn-sm btn-info" href="#modal-edit" data-toggle="modal"
                        onclick="edit('<?php echo $r->ID_JADWAL; ?>', '<?php echo $r->ID_JENIS; ?>', '<?php echo $r->MASA_RETENSI; ?>')">EDIT</button>
                    <button class="btn btn-sm btn-danger" href="<?php echo base_url().'index.php/master/retensi_act/hapus-'.$r->ID_JADWAL; ?>"
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
        <h4 id="exampleModalLabel" class="modal-title">Edit Jadwal Retensi</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form role='form' action='<?php echo base_url()."iindex.php/master/retensi_act/ubah"; ?>' method='post'>
          <input type='hidden' id='id-u' name="id-u" placeholder='ID' readonly="" required="" />
          <div class="form-group">       
            <label class="form-control-label text-uppercase">Jenis</label>
            <div class="select mb-3">
              <select class="form-control" id='jenis-u' name="jenis-u" placeholder='Jenis'>
                <?php foreach ($all_jenis as $j) {
                  echo "<option value='".$j->ID_JENIS."'>".$j->NAMA."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label text-uppercase" for='masa'>Masa Retensi (Tahun)</label>
            <input type='number' id='masa-u' name="tahun-u" placeholder='XX' class="form-control" required="" />
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
  function edit(id, jenis, masa) {
    $('#id-u').val(id);
    $('#jenis-u').val(jenis);
    $('#masa-u').val(masa);
  }
</script>