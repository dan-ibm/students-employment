@extends('base')
@section('title')
    <title>Объявления о работе</title>
@endsection
@section('main')

    <section class="jumbotron text-center bg-white border-bottom">
        <div class="container">
            <h1 class="jumbotron-heading">Students Employment Project</h1>
            <p class="lead text-muted">Galiaskarov Ilyas & Ibrayev Daniyar</p>
        </div>
    </section>


    <div class="container">
        @foreach($students as $student)
            <div class="col-md-12">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Grade: @php {{
                            $grades_arr = [];
                            if (count($student->teachers) != 0) {
                                foreach($student->teachers as $teacher) {
                                    $grades_arr[] = $teacher->pivot->grade;
                                }
                                echo round(array_sum($grades_arr)/count($student->teachers), 2); 
                            }
                            else {
                                echo 0;
                            }
                        }} @endphp</strong>
                        <h3 class="mb-0">{{ $student->first_name }} {{ $student->last_name }}</h3>
                            <div class="mb-1 text-muted">Email: {{ $student->user->email }} - {{ $student->phone }}</div>
                             <p class="card-text mb-3">{{ $student->title }}</p>
                             <a href="/student/{{$student->id}}">See more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


