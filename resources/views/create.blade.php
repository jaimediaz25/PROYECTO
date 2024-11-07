@extends('layout2')

@section('content')
<p>BIENVENIDO</p>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
    <p>BIENVENIDO</p>
    <br><br>
    <form method="post">

        
    </form>
    @endsection