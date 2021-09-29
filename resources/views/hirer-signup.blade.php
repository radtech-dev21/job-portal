<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="container register">
<div class="row">
<div class="col-md-3 register-left">
<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
<h3>Welcome</h3>
<p>You are 30 seconds away from earning your own money!</p>
<input type="submit" name="" value="Login"/><br/>
</div>
<div class="col-md-9 register-right">
<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <form action="save_hirer" method="POST">
        @csrf
        <h3  class="register-heading">Apply as a Hirer</h3>
        <div class="row register-form">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif
            <div class="col-md-12">
                <h5>Job Details</h5>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Position *" value="{{old('position')}}" name="position" />
                    @if ($errors->has('position'))
                        <span class="text-danger">{{ $errors->first('position') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Experience *" value="{{old('experience')}}" name="experience" />
                    @if ($errors->has('experience'))
                        <span class="text-danger">{{ $errors->first('experience') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Location *" value="{{old('location')}}" name="location" />
                    @if ($errors->has('location'))
                        <span class="text-danger">{{ $errors->first('location') }}</span>
                    @endif
                </div>
                <div class="form-group">
                        <select multiple name="skills[]" id="skills" class="{{ $errors->has('skills') ? ' is-invalid' : '' }} selectpicker w-100" data-style="bg-white rounded-pill px-4 py-3 shadow-sm ">
                        <option value="PHP" <?php echo (old('skills') && in_array('PHP', old('skills'))) ? "selected" : "" ?>>PHP</option>
                        <option value="JQuery" <?php echo (old('skills') && in_array('JQuery', old('skills'))) ? "selected" : "" ?>>JQuery</option>
                        <option value="Javascript" <?php echo (old('skills') && in_array('Javascript', old('skills'))) ? "selected" : "" ?>>Javascript</option>
                        <option value="Ajax" <?php echo (old('skills') && in_array('Ajax', old('skills'))) ? "selected" : "" ?>>Ajax</option>
                        <option value="HTML" <?php echo (old('skills') && in_array('HTML', old('skills'))) ? "selected" : "" ?>>HTML</option>
                        <option value="CSS" <?php echo (old('skills') && in_array('CSS', old('skills'))) ? "selected" : "" ?>>CSS</option>
                    </select>
                    @if ($errors->has('skills'))
                        <span class="text-danger">{{ $errors->first('skills') }}</span>
                    @endif
                </div>
                <input type="submit" class="btnRegister"  value="Register"/>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
<script>
$(function () {
$('.selectpicker').selectpicker();
});

</script>