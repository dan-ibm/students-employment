@extends('base')
@section('title')
    <title>{{session('teacher_id')}} - Grade Student</title>
@endsection
@section('main')
<div class="container">
    <h4 class="mb-3 tex">Grade a Student</h4>
    <form action="{{ route('post-grade') }}" method="POST" id="regForm">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="number" name="grade" id="inputGrade" class="form-control" placeholder="0">
                <div class="invalid-feedback">
                    Valid grade is required.
                </div>
            </div>
    
        <input type="hidden" id="student_id" name="student_id" value="{{$_GET['student_id']}}">
        <input type="hidden" id="teacher_id" name="teacher_id" value="{{$_GET['teacher_id']}}">
        <div class="form-group">
            <label class="text-secondary" for="comment">Comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="6"></textarea>
        </div>

        <button class="btn btn-primary btn-lg" type="submit">Save grade</button>
    </form>
</div>

@endsection
