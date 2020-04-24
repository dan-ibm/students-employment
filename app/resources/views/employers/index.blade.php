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
                    <td>Name</td>
                    <td>Position</td>
                    <td>Title</td>
                    <td>Requirements</td>
                    <td>Category</td>
                    <td>Salary</td>
                </tr>
                </thead>
                <tbody>
                @foreach($employers as $employer)
                    <tr>
                        <td>{{$employer->id}}</td>
                        <td>{{$employer->org_name}}</td>
                        <td>{{$employer->position}}</td>
                        <td>{{$employer->title}}</td>
                        <td>{{$employer->requirements}}</td>
                        <td>{{$employer->category}}</td>
                        <td>{{$employer->min_salary}} - {{$employer->max_salary}}</td>
                        <td>
                            <a href="{{ route('employer-edit', ['employer'=>$employer->id])}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('employers.destroy', $employer->id)}}" method="post">
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


