@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush



<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.name_ar')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name_ar"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('name_ar',$data->name_ar ?? '')}}" required/>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.name_en')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name_en"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('name_en',$data->name_en ?? '')}}" required/>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.type')}} </label>
    <!--end::Label-->
    <select class="form-control form-select form-control-solid mb-3 mb-lg-0" id="typselect" name="type"
    >
            <option value="text" @if(isset($data)) @if($data->type == 'text') selected @endif @endif>text</option>
            <option value="number" @if(isset($data)) @if($data->type == 'number') selected @endif @endif>number</option>
            <option value="radio" @if(isset($data)) @if($data->type == 'radio') selected @endif @endif>radio</option>
            <option value="checkbox" @if(isset($data)) @if($data->type == 'checkbox') selected @endif @endif>checkbox</option>
            <option value="dropdown" @if(isset($data)) @if($data->type == 'dropdown') selected @endif @endif>dropdown</option>
    </select>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <div
        class="form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.is_required')}}
            ؟</label>
        <input class="form-check-input" name="is_required" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="is_required" type="checkbox"
               value="active" @if(isset($data)) @if($data->is_required == 'active') checked @endif @endif id="flexSwitchDefault" />
    </div>
</div>

<!--begin::Input group-->


@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script !src="">
        $('.dropify').dropify({
            messages: {
                'default': "{{trans('lang.dropify-default')}}",
                'replace': "{{trans('lang.dropify-replace')}}",
                'remove':  "{{trans('lang.dropify-remove')}}",
                'error':   "{{trans('lang.dropify-error')}}"
            }
        });
        var avatar1 = new KTImageInput('kt_image_1');
    </script>

@endpush


