<div class="customization__character-wrapper d-flex w-100 h-100">
    <div class="customization__character d-flex align-items-center justify-content-center position-relative dark-pattern w-100 h-100">
        <img id="boy_body" src="{{asset('')}}frontend/assets/images/characters/boy/preview.png" alt="body" class="customization__character__image w-100">
        <img id="boy_hand" src="{{asset('')}}frontend/assets/images/characters/boy/main/hands/empty-hand.png" alt="hand" class="customization__character__image w-100 position-absolute">
        
        @foreach ($fav as $fav_data)
            <img id="boy_face" src="{{asset($fav_data->subCategory->hidden_image)}}" alt="face" class="customization__character__image w-100 position-absolute d-block
            ">
        @endforeach
    </div>
    <canvas class="customization__character-canvas" id="boy-bot-canvas"></canvas>
</div>

