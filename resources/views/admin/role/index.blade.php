@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Roles and Permission') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Roles and Permission') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
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
                                <th>{{ __('admin.Role Name') }}</th>
                                <th>{{ __('admin.Permissions') }}</th>
                                <th>{{ __('admin.Action') }}</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge bg-primary text-light">{{ $permission->name }}</span>
                                    @endforeach
                                    @if ($role->name === 'Super Admin')
                                    <span class="badge bg-danger text-light">{{ __('admin.All Permissions') }} *</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($role->name != 'Super Admin')
                                    <a href="{{ route('admin.role.edit', $role->id) }}"
                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('admin.role.destory', $role->id) }}"
                                        class="btn btn-danger delete-item"><i
                                            class="fas fa-trash-alt"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

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
