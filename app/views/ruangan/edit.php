  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Ruangan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/ruangan/updateRuangan" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="ruangan_id" value="<?= $data['ruangan']['ruangan_id']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Nama Ruangan</label>
              <input type="text" class="form-control" placeholder="masukkan ruangan..." name="ruangan_nama" value="<?= $data['ruangan']['ruangan_nama']; ?>">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->