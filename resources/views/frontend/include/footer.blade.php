<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="footer__block">
                        <a class="navbar-brand d-inline-flex align-items-center" href="./">
                            <img src="{{asset(getFooter()->footer_left_side_logo)}}" alt="logo" class="navbar-brand__image rounded-circle overflow-hidden">					
                            <span class="navbar-brand__text">{{getFooter()->footer_left_side_title}}</span>
                        </a>
                        <p class="footer__block__text mt-2 mb-4">{{getFooter()->footer_left_side_subtitle}}</p>
                        <button type="button" class="primary-btn primary-btn--black" style="background-image: url('{{asset(getFooter()->footer_left_side_btn_image)}}');" data-toggle="modal" data-target="#createAccountModal">
                            {{getFooter()->footer_left_side_btn_name}}
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                            <div class="footer__block">
                                <h3 class="footer__block__title">Quick Link</h3>
                                <ul class="footer__block__list">
                                    @foreach (getQuicklink() as $quicklink)                      
                                    <li class="footer__block__list__item">
                                        <a href="{{$quicklink->url}}" class="footer__block__list__link d-block">{{$quicklink->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                            <div class="footer__block">
                                <h3 class="footer__block__title">Quick Link</h3>
                                <ul class="footer__block__list">
                                    @foreach (getQuicklink() as $quicklink)                      
                                    <li class="footer__block__list__item">
                                        <a href="{{$quicklink->url}}" class="footer__block__list__link d-block">{{$quicklink->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                            <div class="footer__block">
                                <h3 class="footer__block__title">Social Media</h3>
                                <ul class="footer__block__list">
                                    @foreach (getSocialmedia() as $socialmedia)
                                    <li class="footer__block__list__item">
                                        <a href="{{$socialmedia->url}}" target="_blank" class="footer__block__list__link d-block">
                                            <i class="{{$socialmedia->icon_class}} footer__block__list__link__icon"></i>
                                            {{$socialmedia->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="footer__bottom__copyright mb-0">© Copyright 2022. Disttrict 420. All rights reserved.</p>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <p class="footer__bottom__text mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</footer>