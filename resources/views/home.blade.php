<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>I want a Job</h3>
            <div class="form-group">
                <img class="eh_img" src="{{ asset('img/iam_candidate.png') }}">
            </div>
            <div class="form-group">
                <a href="employee" class="btnSubmit">Employee</a>
            </div>
        </div>
        <div class="col-md-6 login-form-2">
            <div class="login-logo">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            </div>
            <h3>I want to Hire</h3>
            <div class="form-group">
               <img class="eh_img" src="{{ asset('img/iam_employer.png') }}">
            </div>
            <div class="form-group">
                <a href="hirer" class="btnSubmit">Hirer</a>
            </div>
        </form>
    </div>
</div>
<<<<<<< HEAD
<script type="text/javascript">
$(document).ready(function() {
    getsearchData();
    function getsearchData(){
        var search_txt = $('#search_txt').val();
        $.get(base_url+'/search',{search_txt:search_txt}, function(response) {
          let results = response.results;
          $('#list_group_main_div').html('');
          let search_template = _.template($('#search_template').html());
          $("#list_group_main_div").html(search_template({results:results}));
        }).done(function() {
        });
    }
    $('#search_txt').keyup(function(){
        getsearchData();
    });
});
</script>
@endsection
=======
</div>
>>>>>>> bcf664d5df084ba4affd01791d830f414d45eddb
