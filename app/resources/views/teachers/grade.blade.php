@extends('base')
@section('title')
    <title>{{session('teacher_id')}} - Grade Student</title>
@endsection
@section('main')
<div class="container">
    <h4 class="mb-3 tex">Grade a Student</h4>
    <form action="{{ route('post-grade') }}" method="POST" id="regForm">
        {{ csrf_field() }}
        <div class="row text-secondary">
            <div class="form-label-group col-md-6 mb-3">
                <label for="grade">Grade</label>
                <input type="number" name="grade" id="inputGrade" class="form-control" placeholder="Grade">
                <div class="invalid-feedback">
                    Valid grade is required.
                </div>
            </div>

            <div class="form-label-group col-md-6 mb-3">
                <label for="comment">Comment</label>
                <input type="text" name="comment" id="inputComment" class="form-control" placeholder="Comment">
                <div class="invalid-feedback">
                    Valid comment is required.
                </div>
            </div>

            <div class="form-label-group col-md-6 mb-3">
                <label for="student">Student</label>
                <input type="text" name="student" id="inputComment" class="form-control" placeholder="{{$_GET['student_id']}}">
                <div class="invalid-feedback">
                    Valid comment is required.
                </div>
            </div>
            <input type="hidden" id="student_id" name="student_id" value="{{$_GET['student_id']}}">
            <input type="hidden" id="teacher_id" name="teacher_id" value="{{$_GET['teacher_id']}}">
        </div>

        <button class="btn btn-primary btn-lg" type="submit">Save grade</button>
    </form>
</div>

@endsection
