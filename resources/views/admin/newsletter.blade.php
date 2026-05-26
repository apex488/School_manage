@extends('admin.mainsidebar')
@section('adminbanner')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Dashboard</title>
    
</head>
<body>

<div class="container mt-5 text-center">
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
    <!-- Heading -->
    <h3 class="mb-4">📧 Newsletter Dashboard</h3>

    <form action="{{route('newsletterform')}}" method="POST">
        @csrf

        <!-- TOP BAR (GMAIL STYLE) -->
        <div class="d-flex align-items-center mb-3 gap-3">

            <input type="checkbox" id="select_all">

            <button type="button" class="btn btn-primary" onclick="selectAll()">
                Select All
            </button>

            <button type="button" class="btn btn-secondary" onclick="unselectAll()">
                Unselect All
            </button>

            <button type="submit" class="btn btn-success">
                🚀 Send Update to All
            </button>

        </div>

        <!-- EMAIL LIST -->
        <div class="border p-3" style="max-height: 400px; overflow-y: scroll;">

            @foreach($result as $email)
            <div class="form-check border-bottom py-2">
                <input class="form-check-input email_checkbox" 
                       type="checkbox" 
                       name="emails[]" 
                       value="{{$email->mail}}">
                       
                <label class="form-check-label">
                    {{$email->mail}}
                </label>
            </div>
            @endforeach

        </div>

        <!-- SUBJECT -->
        <div class="mt-3">
            <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required>    
        </div>

        <!-- MESSAGE -->
        <div class="mt-3">
            <textarea name="message" class="form-control" rows="4" placeholder="Enter Message" required></textarea>
        </div>

    </form>
</div>

<!-- JS -->
<script>
function selectAll(){
    let checkboxes = document.querySelectorAll('.email_checkbox');
    checkboxes.forEach(cb => cb.checked = true);
    document.getElementById('select_all').checked = true;
}

function unselectAll(){
    let checkboxes = document.querySelectorAll('.email_checkbox');
    checkboxes.forEach(cb => cb.checked = false);
    document.getElementById('select_all').checked = false;
}

document.getElementById('select_all').addEventListener('click', function(){
    let checkboxes = document.querySelectorAll('.email_checkbox');
    checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>

</body>
</html>
@endsection