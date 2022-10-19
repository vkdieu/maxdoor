@extends('admin.layouts.app')

@section('title')
  {{ $module_name }}
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
                  <h5>Thông tin chính <span class="text-danger">*</span></h5>
                </a>
              </li>
              <li>
                <a href="#tab_2" data-toggle="tab">
                  <h5>Menu truy cập</h5>
                </a>
              </li>
              <li>
                <a href="#tab_3" data-toggle="tab">
                  <h5>Chức năng thao tác</h5>
                </a>
              </li>
              <button type="submit" class="btn btn-primary btn-sm pull-right">
                <i class="fa fa-floppy-o"></i>
                @lang('save')
              </button>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>@lang('Name') <small class="text-red">*</small></label>
                      <input type="text" class="form-control" name="name" placeholder="@lang('Name')"
                        value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                      <label>@lang('Order')</label>
                      <input type="number" class="form-control" name="iorder" placeholder="@lang('Order')"
                        value="{{ old('iorder') }}">
                    </div>

                    <div class="form-group">
                      <label>@lang('Status')</label>
                      <div class="form-control">
                        <label>
                          <input type="radio" name="status" value="active" checked="">
                          <small>@lang('active')</small>
                        </label>
                        <label>
                          <input type="radio" name="status" value="deactive" class="ml-15">
                          <small>@lang('deactive')</small>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">

                    <div class="form-group">
                      <label>@lang('Description')</label>
                      <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                    </div>

                  </div>
                </div>

              </div><!-- /.tab-pane -->

              <div class="tab-pane" id="tab_2">
                <div class="row">
                  @if (count($activeMenus) == 0)
                    <div class="col-12">
                      @lang('not_found')
                    </div>
                  @else
                    @foreach ($activeMenus as $row)
                      @if ($row->parent_id == 0 || $row->parent_id == null)
                        <div class="col-md-4">
                          <ul class="checkbox_list">
                            <li>
                              <input name="json_access[menu_id][]" type="checkbox" value="{{ $row->id }}"
                                id="json_access_menu_id_{{ $row->id }}" class="mr-15">
                              <label
                                for="json_access_menu_id_{{ $row->id }}"><strong>{{ $row->name }}</strong></label>
                            </li>

                            @foreach ($activeMenus as $sub)
                              @if ($sub->parent_id == $row->id)
                                <li>
                                  <input name="json_access[menu_id][]" type="checkbox" value="{{ $sub->id }}"
                                    id="json_access_menu_id_{{ $sub->id }}" class="mr-15">
                                  <label for="json_access_menu_id_{{ $sub->id }}">- - {{ $sub->name }}</label>
                                </li>

                                @foreach ($activeMenus as $sub2)
                                  @if ($sub2->parent_id == $sub->id)
                                    <li>
                                      <input name="json_access[menu_id][]" type="checkbox" value="{{ $sub2->id }}"
                                        id="json_access_menu_id_{{ $sub2->id }}" class="mr-15">
                                      <label for="json_access_menu_id_{{ $sub2->id }}">
                                        - - - -
                                        {{ $sub2->name }}</label>
                                    </li>
                                  @endif
                                @endforeach
                              @endif
                            @endforeach

                          </ul>
                        </div>
                      @endif
                    @endforeach
                  @endif

                </div>

              </div><!-- /.tab-pane -->

              <div class="tab-pane" id="tab_3">

                <div class="row">
                  @if (count($activeModules) == 0)
                    <div class="col-12">
                      @lang('not_found')
                    </div>
                  @else
                    @foreach ($activeModules as $row)
                      <div class="col-md-4">
                        <ul class="checkbox_list">
                          <li>
                            <label
                              for="json_access_module_code_{{ $row->id }}"><strong>{{ $row->name }}</strong></label>
                          </li>

                          @foreach ($activeFunctions as $sub)
                            @if ($sub->module_id == $row->id)
                              <li>
                                <input name="json_access[function_code][]" type="checkbox"
                                  value="{{ $sub->function_code }}"
                                  id="json_access_function_code_{{ $sub->id }}" class="mr-15">
                                <label for="json_access_function_code_{{ $sub->id }}">- -
                                  {{ $sub->name }}</label>
                              </li>
                            @endif
                          @endforeach

                        </ul>
                      </div>
                    @endforeach
                  @endif

                </div>

              </div><!-- /.tab-pane -->

            </div><!-- /.tab-content -->
          </div><!-- nav-tabs-custom -->

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-sm btn-success" href="{{ route(Request::segment(2) . '.index') }}">
            <i class="fa fa-bars"></i> @lang('List')
          </a>
          <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-floppy-o"></i>
            @lang('Save')</button>
        </div>
      </form>
    </div>
  </section>
@endsection
