@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Social Count') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All Social Counts') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.social-count.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2" data-toggle="tab"
                                href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                                aria-selected="true">{{ $language->name }}</a>
                        </li>
                    @endforeach

                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                    @foreach ($languages as $language)
                        @php
                            $socialCounts = \App\Models\SocialCount::where('language', $language->lang)->get();
                        @endphp
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                            id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-{{ $language->lang }}">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>{{ __('admin.Icon') }}</th>
                                                <th>{{ __('admin.Link') }}</th>
                                                <th>{{ __('admin.Status') }}</th>
                                                <th>{{ __('admin.language') }}</th>
                                                <th>{{ __('admin.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($socialCounts as $socialCount)
                                                <tr>
                                                    <td>{{ $socialCount->id }}</td>
                                                    <td><i style="font-size: 20px;" class="{{ $socialCount->icon }}"></i>
                                                    </td>
                                                    <td>{{ $socialCount->url }}</i></td>

                                                    <td>
                                                        @if ($socialCount->status == 1)
                                                            <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                                        @endif

                                                    </td>

                                                    <td>{{ $socialCount->language }}</td>

                                                    <td>
                                                        <a href="{{ route('admin.social-count.edit', $socialCount->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin.social-count.destroy', $socialCount->id) }}"
                                                            class="btn btn-danger delete-item"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


        </div>
    </section>
@endsection

@push('scripts')
    <script>
        @foreach ($languages as $language)
            $("#table-{{ $language->lang }}").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });
        @endforeach
    </script>
@endpush
