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
        @foreach($vacancies as $vacancy)
            <div class="col-md-12">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">{{ $vacancy->employer->org_name }}</strong>
                        <h3 class="mb-0">{{ $vacancy->position }}</h3>
                            <div class="mb-1 text-muted">Salary: {{ $vacancy->min_salary }} - {{ $vacancy->max_salary }}</div>
                             <p class="card-text mb-3">{{ $vacancy->title }}</p>
                             <a href="vacancy/{{$vacancy->id}}">See more</a>
                    </div>
                </div>
            </div>
        @endforeach
        <h5 style="margin-left: 45%;">{{$vacancies->links()}}</h5>
    </div>

@endsection
