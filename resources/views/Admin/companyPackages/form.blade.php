@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<!--begin::Input group-->
<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1">
        <!--begin::Label-->
        <label class=" fw-bold fs-6 mb-2">{{__('lang.description')}}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <textarea type="text" name="description"
               class="form-control form-control-solid mb-3 mb-lg-0"
            >{{old('description',$data->description ?? '')}}</textarea>
        <!--end::Input-->
    </div>

</div>
<div class="col m-1">
    <!--begin::Label-->
    <label class=" fw-bold fs-6 mb-2">{{__('lang.price')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="number" name="price"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('price',$data->price ?? '')}}" />
    <!--end::Input-->
</div>

<div class="row g-2 m-1">
    <!--begin::Label-->
    <div class="col m-1 form-check form-switch form-check-custom form-check-solid">
        <label class="form-check-label" for="flexSwitchDefault">{{__('lang.is_sale')}}</label>
        <input class="form-check-input" name="is_sale" type="hidden"
               value="0" id="flexSwitchDefault"/>
        <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
               name="status" type="checkbox"
               value="1" @if(isset($data)) @if($data->is_sale) checked @endif @endif id="flexSwitchDefault" />
    </div>

</div>
<div class="col m-1">
    <!--begin::Label-->
    <label class=" fw-bold fs-6 mb-2">{{__('lang.sale_percent')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="number" name="sale_percent"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('sale_percent',$data->sale_percent ?? '')}}" />
    <!--end::Input-->
</div>

<div class="col m-1">
    <!--begin::Label-->
    <label class=" fw-bold fs-6 mb-2">{{__('lang.total_ads')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="number" name="total_ads"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('total_ads',$data->total_ads ?? '')}}" />
    <!--end::Input-->
</div>


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


