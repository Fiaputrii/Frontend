@extends('layouts.mahasiswa')

@section('content')
	<h2>Daftar Mahasiswa</h2>

	<!-- Tombol Tambah -->
	<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
		Tambah Pertemuan
	</button>
	
	<!-- Modal Tambah -->
	<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<form id="formTambahPertemuan" method="post"  action="{{ route('pertemuan.store') }}">
				@csrf
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="createModalLabel">Tambah Pertemuan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
					</div>
					<div class="modal-body">
						<div class="mb-3">
							<!-- <label>NIM</label> -->
							<input type="text" name="nim" class="form-control" value="{{ session()->get('user')['mahasiswa']['nim'] }}" required hidden>
						</div>
						<div class="mb-3">
							<label>Dosen Wali</label>
							<select name="nidn" id="dosenSelect" class="form-control" required>
								@foreach($dosen as $row)
									<option value="{{ $row['nidn'] }}">{{ $row['nama'] }}</option>
								@endforeach
							</select>
						</div>

						<div class="mb-3">
							<label>Tanggal</label>
							<input type="date" name="tanggal" class="form-control" required>
						</div>
						<div class="mb-3">
							<label>Topik</label>
							<input type="text" name="topik" class="form-control" required>
						</div>
						<div class="mb-3">
							<label>Catatan</label>
							<textarea name="catatan" class="form-control" required></textarea>
						</div>
						
						<div class="mb-3">
							<label>Bulan Tahun</label>
							<input type="month" name="bulan_tahun" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Simpan</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
	

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
						{{-- Modal Edit --}}
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
											<input type="hidden" name="nim" value="{{ session()->get('user')['mahasiswa']['nim'] }}">

											<div class="mb-3">
												<label>Dosen Wali</label>
												<select name="nidn" class="form-control" required>
													@foreach($dosen as $d)
														<option value="{{ $d['nidn'] }}" {{ $row['nidn'] == $d['nidn'] ? 'selected' : '' }}>
															{{ $d['nama'] }}
														</option>
													@endforeach
												</select>
											</div>

											<div class="mb-3">
												<label>Tanggal</label>
												<input type="date" name="tanggal" class="form-control" value="{{ $row['tanggal'] }}" required>
											</div>
											<div class="mb-3">
												<label>Topik</label>
												<input type="text" name="topik" class="form-control" value="{{ $row['topik'] }}" required>
											</div>
											<div class="mb-3">
												<label>Catatan</label>
												<textarea name="catatan" class="form-control" required>{{ $row['catatan'] }}</textarea>
											</div>
											<div class="mb-3">
												<label>Bulan Tahun</label>
												<input type="month" name="bulan_tahun" class="form-control" value="{{ $row['bulan_tahun'] }}" required>
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
							Edit
						</button>	
			
						<form action="{{ route('pertemuan.destroy', $row['id_pertemuan']) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
							@csrf
							@method('DELETE')
							<button class="btn btn-sm btn-danger">Hapus</button>
						</form>
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



