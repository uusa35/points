<div class="col-lg-12">
    @if($elements->isNotEmpty())
        <div class="portfolio-content portfolio-1">
            <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
                <div data-filter="*"
                     class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> {{ trans('general.all_images') }}
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
                                <img src="{{ asset(env('FILES').$img->path) }}" alt=""></div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <a href="{{ asset(env('FILES').$img->path) }}"
                                           class="cbp-lightbox cbp-l-caption-buttonRight uppercase btn green uppercase"
                                           data-title="{{  $element->caption }} <br> {{ $element->notes  }}">{{ trans('general.view_larger') }}</a>
                                        @can('file.delete', $img)
                                            <a data-toggle="modal" href="#" data-target="#basic"
                                               data-title="Delete"
                                               data-content="Are you sure you want to delete image ? "
                                               data-form_id="delete-{{ $img->id }}"
                                               class="btn red uppercase"
                                            >
                                                <i class="fa fa-fw fa-recycle"></i> {{ trans('general.delete') }}</a>
                                            <form method="post" id="delete-{{ $img->id }}"
                                                  action="{{ route('backend.file.destroy',$img->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete"/>
                                                <button type="submit" class="btn btn-del hidden">
                                                    <i class="fa fa-fw fa-times-circle"></i> {{ trans('general.delete') }}
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">{{ $img->name }}</div>
                        <div
                            class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">{{ $img->caption }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="alert alert-info">
            {{ trans('general.no_files') }}
        </div>
    @endif
</div>
