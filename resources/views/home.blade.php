@inject('parkingSpaces', 'App\ParkingSpace')

@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        @foreach($parkingSpaces::all() as $space)
            <div class="col-3">
                <div class="space-card p-3 {{$space->status == 0 ? 'border-free' : 'border-occupied'}}">
                    <div class="row">
                        <span class="col-12">Parkplatzkennung: {{$space->name}}</span>
                    </div>
                    <div class="row">
                        <span class="col-12">Device ID: {{$space->device_id}}</span>
                    </div>
                    <div class="row">
                        <span class="col-12 {{$space->status == 0 ? 'green' : 'red'}}">Status:  {{$space->status == 0 ? 'frei' : 'belegt'}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
