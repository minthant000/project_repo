@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="col-3">
                            <a href="{{ route('admin.create') }}">
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
                              @foreach ($admins as $admin)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>{{ $admin->gender }}</td>
                                <td>{{ $admin->date_of_birth }}</td>
                                <td>{{ $admin->address }}</td>
                                <td>
                                    <img src="{{ asset('storage/admin/'.$admin->profile) }}" width="50px" height="50px">
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit',$admin->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin.destroy',$admin->id) }}" method="POST" class=" d-inline-block">
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
