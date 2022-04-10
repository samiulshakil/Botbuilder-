@extends('backend.master')

@section('title')
    All Women Sub Category
@endsection

@section('Content')
    <div class="d-inline">
        <a href="{{route('womensubcategories.create')}}" class="btn btn-primary text-light">Create Man SubCategory</a>
        <h4 class="text-center" style="text-align: center">All Women Category</h4>
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
                        <th scope="col">Category Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Hiden Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @php($i=1)
                    @foreach ($datas as $data)
                      <tr>
                        <td scope="row">{{$data->id}}</td>
                        <td>{{$data->womenCategory->name}}</td>
                        <td><img src="{{asset($data->image)}}" height="50px" width="50px" alt=""></td>
                        <td><img src="{{asset($data->hidden_image)}}" height="50px" width="50px" alt=""></td>
                        <td>
                            <a href="{{ route('womensubcategories.edit', $data->id) }}" class="btn btn-info"><span><i class="far fa-edit"></i></span></a>
                            <form action="{{route('womensubcategories.destroy', $data->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn btn-danger"><span><i class="fas fa-trash"></i></span></button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                    <div class="d-flex justify-content-center">
                        {{ $datas->links() }}
                    </div>
            </div>
        </div>
    </div>
@endsection