<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">{{ __('Jobs') }}</div>
            <div class="card-body">
                <div class="input-group">
                    <div class="input-group-append">
                        <div class="row register-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                      <input type="text" class="form-control" placeholder="Position *" id="position"/>
                                    </div>
                                    <div class="col">
                                        <div id="sinolo" class="form-control">
                                          <button type="button" id="dec" class="btn btn-info pull-left">-</button>
                                          <input type="text" id="experience" placeholder="Experience(in years) *" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                          <button type="button" id="inc" class="btn btn-info pull-right">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <select multiple id="locations" class="selectpicker w-100" data-style="bg-white px-4 py-3 shadow-sm " title="Select Location *">
                                            @foreach(locations() as $location)
                                                <option value="{{$location}}">{{$location}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select multiple id="skills" class="selectpicker w-100" data-style="bg-white px-4 py-3 shadow-sm " title="Select Skills *">
                                            <option value="PHP">PHP</option>
                                            <option value="JQuery">JQuery</option>
                                            <option value="Javascript">Javascript</option>
                                            <option value="Ajax">Ajax</option>
                                            <option value="HTML">HTML</option>
                                            <option value="CSS">CSS</option>
                                            <option value="Laravel">Laravel</option>
                                            <option value="Vue Js">Vue Js</option>
                                            <option value="Mongo DB">Mongo DB</option>
                                            <option value="MySQL">MySQL</option>
                                            <option value="Firebase">Firebase</option>
                                            <option value="Networking">Networking</option>
                                            <option value="Shopify">Shopify</option>
                                            <option value="Worpress">Worpress</option>
                                            <option value="Codeigniter">Codeigniter</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btnRegister" id="search_btn">Search</button>
                            <button type="button" class="btnRegister" id="clear_search_btn">Clear Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group list-group-checkable mt-5" id="list_group_main_div"></div>
                <script type="text/template" id="search_template">
                    <% if(results.length !== 0) { %>
                        <% _.each(results, function(result, key){%>
                            <label class="list-group-item py-3 mt-3" for="listGroupCheckableRadios1">
                            Person <%= key+1 %>
                                <span class="d-block small opacity-50">Skills:-<%= result.skill_text %></span>
                                <span class="d-block small opacity-50">Experiance:-<%= result.experience %></span>
                            </label>
                            <div style="display: inline;border-right: 1px solid gray; padding:0 5px;"></div>
                        <% }); %>
                    <% } else { %>
                        <div class="alert alert-light" role="alert">
                          No result found
                        </div>
                    <% } %>
                </script>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    getsearchData();
    function getsearchData(){
        var skills = $('#skills').val();
        var position = $('#position').val();
        var locations = $('#locations').val();
        var experience = $('#experience').val();
        $.get(base_url+'/search',{position:position, skills:skills,experience:experience,locations:locations}, function(response) {
          let results = response.results;
          $('#list_group_main_div').html('');
          let search_template = _.template($('#search_template').html());
          $("#list_group_main_div").html(search_template({results:results}));
        }).done(function() {
        });
    }
    $('#search_btn').click(function(){
        getsearchData();
    });
    $('#clear_search_btn').click(function(){
        $('#skills').val('');
        $('#position').val('');
        $('#locations').val('');
        $('#experience').val('');
        getsearchData();
    });
});
</script>
@endsection
