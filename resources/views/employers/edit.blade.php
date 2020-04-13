@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update an employer</h1>

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
            <form method="post" action="{{ route('employers.update', $employer->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="org_name">Organization Name:</label>
                    <input type="text" class="form-control" name="org_name" value={{ $employer->org_name }} />
                </div>

                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" class="form-control" name="position" value={{ $employer->position }} />
                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value={{ $employer->title }} />
                </div>
                <div class="form-group">
                    <label for="requirements">Requirements:</label>
                    <textarea class="form-control" name="requirements" value={{ $employer->requirements }} ></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" name="category" value={{ $employer->category }} />
                </div>
                <div class="form-group">
                    <label for="min_salary">Min salary:</label>
                    <input type="text" class="form-control" name="min_salary" value={{ $employer->min_salary }} />
                </div>
                <div class="form-group">
                    <label for="max_salary">Max salary:</label>
                    <input type="text" class="form-control" name="max_salary" value={{ $employer->max_salary }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
