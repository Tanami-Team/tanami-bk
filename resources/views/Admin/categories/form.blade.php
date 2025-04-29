@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.type')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <select class="form-control" name="type">
        <option @if(isset($data) && $data->type =='company') selected @endif value="company">{{__('companies')}}</option>
        <option  @if(isset($data) && $data->type =='user') selected @endif value="user">{{__('users')}}</option>
    </select>
    <!--end::Input-->
</div>
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

@foreach(\App\Models\Country::where('status','active')->get() as $country )

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.min_price_show')}}</label>
        <label class="required fw-bold fs-6 mb-2">
            الخاص بدولة
            {{$country->name}}
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="number" name="min_price_show_{{$country->id}}"
               class="form-control form-control-solid mb-3 mb-lg-0"
               placeholder=""
               @if(Request::segment(2) == 'edit')
                   value="{{ $country->MinPriceShow($data->id) ? $country->MinPriceShow($data->id) : 0 }}"
            @endif

        />
        <!--end::Input-->
    </div>
@endforeach

<div class="fv-row mb-7">
    <div
        class="form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.active')}}</label>
        <input class="form-check-input" name="status" type="hidden"
               value="inactive" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="status" type="checkbox"
               value="active" @if(isset($data)) @if($data->status == 'active') checked @endif @endif id="flexSwitchDefault" />
    </div>
</div>

<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.image')}}</label>
    <div class="col-lg-9 col-xl-12">
        <input accept="image/*"  type="file" @if(request()->segment(2) != 'edit') required @endif name="image" class="dropify"
               data-default-file="{{old('price',$data->image ?? '')}}">
        <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  png, jpg, jpeg , svg.</span>
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


