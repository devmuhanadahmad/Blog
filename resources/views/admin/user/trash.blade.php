@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    {{ __('user') }}
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
                            @can('user.view')
                                <a href="{{ route('user.index') }}">
                                    <button class="btn btn-outline-primary btn-block">{{ __('Back') }}</button>
                                </a>
                            @endcan
                        </div>



                    </div>

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mt-2">{{ __('Trash') }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example4">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('Id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Notes') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('Deleted At') }}</th>
                                    <th class="">{{ __('reuser') }}</th>
                                    <th>{{ __('Delete') }}</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->notes }}</td>
                                        <td>{{ $user->deleted_at }}</td>
                                        @can('user.restore')
                                            <td> <a href="{{ route('user.restore', $user->id) }}">
                                                    <button
                                                        class="btn btn-sm btn-outline-primary ">{{ __('Restore') }}</button>
                                                </a>
                                            </td>
                                        @endcan
                                        @can('user.forceDelete')
                                            <td>
                                                <form action="{{ route('user.forceDelete', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger ">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        @endcan
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