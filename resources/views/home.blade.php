@inject('parkingSpaces', 'App\ParkingSpace')
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('parkingSpace.store')}}" method="POST" class="mb-5">
        @csrf
        Neu
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
    <hr>
    @foreach($parkingSpaces::all() as $space)
        <div class="row mt-3">
            <div class="col-12">
                <span>Parkplatzkennung: {{$space->name}}</span>
                <span>Device ID: {{$space->device_id}}</span>
                <span class="{{$space->status == 0 ? 'green' : 'red'}}">Status: {{$space->status}}</span>
            </div>
        </div>
    @endforeach
</div>
@endsection
