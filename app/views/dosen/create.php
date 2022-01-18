  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Dosen</h1>
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
        <form role="form" action="<?= base_url; ?>/dosen/simpanDosen" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>Nama Dosen</label>
              <input type="text" class="form-control" placeholder="masukkan nama dosen..." name="nama_dosen">
            </div>
            <div class="form-group">
              <label>Alamat Dosen</label>
              <input type="text" class="form-control" placeholder="masukkan alamat dosen..." name="alamat_dosen">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir Dosen</label>
              <input id="bday" class="form-control" onblur="calculateDays()" type="date" name="tgl_lahir">
            </div>
            <div class="form-group">
              <label>No. Telp</label>
              <input type="text" class="form-control" placeholder="masukkan nomor telepon..." name="tlp_dosen">
            </div>
            <div class="form-group">
              <label>Pendidikan</label>
              <select class="form-control" name="pen_id">
                <option value="">Pilih</option>
                <?php foreach ($data['pendidikan'] as $row) : ?>
                  <option value="<?= $row['pen_id']; ?>"><?= $row['nama_pen']; ?></option>
                <?php endforeach; ?>
              </select>
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