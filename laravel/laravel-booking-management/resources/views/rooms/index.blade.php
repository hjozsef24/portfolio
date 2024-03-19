@extends('layouts.app')
@section('content')
    @php
        $roomTypes = ['capsule', 'standard', 'deluxe'];
    @endphp
    <main>
        <section class="mt-2 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('rooms.index') }}" method="GET">
                            <div class="d-flex justify-content-between">
                                <div class="input-group me-3 flex-column">
                                    <label for="room_type">Room Type:</label>
                                    <select name="room_type" id="room_type" class="form-control w-100 custom-select">
                                        <option value="">All</option>

                                        @foreach ($roomTypes as $type)
                                            <option value="{{ $type }}"
                                                {{ Request::get('room_type') == $type ? 'selected' : '' }}>
                                                {{ ucfirst($type) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group me-3 flex-column">
                                    <label for="min_price">Min Price:</label>
                                    <input type="number" name="min_price" id="min_price" class="form-control  w-100"
                                        value="{{ Request::get('min_price') }}">
                                </div>

                                <div class="input-group me-3 flex-column">
                                    <label for="max_price">Max Price:</label>
                                    <input type="number" name="max_price" id="max_price" class="form-control  w-100"
                                        value="{{ Request::get('max_price') }}">
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Filter</button>
                            </div>
                        </form>

                        <a class="btn btn-secondary me-3 mt-2" href="{{ route('rooms.index') }}">Reset filters</a>

                    </div>
                </div>
            </div>
        </section>

        @foreach ($rooms as $i => $room)
            <x-room-card :room="$room" :isEven="$loop->iteration % 2 == 0" />
        @endforeach
    </main>
@endsection
