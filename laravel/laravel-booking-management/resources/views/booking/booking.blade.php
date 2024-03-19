@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1>{{ $room->room_type }}</h1>
                    <p>{{ $room->description }}</p>
                    <p>Price: ${{ $room->price }}</p>
                    <img src="{{ asset($room->image_path) }}" alt="" class="w-75">
                </div>
                <div class="col-6">
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <div id="calendar" class="w-100 mx-auto"></div>

                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <input type="hidden" name="start_date" id="start_date">
                            <input type="hidden" name="end_date" id="end_date">

                            @error('start_date')
                                <div class="error">{{ $message }}</div>
                            @enderror

                            @error('end_date')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex flex-wrap">
                            <div class="form-group w-50 px-2 py-3">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                    value="{{ old('first_name') ? old('first_name') : $user->firstname }}">
                                @error('first_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50 px-2 py-3">
                                <label for="last-name">Last name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                    value="{{ old('last_name') ? old('last_name') : $user->lastname }}">
                                @error('last_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50 px-2 py-3">
                                <label for="email">E-mail address</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') ? old('email') : $user->email }}">
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50 px-2 py-3">
                                <label for="phone">Phone number</label>
                                <input type="phone" name="phone" id="phone" class="form-control"
                                    value="{{ old('phone') ? old('phone') : $user->phone }}">
                                @error('phone')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
