<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="MTT">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />


	<title>Saadet - Admin Panel</title>

	<link href="{{ asset('/yonetim') }}/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    @yield('style')
</head>

<body>
	<div class="wrapper">
        @include('admin.inc.sidebar')

		<div class="main">
		
        @include('admin.inc.header')

			<main class="content">
				<div class="container-fluid p-0">

                <div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
                                                            @yield('body')
								</div>
							</div>
						</div>
					</div>
                    


				</div>
			</main>

            @include('admin.inc.footer')

		</div>
	</div>

	<script src="{{ asset('/yonetim') }}/js/app.js"></script>

    @yield('script')


</body>

</html>