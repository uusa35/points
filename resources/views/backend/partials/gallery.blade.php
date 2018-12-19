<div class="portfolio-content portfolio-1">
    <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> {{ trans('general.all_images') }}
            <div class="cbp-filter-counter"></div>
        </div>
        {{--<div data-filter=".identity" class="cbp-filter-item btn dark btn-outline uppercase"> Identity--}}
        {{--<div class="cbp-filter-counter"></div>--}}
        {{--</div>--}}
    </div>
    <div id="js-grid-juicy-projects" class="cbp">
        @foreach($elements as $img)
            <div class="cbp-item">
                <div class="cbp-caption">
                    <div class="cbp-caption-defaultWrap">
                        <img src="{{ asset(env('THUMBNAIL').$img->image) }}" alt=""></div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <a href="{{ asset(env('LARGE').$img->image) }}"
                                   class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase"
                                   data-title="Dashboard<br>by Paul Flavius Nechita">{{ trans('general.view_larger') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">{{ $img->name }}</div>
                <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">{{ $img->caption }}
                    Graphic
                </div>
            </div>
        @endforeach
    </div>
</div>
