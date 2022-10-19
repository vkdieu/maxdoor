@extends('admin.layouts.app')

@section('title')
{{ $module_name }}
@endsection

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{ $module_name }}
    <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2).'.create') }}"><i
        class="fa fa-plus"></i> @lang('add_new')</a>
  </h1>
</section>
@endsection

@section('content')

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">@lang('list')</h3>
    </div>

    <div class="box-body table-responsive">
      @if (session('errorMessage'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('errorMessage') }}
      </div>
      @endif
      @if (session('successMessage'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('successMessage') }}
      </div>
      @endif

      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach

      </div>
      @endif

      @if (count($rows) == 0)
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @lang('not_found')
      </div>
      @else

      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>@lang('name')</th>
            <th>@lang('function_code')</th>
            <th>@lang('description')</th>
            <th>@lang('iorder')</th>
            <th>@lang('updated_at')</th>
            <th>@lang('status')</th>
            <th>@lang('action')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($modules as $module)

            <tr class="valign-middle">
              <td>
                {{ $module->name }}
              </td>
              <td>
                {{ $module->module_code }}
              </td>
              <td>
                {{ $module->description }}
              </td>
              <td>
                {{ $module->iorder }}
              </td>
              <td>
                {{ $module->updated_at }}
              </td>
              <td>
                @lang($module->status)
              </td>
              <td>
                <a class="btn btn-sm btn-primary" data-toggle="tooltip" title="@lang('update')"
                  data-original-title="@lang('update')" href="{{ route('modules.edit', $module->id) }}">
                  <i class="fa fa-pencil-square-o"></i>
                </a>

                <button class="btn btn-sm btn-danger" disabled type="submit" data-toggle="tooltip" title="@lang('delete')"
                  data-original-title="@lang('delete')">
                  <i class="fa fa-trash"></i>
                </button>
              </td>
            </tr>

          @foreach ($rows as $sub)

          @if ($sub->module_id == $module->id)
          <form action="{{ route(Request::segment(2).'.destroy', $sub->id) }}" method="POST"
            onsubmit="return confirm('@lang('confirm_action')')">
            <tr class="valign-middle bg-gray-light">
              <td>
                - - - - {{ $sub->name }}
              </td>
              <td>
                - - - - {{ $sub->function_code }}
              </td>
              <td>
                {{ $sub->description }}
              </td>
              <td>
                - - - - {{ $sub->iorder }}
              </td>
              <td>
                {{ $sub->updated_at }}
              </td>
              <td>
                @lang($sub->status)
              </td>
              <td>
                <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="@lang('update')"
                  data-original-title="@lang('update')" href="{{ route(Request::segment(2).'.edit', $sub->id) }}">
                  <i class="fa fa-pencil-square-o"></i>
                </a>
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="@lang('delete')"
                  data-original-title="@lang('delete')">
                  <i class="fa fa-trash"></i>
                </button>
              </td>
            </tr>
          </form>
          @endif
          @endforeach

          @endforeach
        </tbody>
      </table>
      @endif
    </div>

  </div>
</section>
@endsection