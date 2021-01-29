<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Test</title>
    <link rel="stylesheet" href="resources/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="resources/assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="resources/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="resources/assets/css/styles.css">
	<title>
		@yield('title')
	</title>
	<body>
		@include('layouts.header1')
		<div align="center">
			@yield('content')
		</div>
		@include('layouts.footer')
	</body>
</head>
</html>