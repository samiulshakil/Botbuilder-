@extends('backend.master')

@section('title')
    Bot Builder Section Edit
@endsection

@section('Content')
    <div class="d-inline">
        <h4 class="text-center" style="text-align: center">Bot Builder Section Edit</h4>
        @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <form action="{{route('botbuilder.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Title</label>
                        <input type="text" name="botbuilder_title" required class="form-control" value="{{$data->botbuilder_title}}">
                        @error('botbuilder_title')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="name" class="form-label">Sub Title</label>
                        <input type="text" name="botbuilder_sub_title" required class="form-control" id="name" value="{{$data->botbuilder_sub_title}}">
                        @error('botbuilder_sub_title')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="name" class="form-label">Lady Button</label>
                        <input type="text" name="botbuilder_lady_button" required class="form-control" id="name" value="{{$data->botbuilder_lady_button}}">
                        @error('botbuilder_lady_button')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="name" class="form-label">Man Button</label>
                        <input type="text" name="botbuilder_man_button" required class="form-control" id="name" value="{{$data->botbuilder_man_button}}">
                        @error('botbuilder_man_button')
                          <span class="text-danger">{{ $message }} </span>
                        @enderror
                      </div>


                    <div class="mb-3">
                        <label for="image" class="form-label">Button Bg</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="botbuilder_button_bg" id="botbuilder_button_bg" aria-describedby="botbuilder_button_bg">
                        @error('botbuilder_button_bg')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-before-upload" src="{{asset($data->botbuilder_button_bg)}}"alt="botbuilder btn" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Smoke Background</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="botbuilder_smoke_bg" id="botbuilder_smoke_bg" aria-describedby="botbuilder_smoke_bg">
                        @error('image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <img id="preview-before-upload_smoke" src="{{asset($data->botbuilder_smoke_bg)}}"alt="preview image" 
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
    
    
    $('#botbuilder_button_bg').change(function(){
                
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