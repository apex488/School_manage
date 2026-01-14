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
                    <h1>Insert <br> Course</h1>
                    <form action="{{route('insert.data')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="CourseName" class="form-control mt-3" name="name">
                        @error('name')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                        <input type="number" placeholder="CourseAmount" class="form-control mt-3" name="amount">
                        @error('amount')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                        <input type="file" placeholder="CoursePicture" class="form-control mt-3" name="pic">
                        @error('pic')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                        <textarea name="desc" class="form-control mt-3" placeholder="CourseDescription"></textarea>
                        @error('desc')
                            <p class="text-warning">{{$message}}</p>
                        @enderror
                        <button class="btn" name="insert">Insert</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>