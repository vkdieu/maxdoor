@extends('admin.layouts.app')

@section('title')
  {{ $module_name }}
@endsection

@section('content-header')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
    </h1>
  </section>
@endsection

@section('content')

  <!-- Main content -->
  <section class="content">
    {{-- Search form --}}
    <div class="box box-default">

      <div class="box-header with-border">
        <h3 class="box-title">@lang('Filter')</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <form action="{{ route(Request::segment(2) . '.index') }}" method="GET">
        <div class="box-body">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label>@lang('Keyword') </label>
                <input type="text" class="form-control" name="keyword"
                  placeholder="{{ __('Fullname') . ', ' . __('Affiliate code') . ', ' . __('Phone') . '...' }}"
                  value="{{ $params['keyword'] ?? '' }}">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>@lang('Status')</label>
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value="">@lang('Please select')</option>
                  @foreach (App\Consts::ORDER_STATUS as $key => $value)
                    <option value="{{ $key }}"
                      {{ isset($params['status']) && $key == $params['status'] ? 'selected' : '' }}>
                      {{ __($value) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>@lang('From date')</label>
                <input name="created_at_from" id="created_at_from" class="form-control datepicker"
                  value="{{ $params['created_at_from'] ?? '' }}" placeholder="@lang('dd/mm/yyyy')">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>@lang('To date')</label>
                <input name="created_at_to" id="created_at_to" class="form-control datepicker"
                  value="{{ $params['created_at_to'] ?? '' }}" placeholder="@lang('dd/mm/yyyy')">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>@lang('Filter')</label>
                <div>
                  <button type="submit" class="btn btn-primary btn-sm mr-10">@lang('Submit')</button>
                  <a class="btn btn-default btn-sm" href="{{ route(Request::segment(2) . '.index') }}">
                    @lang('Reset')
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    {{-- End search form --}}

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">@lang('List')</h3>
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
                <th>#</th>
                <th>@lang('Fullname')</th>
                <th>@lang('Affiliate code')</th>
                <th>@lang('Is type')</th>
                <th>@lang('Order total money')</th>
                <th>@lang('Affiliate percent')</th>
                <th>@lang('Affiliate point')</th>
                <th>@lang('Affiliate money')</th>
                <th>@lang('Status')</th>
                <th>@lang('Created at')</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($rows as $item)
                <tr class="valign-middle">
                  <td>
                    {{ $loop->index + $rows->firstItem() }}
                  </td>
                  <td>
                    <strong style="font-size: 14px;">{{ $item->affiliate_name }}</strong>
                  </td>
                  <td>
                    {{ $item->affiliate_code }}
                  </td>
                  <td>
                    @lang($item->is_type)
                  </td>
                  <td>
                    {{ number_format($item->order_total_money) }}
                  </td>
                  <td>
                    {{ $item->affiliate_percent }} %
                  </td>
                  <td>
                    {{ number_format($item->affiliate_point) }}
                  </td>
                  <td>
                    {{ number_format($item->affiliate_money) }}
                  </td>
                  <td>
                    @lang($item->status)
                  </td>
                  <td>
                    {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d/m/Y') }}
                  </td>
                </tr>
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
            {{ $rows->withQueryString()->links('admin.pagination.default') }}
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
