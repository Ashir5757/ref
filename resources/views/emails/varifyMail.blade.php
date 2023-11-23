

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['title']}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKAeSR5q4kBjU/FHbVH+8X6oVH+CPBoKvtBnZ9UHCRCzD46SylZd7qcW6ONp1h" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Verify Email</h1>
                <p>Hi {{$data['name']}}, welcome to our referral system!</p>
                <p>Please click on the link below to verify your email address:</p>
                <p>Thank You!</p>
                <a href="{{$data['url']}}" class="btn btn-primary">Verify Email</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2eHO1lJizPF9d2hPLCO9k+EN7SNj7q4yD+wOPMnJU4FT8qQajg8X2d3n8AO" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-5Gum66U2l1T7TuoY7bMUzKAKaT1tK9sU8g1oAXb8H7jL57k+hZXB7OGBoX5E9y" crossorigin="anonymous"></script>
</body>
</html>
