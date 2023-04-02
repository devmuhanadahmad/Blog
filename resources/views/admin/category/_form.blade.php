<div class="">
   <x-form.input lable="{{__('Name Category')}}" name="name" :value="$category->name" />
   <x-form.textarea lable="{{__('Notes')}}" name="notes" :value="$category->notes" />
   <x-form.status lable="{{__('Status')}}" name="status" :value="$category->status" :option="['active'=>'Active','inactive'=>'Inactive']" />
   
    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
    <h5 class="card-title">Image Upload</h5>
    <x-form.input  type="file" name="image" class="dropify"
    accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />

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
<button type="submit" class="btn btn-primary mt-3 mb-0">{{__('Submit')}}</button>
