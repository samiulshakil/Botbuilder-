@extends('backend.master')

@section('title')
    All Man Category
@endsection

@section('Content')
    <div class="d-inline">
        <a href="{{route('man.category.create')}}" class="btn btn-primary text-light">Create Category</a>
        <h4 class="text-center" style="text-align: center">All Man Category</h4>
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
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach ($datas as $data)
                      <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$data->name}}</td>
                        <td><img src="{{asset($data->image)}}" height="50px" width="50px" alt=""></td>
                        <td>
                            <a href="{{ route('man.category.edit', $data->id) }}" class="btn btn-info"><span><i class="far fa-edit"></i></span></a>
                        <form class="d-inline" action="{{route('man.category.delete')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$data->id}}" name="mancat_id">
                            <button type="submit" onclick="return confirm('Are You Sure?');"class="btn btn-danger"><span><i class="fas fa-trash"></i></span></button>
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