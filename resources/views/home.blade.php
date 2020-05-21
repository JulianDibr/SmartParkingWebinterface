@inject('parkingSpaces', 'App\ParkingSpace')

@extends('layouts.app')

@section('content')
    <h1 class="text-center">Übersicht</h1>

    <div class="row my-5">
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
