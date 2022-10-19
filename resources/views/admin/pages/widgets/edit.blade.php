@extends('admin.layouts.app')

@section('title')
  {{ $module_name }}
@endsection
@section('style')
  <style>
    .checkbox_list {
      min-height: 300px;
    }

    .checkbox_list li {
      border-bottom: 1px dashed;
    }

  </style>
@endsection
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
      <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}"><i
          class="fa fa-plus"></i> @lang('Add')</a>
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
        <h3 class="box-title">@lang('Update form')</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{ route(Request::segment(2) . '.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')
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
                        @lang('Widget type')
                        <small class="text-red">*</small>
                      </label>
                      <select name="widget_code" id="widget_code" class="form-control select2" style="width: 100%"
                        required>
                        <option value="">@lang('Please select')</option>
                        @foreach ($widget_configs as $item)
                          <option value="{{ $item->widget_code }}"
                            {{ $item->widget_code == $detail->widget_code ? 'selected' : '' }}>{{ $item->name }}
                          </option>
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
                        value="{{ old('title') ?? $detail->title }}" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Layout')</label>
                      <select name="json_params[layout]" id="widget_layout" class="form-control select2"
                        style="width: 100%">
                        <option value="">@lang('Please select')</option>
                        @foreach ($widget_configs as $item)
                          @if ($item->widget_code == $detail->widget_code)
                            @php
                              $json_params = json_decode($item->json_params);
                            @endphp
                            @isset($json_params->layout)
                              @foreach ($json_params->layout as $name => $value)
                                <option value="{{ $value }}"
                                  {{ isset($detail->json_params->layout) && $value == $detail->json_params->layout ? 'selected' : '' }}>
                                  {{ __($value) }}
                                </option>
                              @endforeach
                            @endisset
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Style')</label>
                      <select name="json_params[style]" id="widget_style" class="form-control select2"
                        style="width: 100%">
                        <option value="">@lang('Please select')</option>
                        @foreach ($widget_configs as $item)
                          @if ($item->widget_code == $detail->widget_code)
                            @php
                              $json_params = json_decode($item->json_params);
                            @endphp
                            @isset($json_params->style)
                              @foreach ($json_params->style as $name => $value)
                                <option value="{{ $value }}"
                                  {{ isset($detail->json_params->style) && $value == $detail->json_params->style ? 'selected' : '' }}>
                                  {{ __($value) }}
                                </option>
                              @endforeach
                            @endisset
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('Brief')</label>
                      <textarea name="brief" id="brief" class="form-control" rows="5">{{ old('brief') ?? $detail->brief }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>@lang('Status')</label>
                      <div class="form-control">
                        @foreach (App\Consts::STATUS as $key => $value)
                          <label>
                            <input type="radio" name="status" value="{{ $value }}"
                              {{ $detail->status == $value ? 'checked' : '' }}>
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
                        value="{{ old('iorder') ?? $detail->iorder }}">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                  </div>
                  <div class="col-md-12">
                    <h3>
                      @lang('Setting Component')
                    </h3>
                  </div>
                  <div class="col-md-6">
                    <h4 class="mb-15">
                      @lang('Selected Components')
                    </h4>
                    <ul class="checkbox_list" id="component_selected">
                      @foreach ($component_selected as $item)
                        <li class="cursor">
                          <input name="json_params[component][]" type="checkbox" value="{{ $item->id }}"
                            class="mr-15 component_item cursor" id="component_{{ $item->id }}" checked
                            autocomplete="off">
                          <label class="cursor" for="component_{{ $item->id }}">
                            <strong>{{ __($item->title) . ' (' . $item->component_name . ')' }}</strong>
                          </label>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <h4 class="mb-15">
                      @lang('Available Components')
                    </h4>
                    <ul class="checkbox_list" id="component_available">
                      @foreach ($components as $item)
                        @if (!in_array($item->id, $detail->json_params->component ?? []))
                          <li class="cursor">
                            <input name="json_params[component][]" type="checkbox" value="{{ $item->id }}"
                              class="mr-15 component_item cursor" id="component_{{ $item->id }}" autocomplete="off">
                            <label class="cursor" for="component_{{ $item->id }}">
                              <strong>{{ __($item->title) . ' (' . $item->component_name . ')' }}</strong>
                            </label>
                          </li>
                        @endif
                      @endforeach
                    </ul>
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
          <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
            @lang('Save')</button>
        </div>
      </form>
    </div>
  </section>

@endsection

@section('script')
  <script>
    $(document).ready(function() {

      // Checked and unchecked item event
      $(document).on('click', '.component_item', function() {
        let ischecked = $(this).is(':checked');
        let _root = $(this).closest('li');
        let _targetHTML;

        if (ischecked) {
          _targetHTML = $("#component_selected");
        } else {
          _targetHTML = $("#component_available");
        }
        _targetHTML.append(_root);
      });

    });
  </script>
@endsection
