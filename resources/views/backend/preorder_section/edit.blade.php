@extends('backend.master')

@section('title')
    Pre Order Section Edit
@endsection

@section('Content')
    <div class="d-inline">
        <h4 class="text-center" style="text-align: center">Pre Order Section Edit</h4>
        @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <form action="{{route('preorder.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Pre Order Background</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="pre_order_bg" id="pre_order_bg" aria-describedby="image">
                        @error('pre_order_bg')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-before-upload" src="{{asset($data->pre_order_bg)}}"alt="pre bg image" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Pre Order Card Image</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="pre_order_card_image" id="pre_order_card_image" aria-describedby="image">
                        @error('pre_order_card_image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-before-upload_card" src="{{asset($data->pre_order_card_image)}}"alt="card image" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                      <label for="name" class="form-label">Title</label>
                      <input type="text" name="pre_order_title" required class="form-control" id="name" value="{{$data->pre_order_title}}">
                      @error('pre_order_title')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Description</label>
                      <input id="x" value="{{$data->pre_order_description}}" type="hidden" name="pre_order_description">
                      <trix-editor input="x"></trix-editor>
                      @error('pre_order_description')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Button Image</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="button_image" id="button_image" aria-describedby="image">
                        @error('button_image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload_btn" src="{{asset($data->button_image)}}"alt="preview image" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                      <label for="name" class="form-label">Button Text</label>
                      <input type="text" name="button_text" required class="form-control" id="name" value="{{$data->button_text}}">
                      @error('button_text')
                        <span class="text-danger">{{ $message }} </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Button URL</label>
                        <input type="text" name="button_url" required class="form-control" id="name" value="{{$data->button_url}}">
                        @error('button_url')
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
    
    
    $('#pre_order_bg').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });

    $('#pre_order_card_image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-before-upload_card').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });

    $('#button_image').change(function(){
                
                let reader = new FileReader();
            
                reader.onload = (e) => { 
            
                $('#preview-image-before-upload_btn').attr('src', e.target.result); 
                }
            
                reader.readAsDataURL(this.files[0]); 
            
            });
    
    });
</script>