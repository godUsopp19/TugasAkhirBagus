<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Sertifikat</title>
    
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
                        <form action="{{ route('usulan.store') }}" method="POST">
                        
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Pegawai</label>
                                <input type="text" class="form-control @error('NamaP') is-invalid @enderror" name="NamaP" value="{{ old('NamaP') }}" placeholder="Masukkan Nama Pegawai">
                            
                                <!-- error message untuk Vendor -->
                                @error('NamaP')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Usulan</label>
                                <input type="text" class="form-control @error('Usulan') is-invalid @enderror" name="Usulan" value="{{ old('Usulan') }}" placeholder="Masukkan Usulan Perencanaan">
                            
                                <!-- error message untuk Vendor -->
                                @error('Usulan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Alasan</label>
                                <input type="text" class="form-control @error('Alasan') is-invalid @enderror" name="Alasan" value="{{ old('Alasan') }}" placeholder="Masukkan Alasan">
                            
                                <!-- error message untuk Vendor -->
                                @error('Alasan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="/usulan" class="btn btn-danger">KEMBALI</a>

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