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

            <div class="col-md-3">
              <div class="form-group">
                <label>@lang('Keyword') </label>
                <input type="text" class="form-control" name="keyword"
                  placeholder="{{ __('Fullname') . ', ' . __('Email') . ', ' . __('Phone') . '...' }}"
                  value="{{ $params['keyword'] ?? '' }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>@lang('Department')</label>
                <select name="department_id" id="department_id" class="form-control select2" style="width: 100%;">
                  <option value="">@lang('Please select')</option>
                  @foreach ($departments as $item)
                    @if ($item->parent_id == 0 || $item->parent_id == null)
                      <option value="{{ $item->id }}"
                        {{ isset($params['department_id']) && $params['department_id'] == $item->id ? 'selected' : '' }}>
                        {{ $item->title }}</option>
                      @foreach ($departments as $sub)
                        @if ($item->id == $sub->parent_id)
                          <option value="{{ $sub->id }}"
                            {{ isset($params['department_id']) && $params['department_id'] == $sub->id ? 'selected' : '' }}>
                            - -
                            {{ $sub->title }}
                          </option>
                          @foreach ($departments as $sub_child)
                            @if ($sub->id == $sub_child->parent_id)
                              <option value="{{ $sub_child->id }}"
                                {{ isset($params['department_id']) && $params['department_id'] == $sub_child->id ? 'selected' : '' }}>
                                - - - -
                                {{ $sub_child->title }}</option>
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @endif
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-3 form-group">
              <label for="doctor_id">
                @lang('Doctor')
              </label>
              <select id="doctor_id" name="doctor_id" class="form-control select2" autocomplete="off">
                <option value="">@lang('Please select')</option>
                @isset($doctors)
                  @foreach ($doctors as $item)
                    <option value="{{ $item->id }}"
                      {{ isset($params['doctor_id']) && $params['doctor_id'] == $item->id ? 'selected' : '' }}>
                      {{ $item->title }}
                    </option>
                  @endforeach
                @endisset
              </select>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>@lang('Status')</label>
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value="">@lang('Please select')</option>
                  @foreach (App\Consts::CONTACT_STATUS as $key => $value)
                    <option value="{{ $key }}"
                      {{ isset($params['status']) && $key == $params['status'] ? 'selected' : '' }}>
                      {{ __($value) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>@lang('From date')</label>
                <input name="created_at_from" id="created_at_from" class="form-control datepicker"
                  value="{{ $params['created_at_from'] ?? '' }}" placeholder="@lang('dd/mm/yyyy')">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>@lang('To date')</label>
                <input name="created_at_to" id="created_at_to" class="form-control datepicker"
                  value="{{ $params['created_at_to'] ?? '' }}" placeholder="@lang('dd/mm/yyyy')">
              </div>
            </div>
            <div class="col-md-3">
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
        <h3 class="box-title">@lang('Booking list')</h3>
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
                <th>@lang('Fullname')</th>
                <th>@lang('Phone')</th>
                <th>@lang('Department')</th>
                <th>@lang('Doctor')</th>
                <th>@lang('Booking date')</th>
                <th>@lang('Booking time')</th>
                <th>@lang('Content note')</th>
                <th>@lang('Admin note')</th>
                <th>@lang('Created at')</th>
                <th>@lang('Status')</th>
                <th>@lang('Action')</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($rows as $row)
                <form action="{{ route(Request::segment(2) . '.destroy', $row->id) }}" method="POST"
                  onsubmit="return confirm('@lang('confirm_action')')">
                  <tr class="valign-middle">
                    <td>
                      <strong style="font-size: 14px;">{{ $row->name }}</strong>
                    </td>
                    <td>
                      {{ $row->phone }}
                    </td>
                    <td>
                      {{ $row->department }}
                    </td>
                    <td>
                      {{ $row->doctor }}
                    </td>
                    <td>
                      {{ isset($row->booking_date) ? \Carbon\Carbon::parse($row->booking_date)->format('d/m/Y') : '' }}
                    </td>
                    <td>
                      {{ $row->booking_time }}
                    </td>
                    <td>
                      {{ Str::limit($row->customer_note, 100) }}
                    </td>
                    <td>
                      {{ Str::limit($row->admin_note, 200) }}
                    </td>
                    <td>
                      {{ $row->created_at }}
                    </td>
                    <td>
                      @lang($row->status)
                    </td>
                    <td>
                      <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="@lang('Update')"
                        data-original-title="@lang('Update')"
                        href="{{ route(Request::segment(2) . '.edit', $row->id) }}">
                        <i class="fa fa-pencil-square-o"></i>
                      </a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="@lang('Delete')"
                        data-original-title="@lang('Delete')">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                </form>
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
