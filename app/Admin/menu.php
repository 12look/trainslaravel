<?php

Admin::menu(\App\Train::class)->label('Поезда');
Admin::menu(\App\Wagon::class)->label('Вагоны');
Admin::menu(\App\Place::class)->label('Места');
Admin::menu(\App\Station::class)->label('Станции');
Admin::menu()->url('tik')->label('Билеты');