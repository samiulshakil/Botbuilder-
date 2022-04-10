@extends('backend.master')

@section('title')
    All Menu
@endsection

@section('Content')
    <div class="d-inline">
        <a href="{{route('menu.create')}}" class="btn btn-primary text-light">Create Menu</a>
        <h4 class="text-center" style="text-align: center">All Menu</h4>
        @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif

        @if(session()->has('delete'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session()->get('delete') }}
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Url</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach ($menus as $data)
                      <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->url}}</td>
                        <td>{{$data->status}}</td>
                    
                        <td>
                            <a href="{{ route('menu.edit', $data->slug) }}" class="btn btn-info"><span><i class="far fa-edit"></i></span></a>
                            <form action="{{route('menu.destroy', $data->id)}}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                            <button type="submit" class="btn btn-danger"><span><i class="fas fa-trash"></i></span></button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection