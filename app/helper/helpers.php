<?php
    use App\Models\AddToFavourite;
    use App\Models\Menu;
    use App\Models\SocialMedia;
    use App\Models\QuickLink;
    use App\Models\Footer;

    function getFavourites(){
        return AddToFavourite::all();

    }

    function getMenus(){
        return Menu::where('status', 1)->get();
    }

    function getSocialmedia(){
        return SocialMedia::where('status', 1)->get();
    }

    function getQuicklink(){
        return QuickLink::where('status', 1)->get();
    }

    function getFooter(){
        return Footer::first();
    }

?>