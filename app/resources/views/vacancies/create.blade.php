@extends('base')
@section('title')
    <title>{{ $employer->org_name }} - Create vacancy</title>
@endsection
@section('main')
    <div class="container">
            <div class="container col-sm-8 offset-sm-2">
                <h1 class="mb-3 text-info">Add a vacancy</h1>
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
                            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary" for="requirements">Requirements:</label>
                            <textarea class="form-control" id="requirements" name="requirements" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary" for="terms">Terms:</label>
                            <textarea class="form-control" id="terms" name="terms" rows="4"></textarea>
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
                            <textarea class="form-control" id="skills" name="skills" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Add vacancy</button>
                    </form>
                </div>
            </div>

    </div>
@endsection
