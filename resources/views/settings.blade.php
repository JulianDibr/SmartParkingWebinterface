@extends('layouts.app')

@section('content')
    <h1 class="text-center">Einstellungen</h1>

    <form action="{{route('parkingSpace.store')}}" method="POST" class="my-5">
        @csrf
        <div class="row">
            <div class="col-6 offset-3 form-group">
                <h2>Neuen Parkplatz erstellen</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 form-group">
                <input class="form-control" type="text" name="name" placeholder="Parkplatzkennung">
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 form-group">
                <input class="form-control" type="text" name="device_id" placeholder="Vergebenes Gerät (ID)">
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 form-group">
                <input class="form-control" type="text" name="group" placeholder="Parkplatzgruppe">
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 text-right">
                <button type="submit" class="btn submit-btn">Neuen Parkplatz anlegen</button>
            </div>
        </div>
    </form>
@endsection
