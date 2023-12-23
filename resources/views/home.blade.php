<<<<<<< HEAD
@extends('layouts.app') 
=======
@extends('layouts.index')
>>>>>>> 2da54536c53673e1a94d2b593b8d2d303a9c38e8

@section('content')
<div class="container">
    <div class="row justify-content-center">
<<<<<<< HEAD
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                    
                        </div>
                    @endif
            
=======
       
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

>>>>>>> 2da54536c53673e1a94d2b593b8d2d303a9c38e8
    </div>
</div>
@endsection
