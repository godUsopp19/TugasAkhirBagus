@extends('main')

@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('sasaran.create') }}" class="btn btn-md btn-success mb-3">Add Sasaran</a>
                        <table class="table table-responsive table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Sasaran</th>
                                <th scope="col">Action</th>
                            
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($sasarans as $sasaran) 
                                <tr>
                                    <td>
                                        {{$sasaran->Sasaran}}
                                    </td>
                                    
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sasaran.destroy', $sasaran->id_sa) }}" method="POST">
                                            <a href="{{ route('sasaran.edit', $sasaran->id_sa) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Sasaran belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          
                    </div>
                </div>
            </div>
        </div>
        <div class="paginator">
            {{ $sasarans->links() }} 
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>   
        function addRowCount(tableAttr) {
    $(tableAttr).each(function(){
    $('th:first-child, thead td:first-child', this).each(function(){
      var tag = $(this).prop('tagName');
      $(this).before('<'+tag+'>#</'+tag+'>');
    });
    $('td:first-child', this).each(function(i){
      $(this).before('<td>'+(i+1)+'</td>');
    });
    });
    }
    
    // Call the function with table attr on which you want automatic serial number
    addRowCount('.table');
        </script>
    
    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>



@endsection
