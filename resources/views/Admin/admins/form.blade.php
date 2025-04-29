@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.name')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" name="name"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('name',$data->name ?? '')}}" required/>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.email')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="email" name="email"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('email',$data->email ?? '')}}" required/>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="required fw-bold fs-6 mb-2">{{__('lang.phone')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="tel" name="phone"
           class="form-control form-control-solid mb-3 mb-lg-0"
           placeholder="" value="{{old('phone',$data->phone ?? '')}}" required/>
    <!--end::Input-->
</div>

<div class="fv-row mb-7">
    <!--begin::Label-->
    <label class="fw-bold fs-6 mb-2">{{__('lang.password')}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="password" minlength="8" @if(request()->segment(2) != 'edit' && request()->segment(1) != 'Setting') required
           @endif name="password"
           value="" AUTOCOMPLETE="off"
           class="form-control @error('password') is-invalid @enderror "
           placeholder=""
           id="psw"
           >
{{--    <input type="password" name="password"--}}
{{--           class="form-control form-control-solid mb-3 mb-lg-0"--}}
{{--           placeholder="" value="{{old('password')}}"/>--}}

<!--end::Input-->
    <div class="row">
        <div class="col-md-12">
            <div id="message">
                <p id="letter" class="invalid">{{__('lang.letter')}}</p>
                <p id="capital" class="invalid">{{__('lang.capital')}}</p>
                <p id="number" class="invalid">{{__('lang.number')}}</p>
                <p id="symbol" class="invalid">{{__('lang.symbol')}}</p>
                <p id="length" class="invalid">{{__('lang.length')}}</p>
            </div>
        </div>
    </div>

</div>
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
    <label class="required col-xl-3 col-lg-3 col-form-label text-right">{{trans('lang.image')}}</label>
    <div class="col-lg-9 col-xl-12">
        <input accept="image/*"  type="file" @if(request()->segment(2) != 'edit' && request()->segment(2) != 'Setting') required @endif name="image" class="dropify"
               data-default-file="{{old('price',$data->image ?? '')}}" @if(request()->segment(2) == 'edit') data-show-remove="false" @endif >
        <span class="form-text text-muted">{{trans('lang.allows_files_type')}}:  png, jpg, jpeg , svg.</span>
    </div>
</div>
<script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var symbol = document.getElementById("symbol");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value != null){
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate symbol
        var symbols = /[$&+,:;=?@#|'<>.^*()%!-]/g;
        if (myInput.value.match(symbols)) {
            console.log('match');
            symbol.classList.remove("invalid");
            symbol.classList.add("valid");
        } else {
            console.log('not match');

            symbol.classList.remove("valid");
            symbol.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
        }
    }
</script>

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


