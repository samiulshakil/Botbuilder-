<div class="customization__character-wrapper d-flex w-100 h-100">
    <div class="customization__character d-flex align-items-center justify-content-center position-relative dark-pattern w-100 h-100">
        <img id="girl_body" src="{{asset('')}}frontend/assets/images/characters/girl/preview.png" alt="body" class="customization__character__image w-100">
       @foreach ($fav_women as $favourite)      
        <img id="girl_hair" src="{{asset($favourite->womenSubCategory->hidden_image)}}" alt="face" class="customization__character__image w-100 position-absolute">
        @endforeach
    </div>
    <canvas class="customization__character-canvas" id="girl-bot-canvas"></canvas>
</div>