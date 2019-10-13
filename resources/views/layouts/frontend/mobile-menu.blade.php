<!-- Start Popup Menu -->
<div class="popup-mobile-manu popup-mobile-visiable">
    <div class="inner">
        <div class="mobileheader">
            <div class="logo">
                <a href="/">
                    <img src="/brook/img/logo/brook-black.png" alt="Multipurpose">
                </a>
            </div>
            <a class="mobile-close" href="#"></a>
        </div>
        <div class="menu-content">
            <ul class="menulist object-custom-menu">
                @foreach($menu_items as $menu_item)
                    <li class="has-mega-menu"><a href="{{ count($menu_item->children()) > 0 ? "#" : $menu_item->url }}"><span>{{ $menu_item->title }}</span></a>
                        @if(count($menu_item->children()) > 0)
                            @foreach($menu_item->children() as $child)
                            <ul class="object-submenu">
                                <li class="title">{{ $child->title }}</li>
                                @foreach($child->children() as $child_item)
                                    <li><a href="{{ $child_item->url }}"><span>{{ $child_item->title }}</span></a></li>
                                @endforeach
                            </ul>
                            @endforeach
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- End Popup Menu -->