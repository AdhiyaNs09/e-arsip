<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Data Mata Pelajaran</h5>
            <a class="btn" href="/study/create" style="background: #f6f9ff; border: none; color: #4154f1;">Tambah Data</a>
          </div>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Mata Pelajaran</th>
                <th>Guru Mapel</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($studies as $key => $study) : ?>
                <tr>
                  <td><?= $key + 1; ?></td>
                  <td><?= $study['nama_mapel']; ?></td>
                  <td><?= $study['nama_guru']; ?></td>
                  <td class="d-flex">
                    <a class="btn btn-primary mx-1" href="/study/edit/<?= $study['mapel_id']; ?>">Edit</a>
                    <form class="mx-1" action="/study/delete/<?= $study['mapel_id']; ?>" method="post" style="display:inline;">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
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