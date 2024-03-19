<!-- profile.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        @if($editMode)
                            <!-- Edit Profile Form -->
                            <form method="POST" action="{{ route('profile.update', $profile) }}">
                                @csrf
                                @method('PUT')

                                <!-- Display input fields for editMode profile -->
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname', $profile->firstname) }}" required>
                                </div>                                
                                
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname', $profile->lastname) }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">E-mail address</label>
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $profile->email) }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $profile->phone) }}" required>
                                </div>

                                <!-- Other input fields for editMode profile -->

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        @else
                            <!-- Show Profile Information -->
                            <p><strong>Name:</strong> {{ $profile->firstname }} {{ $profile->lastname }}</p>
                            <p><strong>Email address:</strong> {{ $profile->email }}</p>
                            <p><strong>Phone:</strong> {{ $profile->phone }}</p>
                            <!-- Display other profile information -->
                            <!-- Example: Email, Phone, etc. -->

                            <!-- Button to switch to edit mode -->
                            <a href="{{ route('profile.edit', $profile) }}" class="btn btn-primary">Edit Profile</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
