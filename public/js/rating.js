<script type="text/javascript">
      $(document).ready(function (){

          $("button#review_book").on('click', function(){

              $('#book_id').val( $(this).data('book_id') );
              // $('#rejecttion_ad_id').val( $(this).data('ad_id') );

              $("#reviewed").val("");

              $('.reject-bidding').modal('show');
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
</script>