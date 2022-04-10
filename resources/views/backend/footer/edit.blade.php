@extends('backend.master')

@section('title')
    Footer Edit
@endsection

@section('Content')
    <div class="d-inline">
        <h4 class="text-center" style="text-align: center">Footer Edit</h4>
        @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <form action="{{route('footer.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Footer Left Side Logo</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="footer_left_side_logo" id="footer_left_side_logo" aria-describedby="image">
                        @error('footer_left_side_logo')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-before-upload" src="{{asset($data->footer_left_side_logo)}}"alt="footer logo image" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                      <label for="name" class="form-label">Title</label>
                      <input type="text" name="footer_left_side_title" required class="form-control" id="name" value="{{$data->footer_left_side_title}}">
                      @error('footer_left_side_title')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Sub Title</label>
                        <input type="text" name="footer_left_side_subtitle" required class="form-control" id="name" value="{{$data->footer_left_side_subtitle}}">
                        @error('footer_left_side_subtitle')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Button Name</label>
                        <input type="text" name="footer_left_side_btn_name" required class="form-control" id="name" value="{{$data->footer_left_side_btn_name}}">
                        @error('footer_left_side_btn_name')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Button Image</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="footer_left_side_btn_image" id="footer_left_side_btn_image" aria-describedby="image">
                        @error('footer_left_side_btn_image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload_btn" src="{{asset($data->footer_left_side_btn_image)}}"alt="preview image" 
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
    
    
    $('#footer_left_side_logo').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });


    $('#footer_left_side_btn_image').change(function(){
                
                let reader = new FileReader();
            
                reader.onload = (e) => { 
            
                $('#preview-image-before-upload_btn').attr('src', e.target.result); 
                }
            
                reader.readAsDataURL(this.files[0]); 
            
            });
    
    });
</script>