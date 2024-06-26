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
                                @if (Auth::user()->role == 2)
                                    <th scope="col">Action</th>
                                @else
                                    <th scope="col" class="d-none">Action</th>
                                @endif
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
                                @if (Auth::user()->role == 2)
                                    <td>
                                        <a href="{{ route('teacher.edit',$teacher->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST" class=" d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('teacher.edit',$teacher->id) }}" class="btn btn-warning d-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST" class=" d-inline-block d-none">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger d-none"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                @endif
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
