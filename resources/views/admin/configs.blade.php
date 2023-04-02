@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">

					<div class="col-12">
						<div class="card  box-shadow-0 ">
							<div class="card-header">
								<h4 class="card-title mb-1">{{__('Setting')}}</h4>
							</div>
							<div class="card-body pt-0">

<form action="{{ route('settings') }}" method="post">
    @csrf
    <div class="form-group">
        <label>App Name</label>
        <x-form.input  name="config[app.name]" :value="config('app.name')" />
    </div>
    <div class="form-group">
        <label>Logo</label>
        <x-form.input  name="config[app.logo]" type="file" :value="config('app.name')" />
    </div>
    <div class="form-group">
        <label>Time Zone</label>
        <x-form.input  name="config[app.timezone]" :value="config('app.timezone')" />
    </div>
    <div class="form-group">
        <label>Currency</label>
        <x-form.select2 name="config[app.currency]" :options="$currencies" :selected="config('app.currency')" />
    </div>

    <div class="form-group">
        <label>Address</label>
        <x-form.input  name="config[contact.address]"  :value="config('contact.address')" />
    </div>
    <div class="form-group">
        <label>Phone</label>
        <x-form.input  name="config[contact.phone]"  :value="config('contact.phone')" />
    </div>
    <div class="form-group">
        <label>Email</label>
        <x-form.input  name="config[contact.email]"  :value="config('contact.email')" />
    </div>
    <div class="form-group">
        <label>Facebook</label>
        <x-form.input  name="config[contact.facebook]"  :value="config('contact.facebook')" />
    </div>
    <div class="form-group">
        <label>Twiter</label>
        <x-form.input  name="config[contact.twiter]"  :value="config('contact.twiter')" />
    </div>
    <div class="form-group">
        <label>Instagram</label>
        <x-form.input  name="config[contact.instagram]"  :value="config('contact.instagram')" />
    </div>
    <div class="form-group">
        <label>Linkedin</label>
        <x-form.input  name="config[contact.linkedin]"  :value="config('contact.linkedin')" />
    </div>


<!--
    <div class="form-group">
        <x-form.input label="SMTP Host" name="config[mail.mailers.smtp.host]" :value="config('mail.mailers.smtp.host')" />
    </div>

    <div class="form-group">
        <x-form.input label="SMTP Port" name="config[mail.mailers.smtp.port]" :value="config('mail.mailers.smtp.port')" />
   </div>

    <div class="form-group">
        <x-form.input label="SMTP Username" name="config[mail.mailers.smtp.username]" :value="config('mail.mailers.smtp.username')" />
    </div>
    <div class="form-group">
        <x-form.input label="SMTP Password" type="password" name="config[mail.mailers.smtp.password]" :value="config('mail.mailers.smtp.password')" />
    </div>
-->
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
</div>
</div>
</div>
<!-- row -->


</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@endsection
