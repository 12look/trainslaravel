<div class="row">
	<div class="col-md-12">
		<form action="" class="form-horizontal" method="GET">
		<div class="form-group">
          <div class="col-lg-2">
            <input type="text" class="form-control" name="train_id" placeholder="Номер поезда">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-2">
            <input type="text" class="form-control" name="wagon_id" placeholder="Номер вагона">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-2">
            <input type="text" class="form-control" name="place_id" placeholder="Номер места">
          </div>
        </div>
<!--         <div class="datepicker form-group">
	        <div class="col-lg-12">
	         	<input data-date-format="YYYY-MM-DD HH:mm" data-date-useseconds="false" class="form-control column-filter" type="text" placeholder="От" name="from" data-type="text">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	        </div>
		</div>
		<div class="datepicker form-group">
	        <div class="col-lg-12">
	         	<input data-date-format="DD.MM.YYYY HH:mm" data-date-useseconds="false" class="form-control column-filter" type="text" placeholder="До" name="to" data-type="text">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
	        </div>
		</div> -->
        <div class="form-group">
          <div class="col-lg-1">
            <button type="submit" class="btn btn-primary">Искать</button>
          </div>
        </div>
		</form>
	</div>
	<div class="col-md-12">
		{!! $display !!}
	</div>
</div>