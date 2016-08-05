@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    @if (isset($wagons) and !$wagons->isEmpty())
    <form action="{{ url('ticket/buy') }}" method="POST">
    {!! csrf_field() !!}
      <table class="table">
        <thead>
          <tr>
            <th>№ вагона</th>
            <th>Тип вагона</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($wagons as $wagon)
          <tr>
            <td>{{ $wagon->number }}</td>
            <td>{{ $wagon->type }}</td>
            @foreach ($wagon->places as $place)
              <tr>
                <td><input type="radio" name="place" value="{{ $place->id }}"> Билет №{{ $place->number }}</td>
                <td>Тип: {{ $place->type }}</td>
                <td>Цена: {{ $place->coast }} руб</td>
              </tr>
            @endforeach
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