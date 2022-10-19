@extends('admin.layouts.app')

@section('title')
{{ $module_name }}
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{ $module_name }}
    <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2).'.create') }}"><i
        class="fa fa-plus"></i> @lang('add_new')</a>
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
      <h3 class="box-title">@lang('update_form')</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ route(Request::segment(2).'.update', $moduleFunction->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="box-body">
        <div class="col-md-6">
          <div class="form-group">
            <label>@lang('module_id') <small class="text-red">*</small></label>
            <select name="module_id" id="module_id" class="form-control select2" required>
              <option value="">@lang('please_chosen')</option>
              @foreach ($modules as $item)

              <option value="{{ $item->id }}" {{ ($moduleFunction->module_id == $item->id) ? 'selected':'' }} >{{ $item->name }} ({{ $item->module_code }})</option>

              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>@lang('name') <small class="text-red">*</small></label>
            <input type="text" class="form-control" name="name" placeholder="@lang('name')" value="{{ $moduleFunction->name }}" required>
          </div>

          <div class="form-group">
            <label>@lang('function_code') <small class="text-red">*</small></label>
            <input type="text" class="form-control" name="function_code" placeholder="@lang('function_code')"
              value="{{ $moduleFunction->function_code }}" required>
          </div>

        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>@lang('status')</label>
            <div class="form-control">
              <label>
                <input type="radio" name="status" value="active" {{ ($moduleFunction->status == 'active') ? 'checked':'' }}>
                <small>@lang('active')</small>
              </label>
              <label>
                <input type="radio" name="status" value="deactive" class="ml-15" {{ ($moduleFunction->status == 'deactive') ? 'checked':'' }}>
                <small>@lang('deactive')</small>
              </label>
            </div>
          </div>

          <div class="form-group">
            <label>@lang('iorder')</label>
            <input type="number" class="form-control" name="iorder" placeholder="@lang('iorder')" value="{{ $moduleFunction->iorder }}">
          </div>

          <div class="form-group">
            <label>@lang('description')</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $moduleFunction->description }}</textarea>
          </div>

        </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <a class="btn btn-success btn-sm" href="{{ route(Request::segment(2).'.index') }}">
          <i class="fa fa-bars"></i> @lang('list')
        </a>
        <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
          @lang('save')</button>
      </div>
    </form>
  </div>
</section>
@endsection