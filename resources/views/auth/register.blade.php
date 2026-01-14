<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="box">
                    <h1>Register <br> form</h1>
                    <form action="{{route('userregister')}}" method="post">
                        @csrf
                        <input type="text" placeholder="UserName" class="form-control mt-3" name="name">
                        @error('name')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                        <input type="email" placeholder="UserMail" class="form-control mt-3" name="mail">
                        @error('mail')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                        <input type="password" placeholder="UserPassword" class="form-control mt-3" name="password">
                        @error('password')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                        <button class="btn" name="register">Register</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>