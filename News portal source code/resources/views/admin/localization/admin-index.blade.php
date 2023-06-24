@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Admin Localization') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All Strings') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
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
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                            id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">

                            <div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <form method="POST" action="{{ route('admin.extract-localize-string') }}">
                                                @csrf
                                                <input type="hidden" name="directory"
                                                    value="{{ resource_path('views/admin') }},{{ app_path('Http/Controllers/Admin') }}">
                                                <input type="hidden" name="language_code" value="{{ $language->lang }}">
                                                <input type="hidden" name="file_name" value="admin">

                                                <button type="submit"
                                                    class="btn btn-primary mx-3">{{ __('admin.Generate Strings') }}</button>
                                            </form>

                                            <form class="translate-from" method="POST"
                                                action="{{ route('admin.translate-string') }}">
                                                <input type="hidden" name="language_code" value="{{ $language->lang }}">
                                                <input type="hidden" name="file_name" value="admin">
                                                <button type="submit"
                                                    class="btn btn-dark mx-3 translate-button">{{ __('admin.Translate Strings') }}</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-{{ $language->lang }}">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th class="text-center">
                                                    {{ __('admin.String') }}
                                                </th>
                                                <th class="text-center">
                                                    {{ __('admin.Trunslation') }}
                                                </th>
                                                <th class="text-center">
                                                    {{ __('admin.Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $translatedValues = trans('admin', [], $language->lang);

                                            @endphp

                                            @if (is_array($translatedValues))
                                                @foreach ($translatedValues as $key => $value)
                                                    <tr>
                                                        <td>{{ ++$loop->index }}</td>
                                                        <td>{{ $key }}</td>
                                                        <td>{{ $value }}</td>
                                                        <td>

                                                            <button data-langcode="{{ $language->lang }}"
                                                                data-key="{{ $key }}"
                                                                data-value="{{ $value }}" data-filename="admin"
                                                                type="button" class="btn btn-primary modal_btn"
                                                                data-toggle="modal" data-target="#exampleModal">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

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

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.Value') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update-lang-string') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('admin.Value') }}</label>
                            <input type="text" name="value" class="form-control" value="">
                            <input type="hidden" name="lang_code" class="form-control" value="">
                            <input type="hidden" name="key" class="form-control" value="">
                            <input type="hidden" name="file_name" class="form-control" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('admin.Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('admin.Save changes') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        @foreach ($languages as $language)
            $("#table-{{ $language->lang }}").dataTable({
                "columnDefs": [{
                    "sortable": false,

                }]
            });
        @endforeach

        $(document).ready(function() {
            $('.modal_btn').on('click', function() {
                let langCode = $(this).data('langcode');
                let key = $(this).data('key');
                let value = $(this).data('value');
                let filename = $(this).data('filename');

                $('input[name="lang_code"]').val("")
                $('input[name="key"]').val("")
                $('input[name="value"]').val("")
                $('input[name="file_name"]').val("")

                $('input[name="lang_code"]').val(langCode)
                $('input[name="key"]').val(key)
                $('input[name="value"]').val(value)
                $('input[name="file_name"]').val(filename)
            })

            $('.translate-from').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.translate-string') }}",
                    data: formData,
                    beforeSend: function() {
                        $('.translate-button').text("Translating Please Wait...")
                        $('.translate-button').prop('disabled', true);
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire(
                                'Done!',
                                data.message,
                                'success'
                            )
                            window.location.reload();

                        }else {
                            Swal.fire(
                                'Error!',
                                data.message,
                                'error'
                            )
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            })
        })
    </script>
@endpush
