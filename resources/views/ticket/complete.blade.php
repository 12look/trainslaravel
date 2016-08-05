@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    @if (!isset($validator))
      <h3>Билет успешно забронирован</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Номер поезда: {{ $ticket->place->wagon->train->number }}</p>
          <p>Номер вагона: {{ $ticket->place->wagon->number }}</p>
          <p>Номер места: {{ $ticket->place->number }}</p>
          <p>Дата бронирования: {{ date('d-m-Y H:i', strtotime($ticket->created_at)) }}</p>
        </div>
      </div>
    @else
      <h3>По вашему запросу билетов не найдено.</h3>
    @endif
    </div>
  </div>
</div>
@endsection