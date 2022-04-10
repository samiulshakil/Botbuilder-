@extends('frontend.master')

@section('title')
	Home Page
@endsection

@section('Content')
	<!-- Banner Section -->
	<section class="banner position-relative overflow-hidden">
		<div class="banner__animation">
			<img src="{{asset($banner_know->banner_bg_image)}}" alt="banner image" class="banner__animation__image w-100">
		</div>
		<div class="banner__content">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="banner__buttons d-flex flex-column align-items-center justify-content-center py-3">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>		

	<!-- Know Section -->
	<section class="know">
		<div class="container">
			<div class="row flex-lg-row-reverse">
				<div class="col-lg-5">
					<img src="{{asset($banner_know->know_image)}}" alt="details" class="w-100">
				</div>
				<div class="col-lg-7">
					<div class="know__content mt-4">
						<div class="section-header">
							<h1 class="section-header__title mb-0">{{$banner_know->know_title}}</h1>
							<h3 class="section-header__sub-title">{{$banner_know->know_subtitle}}</h3>
						</div>
						<p class="know__text">
							On his own for the first time. Mars the Smoke-Bot divides his time between school and hustling to pay for his busines Degree. But when he tuns into a stopping poin, Mars goes into the <span class="primary-text">“Natural  Medication game.” ‘’District 420”</span> is a dealer - simulator game where you single-handedly transform <br>
							into the world’s largest transporter of marijuana and change the course of an entire school, community, and world.
						</p>
						<p class="know__text">
							<span class="primary-text">“District 420”</span> game will be introduced like episoded of a television show. Each week, an expansion of the game will be added, which allows for all users to have a fair shot at earning <span class="primary-text">“NFT BUDS”</span> or a <span class="primary-text">“Smoke-Bot NFT.”</span> Within the game, you wil have the option to generate your buds into an “NFT BUD” or you can leave it in-game to sell to students on campus for “smokeSwap” coins.
						</p>
                      
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Preorder Section -->
	<section class="preorder" style="background-image: url('{{asset($pre_order->pre_order_bg)}}');">
		<div class="container">
			<div class="row justify-content-center justify-content-xl-end">
				<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
					<div class="preorder-card text-center">
						<h3 class="preorder-card__title text-uppercase mb-3">{{$pre_order->pre_order_title}}</h3>
						<p>{!!$pre_order->pre_order_description!!}</p>
						<div>
							<a href="#!" class="primary-btn" style="background-image: url('{{asset($pre_order->button_image)}}');">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M3.56951 2.80682C1.73429 4.64204 0.762695 7.01705 0.762695 9.60795C0.762695 11.6591 1.41042 13.7102 2.70588 15.4375C1.9502 13.1705 5.7286 7.66477 7.67179 5.39773C4.43315 2.05114 3.56951 2.80682 3.56951 2.80682ZM16.9559 2.80682C18.7911 4.64204 19.7627 7.01705 19.7627 9.60795C19.7627 11.6591 19.115 13.7102 17.8195 15.4375C18.5752 13.1705 14.7968 7.66477 12.8536 5.39773C16.2002 2.05114 17.0638 2.80682 16.9559 2.80682ZM10.2627 0C12.2059 0 13.8252 0.539772 15.2286 1.40341C13.3934 0.97159 10.5866 2.59091 10.2627 2.80682C9.50701 2.375 6.9161 1.07954 5.29679 1.40341C6.70019 0.539772 8.31951 0 10.2627 0ZM10.2627 7.77273C13.1775 9.93182 18.0354 15.3295 16.5241 16.8409C14.7968 18.3523 12.6377 19.2159 10.2627 19.2159C7.99565 19.2159 5.7286 18.3523 4.00133 16.8409C2.48997 15.3295 7.34792 9.93182 10.2627 7.77273Z" fill="white"></path>
								</svg>
								{{$pre_order->button_text}}
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- News Section -->
	<section class="news section-gap overflow-hidden">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 mb-4 mb-xl-0">
					<div class="section-header mb-4">
						<h1 class="section-header__title">{{$news->left_title}}</h1>
					</div>
					<p>{{$news->left_sub_title}}</p>
					<ul class="nav social-list align-items-center mb-4">
						@foreach (getSocialmedia() as $social)
						<li class="social-list__item">
							<a class="social-list__link" href="{{$social->url}}">
								<i class="{{$social->icon_class}} social-list__link__icon"></i> 
							</a>
						</li>					
						@endforeach
					</ul>
					<a href="{{$news->left_button_url}}" class="primary-btn" style="background-image: url('{{asset($news->left_button_image)}}');">
						{{$news->left_button_name}}
					</a>
				</div>
				<div class="col-xl-8">
					<div class="row">
						<div class="col-md-8 mb-4">
							<a href="#!" class="news__card d-inline-block">
								<div class="news__card__header position-relative">
									<img src="{{asset($news->right_side_image)}}" alt="news-image" class="w-100">
								</div>
								<div class="news__card__body">
									<h3 class="news__card__title">{{$news->right_side_title}}</h3>
									<p class="news__card__meta">{{$news->right_side_sub_title}}</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Newsletter Section -->
	<section class="preorder" style="background-image: url('{{asset('')}}frontend/assets/images/newsletter/newsletter.webp');">
		<div class="container">
			<div class="row justify-content-center justify-content-lg-end">
				<div class="col-lg-6 col-md-8 col-sm-10">
					<div class="preorder-card text-center">
						<h3 class="preorder-card__title text-uppercase mb-3">Join The Us</h3>
						<p>District 420 is a Android, Apple and browser based strategy game designed for you to Fully customize you're own collection of In game NFT Smokebots. District 420 will be utilized on the Binance Smart Chain, this will enable the production of all Smokebots, Smokeanimal's and other D420 assets to be traded and farmed in our own MD420 metaverse.</p>
						<a href="#!" class="primary-btn" style="background-image: url('{{asset('')}}frontend/assets/images/button-mask/btn-mask-1.png');">
							Join Presale
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Products Section -->
	<section class="products">
		<div class="container mb-5">
			<div class="row justify-content-center">
				<div class="col-lg-8 section-header text-center">
					<h1 class="section-header__title">Smokebot NFT’s Grown in-game by “Mars”</h1>
					<p class="section-header__text">As you move up in the game you wil be able to cobine your “NFT BUDS” together(4 or more) to create an very unique NFT called “SMOKEBOT NFT”these “SMOKEBOTS” wil be limited to only 15 per episode/Expaision.</p>
				</div>
			</div>
		</div>
		<div class="products__slider">
			<div class="products__slide">
				<div class="products__card-wrapper">
					<div class="products__card text-center" style="background-image: url('{{asset('')}}frontend/assets/images/products/products-bg-orange.png');">
						<img src="{{asset('')}}frontend/assets/images/products/products-1.webp" alt="products image" class="products__card__image img-fluid">
					</div>
				</div>
			</div>
			<div class="products__slide">
				<div class="products__card-wrapper">
					<div class="products__card text-center" style="background-image: url('{{asset('')}}frontend/assets/images/products/products-bg-green.png');">
						<img src="{{asset('')}}frontend/assets/images/products/products-2.webp" alt="products image" class="products__card__image img-fluid">
					</div>
				</div>
			</div>
			<div class="products__slide">
				<div class="products__card-wrapper">
					<div class="products__card text-center" style="background-image: url('{{asset('')}}frontend/assets/images/products/products-bg-pink.png');">
						<img src="{{asset('')}}frontend/assets/images/products/products-3.webp" alt="products image" class="products__card__image img-fluid">
					</div>
				</div>
			</div>
			<div class="products__slide">
				<div class="products__card-wrapper">
					<div class="products__card text-center" style="background-image: url('{{asset('')}}frontend/assets/images/products/products-bg-sky.png');">
						<img src="{{asset('')}}frontend/assets/images/products/products-4.webp" alt="products image" class="products__card__image img-fluid">
					</div>
				</div>
			</div>
			<div class="products__slide">
				<div class="products__card-wrapper">
					<div class="products__card text-center" style="background-image: url('{{asset('')}}frontend/assets/images/products/products-bg-yellow.png');">
						<img src="{{asset('')}}frontend/assets/images/products/products-5.webp" alt="products image" class="products__card__image img-fluid">
					</div>
				</div>
			</div>
			<div class="products__slide">
				<div class="products__card-wrapper">
					<div class="products__card text-center" style="background-image: url('{{asset('')}}frontend/assets/images/products/products-bg-pest.png');">
						<img src="{{asset('')}}frontend/assets/images/products/products-6.webp" alt="products image" class="products__card__image img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>




@endsection
