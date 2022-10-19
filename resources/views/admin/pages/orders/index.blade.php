@extends('layouts/app')

@section('title')
  {{ $module_name }}
@endsection

@section('content-header')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
      <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(1) . '.create') }}"><i
          class="fa fa-plus"></i> @lang('add_new')</a>
    </h1>
  </section>
@endsection

@section('content')

  <!-- Main content -->
  <section class="content">
    {{-- Search form --}}
    <div class="box box-default">

      <div class="box-header with-border">
        <h3 class="box-title">@lang('search')</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <form action="{{ route(Request::segment(1) . '.index') }}" method="GET">
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" name="keyword" placeholder="@lang('keyword_note')"
                  value="{{ isset($params['keyword']) ? $params['keyword'] : '' }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value="">@lang('status')</option>
                  @foreach (App\Consts::ORDER_STATUS as $key => $value)
                    <option value="{{ $key }}"
                      {{ isset($params['status']) && $key == $params['status'] ? 'selected' : '' }}>
                      {{ __($value) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">@lang('search')</button>
                <a class="btn btn-default btn-sm" href="{{ route(Request::segment(1) . '.index') }}">
                  @lang('reset')
                </a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    {{-- End search form --}}

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
                <th>@lang('fullname')</th>
                <th>@lang('email') / @lang('phone')</th>
                <th>@lang('Order service')</th>
                <th>Ghi chú khách hàng</th>
                <th>Ghi chú Admin</th>
                <th>@lang('updated_at')</th>
                <th>@lang('status')</th>
                <th>@lang('action')</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($rows as $row)
                @if ($row->parent_id == 0 || $row->parent_id == null)
                  <form action="{{ route(Request::segment(1) . '.destroy', $row->id) }}" method="POST"
                    onsubmit="return confirm('@lang('confirm_action')')">
                    <tr class="valign-middle">
                      <td>
                        <strong style="font-size: 14px;">{{ $row->name }}</strong>
                      </td>
                      <td>
                        {{ $row->email }}
                        <br>
                        {{ $row->phone }}
                      </td>
                      <td>
                        <a target="_blank" href="{{ $row->post_link }}">
                          {{ $row->post_name }}
                        </a>
                      </td>
                      <td>
                        {{ Str::limit($row->customer_note, 200) }}
                      </td>
                      <td>
                        {{ Str::limit($row->admin_note, 200) }}
                      </td>
                      <td>
                        {{ $row->updated_at }}
                      </td>
                      <td>
                        @lang($row->status)
                      </td>
                      <td>
                        <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="@lang('view')"
                          data-original-title="@lang('view')"
                          href="{{ route(Request::segment(1) . '.show', $row->id) }}">
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
            </tbody>
          </table>
        @endif
      </div>

      <div class="box-footer clearfix">
        <div class="row">
          <div class="col-sm-5">
            Tìm thấy {{ $rows->total() }} kết quả
          </div>
          <div class="col-sm-7">
            {{ $rows->withQueryString()->links('pagination.default') }}
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
