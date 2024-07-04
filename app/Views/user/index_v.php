<?= $this->extend('layouts/master');  ?>

<?= $this->section('content');  ?>

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Daftar User</h5>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>admin</td>
                <td>admin</td>
                <td>
                  <a href="#" class="btn btn-primary btn-sm">Edit</a>
                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>adhiyans</td>
                <td>admin</td>
                <td>
                  <a href="#" class="btn btn-primary btn-sm">Edit</a>
                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>faik</td>
                <td>user</td>
                <td>
                  <a href="#" class="btn btn-primary btn-sm">Edit</a>
                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>