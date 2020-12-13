@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- <h1>Dashboard</h1> -->
@stop

@section('content')

 <div class="col-md-12  col-sm-6 col-xs-12">
         <!--  Form -->
         <div class="form-grid">
            <div class="heading-panel">
               <h3 class="main-title text-left">Create Schedule</h3>
            </div>
            <form method="post" action="{{ route('schedule.create') }}">
               @csrf
               <div class="row">
                  <!-- category_type --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Select Train</label>
                        <select class="train-select form-control"  name="train_id" required>
                        <option disabled="disabled" selected="selected">Select Train</option>
                          @foreach($train as $c)
                              <option value="{{$c['id']}}" >
                                  {{$c['name']}}
                              </option>
                          @endforeach
                        </select>
                     </div>
                  </div>
                  <!-- ad_link  --verified -->
                  
                 
               </div>
            <div class="box">   
               <div class="row">
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>City</label>
                        <input readonly name="city_id_1"  value="{{ $city['0']['name']}}" class="form-control" type="text" required>

                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Arrival</label>
                        <input name="arrival_1"  class="form-control" type="time" required>
                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Departure</label>
                        <input name="departure_1"  class="form-control" type="time" required>
                     </div>
                  </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>City</label>
                        <input readonly name="city_id_2"  value="{{ $city['1']['name']}}" class="form-control" type="text" required>
                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Arrival</label>
                        <input name="arrival_2"  class="form-control" type="time" required>
                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Departure</label>
                        <input name="departure_2"  class="form-control" type="time" required>
                     </div>
                  </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>City</label>
                        <input readonly name="city_id_3" placeholder="description" value="{{ $city['2']['name']}}" class="form-control" type="text" required>
                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Arrival</label>
                        <input name="arrival_3"  class="form-control" type="time" required>
                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Departure</label>
                        <input name="departure_3"  class="form-control" type="time" required>
                     </div>
                  </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>City</label>
                        <input readonly name="city_id_4" placeholder="description" value="{{ $city['3']['name']}}" class="form-control" type="text" required>
                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Arrival</label>
                        <input name="arrival_4"  class="form-control" type="time" required>
                     </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Departure</label>
                        <input name="departure_4"  class="form-control" type="time" required>
                     </div>
                  </div>
                  </div>
               </div>
            </div>   


               <button class="btn btn-success">Create</button>
            </form>
         </div>
         <!-- Form -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
    $(".box").hide();
$(function() {
    $(".train-select").on('change', function () {
       $(".box").show();
    })
});   
</script>
@stop