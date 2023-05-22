<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Sertifikat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('sertifikat.update', $sertifikat->id_s) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                
                                <label class="font-weight-bold">Nama Karyawan</label>
                                <select name="NamaK" class="form-control select2" placeholder="Pilih Nama Karyawan" id= "DNama" required>
                                        
                                    
                                    @foreach ($karyawans as $karyawan) 
                                    <option value="{{ $karyawan ->id_k }}">{{ $karyawan->NIP}}/{{$karyawan->Nama}}</option>
                                    @endforeach
                                    
                                </select>
                               
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Judul Sertifikat</label>
                                <input type="text" class="form-control @error('Judul') is-invalid @enderror" name="Judul" value="{{ $sertifikat->Judul }}" placeholder="Masukkan Judul Sertifikat">
                            
                                <!-- error message untuk Judul -->
                                @error('Judul')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Lembaga</label>
                                <select name="Lembaga" class="form-control select2" placeholder="Pilih Vendor" id= "Lembaga" required>
                                        
                                    
                                    @foreach ($vendors as $vendor) 
                                    <option value="{{ $vendor ->id_v }}">{{ $vendor ->Vendor }}</option>
                                    @endforeach
                                    
                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Fungsi</label>
                                <input type="text" class="form-control @error('Fungsi') is-invalid @enderror" name="Fungsi" value="{{ $sertifikat->Fungsi }}" placeholder="Masukkan Fungsi Sertifikat">
                            
                                <!-- error message untuk fungsi -->
                                @error('Fungsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor Sertifikat</label>
                                <input type="text" class="form-control @error('NoSertif') is-invalid @enderror" name="NoSertif" value="{{ $sertifikat->NoSertif }}" placeholder="Masukkan Nomor Sertifikat">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('NoSertif')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Sertifikat</label>
                                <input type="date" class="form-control @error('TglSertif') is-invalid @enderror" name="TglSertif" value="{{ $sertifikat->TglSertif }}" placeholder="Masukkan Tanggal Sertifikat">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('TglSertif')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Expired</label>
                                <input type="date" class="form-control @error('Deadline') is-invalid @enderror" name="Deadline" value="{{ $sertifikat->Deadline }}" placeholder="Masukkan Tanggal Expired Sertifikat">
                            
                                <!-- error message untuk deadline -->
                                @error('Deadline')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="/sertifikat" class="btn btn-danger">KEMBALI</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript"> $(document).ready(function() {
        $('.select2').select2();
    });
    </script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>