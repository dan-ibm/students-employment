@extends('base')
@section('title')
    <title>{{ $employer->org_name }} - Create vacancy</title>
@endsection
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a vacancy</h1>
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
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title"/>
                    </div>

                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" class="form-control" name="position"/>
                    </div>

                    <div class="form-group">
                        <label for="responsibilities">Responsibilities:</label>
                        <input type="text" class="form-control" name="responsibilities"/>
                    </div>
                    <div class="form-group">
                        <label for="requirements">Requirements:</label>
                        <input type="text" class="form-control" name="requirements"/>
                    </div>
                    <div class="form-group">
                        <label for="terms">Terms:</label>
                        <input type="text" class="form-control" name="terms"/>
                    </div>
                    <div class="form-group">
                        <label for="min_salary">Min Salary:</label>
                        <input type="number" class="form-control" name="min_salary"/>
                    </div>
                    <div class="form-group">
                        <label for="max_salary">Max Salary:</label>
                        <input type="number" class="form-control" name="max_salary"/>
                    </div>
                    <div class="form-group">
                        <label for="skills">Skills:</label>
                        <input type="text" class="form-control" name="skills"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Add vacancy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
