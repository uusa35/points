<div class="portlet light ">
    <div class="portlet-body">
        <table id="moreDataTable-{{ rand(99,9999) }}" class="table table-striped table-bordered table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>id</th>
                <th>name_ar</th>
                <th>name_en</th>
                <th>image</th>
                <th>active</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>id</th>
                <th>name_ar</th>
                <th>name_en</th>
                <th>image</th>
                <th>active</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name_ar }}</td>
                    <td>{{ $element->name_en }}</td>
                    <td><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                             class="img-xs" alt="">
                    </td>
                    <td>
                        <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
