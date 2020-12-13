<div class="row">
	<h3>{{$user}}</h3>
	<div style="border: 2px solid darkblue" class="col-md-12">
		@if($users == '[]')
            	<h3 style="color: red">No reviews added against this tailor	</h3>
         
         @else   	
		<table class="table table-striped">
			<thead>
				<th>Customer Name</th>
				<th>Rating</th>
				<th>Reviews</th>
			</thead>
            <tbody>
            @foreach($users as $user)	
              <tr>
               	<td>{{App\Helpers\Helper::userIdToName($user->customer_id)}}</td>
                <td>{{$user->rating}}</td>
                <td>{{$user->review}}</td>
              </tr>                
            @endforeach              
            </tbody>
        </table>
        @endif	  		
	</div>		
</div>

