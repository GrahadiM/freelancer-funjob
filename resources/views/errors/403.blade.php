<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forbidden - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/dist') }}/assets/css/bootstrap.css">
    
    <link rel="shortcut icon" href="{{ asset('assets/dist') }}/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/dist') }}/assets/css/app.css">
</head>
<body>
    <div id="error">
        
<div class="container text-center pt-32">
    <h1 class='error-title'>403</h1>
    <p>You're not allowed in here</p>
    <a href="{{ route('home') }}" class='btn btn-primary'>Go Home</a>
</div>

        <div class="footer pt-32">
            <p class="text-center">Copyright &copy; Voler 2021</p>
        </div>
    </div>
</body>
</html>
