@extends('layouts.master')
@section('css')
@livewireStyles
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    {{ __('Store') }}
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">

            <div class="card">

                <div class="card-header pb-0">
                    <x-flash-message />
                    <div class="row row-xs wd-xl-80p">
                        <div class="col-sm-6 col-md-3">
                            <a href="{{ route('store.create') }}">
                                <button class="btn btn-outline-primary btn-block">{{ __('Add') }}</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">
                            <a href="{{ route('store.trash') }}">
                                <button class="btn btn-outline-danger btn-block">{{ __('Trash') }}</button>
                            </a>
                        </div>
                    </div>

                   {{-- <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mt-2">{{ __('Product List') }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>--}}
                    <div class="form-group row mt-4 m-b-2">

                        <div class="col-6">
                            <x-form.input wire:model="name" name="name" type="text" class="col-auto" placeholder="Enter Name product " :value="request('name')" />

                        </div>
                        <div class="col-6">
                                <select class=" form-control" wire:model="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example4">
                            <thead>
                                <tr>
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Edit') }}</th>
                                    <th>{{ __('Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td>{{ $store->id }}</td>
                                        <td><img src="{{ asset('storage/' . $store->cover_image) }}" width="50"
                                                height="50" alt="{{ $store->name }}"></td>
                                        <td>{{ $store->name }}</td>
                                        <td>{{ $store->status }}</td>
                                        <td>{{ $store->created_at }}</td>
                                        <td> <a href="{{ route('store.edit', $store->id) }}">
                                                <button
                                                    class="btn btn-sm btn-outline-primary ">{{ __('Edit') }}</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('store.destroy', $store->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger ">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!--/div-->


    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

@section('js')
@livewireScripts
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>
@endsection
