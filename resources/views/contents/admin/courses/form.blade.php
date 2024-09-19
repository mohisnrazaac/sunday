@extends('layouts.admin')

@section("content")
<link rel="stylesheet" href="{{ URL::to('css/multistep_bs.css') }}">

<!-- Create Form Card -->
<livewire:wizard />

<!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ URL::to('js/custom.js') }}"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>



    <script>
        $(document).ready(function () {
            $('#description').summernote({
                height: 255,
            });
            $('#lecdescription').summernote({
                height: 255,
            });
            $('#quizdescription').summernote({
                height: 255,
            });
            $('#summernoteAssignment').summernote({
                height: 255,
            });
        });

        $(document).ready(function () {
            $('#customFileUploadButton').on('click', function (event) {
                event.preventDefault(); // Prevent default behavior
                $('#hiddenFileInput').click();
            });
            $('#customFileUploadButton2').on('click', function (event) {
                event.preventDefault(); // Prevent default behavior
                $('#secondHiddenFileInput').click();
            });
        });
    </script>

    <!--  Scripts End -->
@endsection
