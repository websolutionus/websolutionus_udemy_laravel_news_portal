<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Top News HTML template </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Header news -->
    @include('frontend.layouts.header')
    <!-- End Header news -->

    @yield('content')

    <!-- Footer Section -->
    @include('frontend.layouts.footer')
    <!-- End Footer Section -->


    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        // Add csrf token in ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            /** change language **/
            $('#site-language').on('change', function(){
                let languageCode = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('language') }}",
                    data: {language_code: languageCode},
                    success: function(data){
                        if(data.status === 'success'){
                            window.location.reload();
                        }
                    },
                    error: function(data){
                        console.error(data);
                    }
                })
            })
        })
    </script>

    @stack('content')

</body>

</html>
