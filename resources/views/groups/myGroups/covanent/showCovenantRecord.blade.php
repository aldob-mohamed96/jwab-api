@extends('index')
@section('title','العهد')
@section('content')

<div class="panel panel-default mt-4">
    <div class="table-responsive">
        <table class="table " id="datatable">
            <thead>
                <tr>
                    <th>رقم </th>
                    <th>وظيفة </th>
                    <th>مستلم العهده</th>
                    <th>تاريخ التسليم</th>
                    <th>وظيفة </th>
                    <th>مرجعه إلى</th>
                    <th>وقت إلاعادة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    @if ($record->delivery_type == 'driver')
                    <td>سائق</td>
                    <td>{{ $record->delivered_driver->name }}</td>
                    @elseif($record->delivery_type == 'user')
                    <td>موظف</td>
                    <td>{{ $record->delivered_user->name }}</td>
                    @else
                    <td></td>
                    <td></td>
                    @endif
                    <td>{{ $record->delivery_date }}</td>

                    @if ($record->receive_type == 'driver')
                    <td>سائق</td>
                    <td>{{ $record->receive_driver->name }}</td>
                    @elseif($record->receive_type == 'user')
                    <td>موظف</td>
                    <td>{{ $record->receive_user != null ? $record->receive_user->name : "" }}</td>
                    @else
                    <td></td>
                    <td></td>
                    @endif

                    <td>{{ $record->receive_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready( function () {
            $('#datatable').DataTable({
                // dom: 'Blfrtip',
                // buttons: [
                //             { extend : 'csv'  , className : 'btn btn-success text-light' , text : 'CSV' ,charset: "utf-8" },
                //             { extend : 'excel', className : 'btn btn-success text-light' , text : 'Excel' ,charset: "utf-8"},
                //             // { extend : 'pdf'  , className : 'btn btn-success text-light' , text : 'PDF' ,charset: "utf-8" },
                //             { extend : 'print', className : 'btn btn-success text-light' , text : 'Print' ,charset: "utf-8"},
                //         ],
                language: {
                    "sProcessing": "جاري التحميل...",
                    "sLengthMenu": "عـرض _MENU_ العهد",
                    "sZeroRecords": "لم يتم العثور على نتائج",
                    "sEmptyTable": "لا توجد بيانات متاحة في هذا الجدول",
                    "sInfo": "عرض العهد من _START_ إلى _END_ من إجمالي _TOTAL_ من عهده",
                    "sInfoEmpty": "عرض العهد من 0 إلى 0 من إجمالي 0 عهده",
                    "sInfoFiltered": "(تصفية إجمالي _MAX_ من العهد)",
                    "sInfoPostFix": "",
                    "sSearch": "بـحــث:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "التحميل...",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sLast": "الأخير",
                        "sNext": "التالى",
                        "sPrevious": "السابق"
                    },
                    "oAria": {
                        "sSortAscending": ": التفعيل لفرز العمود بترتيب تصاعدي",
                        "sSortDescending": ": التفعيل لفرز العمود بترتيب تنازلي"
                    }
                }
            });

           $('#datatable_length').addClass('mb-3');
        });


</script>
@endsection
