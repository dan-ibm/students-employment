@extends('base')
@section('title')
    <title>Update vacancy</title>
@endsection
@section('main')
    <div class="container row my-5">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="mb-3">Update an employer</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('vacancies.update', $vacancy->id) }}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-secondary" for="title">Title:</label>
                        <input type="text" class="form-control" name="title" value={{ $vacancy->title }} />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="text-secondary" for="position">Position:</label>
                        <input type="text" class="form-control" name="position" value={{ $vacancy->position }} />
                    </div>
                </div>


                <div class="form-group">
                    <label class="text-secondary" for="category">Responsibilities:</label>
                    <input type="text" class="form-control" name="responsibilities" value={{ $vacancy->responsibilities }} />
                </div>

                <div class="form-group">
                    <label class="text-secondary" for="requirements">Requirements:</label>
                    <input type="text" class="form-control" name="requirements" value={{ $vacancy->requirements }} />
                </div>

                <div class="form-group">
                    <label class="text-secondary" for="requirements">Terms:</label>
                    <input type="text" class="form-control" name="terms" value={{ $vacancy->terms }} />
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-secondary" for="min_salary">Min salary:</label>
                        <input type="text" class="form-control" name="min_salary" value={{ $vacancy->min_salary }} />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-secondary" for="max_salary">Max salary:</label>
                        <input type="text" class="form-control" name="max_salary" value={{ $vacancy->max_salary }} />
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-secondary" for="max_salary">Skills:</label>
                    <input type="text" class="form-control" name="skills" value={{ $vacancy->skills }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
