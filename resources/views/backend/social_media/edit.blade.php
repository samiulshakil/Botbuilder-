@extends('backend.master')

@section('title')
    Edit Social Media
@endsection

@section('Content')
    <div class="d-inline">
            <a class="btn btn-primary text-light" href="{{route('socialmedia.index')}}">All Social Media</a>
        <h4 class="text-center" style="text-align: center">Edit Social Media</h4>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <form action="{{route('socialmedia.update', $social->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" name="name" value="{{$social->name}}" required class="form-control" id="name">
                      @error('name')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">Icon Class <a href="https://fontawesome.com/v5/search" target="_blank">Select font awesome class name from here</a></label>
                        <input type="text" name="icon_class" value="{{$social->icon_class}}" class="form-control" id="url">
                        @error('icon_class')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">Url</label>
                        <input type="text" name="url" value="{{$social->url}}" class="form-control" id="url">
                        @error('url')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>
                      
                    <div class="mb-3">
                        <label for="url" class="form-label d-block">Status</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" @if ($social->status == 1)
                                checked
                            @endif value="1" name="status" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Active</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" value="0" id="customRadioInline2" @if ($social->status == 0)
                                checked
                            @endif name="status" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                          </div>
                        @error('status')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <button type="submit" value="button" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
