@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Roles Users') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All Role Users') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.role-users.create') }}" class="btn btn-primary">
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
                                <th>{{ __('admin.Name') }}</th>
                                <th>{{ __('admin.Email') }}</th>
                                <th>{{ __('admin.Role') }}</th>
                                <th>{{ __('admin.Action') }}</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>

                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td><span class="badge bg-primary text-light">{{ $admin->getRoleNames()->first() }}</span></td>

                                <td>
                                    @if ($admin->getRoleNames()->first() != 'Super Admin')

                                    <a href="{{ route('admin.role-users.edit', $admin->id) }}"
                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('admin.role-users.destroy', $admin->id) }}"
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
