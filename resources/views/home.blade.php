@inject('parkingSpaces', 'App\ParkingSpace')

@extends('layouts.app')

@section('content')
    <h1 class="text-center">Übersicht</h1>

    <div class="row my-5">
        @foreach($parkingSpaces::all() as $space)
            <div class="col-3">
                @if($space->status == 0)
                    <div class="space-card p-3 border-free">
                @elseif($space->status == 1)
                    <div class="space-card p-3 border-occupied">
                @elseif($space->status == 2)
                    <div class="space-card p-3 border-other">
                @endif
                        <div class="row">
                            <span class="col-12">Parkplatzkennung: {{$space->name}}</span>
                        </div>
                        <div class="row">
                            <span class="col-12">Device ID: {{$space->device_id}}</span>
                        </div>
                        <div class="row">
                            <span class="col-12 green {{$space->status == 0 ? '' : 'd-none'}}">Status: frei</span>
                            <span class="col-12 red {{$space->status == 1 ? '' : 'd-none'}}">Status: belegt</span>
                            <span class="col-12 orange {{$space->status == 2 ? '' : 'd-none'}}">Status: Parkdauer überschritten</span>
                        </div>
                        <div class="row">
                            @if($space->status == 1)
                                <span class="col-12">Parkdauer: {{$space->currentParkdauer()}}</span>
                            @elseif($space->status == 2)
                                <span class="col-12">Parkdauer: {{$space->currentParkdauer()}}</span>
                            @endif
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
@endsection
