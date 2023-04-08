<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | CMS</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/assets_admin/img/favicon.png')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/plugins/datatables/datatables.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/plugins/morris/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets_admin/css/bootstrap-datetimepicker.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/css/style.css')}}"> </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


	<!-- Used for Tiny Text Editor -->
	<script src="https://cdn.tiny.cloud/1/idhc3eu5xqredw5w170x7bl771ac2zy9rbggh7mm04xrps7q/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
	<div class="main-wrapper">
		@include('admin.include.header');

		@include('admin.include.left_sidebar');

		@yield('content')

	</div>

	<script>
        $(document).ready(function() {
            toastr.options.timeOut = 5000;
            @if (Session::has('alert-danger'))
                toastr.error('{{ Session::get('alert-danger') }}');
            @elseif(Session::has('alert-success'))
                toastr.success('{{ Session::get('alert-success') }}');
            @elseif(Session::has('alert-warning'))
                toastr.success('{{ Session::get('alert-warning') }}');
            @endif
        });

    </script>
	<script src="{{ asset('assets/assets_admin/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{ asset('assets/assets_admin/js/popper.min.js')}}"></script>
	<script src="{{ asset('assets/assets_admin/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/assets_admin/js/moment.min.js')}}"></script>
	<script src="{{ asset('assets/assets_admin/js/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="{{ asset('assets/assets_admin/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ asset('assets/assets_admin/plugins/raphael/raphael.min.js')}}"></script>
	<script src="{{ asset('assets/assets_admin/js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script>
		//Used for Tiny Text editor
		tinymce.init({
		// selector: 'textarea',
		plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
		toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
		tinycomments_mode: 'embedded',
		tinycomments_author: 'Author name',
		mergetags_list: [
			{ value: 'First.Name', title: 'First Name' },
			{ value: 'Email', title: 'Email' },
		]
		});
		$(function() {
			$('#datetimepicker3').datetimepicker({
				format: 'LT'
			});
		});
	</script>
	
	@yield('script')
</body>

</html>
