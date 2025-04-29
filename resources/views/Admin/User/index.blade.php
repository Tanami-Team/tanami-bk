@extends('layout.layout')
@section('title',__('lang.Users'))
@section('css')
    <link href="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }

        .select2-container .select2-selection--single .select2-selection__clear {
            padding-right: 355px;
        }
    </style>
@endsection

@section('header')
    <!--begin::Heading-->
    <h1 class="text-dark fw-bolder my-0 fs-2"> {{__('lang.Users')}}</h1>
    <!--end::Heading-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}" class="text-muted">
                {{trans('lang.Dashboard')}} </a>
        </li>
        <li class="breadcrumb-item">
            {{__('lang.Users')}}
        </li>
    </ul>
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
                    <div class="table-responsive">
                    <table class="table  align-middle table-row-bordered  text-center fs-4 gy-5" id="users_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->

                        <tr class="bg-secondary text-dark  fw-bolder fs-5 text-capitalize gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#users_table .form-check-input" value="1"/>
                                </div>
                            </th>
                            <th class="min-w-125px">{{__('lang.name')}}</th>
                            <th class="min-w-125px">{{__('lang.id')}}</th>
                            <th class="min-w-125px">{{__('lang.uid')}}</th>
                            <th class="min-w-125px">{{__('lang.phone')}}</th>
                            <th class="min-w-125px">{{__('lang.active')}}</th>
                            <th class="min-w-125px">{{__('lang.show')}}</th>
                            <th class="min-w-125px">{{__('lang.Actions')}}</th>
                            <th class="min-w-125px">{{__('lang.email')}}</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
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
                                '                                    <td style="text-align: right"><p>{{__("lang.title")}} : {{__('lang.contact_us')}}</p>' +
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
                    url: '{{ route('User.datatable.data') }}',
                    data: {}
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'id', name: 'id', "searchable": true, "orderable": true},
                    {data: 'uid', name: 'uid', "searchable": true, "orderable": true},
                    {data: 'phone', name: 'phone', "searchable": true, "orderable": true},
                    {data: 'is_active', name: 'is_active', "searchable": true, "orderable": true},
                    {data: 'show', name: 'show', "searchable": false, "orderable": false},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},
                    {data: 'email', name: 'email', "searchable": true, "orderable": true},

                ]
            });
            $.ajax({
                url: "{{ URL::to('/add-button-User')}}",
                success: function (data) {
                    $('.add_button1').append(data);
                },
                dataType: 'html'
            });
        });
    </script>
@endsection

