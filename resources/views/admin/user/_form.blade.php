<div class="">
    <x-form.input lable="{{ __('name') }}" name="name" type="text" :value="$user->name" />
    <x-form.input lable="{{ __('Email') }}" name="email" type="email" :value="$user->email" />
    <x-form.input lable="{{ __('Password') }}" name="password" type="password" :value="$user->password" />





        <x-form.status lable="{{ __('Status') }}" name="status" :value="$user->status" :option="['active' => 'Active', 'inactive' => 'Inactive']" />

            <x-form.status lable="{{ __('Type Account') }}" name="type" :value="$user->type" :option="['writer' => 'Writer', 'admin' => 'Admin']" />
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
