@extends('main')

@section('container')

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">NIP</label>
                                <input type="text" class="form-control @error('NIP') is-invalid @enderror" name="NIP" value="{{ old('NIP') }}" placeholder="Masukkan NIP Karyawan">
                            
                                <!-- error message untuk NIP -->
                                @error('NIP')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Karyawan</label>
                                <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama" value="{{ old('Nama') }}" placeholder="Masukkan Nama Karyawan">
                            
                                <!-- error message untuk nama -->
                                @error('Nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan Karyawan</label>
                                <input type="text" class="form-control @error('Jabatan') is-invalid @enderror" name="Jabatan" value="{{ old('Jabatan') }}" placeholder="Masukkan Jabatan Karyawan">
                            
                                <!-- error message untuk jabatan -->
                                @error('Jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Bidang/Sub Bidang Karyawan</label>
                                <input type="text" class="form-control @error('Bidangnsub') is-invalid @enderror" name="Bidangnsub" value="{{ old('Bidangnsub') }}" placeholder="Masukkan Bidang/Sub Bidang Karyawan">
                            
                                <!-- error message untuk Bidang -->
                                @error('Bidangnsub')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Unit Karyawan</label>
                                <input type="text" class="form-control @error('Unit') is-invalid @enderror" name="Unit" value="{{ old('Unit') }}" placeholder="Masukkan Unit Karyawan">
                            
                                <!-- error message untuk unit -->
                                @error('Unit')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email Karyawan</label>
                                <input type="text" class="form-control" name="Email" value="{{ old('Email') }}" placeholder="Masukkan Email Karyawan">
                            
                                <!-- error message untuk unit -->
                               
                            </div>

                            

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

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

@endsection