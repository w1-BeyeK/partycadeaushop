@extends("layouts.frontend.base")

@section("content")
    <style>
        .mega__width--fullscreen {
            margin-top: -15px !important;
        }
    </style>   

    <!-- Start Breadcaump Area -->
    <div class="breadcaump-area pt--260 pb--80 pt_md--200 pt_sm--150 bg_color--1 breadcaump-title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcaump-inner text-center">
                        <h1 class="heading heading-h1">Portfolio | {{ ucfirst($data->category->value) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcaump Area -->

    <!-- Page Conttent -->
    <main class="page-content">

        <!-- Start Portfolio Area -->
        <div class="brook-portfolio-area ptb--100 ptb-md--80 ptb-sm--60 bg_color--1 bk-masonary-wrapper">

            <div class="messonry-button text-center mb--70">
                <button data-filter="*" class="is-checked"><span class="filter-text">Alle</span> <span
                            class="filter-counter">{{ $data->totalKeywords }}</span></button>
                @foreach($data->keywords as $key => $value)

                    <button data-filter=".{{ strtolower($key) }}"><span
                                class="filter-text">{{ ucfirst($key) }}</span>
                        <span
                                class="filter-counter">{{ $value }}</span></button>
                @endforeach
            </div>


            <div class="portfolio-grid-metro3 mesonry-list">

                <div class="resizer"></div>

            @foreach($data->portfolio_items as $portfolio_item)
                <!-- Start Single Portfolio -->
                    <div class="portfolio portfolio_style--1 portfolio-25 grid-width-2 {{ str_replace(",", " ", $portfolio_item->keywords) }}">
                        <div class="poss_relative">
                            <div class="thumb">
                                <img src="/storage/portfolio/{{ $portfolio_item->image }}" alt="Portfolio Images">
                            </div>
                            <div class="port-overlay-info">
                                <div class="hover-action">
                                    <h3 class="post-overlay-title"><a target="_blank" href="{{ $portfolio_item->url }}">{{ $portfolio_item->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Portfolio -->
            @endforeach

            </div>
        </div>
        <!-- End Portfolio Area -->


    </main>
    <!--// Page Conttent -->
@stop