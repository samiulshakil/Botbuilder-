@extends('frontend.master')

@section('title')
	Bot Builder
@endsection



	@section('Content')

		<!-- Character Customization Section -->
		<section class="customization">
			<div class="container">
				<div class="row">
					<div class="col-12 section-header text-center mb-3">
						<h1 class="section-header__title">{{$botbuilder_content->botbuilder_title}}</h1>
						<p class="section-header__text">{{$botbuilder_content->botbuilder_sub_title}}</p>
					</div>
					<div class="col-12 mb-4">
						<div class="nav nav-pills justify-content-center" id="v-pills-tab-smokebot" role="tablist">
							<a class="nav-link text-white bg-transparent primary-btn primary-btn--black mr-3 active" id="v-pills-man-smokebot-tab" data-toggle="pill" href="#v-pills-man-smokebot" role="tab" aria-controls="v-pills-man-smokebot" aria-selected="true" style="background-image: url('{{asset($botbuilder_content->botbuilder_button_bg)}}');">
								{{$botbuilder_content->botbuilder_lady_button}}
							</a>
							<a class="nav-link text-white bg-transparent primary-btn primary-btn--black" id="v-pills-lady-smokebot-tab" data-toggle="pill" href="#v-pills-lady-smokebot" role="tab" aria-controls="v-pills-lady-smokebot" aria-selected="false" style="background-image: url('{{asset($botbuilder_content->botbuilder_button_bg)}}');">
								
								{{$botbuilder_content->botbuilder_man_button}}
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-content" id="v-pills-boy-tabContent">
				<div class="tab-pane fade h-100 show active" id="v-pills-man-smokebot" role="tabpanel" aria-labelledby="v-pills-man-smokebot-tab">
					<div class="customization__wrapper customization__wrapper--boy position-relative mx-auto">
						<div class="container">
							<div class="row"> 
								<div class="col-xl-5 mb-5 mb-xl-0 boy_body_class" id="boy_body_id">
									@include('frontend.partial.boy_body')
								</div>
								<div class="col-xl-4 col-lg-7 mb-5 mb-lg-0"> 
									@include('frontend.partial.man_sub_category')
								</div>
								<div class="col-xl-3 col-lg-5">
									<div class="customization__nav-wrapper d-flex w-100 h-100">
										<div class="nav customization__nav nav-pills text-center w-100 h-100" id="v-pills-tab-boy" role="tablist" aria-orientation="vertical">
											@foreach ($categories as $category)
											<a class="nav-link col-6 @if ($loop->first) active
											@endif" id="v-pills-boy-{{$category->id}}-tab" data-toggle="pill" href="#v-pills-boy-{{$category->id}}" role="tab" aria-controls="v-pills-boy-{{$category->id}}" aria-selected="true">
												<div class="nav-link__icon-wrapper rounded-circle" data-id="{{$category->id}}">
													<div class="nav-link__icon d-flex align-items-center justify-content-center w-100 h-100">
														<img src="{{asset($category->image)}}" alt="faces" class="nav-link__image w-100">
													</div>
												</div>
												<span class="nav-link__text d-block">{{$category->name}}</span>
											</a>
											@endforeach	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-pane fade h-100" id="v-pills-lady-smokebot" role="tabpanel" aria-labelledby="v-pills-lady-smokebot-tab">
					<div class="customization__wrapper customization__wrapper--girl position-relative mx-auto">
						<div class="container">
							<div class="row">
								<div class="col-xl-5 mb-5 mb-xl-0" id="girl_body_id">
									@include('frontend.partial.girl_body')
								</div>
								<div class="col-xl-4 col-lg-7 mb-5 mb-lg-0">
									@include('frontend.partial.women_sub_category')
								</div>
								<div class="col-xl-3 col-lg-5">
									<div class="customization__nav-wrapper d-flex w-100 h-100">
										<div class="nav customization__nav nav-pills text-center w-100 h-100" id="v-pills-tab-girl" role="tablist" aria-orientation="vertical">
											@foreach ($women_categories as $women_category)	
											<a class="nav-link col-6 @if ($loop->first) active
												@endif" id="v-pills-girl-{{$women_category->id}}-tab" data-toggle="pill" href="#v-pills-girl-{{$women_category->id}}" role="tab" aria-controls="v-pills-girl-{{$women_category->id}}" aria-selected="true">
												<div class="nav-link__icon-wrapper rounded-circle">
													<div class="nav-link__icon d-flex align-items-center justify-content-center w-100 h-100">
														<img src="{{asset($women_category->image)}}" alt="girl hair" class="nav-link__image w-100">
													</div>
												</div>
												<span class="nav-link__text d-block">{{$women_category->name}}</span>
											</a>	
											@endforeach										
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



	<!-- Custom Bot Preview Modal -->
	<div class="modal fade" id="customBotPreviewModal" tabindex="-1" aria-labelledby="customBotPreviewModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content border-0">
				<div class="modal-body">
					<img src="{{asset('')}}frontend/assets/images/preloader/preloader.gif" alt="custom bot image" class="custom-bot-preview-image w-100">
				</div>
				<div class="modal-footer align-items-center justify-content-center">
					<a href="#!" class="primary-btn download-btn" style="background-image: url('{{asset('')}}frontend/assets/images/button-mask/btn-mask-1.png');" download="custom-bot-image.png">Download</a>
					<button type="button" class="primary-btn clear-btn" style="background-image: url('{{asset('')}}frontend/assets/images/button-mask/btn-mask-4.png');" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

  @endsection

  @section('js')
  	<script src="{{asset('')}}frontend/assets/plugins/bot-builder/js/bot-builder.js"></script>
	<script>

		window.onload = function() {
			if(!window.location.hash) {
				window.location = window.location + '#loaded';
				window.location.reload();
			}
		}
	</script>

	<script>
		$(document).ready(function () {
			//for man sub category save to fav
			$('body').on('click', '.sub_category_id', function (e) { 
				e.preventDefault();
				let sub_category_id = $(this).attr('data-id');
				let category_id = $(this).attr('data-cat_id'); 
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: "post",
					url: "{{route('bot.favourite')}}", 
					data: {
						sub_category_id: sub_category_id,
						category_id: category_id
					},
					success: function (response) { 
						$('#boy_body_id').html(response.single_render); 
					}
				});	
			});

			//for women sub category save to fav

			$('body').on('click', '.women_sub_category_id', function (e) { 
				e.preventDefault();
				let women_sub_category_id = $(this).attr('data-women_sub_cat_id');
				let women_category_id = $(this).attr('data-women_cat_id'); 

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: "post",
					url: "{{route('bot.favourite.women')}}", 
					data: {
						women_sub_category_id: women_sub_category_id,
						women_category_id: women_category_id
					},
					success: function (response) { 
						$('#girl_body_id').html(response.women_data); 
					}
				});	
			});


		});
	</script>

  @endsection
  
  @section('css')
	<style type="text/css">
		.customization::before {
			content: "";
			position: absolute;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 100%;
			background: url("{{asset($botbuilder_content->botbuilder_smoke_bg)}}") no-repeat center;
			background-size: cover;
		}
	</style>
@endsection
