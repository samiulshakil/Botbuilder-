<div class="customization__tab-content-wrapper d-flex w-100 h-100">
    <div class="tab-content customization__tab-content w-100 h-100" id="v-pills-girl-tabContent">
        @foreach ($women_categories as $women_category)
        <div class="tab-pane fade h-100 @if ($loop->first) show active 
            @endif" id="v-pills-girl-{{$women_category->id}}" role="tabpanel" aria-labelledby="v-pills-girl-{{$women_category->id}}-tab">
            <div class="d-flex flex-column h-100">
                <ul class="customization__tab-content__list nav mx-auto mb-auto">
                    @foreach ($women_category->womensubCategories as $women_sub_category)														
                    <li class="customization__tab-content__list__item">
                        <button type="button" class="customization__tab__card customization__tab__card--hair d-flex align-items-center justify-content-center
                        {{ $fav_women->where('user_id', Auth::user()->id)->where('women_category_id', $women_category->id)
                            ->where('women_sub_category_id', $women_sub_category->id)
                            ->first()  ? 'active' : ''}}" data-toggle="pill">
                            <img src="{{asset($women_sub_category->hidden_image)}}" alt="main hair" class="customization__tab__card__image--main user-select-none position-absolute">
                            <img src="{{asset($women_sub_category->image)}}" alt="hair image" class="customization__tab__card__image women_sub_category_id" data-women_cat_id="{{ $women_category->id }}" data-women_sub_cat_id="{{$women_sub_category->id}}">
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