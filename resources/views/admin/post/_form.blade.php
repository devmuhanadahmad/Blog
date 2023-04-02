<div class="">
    <x-form.input name="user_id" type="hidden" />
    <x-form.input lable="{{ __('Title') }}" name="title" :value="$post->title" />
    <x-form.input lable="{{ __('Small Description') }}" name="smallDes" :value="$post->smallDes" />

    <div class="form-contrl">

        <label for="inputName" class="control-label">category </label>
        <select name="category_id" @class([
            'form-control ',
            'SlectBox',
            'is-invalid' => $errors->has('category_id'),
        ])>
            <!--placeholder-->
            <option value="" selected disabled>Primary category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                    {{ $category->name }}</option>
            @endforeach
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </select>
    </div>
    <x-form.textarea lable="{{ __('Content') }}" name="content" :value="$post->content" />
    <x-form.input lable="{{ __('Tags') }}" name="tags" :value="$tags" />
     <x-form.status lable="{{ __('Status') }}" name="status" :value="$post->status" :option="['active' => 'Active', 'inactive' => 'Inactive']" />

    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
    <h5 class="card-title">Image Upload</h5>
    <x-form.input type="file" name="image" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
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
