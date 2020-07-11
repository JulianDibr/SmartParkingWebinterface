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
            <div class="col-6 offset-3 text-center">
                <button type="submit" class="btn submit-btn">Neuen Parkplatz anlegen</button>
            </div>
        </div>
    </form>

    <form action="{{route('settings.updateParkingtime', 1)}}" method="POST" class="my-5">
        @csrf
        <div class="row">
            <div class="col-6 offset-3 form-group">
                <h2>Maximale Standdauer</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-5 form-group">
                <input class="form-control time-input text-center" type="text" name="max_parkingtime" placeholder="HH:MM">
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 text-center">
                <button type="submit" class="btn submit-btn">Standdauer speichern</button>
            </div>
        </div>
    </form>

    <form action="{{route('settings.updateTimes', 1)}}" method="POST" class="my-5">
        @csrf
        <div class="row">
            <div class="col-6 offset-3 form-group">
                <h2>Öffnungszeiten</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-3 form-group">
                <input class="form-control time-input text-center" type="text" name="open_time" placeholder="HH:MM">
            </div>
            <div class="col-2 text-center">bis</div>
            <div class="col-2 form-group">
                <input class="form-control time-input text-center" type="text" name="close_time" placeholder="HH:MM">
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 form-group">
                <select name="days" id="days" class="selectpicker w-100" multiple title="Noch keine Tage ausgewählt">
                    <option value="1">Montag</option>
                    <option value="2">Dienstag</option>
                    <option value="3">Mittwoch</option>
                    <option value="4">Donnerstag</option>
                    <option value="5">Freitag</option>
                    <option value="6">Samstag</option>
                    <option value="7">Sonntag</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 text-center">
                <button type="submit" class="btn submit-btn">Öffnungszeiten speichern</button>
            </div>
        </div>
    </form>
@endsection
