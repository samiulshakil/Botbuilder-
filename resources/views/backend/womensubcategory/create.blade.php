@extends('backend.master')

@section('title')
    Create Women SubCategory
@endsection

@section('Content')
    <div class="d-inline">
            <a class="btn btn-primary text-light" href="{{route('womensubcategories.index')}}">All Women Category</a>
        <h4 class="text-center" style="text-align: center">Create Women Sub Category</h4>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <form action="{{route('womensubcategories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Select Women Category</label>
                            <select class="form-select form-control" name="womencategory_id" aria-label="Default select example">
                                <option selected>----Select Category -----</option>
                                @foreach ($womencategories as $categories) 
                                    <option value="{{ $categories->id }}">{{$categories->name}}</option>
                                @endforeach  
                            </select>
                        </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="image" id="image">
                        @error('image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload" src=""alt="preview image" 
                        style="max-height: 150px; max-width: 150px">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Hidden Image</label>
                        <input type="file" style="padding: 3px" class="form-control pb-3" name="hidden_image" id="hidden_image">
                        @error('hidden_image')
                        <span class="text-danger">{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload_hidden_image" src=""alt="preview image" 
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

    $('#hidden_image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload_hidden_image').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
</script>