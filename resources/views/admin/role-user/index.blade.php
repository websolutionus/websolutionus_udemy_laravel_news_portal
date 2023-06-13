@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Roles Users') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Role Users') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.role-users.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Create new') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>{{ __('Role Name') }}</th>
                                <th>{{ __('Permissions') }}</th>
                                <th>{{ __('Action') }}</th>

                            </tr>
                        </thead>
                        <tbody>


                                {{-- <td>
                                    <a href="{{ route('admin.role.edit', $role->id) }}"
                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('admin.role.destory', $role->id) }}"
                                        class="btn btn-danger delete-item"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td> --}}


                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </section>
@endsection

@push('scripts')
    <script>

        $("#table").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });

    </script>
@endpush
