@extends('layout.layout')
@php
    $route = 'products';
@endphp
@section('title',__('lang.products'))
@section('header')
    <!--begin::Heading-->
    <h1 class="text-dark fw-bolder my-0 fs-2">{{trans('lang.'.$route)}} </h1>
    <!--end::Heading-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}" class="text-muted">
                {{trans('lang.Dashboard')}} </a>
        </li>
        <li class="breadcrumb-item">
            {{trans('lang.'.$route)}}
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class=" flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="add_button1">

                    </div>
                    <!--begin::Table-->
                    <div class="table-responsive">
                    <table class="table  align-middle table-row-bordered  text-center fs-4 gy-5" id="users_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->

                        <tr class="bg-secondary text-dark  fw-bolder fs-5 text-capitalize gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#users_table .checkbox" value="1"/>
                                </div>
                            </th>

{{--                            <th class="min-w-125px">pro id</th>--}}
{{--                            <th class="min-w-125px">{{__('lang.name_ar')}}</th>--}}
                            <th class="min-w-125px">{{__('lang.name')}}</th>
                            <th class="min-w-125px">{{__('lang.views')}}</th>
                            <th class="min-w-125px">{{__('lang.price')}}</th>
                            <th class="min-w-125px">{{__('lang.user')}}</th>
                            <th class="min-w-125px">{{__('lang.Category')}}</th>
                            <th class="min-w-125px">{{__('lang.Country')}}</th>
                            <th class="min-w-125px">{{__('lang.call_click')}}</th>
                            <th class="min-w-125px">{{__('lang.whatsapp_click')}}</th>
                            <th class="min-w-125px">{{__('lang.Country')}}</th>
                            <th class="min-w-125px">{{__('lang.Users_active')}}</th>
                            <th class="min-w-125px">{{__('lang.Images')}}</th>
                            <th class="min-w-125px">{{__('lang.Actions')}}</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->


                        <!--end::Table body-->
                    </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Post-->
    </div>

@endsection

@section('script')
    <script src="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: true,
                responsive: false,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'Search',
                    url: "@if(Session('lang')  ==  'ar') //cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json @endif"
                },
                buttons: [
                    {
                        extend: 'colvis',
                        text: '{{__('lang.Show column')}}',
                        title: '',

                        className: 'btn btn-primary me-3',
                        customize: function (win) {
                            $(win.document).css('direction', '{{__('lang.lang-direction')}}');
                        }
                    },

                    {
                        extend: 'print',
                        className: 'btn btn-primary me-3',
                        text: '<i class="bi bi-printer-fill fs-2x"></i>',
                        titleAttr: "{{__('lang.print')}}",
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', '{{__('lang.lang-direction')}}').prepend(
                                ' <table> ' +
                                '                        <tbody> ' +
                                '                                <tr>' +
                                '                                    <td style="text-align: right"> <img src="{{asset('logo.png')}}" width="150px" height="150px" /> </td>' +
                                '                                    <td style="text-align: right"><p>{{__("lang.title")}} : {{__('lang.main_categories')}}</p>' +
                                '                                                                  <p>{{__('lang.date')}} : {{ Carbon\Carbon::now()->translatedFormat('l Y/m/d') }}</p>' +
                                '                                                                  <p>{{__('lang.time')}} : {{ Carbon\Carbon::now()->translatedFormat('h:i a') }}</p></td>' +
                                '                                </tr> ' +
                                '                        </tbody>' +
                                '                    </table>'
                            );
                        },

                        exportOptions: {
                            columns: [0, ':visible'],
                            stripHtml: false
                        }
                    },

                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {
                        extend: 'excel',
                        className: 'btn btn-primary me-3',
                        text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i> ',
                        title: '',
                        titleAttr: "{{__('lang.excel')}}",
                        customize: function (win) {
                            $(win.document)
                                .css('direction', 'rtl');
                        },
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },

                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                ],
                ajax: {
                    url: '{{ route($route.'.datatable') }}',
                    data: {
                    @if(Request::get('user_id'))
                    'user_id': {{Request::get('user_id')}},
                    @endif
                        @if(Request::get('company_id'))
                    'company_id': {{Request::get('company_id')}},
                        @endif
                    @if(Request::get('country_id'))
                    'country_id': {{Request::get('country_id')}},
                    @endif
                    @if(Request::get('city_id'))
                    'city_id': {{Request::get('city_id')}},
                    @endif
                    @if(Request::get('state_id'))
                    'state_id': {{Request::get('state_id')}},
                    @endif
                    @if(Request::get('currency_id'))
                    'currency_id': {{Request::get('currency_id')}},
                    @endif
                    @if(Request::get('type'))
                        'type': {{Request::get('type')}},
                    @endif
                        @if(Request::get('category_id'))
                    'category_id': {{Request::get('category_id')}},
                        @endif
                            @if(Request::get('sub_category_id'))
                        'sub_category_id': {{Request::get('sub_category_id')}},
                        @endif
                            @if(Request::get('type'))
                        'type': {{Request::get('type')}},
                        @endif


                }
            },
            columns: [
                {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},

                // {data: 'proid', name: 'proid', "searchable": true, "orderable": true},
                {data: 'name_ar', name: 'name_ar', "searchable": true, "orderable": true},
                {data: 'views', name: 'views', "searchable": false, "orderable": true},
                {data: 'price', name: 'price', "searchable": true, "orderable": true},
                {data: 'user', name: 'user', "searchable": true, "orderable": true},
                {data: 'category', name: 'category', "searchable": false, "orderable": true},
                {data: 'country', name: 'country', "searchable": false, "orderable": true},
                {data: 'clickswhatsapp', name: 'clickswhatsapp', "searchable": false, "orderable": true},
                {data: 'clickcall', name: 'clickcall', "searchable": false, "orderable": true},
                {data: 'country', name: 'country', "searchable": false, "orderable": true},
                {data: 'status', name: 'status', "searchable": false, "orderable": true},
                {data: 'images', name: 'images', "searchable": false, "orderable": true},
                {data: 'actions', name: 'actions', "searchable": false, "orderable": false},
            ]
        });
            $.ajax({
                url: "{{ URL::to($route.'/add-button')}}",
                success: function (data) {
                    $('.add_button1').append(data);
                },
                dataType: 'html'
            });
        });
    </script>


@endsection

