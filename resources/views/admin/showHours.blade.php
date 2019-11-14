@extends('layouts.adminDashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            View Employee Hours
        </div>

        <div class="card-body">
            <div class="user-hours-group">
            </div>
            <hr>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th>
                            Role
                        </th>
                        <th>
                            Name
                        </th>
                        <th width="30">
                            Status
                        </th>
                        <th>
                            TimeIn
                        </th>
                        <th>
                            TimeOut
                        </th>
                        <th>
                            Worked Hours
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hours as $key => $hour)
                        <tr>
                            <td>
                                {{ $hour->actor->role ?? '' }}
                            </td>
                            <td>
                                {{ $hour->actor->name ?? '' }}
                            </td>
                            <td>
                                {{ $hour->login_status === 'in' ? 'working' : 'worked' }}
                            </td>
                            <td>
                                {{$hour->created_at}}
                            </td>
                            <td>
                                {{$hour->updated_at}}
                            </td>
                            <td>
                                {{ ((Carbon::createFromFormat('Y-m-d H:s:i', $hour->updated_at))->diff(Carbon::createFromFormat('Y-m-d H:s:i', $hour->created_at)))->format('%h:%i') }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@section('scripts')
    @parent
    <script>
        $('#user-select').on('change', function () {
            alert(this.value);
        });

        $(function () {
            let languages = {
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {className: 'btn'})
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages.en
                },
                columnDefs: [],
                order: [],
                scrollX: true,
                pageLength: 10,
                dom: 'lBfrtip<"actions">',
                buttons: []
            });

            $.fn.dataTable.ext.classes.sPageButton = '';

            let deleteButtonTrans = 'Clear All'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('clock.workHours.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = '';

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            dtButtons.push(deleteButton)

            $('.datatable:not(.ajaxTable)').DataTable({buttons: dtButtons})
        })

    </script>
@endsection
@endsection