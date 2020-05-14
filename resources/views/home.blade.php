@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('parkingSpace.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <input type="text" name="name" placeholder="Parkplatzkennung">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="text" name="device_id" placeholder="Vergebenes Gerät (ID)">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button>Create new ParkingSpace</button>
            </div>
        </div>
    </form>
</div>
@endsection
