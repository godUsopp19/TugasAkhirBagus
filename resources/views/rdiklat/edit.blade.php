<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Realisasi Diklat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('rdiklat.update', $rdiklat->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Judul Diklat</label>
                                <input type="text" class="form-control @error('Judul') is-invalid @enderror" name="Judul" value="{{ $rdiklat->Judul }}">
                            
                                <!-- error message untuk Judul -->
                                @error('Judul')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pelaksanaan</label>
                                <input type="text" class="form-control @error('Pelaks') is-invalid @enderror" name="Pelaks" value="{{$rdiklat->Pelaks }}">
                            
                                <!-- error message untuk Judul -->
                                @error('Pelaks')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Vendor</label>
                                <select name="Vendor" class="form-control select2" placeholder="Pilih Vendor" id= "Vendor" required>
                                        
                                    
                                    @foreach ($vendors as $vendor) 
                                    <option value="{{ $vendor ->id_v }}">{{ $vendor ->Vendor }}</option>
                                    @endforeach
                                    
                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Peserta</label>
                                <input type="number" class="form-control @error('JmlPes') is-invalid @enderror" name="JmlPes" value="{{ $rdiklat->JmlPes }}" placeholder="Masukkan Jumlah Peserta">
                            
                                <!-- error message untuk fungsi -->
                                @error('JmlPes')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Waktu Mulai</label>
                                <input type="date" class="form-control @error('WktM') is-invalid @enderror" name="WktM" value="{{ $rdiklat->WktM }}" placeholder="Masukkan Waktu Mulai">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('WktM')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Waktu Selesai</label>
                                <input type="date" class="form-control @error('WktK') is-invalid @enderror" name="WktK" value="{{ $rdiklat->WktK }}" placeholder="Masukkan Waktu Selesai">
                            
                                <!-- error message untuk deadline -->
                                @error('WktK')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Bidang</label>
                                <input type="text" class="form-control @error('Bidang') is-invalid @enderror" name="Bidang" value="{{ $rdiklat->Bidang }}" placeholder="Masukkan Bidang">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('Bidang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tahun Perencanaan</label>
                                <input type="text" class="form-control @error('Tahun') is-invalid @enderror" name="Tahun" value="{{ old('Tahun') }}" placeholder="Masukkan Tahun Perencanaan">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('Tahun')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">BiayaD</label>
                                <input type="number" class="form-control @error('BiayaD') is-invalid @enderror" name="BiayaD" value="{{ $rdiklat->BiayaD }}" placeholder="Masukkan Biaya Diklat">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('BiayaD')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">BiayaS</label>
                                <input type="number" class="form-control @error('BiayaS') is-invalid @enderror" name="BiayaS" value="{{ $rdiklat->BiayaS }}" placeholder="Masukkan SPPD">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('BiayaS')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label class="font-weight-bold">Peserta</label>
                                <textarea class="form-control @error('Peserta') is-invalid @enderror" rows ="5" name="Peserta"  placeholder="Masukkan Keterangan Peserta">{{ old('Peserta') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('Peserta')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select class="form-control" name="Status" value="{{ $rdiklat->Status }}">
                                    <option>Sudah Dibayarkan</option>
                                    <option>HTD Sudah Melakukan Penagihan</option>
                                    <option>Vendor Belum Mengirim Tagihan</option>
                                    <option>Pelatihan Belum Dilaksanakan Sudah Berkontrak</option>
                                    <option>Pelatihan Belum Dilaksanakan Dalam Perencanaan</option>
                                </select>
                            
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="/rdiklat" class="btn btn-danger">KEMBALI</a>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>