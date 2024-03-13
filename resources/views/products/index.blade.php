@extends('layout.master')
@section('title',"index")
@section("content")

    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        Listado de productos
                        {{-- boton --}}
                        <a href="{{ route('products.create')}}" class="btn btn-success btn-sm float-end ">Nuevo producto</a>
                    </div>

                    <div class="card-body">
                        
                        @if(session('info'))
                        <div class="alert alert-primary" role="alert">{{session('info')}}</div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                <tr>
    
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        {{-- boton edit --}}
                                        <a href="{{route('products.edit' , $product->id)}}"
                                            class="btn btn-warning btn-sm ">Editar</a>

                                        {{-- boton delete --}}
                                        <a href="javascript: document.getElementById('delete-{{$product->id}}').submit()"
                                            class="btn btn-danger btn-sm ">Eliminar</a>
                                        <form id="delete-{{$product->id}}"
                                            action="{{ route('products.destroy' , $product->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
    
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
    
                            </tbody>
                        </table>
                    </div>
    


                </div>
            </div>
        </div>
    </div>

@endsection