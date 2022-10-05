<div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Anggota</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Anggota</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <a href="/dataanggota/tambah" class="btn btn-secondary">Tambah</a>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Nama</th>
                  <th>UID</th>
                  <th style="width: 10px"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $i => $row)
                  <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->uid }}</td>
                    <td class="with-btn">
                      <button class="btn btn-danger" wire:click="hapus({{ $row->getKey() }})">Hapus</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            &nbsp;
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
