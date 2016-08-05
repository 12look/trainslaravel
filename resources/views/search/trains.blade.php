@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    @if (isset($trains) and !$trains->isEmpty())
    <form action="{{ url('search/places') }}" method="POST">
    {!! csrf_field() !!}
      <table class="table">
        <thead>
          <tr>
            <th>№ поезда</th>
            <th>Откуда - куда</th>
            <th>Дата отправления</th>
            <th>Дата прибытия</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($trains as $train)
          <tr>
            <td><input type="radio" name="train" value="{{ $train->id }}"> {{ $train->number }}</td>
            <td>{{ $from.'-'.$to }}</td>
            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $train->dispatch_time)->format('d.m.Y H:i') }}</td>
            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $train->arrival_time)->format('d.m.Y H:i') }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="form-group">
          <button type="submit" class="btn btn-primary">Далее</button>
      </div>
    </form>
    @else
      <h3>По вашему запросу билетов не найдено.</h3>
    @endif
    </div>
  </div>
</div>
@endsection