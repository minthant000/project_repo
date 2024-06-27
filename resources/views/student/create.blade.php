@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" id="password" placeholder="password">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="phone">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="1" checked>
                                    <label class="form-check-label" for="male">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="0" checked>
                                    <label class="form-check-label" for="female">
                                      Female
                                    </label>
                                  </div>
                            </div>
                            {{-- <div class="mb-3">
                                <h5>Skills</h5>
                                <div class="form-check">
                                    <input class="form-check-input" name="skills[]" type="checkbox" value="php" id="php">
                                    <label class="form-check-label" for="php">
                                      PHP
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" name="skills[]" type="checkbox" value="java" id="java">
                                    <label class="form-check-label" for="java">
                                      Java
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" name="skills[]" type="checkbox" value="react" id="react">
                                    <label class="form-check-label" for="react">
                                      React
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" name="skills[]" type="checkbox" value="web_development" id="web_development">
                                    <label class="form-check-label" for="web_development">
                                      web development
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" name="skills[]" type="checkbox" value="server" id="server">
                                    <label class="form-check-label" for="server">
                                      Server
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" name="skills[]" type="checkbox" value="aws" id="aws">
                                    <label class="form-check-label" for="aws">
                                      AWS
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" name="skills[]" type="checkbox" value="web_design" id="web_design">
                                    <label class="form-check-label" for="web_design">
                                      web design
                                    </label>
                                  </div>
                            </div> --}}
                            {{-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="is_fullstack" type="checkbox" value="" id="is_fullstack">
                                    <label class="form-check-label" for="is_fullstack">
                                      Fullstack Developer
                                    </label>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder=""></input>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="address"></input>
                            </div>
                            <div class="mb-3">
                                <label for="profile" class="form-label">Profile</label>
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
