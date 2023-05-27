@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Language') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Languages') }}</h4>
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
                            @foreach ($languages as $language)
                            <tr>
                                <td>
                                    {{ $language->id }}
                                </td>
                                <td>{{ $language->name }}</td>
                                <td>{{ $language->lang }}</td>

                                <td>
                                    @if ($language->default == 1)
                                        <span class="badge badge-primary">{{ __('Defalut') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('No') }}</span>
                                    @endif

                                </td>
                                <td>
                                    @if ($language->status == 1)
                                    <span class="badge badge-success">{{ __('Active') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="#" class="btn btn-secondary">Detail</a>
                                    <a href="#" class="btn btn-secondary">Detail</a>
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
        $("#table-1").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
