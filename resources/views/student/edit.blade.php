@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{ route('student.update',$student->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name" value="{{ $student->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlTextarea1" placeholder="email" value="{{ $student->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleFormControlTextarea1" placeholder="phone" value="{{ $student->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{ $student->gender == 1 ? 'checked':'' }}>
                                    <label class="form-check-label" for="male">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="0" {{ $student->gender == 0 ? 'checked':'' }}>
                                    <label class="form-check-label" for="female">
                                      Female
                                    </label>
                                  </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" id="exampleFormControlTextarea1" value="{{ $student->date_of_birth }}"></input>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleFormControlTextarea1" placeholder="address" value="{{ $student->address }}"></input>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Profile</label><br>
                                <img src="{{ asset('storage/student/'.$student->profile) }}" width="150px" height="150px"><br><br>
                                <input type="file" name="profile" class="form-control" id="exampleFormControlTextarea1" placeholder=""></input>
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
