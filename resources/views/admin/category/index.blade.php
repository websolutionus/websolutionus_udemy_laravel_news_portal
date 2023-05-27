@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Categories') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Categories') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.language.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Create new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>{{ __('Language Name') }}</th>
                                <th>{{ __('Language Code') }}</th>
                                <th>{{ __('Default') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>

                                </td>
                                <td></td>
                                <td></td>

                                <td>


                                </td>
                                <td>
                                </td>

                                <td>
                                    <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table-1").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
