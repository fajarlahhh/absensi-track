<div>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Anggota</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">Data Anggota</li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form</h3>
          </div>
          <form wire:submit.prevent="submit">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" wire:model="nama" required class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">UID</label>
                <input type="text" wire:model="uid" req class="form-control">
              </div>
            </div>
            <div class="card-footer">
              <input type="submit" class="btn btn-secondary" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>
