<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
    @extends('layouts.head')
</head>
<body>
<table class="table table-striped">
    <thead>
    <th>ID</th>
    <th>Show Name</th>
    <th>Series</th>
    <th>Lead Actor</th>
    <th>Action</th>
    </thead>
    <tbody>

        <tr>
            <td>
                {{$student->id}}
            </td>
            <td>
                {{$student->first_name}}
            </td>
            <td>
                {{$student->email}}
            </td>
            <td>
                {{$student->last_name}}
            </td>
            <td><a href="{{action('StudentController@generatePDF')}}">Download PDF</a></td>
        </tr>

    </tbody>
</table>

</body>
</html>
