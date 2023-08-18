<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="{{ asset('asset/backend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('asset/backend/css/datepicker3.css') }}" rel="stylesheet">
        <link href="{{ asset('asset/backend/css/styles.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <script src="{{ asset('asset/backend/ckeditor1/ckeditor.js') }}"></script>
        <script src="{{ asset('asset/backend/ckfinder/ckfinde.js') }}"></script>

        <script src="{{ asset('asset/backend/js/jquery-1.11.1.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="{{ asset('asset/backend/js/lumino.glyphs.js') }}"></script>
        <script src="{{ asset('asset/backend/js/lumino.glyphs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('asset/backend/ckeditor/ckeditor.js') }}"></script>
    </head>
    <style>
      #navbar{
        margin-top:50px;}
      #tbl-first-row{
        font-weight:bold;}
      #logout{
        padding-right:30px;}	
    </style>
<body>
	{{-- Header --}}
	@include('layoutAdmin.header')
	{{-- end Header --}}

	{{-- Main --}}
	@yield('contents')
	{{-- End main --}}

    
<script src="{{ asset('asset/backend/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('asset/backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/backend/js/chart.min.js') }}"></script>
<script src="{{ asset('asset/backend/js/chart-data.js') }}"></script>
<script src="{{ asset('asset/backend/js/easypiechart.js') }}"></script>
<script src="{{ asset('asset/backend/js/easypiechart-data.js') }}"></script>
<script src="{{ asset('asset/backend/js/bootstrap-datepicker.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
