<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('js/underscore.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/custom/search.js') }}"></script>
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
                                      <input type="text" class="form-control" placeholder="Position *" id="position" />
                                    </div>
                                    <div class="col">
                                        <div id="sinolo" class="form-control">
                                          <button type="button" id="dec" class="btn btn-info pull-left">-</button>
                                          <input type="text" id="experience" name="experience" placeholder="Experience(in years) *" value="{{old('experience')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                          <button type="button" id="inc" class="btn btn-info pull-right">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <select multiple id="locations" class="selectpicker w-100" data-style="bg-white px-4 py-3 shadow-sm " title="Select Location *">
                                            <option value="Pune">Pune</option>
                                            <option value="Noida">Noida</option>
                                            <option value="Mumbai">Mumbai</option>
                                            <option value="Trichy">Trichy</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Gurgaon">Gurgaon</option>
                                            <option value="Chennai">Chennai</option>
                                            <option value="Bangalore">Bangalore</option>
                                            <option value="Ahmedabad">Ahmedabad</option>
                                            <option value="Hyderabad">Hyderabad</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="West Bengal">West Bengal</option>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btnRegister" id="search_btn">Search</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btnRegister" id="search_btn">Clear Search</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group list-group-checkable mt-5" id="list_group_main_div"></div>
                <script type="text/template" id="search_template">
                    
                        <% if(results.length !== 0) { %>
                            <% _.each(results, function(result, key){%>
                            <div class="row mt-4">
                               <div class="col-8">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <img src="/img/iam_employer.png">
                                            <% if(result.request_status === 1) { %>
                                            <span><a href="/employee-profile/<%= result.id %>" target="_blank"><strong class="emp-name"><%= result.name %></strong></a></span>
                                            <% } 
                                            else if(result.request_status === 3) { %>
                                            <span><%= result.name %></span>
                                            <% } 
                                            else { %>
                                            Persons <%= key+1 %>
                                            <% } %>
                                        </li>
                                        <li class="list-group-item">
                                            <span><strong>Skills : </strong></span>
                                            <%= result.skill_text %>
                                        </li>
                                        <li class="list-group-item">
                                            <span><strong>Experience : </strong></span>
                                            <%= result.experience+' yr(s)' %>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-4 connect-btn">
                                    <div class=""></div>
                                    <% if( result.request_status === 4 || result.request_status === 2) { %>
                                    <button type="button" class="btn btn-primary" onclick="sendConnectionRequest(<%= result.id %>, this);">Connect</button>
                                    <% } else if(result.request_status == 0){ %>
                                    <button type="button" class="btn btn-info" disabled="disabled">Request Pending</button>
                                    <% } %>
                                </div>
                            </div>
                            <% }); %>
                        <% } else { %>
                            <div class="row form-group alert alert-light" role="alert">
                              No result found
                            </div>
                        <% } %>
                    
                </script>
            </div>
        </div>
    </div>
</div>
@else
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>I want a Job</h3>
            <div class="form-group">
                <img class="eh_img" src="{{ asset('img/iam_candidate.png') }}">
            </div>
            <div class="form-group">
                <a href="{{url('register?role=employee')}}" class="btnSubmit">Employee</a>
            </div>
        </div>
        <div class="col-md-6 login-form-2">
            <div class="login-logo">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png"/>
            </div>
            <h3>I want to Hire</h3>
            <div class="form-group">
               <img class="eh_img" src="{{ asset('img/iam_employer.png') }}">
            </div>
            <div class="form-group">
                <a href="{{url('register?role=hirer')}}" class="btnSubmit">Hirer</a>
            </div>
        </div>
    </div>
</div>
@endif

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
});
</script>

@endsection
