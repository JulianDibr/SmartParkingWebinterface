@inject('parkingSpaces', 'App\ParkingSpace')

@extends('layouts.app')

@section('content')
    <h1 class="text-center">Übersicht</h1>

    <div class="row my-5">
        @foreach($parkingSpaces::all() as $space)
            <div class="col-3">
                <div class="row mx-0 @if($space->status == 0) border-free @elseif($space->status == 1) border-occupied @elseif($space->status == 2) border-other @endif">
                    <div class="col-10">
                        <a class="div-link" href="{{route('parkingSpace.edit', $space->id)}}">
                            <div class="space-card p-3">
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
                        </a>
                    </div>
                    <div class="form-container col-2 text-center pt-3 px-0">
                        <button class="btn col-2 my-auto" onclick="$(this).parent().find('#delete-parkingspace').submit()"><i class="fas fa-minus-circle"></i>
                        </button>
                        <form id="delete-parkingspace" action="{{route('parkingSpace.destroy', $space->id)}}" class="d-none" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
