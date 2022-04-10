@extends('backend.master')

@section('title')
    Banner Know Section Edit
@endsection

@section('Content')
    <div class="d-inline">
        <h4 class="text-center" style="text-align: center">Banner Know Section Edit</h4>
        @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <form action="{{route('bannerknow.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Banner Image</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="banner_bg_image" id="banner_bg_image" aria-describedby="image">
                        @error('banner_bg_image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-before-upload" src="{{asset($data->banner_bg_image)}}"alt="banner image" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                      <label for="name" class="form-label">Title</label>
                      <input type="text" name="know_title" required class="form-control" id="name" value="{{$data->know_title}}">
                      @error('know_title')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Sub Title</label>
                      <input type="text" name="know_subtitle" required class="form-control" id="name" value="{{$data->know_subtitle}}">
                      @error('know_subtitle')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="x" class="form-label d-block">Description</label>
                      <input id="x" value="{{$data->know_description}}" type="hidden" name="know_description">
                      <trix-editor input="x"></trix-editor>
                      @error('know_description')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div> 

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="know_image" id="image" aria-describedby="image">
                        @error('image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload" src="{{asset($data->know_image)}}"alt="preview image" 
                        style="max-height: 150px; max-width: 150px">
                    </div>
                    <button type="submit" value="button" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script type="text/javascript">
      
    $(document).ready(function (e) {
    
    
    $('#image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });

    $('#banner_bg_image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
</script>