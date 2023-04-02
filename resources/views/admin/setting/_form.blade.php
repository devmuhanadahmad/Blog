@if ($errors->any())
    <div class="alert alert-danger">
        <h3>Error Occured</h3>
        <ul>
            @foreach ($errors->all() as $err)
                <li class="text-danger">{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        <ul>
                <li class="">{{ session('success') }}</li>
        </ul>
    </div>
@endif
<div class="">

    <div class="row  ">
 <div class="col-sm-12 col-md-12">
        <x-form.input lable="{{ __('title') }}" name="title" :value="$setting->title" />
         </div>
    </div>
    <div class="row  ">
         <div class="col-sm-12 col-md-12">
        <x-form.textarea lable="{{ __('content') }}" name="content" :value="$setting->content" />
         </div>
    </div>


    <div class="row  ">
        <div class="col-sm-6 col-md-4">
            <x-form.input lable="{{ __('facebbok') }}" name="facebbok" :value="$setting->facebbok" />
        </div>
       <div class="col-sm-6 col-md-4 ">
            <x-form.input lable="{{ __('twiter') }}" name="twiter" :value="$setting->twiter"/>
        </div>
        <div class="col-sm-4 col-md-4">
            <x-form.input lable="{{ __('instagram') }}" name="instagram"  :value="$setting->instagram" />
        </div>
    </div>
    <div class="row  ">
        <div class="col-sm-6 col-md-4">
            <x-form.input lable="{{ __('email') }}" name="email" type="email" :value="$setting->email" />
        </div>
       <div class="col-sm-6 col-md-4 ">
            <x-form.input lable="{{ __('phone') }}" name="phone" type="tel" :value="$setting->phone"/>
        </div>
        <div class="col-sm-4 col-md-4">
            <x-form.input lable="{{ __('address') }}" name="address"  :value="$setting->address" />
        </div>
    </div>

    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
    <h5 class="card-title">logo Image Upload</h5>
    <x-form.input type="file" name="logo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
        data-height="70" />



    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
    <h5 class="card-title">favicon Image Upload</h5>
    <x-form.input type="file" name="favicon" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
        data-height="70" />

</div>
{{--
    <div class="col-12">
        <p class="mg-b-10">Single Select with Search</p><select class="form-control select2">
            <option label="Choose one">
            </option>
            <option value="Firefox">
                Firefox
            </option>
            <option value="Chrome">
                Chrome
            </option>
            <option value="Safari">
                Safari
            </option>
            <option value="Opera">
                Opera
            </option>
            <option value="Internet Explorer">
                Internet Explorer
            </option>
        </select>
    </div><!-- col-4 -->
    --}}

<button type="submit" class="btn btn-primary mt-3 mb-0">{{ __('Submit') }}</button>
