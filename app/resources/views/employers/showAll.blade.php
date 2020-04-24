<html>
<head>
    <title>Employers</title>
    @extends('layouts.head')
</head>
<body>

<div class="container" style="margin-top: 4%; margin-left: 30%">

    @foreach($employers as $employer)
        <ul>
        <li><a href="list/{{$employer->id}}">{{$employer->title}}</a></li>
        <p>{{ $employer->org_name }}</p>
        </ul>
    @endforeach

</div>

</body>
</html>
