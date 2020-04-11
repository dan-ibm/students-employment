@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <h1 class="display-3">Employers</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('employer-create')}}" class="btn btn-primary">New employer</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Position</td>
                    <td>Responsibilities</td>
                    <td>Requirements</td>
                    <td>Terms</td>
                    <td>Salary</td>
                    <td>Skills</td>
                    <td>Date</td>
                </tr>
                </thead>
                <tbody>
                @foreach($vacancies as $vacancy)
                    <tr>
                        <td>{{$vacancy->id}}</td>
                        <td>{{$vacancy->title}}</td>
                        <td>{{$vacancy->position}}</td>
                        <td>{{$vacancy->responsibilities}}</td>
                        <td>{{$vacancy->requirements}}</td>
                        <td>{{$vacancy->terms}}</td>
                        <td>{{$vacancy->min_salary}} - {{$vacancy->max_salary}}</td>
                        <td>{{$vacancy->skills}}</td>
                        <td>{{$vacancy->created_at}}</td>
                        <td>
                            <a href="{{ route('vacancy-edit', ['vacancy'=>$vacancy->id])}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('vacancies.destroy', $vacancy->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection


