<div class="">
    <x-form.input lable="{{ __('Name Store') }}" name="name" :value="$store->name" />
    <x-form.textarea lable="{{ __('Notes') }}" name="notes" :value="$store->notes" />
    <x-form.status lable="{{ __('Status') }}" name="status" :value="$store->status" :option="['active' => 'Active', 'inactive' => 'Inactive']" />

    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
    <h5 class="card-title">{{ __('Logo Image Store Upload') }}</h5>
    <x-form.input type="file" name="logo_image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
        data-height="70" />

    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
    <h5 class="card-title">{{ __('Cover Image Store Upload') }}</h5>
    <x-form.input type="file" name="cover_image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
        data-height="70" />


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
</div>
<button type="submit" class="btn btn-primary mt-3 mb-0">{{ __('Submit') }}</button>
