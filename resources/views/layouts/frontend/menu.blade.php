<!-- Mainmenu Wrap -->
<div class="mainmenu-wrapper d-none d-lg-block">
    <nav class="page_nav">
        <ul class="mainmenu">
            @foreach($menu_items as $menu_item)
            <li class="lavel-1 with--drop slide--megamenu"><a href="{{ count($menu_item->children()) > 0 ? "#" : $menu_item->url }}"><span>{{ $menu_item->title }}</span></a>
                @if(count($menu_item->children()) > 0)
                <!-- Start Mega Menu -->
                <div class="mega__width--fullscreen">
                    <div class="container">
                        <div class="row">
                            @foreach($menu_item->children() as $child)
                            <!-- Start Single List -->
                            <div class="col-lg-3">
                                <ul class="mega__list">
                                    <li class="mega--title">{{ $child->title }}</li>
                                    @foreach($child->children() as $child_item)
                                    <li><a href="{{ $child_item->url }}"><span>{{ $child_item->title }}</span></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Single List -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End Mega Menu -->
                @endif
            </li>
            @endforeach
        </ul>
    </nav>
</div>