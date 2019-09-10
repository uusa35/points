<div class="col" style="padding-right: 0px; padding-left: 0px;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($sliders as $slider)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                    class="{{ $loop->first ? 'active' : null  }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : null  }}">
                    <a href="{{ route('frontend.order.show',1) }}">
                        <img class="d-block w-100"
                             src="{{ asset(env('LARGE').$slider->image) }}"
                             alt="{{ $slider->caption }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->caption }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ trans('general.previous') }}</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ trans('general.next') }}</span>
        </a>
    </div>
</div>
