<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

body{
    font-family: DejaVu Sans, sans-serif;
}

.container{
    width:90%;
    border:2px solid black;
    padding:20px;
    margin-left:auto;
    margin-right:auto;
}


.header{
    text-align:center;
    margin-bottom:20px;
}

.header h2{
    margin:0;
}

table{
    width:100%;
    /* border-collapse: collapse; */
}

td{
    border:1px solid black;
    padding:8px;
}

.label{
    width:30%;
    font-weight:bold;
    background:#f5f5f5;
}

.value{
    width:70%;
}

.signature{
    margin-top:50px;
    width:200px;
    border-top:1px solid black;
    text-align:center;
}

</style>

</head>

<body>

<div class="container">

<div class="header">
<h2>Course Enrollment Form</h2>
<p>{{ $title }}</p>
</div>

<p><strong>Date:</strong> {{ $date }}</p>



<table>

<tr>
<td class="label">Name</td>
<td class="value">{{ $result->user?->name }}</td>
</tr>

<tr>
<td class="label">Age</td>
<td class="value">{{ $result->age }}</td>
</tr>

<tr>
<td class="label">Email</td>
<td class="value">{{ $result->mail }}</td>
</tr>

<tr>
<td class="label">Phone</td>
<td class="value">{{ $result->phone }}</td>
</tr>

<tr>
<td class="label">Course</td>
<td class="value">{{ $result->course->name }}</td>
</tr>

<tr>
<td class="label">Qualification</td>
<td class="value">{{ $result->qualification }}</td>
</tr>

<tr>
<td class="label">Amount</td>
<td class="value">{{ $result->amount }}</td>
</tr>

</table>

<br><br>



<div class="signature">
Admin Signature
</div>

</div>

</body>
</html>
