@extends('layouts.app')

@section('content')
<div class="container">
  <div class="content">
    <h3>Поиск билетов</h3>
    <form action="{{ url('search') }}" class="form-horizontal" method="POST">
    {!! csrf_field() !!}
      <fieldset>
        <div class="form-group">
          <div class="col-lg-8">
            <input type="text" class="form-control" id="inputFrom" name="from" placeholder="Откуда">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-8">
            <input type="text" class="form-control" id="inputTo" name="to" placeholder="Куда">
          </div>
        </div>
        <div class="form-group">
          <div class='input-group date col-lg-2' id='datetimepicker1'>
            <input type='text' class="form-control" id="inputWhen" name="when" placeholder="Когда">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-1">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Искать</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/locales.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
$(function () {
    $('#datetimepicker1').datetimepicker({format: "YYYY-MM-DD", locale: moment.locale("ru"), minDate: moment()});
});
</script>
@stop