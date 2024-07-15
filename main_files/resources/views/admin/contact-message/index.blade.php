@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Contact Message') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All Messages') }}</h4>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-sub">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>{{ __('admin.Email') }}</th>

                                <th>{{ __('admin.Subject') }}</th>
                                <th>{{ __('admin.Message') }}</th>
                                <th>{{ __('admin.Replied') }}</th>


                                <th>{{ __('admin.Action') }}</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>
                                        @if ($message->replied == 1)
                                        <i style="font-size:20px" class="fas fa-check text-success"></i>
                                        @else
                                        <i style="font-size:20px" class="fas fa-clock text-warning"></i>
                                        @endif

                                    </td>

                                    {{-- <td>
                                    @if ($link->status === 1)
                                    <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                    @endif
                                </td> --}}
                                    <td>
                                        <a href="" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal-{{ $message->id }}"><i
                                                class="fas fa-envelope"></i></a>

                                        <a href="{{ route('admin.social-link.destroy', $message->id) }}"
                                            class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </section>

    @foreach ($messages as $message)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $message->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.Replay To') }}: {{ $message->email }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.contact.send-replay') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{ __('admin.Subject') }}</label>
                                <input type="text" name="subject" id="" class="form-control">
                                <input type="hidden" name="email" value="{{ $message->email }}" id=""
                                    class="form-control">
                                <input type="hidden" name="message_id" value="{{ $message->id }}" id=""
                                class="form-control">
                                @error('subject')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('admin.Message') }}</label>
                                <textarea name="message" class="form-control" style="height: 200px !important;"></textarea>
                                @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('admin.Close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('admin.Send') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <script>
        $("#table-sub").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [1]
            }],
            "order": [[0, "desc"]]
        });
    </script>
@endpush
