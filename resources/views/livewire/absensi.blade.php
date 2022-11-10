<div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Absensi </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Absensi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="input-group date" id="reservationdate" data-target-input="nearest" data-toggle="datetimepicker">
              <input type="text" readonly class="form-control datetimepicker-input" data-target="#reservationdate"
                wire.model="tanggal" />
              <div class="input-group-append" data-target="#reservationdate">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Nama</th>
                  <th>Jam Absen</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $i => $row)
                  <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row->anggota->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('H:i:s') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
  @push('scripts')
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
      $('#reservationdate').datetimepicker({
        defaultDate: "{{ $tanggal }}",
        format: 'YYYY-MM-DD',
        ignoreReadonly: true
      });

      $("#reservationdate").on("change.datetimepicker", ({
        date,
        oldDate
      }) => {
        window.livewire.emit('settanggal', date.format('YYYY-MM-DD'));
      })
    </script>
  @endpush
</div>
