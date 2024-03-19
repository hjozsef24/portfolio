@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h1>{{ $room->room_type }}</h1>
                        <p>{{ $room->description }}</p>
                        <p>Price: ${{ $room->price }}</p>

                        @if (Auth::check())
                           <a href="{{ route('booking.show', [$room->room_number]) }}" class="btn btn-primary">Book this room</a>
                        @else
                            <a  class="btn btn-outline-primary" href="{{ route('login') }}">Please login to book this room</a>
                        @endif
                    </div>
                    <div class="col-6">
                        <img src="{{ asset($room->image_path) }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
