@inject('days', 'App\Day')

@extends('layouts.app')

@section('content')
    <h1 class="text-center">Einstellungen</h1>
    <form action="{{route('parkingSpace.store')}}" method="POST" class="my-5">
        @csrf
        <div class="row">
            <div class="col-6 offset-3 form-group text-center">
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

    <form action="{{route('settings.update', Auth::user()->settings)}}" method="POST" class="my-5 py-5">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6 offset-3 form-group text-center mb-0">
                <h2>Maximale Standdauer</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-5 form-group">
                <input class="form-control time-input text-center" type="text" name="max_parkingtime" placeholder="HH:MM"
                       value="{{$settings->max_parkingtime}}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 form-group text-center mb-0 mt-2">
                <h2>Messdistanz festlegen</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-5 form-group">
                <input class="form-control text-center" type="text" name="meassure_distance" placeholder="" value="{{$settings->meassure_distance}}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 text-center">
                <button type="submit" class="btn submit-btn">Einstellungen speichern</button>
            </div>
        </div>
    </form>

    <form action="{{route('settings.updateTimes', 1)}}" method="POST" class="my-5">
        @csrf
        <div class="row">
            <div class="col-6 offset-3 form-group text-center mb-0">
                <h2>Öffnungszeiten</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-3 form-group">
                <input class="form-control time-input text-center" type="text" name="open_time" placeholder="HH:MM"
                       value="{{$opening_times->open_time ?? ''}}">
            </div>
            <div class="col-2 text-center">bis</div>
            <div class="col-2 form-group">
                <input class="form-control time-input text-center" type="text" name="close_time" placeholder="HH:MM"
                       value="{{$opening_times->close_time ?? ''}}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 form-group">
                <select name="days[]" id="days" class="selectpicker w-100" multiple title="Noch keine Tage ausgewählt">
                    @foreach($days::all() as $day)
                        <option value="{{$day->id}}" {{!empty($opening_times->days) ? ($opening_times->days->contains($day->id) ? 'selected' : '') : '' }}>{{$day->name}}</option>
                    @endforeach
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
