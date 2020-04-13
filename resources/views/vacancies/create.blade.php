@extends('base')
@section('title')
    <title>{{ $employer->org_name }} - Create vacancy</title>
@endsection
@section('main')
    <div class="container row my-5">
            <div class="container col-sm-8 offset-sm-2">
                <h1 class="mb-3">Add a vacancy</h1>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    <form method="post" action="{{ route('vacancies.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-secondary" for="title">Title:</label>
                                <input type="text" class="form-control" name="title"/>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="text-secondary" for="position">Position:</label>
                                <input type="text" class="form-control" name="position"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-secondary" for="responsibilities">Responsibilities:</label>
                            <input type="text" class="form-control" name="responsibilities"/>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary" for="requirements">Requirements:</label>
                            <input type="text" class="form-control" name="requirements"/>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary" for="terms">Terms:</label>
                            <input type="text" class="form-control" name="terms"/>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-secondary" for="min_salary">Min Salary:</label>
                                <input type="number" class="form-control" name="min_salary"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-secondary" for="max_salary">Max Salary:</label>
                                <input type="number" class="form-control" name="max_salary"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-secondary" for="skills">Skills:</label>
                            <input type="text" class="form-control" name="skills"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Add vacancy</button>
                    </form>
                </div>
            </div>

    </div>
@endsection
