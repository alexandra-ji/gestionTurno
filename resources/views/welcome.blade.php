@extends('layouts.app')

@section('title')
        Welcome
@endsection

@section('titleContent')
        <h1>Dashboard</h1>

@endsection

@section('Content')
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{route('usuario.index')}}" class="btn btn-primary">Ir a los Usuarios</a>
                    </div>
                    </div>
                </div>

                


               
            </div>
        </div>




@endsection