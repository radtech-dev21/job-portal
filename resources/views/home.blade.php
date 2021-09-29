<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Jobs') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" id="search_txt">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                    </div>
                    <div class="list-group list-group-checkable mt-5" id="list_group_main_div"></div>
                    <script type="text/template" id="search_template">
                        <% if(results.length !== 0) { %>
                            <% _.each(results, function(result, key){%>
                                <label class="list-group-item py-3" for="listGroupCheckableRadios1">
                                First radio
                                    <span class="d-block small opacity-50">With support text underneath to add more detail</span>
                                </label>
                            <% }); %>
                        <% } else { %>
                            <div class="alert alert-light" role="alert">
                              No result found
                            </div>
                        <% } %>
                    </script>
                </div>
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
