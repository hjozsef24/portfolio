<section class="mb-5">
    <div class="container">
        <div class="row h-100">
            <div class="col-6 my-auto {{ $isEven ? 'order-1' : 'order-2' }}">
                <h4>{{ $room_type }}</h4>
                <p>{{ $description }}</p>
                <p>Price: ${{ $price }}</p>
                <a href="{{ route('rooms.show', [$room_number]) }}" class="btn btn-primary">View room</a>
            </div>
            <div class="col-6 {{ $isEven ? 'order-2' : 'order-1' }}">
                <img src="{{ asset($image_path) }}" alt="" class="w-100">
            </div>
        </div>
    </div>
</section>
