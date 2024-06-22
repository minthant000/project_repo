@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
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
                              @foreach ($students as $student)
                              <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <img src="{{ asset('storage/student/'.$student->profile) }}" width="50px" height="50px">
                                </td>
                                <td>
                                    <a href="{{ route('student.edit',$student->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('student.destroy',$student->id) }}" method="POST" class=" d-inline-block">
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
