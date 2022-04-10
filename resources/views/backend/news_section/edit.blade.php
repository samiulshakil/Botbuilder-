@extends('backend.master')

@section('title')
    News Section Edit
@endsection

@section('Content')
    <div class="d-inline">
        <h4 class="text-center" style="text-align: center">News Section Edit</h4>
        @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <form action="{{route('news.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Left Title</label>
                            <input type="text" name="left_title" required class="form-control" value="{{$data->left_title}}">
                            @error('left_title')
                            <span class="text-danger">{{ $message }} </span>
                            @enderror
                        </div>
                      <div class="mb-3">
                        <label for="name" class="form-label">Left Sub Title</label>
                        <input type="text" name="left_sub_title" required class="form-control" id="name" value="{{$data->left_sub_title}}">
                        @error('left_sub_title')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="name" class="form-label">Left Button Name</label>
                        <input type="text" name="left_button_name" required class="form-control" id="name" value="{{$data->left_button_name}}">
                        @error('left_button_name')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Button Bg</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="left_button_image" id="left_button_image" aria-describedby="left_button_image">
                        @error('left_button_image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-before-upload" src="{{asset($data->left_button_image)}}"alt="botbuilder btn" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Left Button Url</label>
                        <input type="text" name="left_button_url" class="form-control" id="name" value="{{$data->left_button_url}}">
                        @error('left_button_url')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Right Side Image</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="right_side_image" id="botbuilder_smoke_bg" aria-describedby="botbuilder_smoke_bg">
                        @error('right_side_image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-before-upload_smoke" src="{{asset($data->right_side_image)}}"alt="preview image" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Right Title</label>
                        <input type="text" name="right_side_title" required class="form-control" id="name" value="{{$data->right_side_title}}">
                        @error('right_side_title')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Right Sub Title</label>
                        <input type="text" name="right_side_sub_title" required class="form-control" id="name" value="{{$data->right_side_sub_title}}">
                        @error('right_side_sub_title')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
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
    
    
    $('#left_button_image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });

    $('#botbuilder_smoke_bg').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-before-upload_smoke').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
</script>