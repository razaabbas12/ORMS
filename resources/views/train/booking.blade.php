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
               <h3 class="main-title text-left">Reservation</h3>
            </div>
            <form method="post" action="{{ route('booking.create') }}">
               @csrf
               <div class="row">
                  <!-- category_type --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Select Train</label>
                        <select onchange="updateTotalPrice()" id="train" class="train-select form-control"  name="train_id" required>
                        <option disabled="disabled" selected="selected">Select Train</option>
                          @foreach($train as $c)
                              <option value="{{$c['id']}}" >
                                  {{$c['name']}}
                              </option>
                          @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>From</label>
                        <select onchange="updateTotalPrice()" id="from1" class="form-control"  name="from" required>
                        <option disabled="disabled" selected="selected">From</option>
                          @foreach($city as $c)
                              <option value="{{$c['id']}}" >
                                  {{$c['name']}}
                              </option>
                          @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- category_type --verified -->
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label> To</label>
                        <select onchange="updateTotalPrice()"  id="from2" class="form-control"  name="to" required>
                        <option disabled="disabled" selected="selected">To</option>
                          @foreach($city as $c)
                              <option value="{{$c['id']}}" >
                                  {{$c['name']}}
                              </option>
                          @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Fare</label>
                        <input name="fare" id="fare" class="form-control" readonly="readonly">
                     </div>
                  </div>
               </div>
 
               <div class="row">
                  <div class="col-md-4">
                     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                     <div class="form-group">
                        <label>Book Seats</label>
                        <input name="book_seats" class="form-control" type="number" required>

                     </div>
                  </div>
                  </div>
               </div>  


               <button class="btn btn-success">Book Reservation</button>
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
function updateTotalPrice(){

            let  quantity       = $('#from1').val();
            let  discount       = $('#from2').val();
            let  train       = $('#train').val();
            var fare;

            if(quantity && discount && train)
            {
               if(train == 1)
               {
                   fare = 800;
               }
               else if(train == 2)
               {
                   fare = 1000;
               }
               else if(train == 3)
               {
                   fare = 100;
               }

               let data= quantity - discount ;
               
               let temp =Math.abs(data);

               let calculated_data = temp * fare;

                $('#fare').val(calculated_data);

            }

        }
</script>
@stop