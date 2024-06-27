@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{ route('teacher.update',$teacher->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $teacher->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{ $teacher->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="phone" value="{{ $teacher->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{ $teacher->gender == 1 ? 'checked':'' }}>
                                    <label class="form-check-label" for="male">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="0" {{ $teacher->gender == 0 ? 'checked':'' }}>
                                    <label class="form-check-label" for="female">
                                      Female
                                    </label>
                                  </div>
                            </div>
                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ $teacher->date_of_birth }}"></input>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="address" value="{{ $teacher->address }}"></input>
                            </div>
                            <div class="mb-3">
                                <label for="profile" class="form-label">Profile</label><br>
                                <img src="{{ asset('storage/teacher/'.$teacher->profile) }}" width="150px" height="150px"><br><br>
                                <input type="file" name="profile" class="form-control" id="profile" placeholder=""></input>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
