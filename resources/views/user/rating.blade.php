@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="font-weight: bold">Tailor Reviews</h1>
@stop

@section('content')
<div class="row">
    @foreach(range(1, 1) as $key => $value)
    @if(!($key % 4) and $key > 0) 
    @endif
    </div>
    <h3>Choose Tailor</h3>
    <br>
    <div class="row">
    @foreach($tailors as $t)           
    <div class="col-md-3 sm-box">
        <div style="border: 3px solid black; border-radius: 15px">
            <center>
              <img class="img-responsive" style="width: 50px; height: 50px" src="{{asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="Lights"><span style="font-weight: bold; font-size:28px ">Stichcery</span>

              <h4 style="font-size: 28px">{{$t['name']}}</h4>
               <button type="button" class="btn btn-info" name="user_id" onclick="reviewDetails('{{ $t['id'] }}')">Review Detail</button>
            <button  class="btn btn-success" type="button" id="review_book" data-book_id="{{ $t['id'] }}"> Add Review</button>
            </center>
        </div>
    <br />
    </div>

    @endforeach

    @endforeach

</div>
         <div class="modal fade reject-bidding" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h3 class="modal-title">Review Description</h3>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('tailor-rating',$t['id'] ) }}" method="POST">

                                @csrf
                                <!-- <input type="hidden" id="rejecttion_ad_id" name="ad_id" value=""  required > -->
                                <input type="hidden" id="book_id" name="tailor_id" value=""  required >
                                <input type="hidden"  name="customer_id" value="{{Auth::user()->id}}"  required >

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="reviewed" name="review" rows="5" required placeholder="Add your review" ></textarea>
                                    </div>
                                </div>
                                <h3>Rate this tailor</h3>
                                <div class="rating" name="rating">

                                  <span><input type="radio" name="rating" id="str5" value="five rating"><label for="str5"></label></span>
                                  <span><input type="radio" name="rating" id="str4" value="four rating"><label for="str4"></label></span>
                                  <span><input type="radio" name="rating" id="str3" value="three rating"><label for="str3"></label></span>
                                  <span><input type="radio" name="rating" id="str2" value="two rating"><label for="str2"></label></span>
                                  <span><input type="radio" name="rating" id="str1" value="one rating"><label for="str1"></label></span>
                              </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <!---------------------------------------------------------------------------------------------------- -->
    <style>
        #append-user-modal{ z-index: 9999 !important; }
    </style>
    <div class="modal fade" id="append-user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tailor Reviews</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div class="row">
                        <div class="col-md-12" id="append-user-data" ></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        
@stop

@section('css')
   <style type="text/css">
      @include('sweetalert::alert')
      .rating {
    float:left;
    width:300px;
}
.rating span { float:right; position:relative; }
.rating span input {
    position:absolute;
    top:0px;
    left:0px;
    opacity:0;
}
.rating span label {
    display:inline-block;
    width:30px;
    height:30px;
    text-align:center;
    color:#FFF;
    background:#ccc;
    font-size:30px;
    margin-right:2px;
    line-height:30px;
    border-radius:50%;
    -webkit-border-radius:50%;
}
.rating span:hover ~ span label,
.rating span:hover label,
.rating span.checked label,
.rating span.checked ~ span label {
    background:#F90;
    color:#FFF;
}
  </style>  
@stop

@section('js')

<script src="{{asset('js/axios.min.js')}}"></script>
<script type="text/javascript">
      $(document).ready(function (){

          $("button#review_book").on('click', function(){

              $('#book_id').val( $(this).data('book_id') );
              // $('#rejecttion_ad_id').val( $(this).data('ad_id') );

              $("#reviewed").val("");

              $('.reject-bidding').modal('show');
          });

      });

      $(document).ready(function (){

          $("button#review_detail").on('click', function(){

              $('#review_id').val( $(this).data('review_id') );
              // $('#rejecttion_ad_id').val( $(this).data('ad_id') );
              $('.review-detail').modal('show');
          });

      });      

      $(document).ready(function(){
    // Check Radio-box
    $(".rating input:radio").attr("checked", false);

    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('input:radio').change(
      function(){
        var userRating = this.value;
        alert(userRating);
    }); 
});    
   function reviewDetails (id)
{
     let url = "/review/"+id+"/detail"
    axios.get(url).then(function (response) {
        console.log(response)
        if(response.data){
            $("#append-user-data").html(response.data);
            $("#append-user-modal").modal("show");
        }

    })
}    
</script>

@stop