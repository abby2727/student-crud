@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                @if (session('status_del'))
                    <h6 class="alert alert-danger">{{ session('status_del') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4 class="">
                            Basic Student CRUD
                            <div class="float-end">
                                <a href="{{ url('add-student') }}" class="btn btn-primary">Add</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Status</th>
                                    <th>Date (mm/dd/yyyy)</th>
                                    <th>Profile Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->course }}</td>
                                        <td>
                                            @if ($item->status == '0')
                                                <h6>New</h6>
                                            @endif
                                            @if ($item->status == '1')
                                                <h6>Old</h6>
                                            @endif
                                            @if ($item->status == '2')
                                                <h6>Others</h6>
                                            @endif
                                        </td>
                                        <td>{{ $item->date->format('F j, Y') }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/students/' . $item->profile_image) }}"
                                                width="70px" height="70px" alt="Image">
                                        </td>
                                        {{-- EDIT --}}
                                        <td>
                                            <a href="{{ url('edit-student/' . $item->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                        {{-- DELETE --}}
                                        <td>
                                            <form action="{{ url('delete-student/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
