@if ($crud->hasAccess('process'))
  <a href="{{ url($crud->route.'/'.$entry->getKey().'/process') }}" class="btn btn-sm btn-link"><i class="la la-play"></i> Start</a>
@endif