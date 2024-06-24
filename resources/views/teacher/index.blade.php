@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="col-3">
                            <a href="{{ route('teacher.create') }}">
                                <button class="btn btn-outline-primary">Create <i class="fa-solid fa-plus"></i></button>
                            </a>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Address</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($teachers as $teacher)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>{{ $teacher->gender }}</td>
                                <td>{{ $teacher->date_of_birth }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>
                                    <img src="{{ asset('storage/teacher/'.$teacher->profile) }}" width="50px" height="50px">
                                </td>
                                <td>
                                    <a href="{{ route('teacher.edit',$teacher->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST" class=" d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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
