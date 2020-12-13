@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

 <div class="col-md-12  col-sm-6 col-xs-12">
         <!--  Form -->
	 <div class="form-grid">
	    <div class="heading-panel">
	       <h3 class="main-title text-left">Create Order</h3>
	    </div>
	    <form method="post" action="{{ route('orders.store') }}">
	       @csrf
	     	<button style=" float: right;margin-top: -30px" type="submit" class="btn btn-success">Place Order</button>
	       	<div class="row">	          	
	          	<input name="product_id"  type="hidden" value="{{$id}}">
                <input name="customer_id" type="hidden" value="{{Auth::user()->id}}">

                <input type="hidden" value="{{$start_date}}" name="start_date">
                <input type="hidden" value="{{$end_date}}" name="end_date">
				<input name="price" type="hidden" value="300">
	          	
	          	<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
		            <div class="form-group">
		                <label>Lenghth</label>
		                <input name="length" placeholder="lenghth in cm" class="form-control" type="number" required>
		            </div>
	          	</div>
	          	<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label>Size</label>
                        <select id="purpose" name="size" class="form-control" required>
                        <option value="XS"> XS</option>
                        <option value="S"> S</option>
                        <option value="M"> M</option>
                        <option value="L"> L</option>
                        <option value="XL"> XL</option>
                        <option value="Custom">Other</option>
                      </select>
                      
                      
					    <!-- <input class="form-control editOption" style="display:none;"></input> -->
					 </div>
                </div>
	         
	      	</div>
		      	<div class="row">
<!-- 		          	<div  class="col-md-3">
		          		<div style="display: none;" id='business'>
		          			<label>Shirt Size</label>
		          			 <input class="form-control" type='text' name='business' size="50" />
		          			
		          		</div>
		          	</div> -->
		          	<div  class="col-md-3">
		          		<div style="display: none;" id='business1'>
		          			<label>Bust</label>
		          			 <input class="form-control" type='number' name='bust' size="50" />
		          			
		          		</div>
		          	</div>
		          	<div  class="col-md-3">
		          		<div style="display: none;" id='business2'>
		          			<label>Shoulder Width</label>
		          			 <input class="form-control" type='number' name='shoulder_width' size="50" />
		          			
		          		</div>
		          	</div>
		          	<div  class="col-md-3">
		          		<div style="display: none;" id='business3'>
		          			<label>Hip</label>
		          			 <input class="form-control" type='number' name='hip' size="50" />
		          			
		          		</div>
		          	</div>
		          	<div  class="col-md-3">
		          		<div style="display: none;" id='business4'>
		          			<label>Hem</label>
		          			 <input class="form-control" type='number' name='hem' size="50" />
		          			
		          		</div>
		          	</div>
		          	<div  class="col-md-3">
		          		<div style="display: none;" id='business5'>
		          			<label>Arm Hole</label>
		          			 <input class="form-control" type='number' name='armhole' size="50" />
		          			
		          		</div>
		          	</div>
		          	<div  class="col-md-3">
		          		<div style="display: none;" id='business6'>
		          			<label>Sleeve Length</label>
		          			 <input class="form-control" type='number' name='sleeve_length' size="50" />
		          			
		          		</div>
		          	</div>
		          	
	                      	
	            </div>

	            <br />

	        <div style="margin-top: 20px"> 
	            	
	      	    <div class="row" >
			        @foreach(range(1, 1) as $key => $value)
			        @if(!($key % 4) and $key > 0) 
			        @endif
			    </div>
			   
			    <br>
			    <div class="row">
			    @foreach($tailor as $t)           
			    <div class="col-md-3 sm-box">
			        <div style="border: 3px solid black; border-radius: 15px">
				        <center>
				          <img class="img-responsive" style="width: 50px; height: 50px" src="{{asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="Lights"><span style="font-weight: bold; font-size:28px ">Stichcery</span>

				          <h4 style="font-size: 28px">{{$t['name']}}</h4>
				          <div style="background-color: lightblue;border-radius: 15px">
				          	<span style="font-size: 22px">Choose</span>&nbsp;<input style="font-size: " type="radio" name="tailor_id" value="{{$t['id']}}" required>
				          </div>
				        </center>
			        </div>
			     <br />
			    </div>

			        @endforeach

			        @endforeach

			    </div>
			</div>
	    </form>
	 </div>         <!-- Form -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
    <style type="text/css">
    #test{
    width: 100%;
    height: 30px;
}
option {
    height: 30px;
    line-height: 30px;
}

.editOption{
    width: 90%;
    height: 24px;
    position: relative;
    top: -30px
    
}	
    </style>
@stop

@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == 'Custom')
      {
        $("#business").show();
        $("#business1").show();
        $("#business2").show();
        $("#business3").show();
        $("#business4").show();
        $("#business5").show();
        $("#business6").show();
      }
      else
      {
        $("#business").hide();
        $("#business1").hide();
        $("#business2").hide();
        $("#business3").hide();
        $("#business4").hide();
        $("#business5").hide();
        $("#business6").hide();
      }
    });
});


</script>
@stop