@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Pending News') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Pending') }}</h4>

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
                            $news = \App\Models\News::with('category')
                                ->where('language', $language->lang)
                                ->where('is_approved', 0)
                                ->orderBy('id', 'DESC')
                                ->get();
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
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Category') }}</th>
                                                <th>{{ __('Approve') }}</th>

                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($news as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td >
                                                        <img src="{{ asset($item->image) }}" width="100" alt="">
                                                    </td>

                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td>
                                                        <form action="" id="approve_form">
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <div class="form-group">
                                                                <select name="is_approve" class="form-control" id="approve-input">
                                                                    <option value="0">{{ __('Pending') }}</option>
                                                                    <option value="1">{{ __('Approved') }}</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('admin.news.edit', $item->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin.news.destroy', $item->id) }}"
                                                            class="btn btn-danger delete-item"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                        <a href="{{ route('admin.news-copy', $item->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-copy"></i></i></a>
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
                "columnDefs": [
                    {
                        "sortable": false,
                        "targets": [2, 3]
                    }
                ],
                "order": [
                    [0, 'desc']
                ]
            });
        @endforeach

        $(document).ready(function(){

            $('#approve-input').on('change', function(){
                $('#approve_form').submit();
            });

            $('#approve_form').on('submit', function(e){
                e.preventDefault();

                let data = $(this).serialize();
                $.ajax({
                    method: 'PUT',
                    url: "{{ route('admin.approve.news') }}",
                    data: data,
                    success: function(data){
                        if(data.status === 'success'){
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            })

                            window.location.reload();
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
