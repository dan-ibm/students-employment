@extends('base')
@extends('layouts.navbar')
<title>Dashboard Employer</title>


@section('main')
<div class="container col">
    <div class="row px-5">
        <div class="d-flex p-4 mb-2 rounded" style="font-size: 10em">
            <svg class="bi bi-house-door text-primary mx-2" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5H9.5a.5.5 0 01-.5-.5v-4H7v4a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
            </svg>
        </div>

        <div class="container">
            <div class="row">
                <h2 class="text-primary px-5">{{ Auth()->user()->employer->org_name }} </h2>
            </div>


            <div class = "row px-5 ">
                <p class="text-secondary">Contacts</p>
                <p class="text-info px-2">{{ Auth()->user()->email }} </p>
                <p class="text-secondary">or</p>
                <p class="text-info px-2">{{ $employer->phone }} </p>
            </div>



            <div class = "row px-5 mb-3">
                <a href="{{ url('vacancy-create') }}" class="btn btn-success">Create New</a>
            </div>

            <div class="px-4">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Position</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vacancies as $employer)
                            <tr>
                                <td><a href="{{url('vacancies')}}/{{$employer->id}}">{{$employer->position}}</a></td>
                                <td><a>{{ $employer->min_salary }} - {{ $employer->max_salary }}</a></td>
                                <td>
                                    <div class="row">
                                        <form>
                                           <a href="{{ route('vacancy-edit', ['vacancy'=>$employer->id])}}" class="btn btn-primary">Edit</a>
                                        </form>
                                    <form action="{{ route('vacancies.destroy', $employer->id)}}" method="post" class="mx-3">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>

    </div>
</div>


@endsection
