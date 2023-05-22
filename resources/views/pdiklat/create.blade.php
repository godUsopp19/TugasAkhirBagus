
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Perencanaan Diklat</title>
    
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
                        <form action="{{ route('pdiklat.store') }}" method="POST">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Program Diklat/Sertifikasi</label>
                                <input type="text" class="form-control @error('Program') is-invalid @enderror" name="Program" value="{{ old('Program') }}">
                            
                                <!-- error message untuk Judul -->
                                @error('Program')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Sasaran/Tujuan Diklat</label>
                                <select name="Tujuan" class="form-control select2" placeholder="Pilih Sasaran" id= "Tujuan" required>
                                        
                                    
                                    @foreach ($sasarans as $sasaran) 
                                    <option value="{{ $sasaran ->id_sa }}">{{ $sasaran ->Sasaran}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Usulan Sasaran</label>
                                <input type="text" class="form-control" name="RenP" value="{{ old('RenP') }}" placeholder="Masukkan Usulan Sasaran">
                            
            
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Prioritas</label>
                                <select class="form-control" name="Prioritas" value="{{ old('Prioritas') }}" placeholder="Pilih Prioritas Program">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tahun Perencanaan</label>
                                <input type="number" class="form-control @error('Tahun') is-invalid @enderror" name="Tahun" value="{{ old('Tahun') }}" placeholder="Masukkan Tahun Perencanaan">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('Tahun')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Perkiraan Waktu Mulai</label>
                                <input type="date" class="form-control @error('WktP') is-invalid @enderror" name="WktP" value="{{ old('WktP') }}" placeholder="Jika tanggalnya belum pasti, isi tanggal 1">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('WktP')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Perkiraan Waktu Selesai</label>
                                <input type="date" class="form-control @error('Deadline') is-invalid @enderror" name="WktS" value="{{ old('WktS') }}" placeholder="Jika tanggalnya belum pasti, isi tanggal 1">
                            
                                <!-- error message untuk deadline -->
                                @error('WktS')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <div class="form-group">
                                <label class="font-weight-bold">Provider</label>
                                <select name="Vendor" class="form-control select2" placeholder="Pilih Vendor" id= "Lembaga" required>
                                        
                                    
                                    @foreach ($vendors as $vendor) 
                                    <option value="{{ $vendor ->id_v }}">{{ $vendor ->Vendor }}</option>
                                    @endforeach
                                    
                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Peserta</label>
                                <input type="number" class="form-control @error('JmlP') is-invalid @enderror" name="JmlP" value="{{ old('JmlP') }}" placeholder="Masukkan Jumlah Peserta">
                            
                                <!-- error message untuk fungsi -->
                                @error('JmlP')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            

                            <div class="form-group">
                                <label class="font-weight-bold">Bidang/Unit</label>
                                <select class="form-control" name="Bidang" value="{{ old('Bidang') }}" placeholder="Pilih Bidang/Unit">
                                    <option>Operasi</option>
                                    <option>QAQC</option>
                                    <option>KKU</option>
                                    <option>Perencanaan dan Project Control</option>
                                    <option>UPMK 1</option>
                                    <option>UPMK 2</option>
                                    <option>UPMK 3</option>
                                    <option>UPMK 4</option>
                                    <option>UPMK 5</option>
                                </select>
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('Bidang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Harga Satuan/Paket</label>
                                <input type="number" class="form-control @error('HargSat') is-invalid @enderror" name="HargSat" value="{{ old('HargSat') }}" placeholder="Masukkan Harga Satuan">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('HargSat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SPPD</label>
                                <input type="number" class="form-control @error('SPPD') is-invalid @enderror" name="SPPD" value="{{ old('SPPD') }}" placeholder="Masukkan SPPD">
                            
                                <!-- error message untuk tanggal sertif -->
                                @error('SPPD')
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



                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="/pdiklat" class="btn btn-danger">KEMBALI</a>
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



</body>
</html>

