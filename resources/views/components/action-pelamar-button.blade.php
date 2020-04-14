@if ($data->pelamar_status == 'Ditinjau')
  <div class="btn-group dropleft">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      Aksi
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ route('pelamar.show', ['pelamar' => $data->pelamar_nik]) }}">Lihat Detail Data Pelamar</a>
      {{-- <div class="dropdown-divider"></div> --}}
      {{-- <a class="dropdown-item" href="{{ route('pelamar.show', ['pelamar' => $data->id]) }}">Data Tidak Lengkap</a> --}}
    </div>
  </div>
@else
<a class="btn btn-primary btn-sm" href="{{ route('pelamar.show', ['pelamar' => $data->pelamar_nik]) }}">Detail</a>
@endif
