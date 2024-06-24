@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{ route('admin.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name" value="{{ $admin->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlTextarea1" placeholder="email" value="{{ $admin->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleFormControlTextarea1" placeholder="phone" value="{{ $admin->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{ $admin->gender == 1 ? 'checked':'' }}>
                                    <label class="form-check-label" for="male">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="0" {{ $admin->gender == 0 ? 'checked':'' }}>
                                    <label class="form-check-label" for="female">
                                      Female
                                    </label>
                                  </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" id="exampleFormControlTextarea1" value="{{ $admin->date_of_birth }}"></input>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleFormControlTextarea1" placeholder="address" value="{{ $admin->address }}"></input>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Profile</label><br>
                                <img src="{{ asset('storage/admin/'.$admin->profile) }}" width="150px" height="150px"><br><br>
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
