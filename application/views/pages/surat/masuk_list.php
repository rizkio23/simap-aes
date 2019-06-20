<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <h3 class="mt-5"><?php echo $judul; ?></h3>
    <section class="py-5">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase mb-0">Daftar Arsip Masuk</h6>
              </div>
              <div class="card-body ">                          
                <table class="table table-striped table-sm card-text table-center">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Asal Instansi</th>
                      <th>Perihal</th>
                      <th>Dari</th>
                      <th>Kepada</th>
                      <th>Keterangan</th>
                      <th>Tanggal Arsip</th>
                      <th>Tanggal Masuk</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($surat as $s) { ?>
                    <tr>
                      <th><?php echo $no; ?>.</th>
                      <td><?php echo $s->ASAL_INSTANSI; ?></td>
                      <td><?php echo $s->PERIHAL; ?></td>
                      <td><?php echo $s->DARI; ?></td>
                      <td><?php echo $s->KEPADA; ?></td>
                      <td><?php echo $s->KETERANGAN; ?></td>
                      <td><?php echo date("d-m-Y", strtotime($s->TANGGAL)); ?></td>
                      <td><?php echo date("d-m-Y", strtotime($s->TANGGAL_MASUK)); ?></td>
                      <td>
                        <a href="<?php echo base_url().'index.php/surat/masuk_detil/'.$s->ID_SURAT; ?>">
                          <button class="btn btn-sm btn-info" href="">DETIL</button>
                        </a>
                        <a href="<?php echo base_url().'index.php/surat/masuk_ubah/'.$s->ID_SURAT; ?>">
                          <button class="btn btn-sm btn-success">UBAH</button>
                        </a>
                        <a href="<?php echo base_url().'index.php/surat/masuk_hapus/'.$s->ID_SURAT; ?>">
                          <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin?');">HAPUS</button>
                        </a>
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