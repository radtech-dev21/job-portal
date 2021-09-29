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
</div>