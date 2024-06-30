<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Data Siswa</h5>
            <a class="btn" href="/student/create" style="background: #f6f9ff; border: none; color: #4154f1;">Tambah Data Siswa</a>
          </div>

          <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('message'); ?>
            </div>
            <script>
              setTimeout(function() {
                document.querySelector('.alert').remove();
              }, 2000);
            </script>
          <?php endif; ?>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nisn</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($students as $key => $student) : ?>
                <tr>
                  <td><?= $key + 1; ?></td>
                  <td><?= $student['nama_siswa']; ?></td>
                  <td><?= $student['nisn']; ?></td>
                  <td><?= $student['nama_kelas']; ?></td>
                  <td><?= $student['alamat']; ?></td>
                  <td><?= $student['kontak']; ?></td>
                  <td class="d-flex">
                    <a class="btn btn-primary mx-1" href="/student/edit/<?= $student['siswa_id']; ?>">Edit</a>
                    <form class="mx-1" action="/student/delete/<?= $student['siswa_id']; ?>" method="post" style="display:inline;">
                      <?= csrf_field() ?>
                      <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
<?= $this->endSection() ?>