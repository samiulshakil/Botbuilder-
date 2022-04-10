<div class="customization__tab-content-wrapper d-flex w-100 h-100">
    <div class="tab-content customization__tab-content w-100 h-100" id="v-pills-boy-tabContent">
        @foreach ($categories as $category) 
            
        <div class="tab-pane fade h-100 @if ($loop->first) show active 
            @endif" id="v-pills-boy-{{$category->id}}" role="tabpanel" aria-labelledby="v-pills-boy-{{$category->id}}-tab">
            <div class="d-flex flex-column h-100">
                <ul class="customization__tab-content__list nav mx-auto mb-auto">
                    @foreach ($category->subCategories as $subcategory)
                        
                    <li class="customization__tab-content__list__item">
                        <button type="button" data-id="{{$category->id}}" class="customization__tab__card customization__tab__card--head d-flex align-items-center justify-content-center 
                        {{ $fav->where('user_id', Auth::user()->id)->where('category_id', $category->id)
                            ->where('sub_category_id', $subcategory->id)
                            ->first()  ? 'active' : ''}}" data-toggle="pill">
                            <img src="{{asset($subcategory->hidden_image)}}" alt="main head" class="customization__tab__card__image--main user-select-none position-absolute">
                            <img src="{{asset($subcategory->image)}}" alt="head image" class="customization__tab__card__image sub_category_id" data-cat_id="{{ $category->id }}" data-id="{{$subcategory->id}}">
                        </button>
                    </li>
                    @endforeach	
                </ul>												
                <div class="text-center mt-4">
                    <button type="button" class="primary-btn apply-btn" style="background-image: url('{{asset('')}}frontend/assets/images/button-mask/btn-mask-1.png');" data-toggle="modal" data-target="#customBotPreviewModal">
                        Equip
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    </div>

</div>