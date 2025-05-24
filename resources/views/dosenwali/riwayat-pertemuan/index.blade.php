@extends('layouts.dosen')

@section('content')
<h2>Daftar Mahasiswa</h2>

{{-- Tambahkan ID agar bisa dipanggil oleh DataTables --}}
<table id="mahasiswaTable" class="display">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>Nama Dosen</th>
      <th>Tanggal</th>
      <th>Topik</th>
      <th>Catatan</th>
      <th>Saran Akademik</th>
      <th>Bulan Tahun</th>
	  <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
      <tr>
        <td>{{ $row['nama_mahasiswa'] }}</td>
        <td>{{ $row['nama_dosen'] }}</td>
        <td>{{ $row['tanggal'] }}</td>
        <td>{{ $row['topik'] }}</td>
        <td>{{ $row['catatan'] }}</td>
        <td>{{ $row['saran_akademik'] }}</td>
        <td>{{ $row['bulan_tahun'] }}</td>
		<td>
			<div class="modal fade" id="editModal{{ $row['id_pertemuan'] }}" tabindex="-1" aria-labelledby="editModalLabel{{ $row['id_pertemuan'] }}" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<form method="POST" action="{{ route('pertemuan.update', $row['id_pertemuan']) }}">
									@csrf
									@method('PUT')
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="editModalLabel{{ $row['id_pertemuan'] }}">Edit Pertemuan</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="nim" value="{{ $row['nim'] }}">
											<input type="hidden" name="nidn" value="{{ $row['nidn'] }}">

											<div class="mb-3">
												<label>Saran Akademik</label>
												<textarea name="saran_akademik" class="form-control" required>{{ $row['saran_akademik'] }}</textarea>
											</div>

											<div class="mb-3">
												<label>Tanggal</label>
												<input type="date" name="tanggal" class="form-control bg-light" value="{{ $row['tanggal'] }}" required readonly>
											</div>
											<div class="mb-3">
												<label>Topik</label>
												<input type="text" name="topik" class="form-control bg-light" value="{{ $row['topik'] }}" required readonly>
											</div>
											<div class="mb-3">
												<label>Catatan</label>
												<textarea name="catatan" class="form-control bg-light" required readonly>{{ $row['catatan'] }}</textarea>
											</div>
										
											<div class="mb-3">
												<label>Bulan Tahun</label>
												<input type="month" name="bulan_tahun" class="form-control bg-light" value="{{ $row['bulan_tahun'] }}" required readonly>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Update</button>
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $row['id_pertemuan'] }}">
							Beri Saran Akademik
						</button>
		</td>
      </tr>
    @endforeach
  </tbody>
</table>
<script>
    $(document).ready(function() {
      $('#mahasiswaTable').DataTable({
        responsive: true,
      });
    });
  </script>
@endsection



