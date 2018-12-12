<div class="portlet light portlet-fit ">
    <div class="portlet-body">
        <div class="mt-element-list">
            <div class="mt-list-head list-default green-haze">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="list-head-title-container">
                            <h3 class="list-title uppercase sbold">{{ trans('general.list_of_pdf_files') }}</h3>
                            <div class="list-date">{{ $element->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-list-container list-default">
                <div class="mt-list-title uppercase">My List</div>
                <ul>
                    @foreach($elements as $file)
                        <li class="mt-list-item">
                            <div class="list-icon-container done">
                                <a href="{{ asset(env('FILES').$file->path) }}" target="_blank">
                                    <i class="fa fa-fw fa-file-pdf-o"></i>
                                </a>
                            </div>
                            <div class="list-datetime">{{ $file->created_at->diffForHumans() }}
                            </div>
                            <div class="list-item-content">
                                <h3 class="uppercase bold">
                                    <a target="_blank"
                                       href="{{ asset(env('FILES').$file->path) }}">{{ $file->name ? $file->name : $element->name }}</a>
                                </h3>
                                <p>{{ $file->description ? $file->description : $element->description }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
