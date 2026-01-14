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
                    <h1>Insert <br> Teachers</h1>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
  {{session('error')}}
</div>
                    @endif
                    <form action="{{route('senddata')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="TeacherName" class="form-control mt-3" name="name">
                        @error('name')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                        <input type="number" placeholder="TeacherAge" class="form-control mt-3" name="age">
                        @error('age')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                      <select name="qualification" class="form-control mt-3">
                        <option value="Select Qualification" selected disabled>Select Qualification</option>
                        <option value="Secondary School Qualification">Secondary School Qualification</option>
                        <option value="Higher Secondary Qualification">Higher Secondary Qualification</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelor’s Degree">Bachelor’s Degree</option>
                        <option value="Master’s Degree">Master’s Degree</option>
                      </select>
                        @error('qualification')
                        <p class="text-warning">{{$message}}</p>    
                        @enderror
                        <select name="course_id" class="form-control mt-3">
                            <option value="Select Course" selected disabled>Select Course</option>
                            @foreach ($result as $result)
                                 <option value="{{$result->id}}">{{$result->name}}</option>
                            @endforeach
                        </select>
                        @error('course_id')
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