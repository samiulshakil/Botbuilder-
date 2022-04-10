<header class="header">
    <nav class="navbar navbar-expand-lg p-0">
        <div class="container-fluid">
            <a class="navbar-brand d-inline-flex align-items-center" href="">
                <img src="{{asset('')}}frontend/assets/images/logo/logo.png" alt="logo" class="navbar-brand__image rounded-circle overflow-hidden">					
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler__show">Menu</span>
                <span class="navbar-toggler__hide">close</span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center text-center ml-auto">
                    <li class="nav-item">
                        <button class="theme-toggler">
                            <i class="fas fa-sun theme-toggler__icon theme-toggler__icon--dark"></i>
                            <i class="fas fa-moon theme-toggler__icon theme-toggler__icon--light"></i>
                        </button>
                    </li>
                    @foreach (getMenus() as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="{{$menu->url}}">{{$menu->name}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a href="https://district-420.org/public/animated-home-page/buynow/" target="_blank" class="primary-btn" style="background-image: url('{{asset('')}}frontend/assets/images/button-mask/btn-mask-1.png');">
                            Connect Wallet
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar__social align-items-center text-center ml-md-2">
                    <li class="navbar__social__item">
                        <a class="navbar__social__link" href="#!" target="_blank">
                            <i class="fab fa-discord navbar__social__link__icon"></i> 
                        </a>
                    </li>
                    <li class="navbar__social__item">
                        <a class="navbar__social__link" href="#!" target="_blank">
                            <i class="fab fa-twitter navbar__social__link__icon"></i> 
                        </a>
                    </li>
                    <li class="navbar__social__item">
                        <a class="navbar__social__link" href="#!" target="_blank">
                            <i class="fab fa-instagram navbar__social__link__icon"></i> 
                        </a>
                    </li>
                    <li class="navbar__social__item">
                        <a class="navbar__social__link" href="#!" target="_blank">
                            <i class="fab fa-linkedin-in navbar__social__link__icon"></i> 
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>