@extends('admin.layouts.app')
@section('title')
  {{ $module_name }}
@endsection
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
      <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}">
        <i class="fa fa-plus"></i> @lang('Add')</a>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
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
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">@lang('Create form')</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{ route(Request::segment(2) . '.store') }}" method="POST">
        @csrf
        <div class="box-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1" data-toggle="tab">
                  <h5>
                    @lang('General information')
                    <span class="text-danger">*</span>
                  </h5>
                </a>
              </li>
              <button type="submit" class="btn btn-primary btn-sm pull-right">
                <i class="fa fa-floppy-o"></i>
                @lang('Save')
              </button>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        @lang('Component type')
                        <small class="text-red">*</small>
                      </label>
                      <select name="component_code" id="component_code" class="form-control select2" style="width: 100%"
                        required>
                        <option value="">@lang('Please select')</option>
                        @foreach ($component_configs as $item)
                          <option value="{{ $item->component_code }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        @lang('Title')
                        <small class="text-red">*</small>
                      </label>
                      <input type="text" class="form-control" name="title" placeholder="@lang('Title')"
                        value="{{ old('title') }}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Status')</label>
                      <div class="form-control">
                        @foreach (App\Consts::STATUS as $key => $value)
                          <label>
                            <input type="radio" name="status" value="{{ $value }}"
                              {{ $loop->index == 0 ? 'checked' : '' }}>
                            <small class="mr-15">{{ __($value) }}</small>
                          </label>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Order')</label>
                      <input type="number" class="form-control" name="iorder" placeholder="@lang('Order')"
                        value="{{ old('iorder') }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('Description')</label>
                      <textarea name="brief" id="brief" class="form-control" rows="5">{{ old('brief') }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="{{ route(Request::segment(2) . '.index') }}">
            <i class="fa fa-bars"></i> @lang('List')
          </a>
          <button type="submit" class="btn btn-primary pull-right btn-sm">
            <i class="fa fa-floppy-o"></i>
            @lang('Save')
          </button>
        </div>
      </form>
    </div>
  </section>
@endsection
@section('script')
  <script>
    $(document).ready(function() {

    });
  </script>
@endsection
