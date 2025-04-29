@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.title')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="title"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('title',$data->title ?? '')}}" required/>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.description')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="description"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('description',$data->description ?? '')}}" required/>
    <!--end::Input-->
</div>

<div class="form-group row" id="countries_dev">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.counties')}}</label>
    <div class="col-lg-9 col-xl-12">
        <select name="country_id" class="form-control " >
            <option value="0">{{__('lang.All')}}</option>
            @foreach(\App\Models\Country::OrderBy('id','desc')->get() as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <span class="form-text text-muted">@if(Session('lang') == 'en') You can select Multi users. @else يمكنك اخيتار اكتر من مستخدم @endif</span>
    </div>
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.user_type')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <select class="form-control" name="user_type" id="user_type">
        <option value="1"> المستخدمين </option>
        <option value="2"> الزوار </option>
        <option value="3"> الشركات </option>
        <option value="0"> الكل </option>
    </select>
    <!--end::Input-->
</div>

<div class="fv-row mb-7" id="dev_type">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.type')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <select class="form-control" name="type">
        <option value="1"> Notifcation </option>
        <option value="2"> Mail </option>
    </select>
    <!--end::Input-->
</div>


<div class="form-group row" id="users_dev">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.users')}}</label>
    <div class="col-lg-9 col-xl-12">
        <select name="user_id[]" multiple="multiple" class="form-control js-example-basic-single" >
            <option value="0">{{__('lang.All')}}</option>
            @foreach(\App\Models\User::OrderBy('id','desc')->select('id','name')->get() as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <span class="form-text text-muted">@if(Session('lang') == 'en') You can select Multi users. @else يمكنك اخيتار اكتر من مستخدم @endif</span>
    </div>
</div>
<div class="form-group row" id="companies_dev">
    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.companies')}}</label>
    <div class="col-lg-9 col-xl-12">
        <select name="company_ids[]" multiple="multiple" class="form-control js-example-basic-single" >
            <option value="0">{{__('lang.All')}}</option>
            @foreach(\App\Models\Company::OrderBy('id','desc')->get() as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <span class="form-text text-muted">@if(Session('lang') == 'en') You can select Multi users. @else يمكنك اخيتار اكتر من مستخدم @endif</span>
    </div>
</div>
<!--begin::Input group-->
<script>
    $(document).ready(function() {
        $('#user_type').on('click',function() {
            var selectedValue = $(this).val();
            if (selectedValue == '2') {
                $('#users_dev').css('display', 'none');
                $('#dev_type').css('display', 'none');
                $('#companies_dev').css('display', 'none');


            } else if (selectedValue == '1') {
                $('#users_dev').css('display', 'block');
                $('#dev_type').css('display', 'block');
                $('#companies_dev').css('display', 'none');

            }
            else if (selectedValue == '3') {
                $('#companies_dev').css('display', 'block');
                $('#dev_type').css('display', 'block');
                $('#users_dev').css('display', 'none');

            }
            else if (selectedValue == '0') {
                $('#users_dev').css('display', 'none');
                $('#dev_type').css('display', 'none');
                $('#companies_dev').css('display', 'none');

            }
        });
    });
</script>
@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // $('#users').on('click , change ,keyup',function () {
        //     var val = $(this).val();
        //     if(val == 0){
        //         $('#users option').selected();
        //     }else{
        //
        //     }
        // })
    </script>
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


        $(document).ready(function() {
            $('#user_type').on('click',function() {
                var selectedValue = $(this).val();
                alert(1);
                if (selectedValue == '2') {
                    $('#users_dev').css('display', 'none');
                } else if (selectedValue == '1') {
                    $('#users_dev').css('display', 'block');
                }
            });
        });
    </script>

@endpush


