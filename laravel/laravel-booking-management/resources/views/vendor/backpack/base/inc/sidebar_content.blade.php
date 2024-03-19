{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('admin') }}"><i class="nav-icon la la-question"></i> Admins</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('room') }}"><i class="nav-icon la la-question"></i> Rooms</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('booking') }}"><i class="nav-icon la la-question"></i> Bookings</a></li>