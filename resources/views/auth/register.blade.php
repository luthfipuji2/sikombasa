<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/particle.css') }}">

<!-- particles.js container --> 
<div id="particles-js"></div> 
<!-- stats - count particles --> 
<div class="count-particles"> 

<div class="wrap">
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">


<h1 class="text" id="welcome">Welcome. <span>please Register.</span></h1>
<br>

<form method='post' id="theForm" action="{{ route('register') }}">
@csrf

    <div class="form-group row">
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder='Name'>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>

    <div class="form-group row">
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder='E-Mail Address'>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>


    <div class="form-group row">
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
        </div>
    </div>



    <div class='register'>
    <br><br>
    <input type="submit" value='Register' class="btn btn-primary"></input>
    </div><!-- /Register -->

    <br>
    <h4 class="text" id="welcome"><span>Already a SIKOMBASA member ? </span>
        <a href="{{ route('login') }}" >Login</h3></a>
    
</form>

</div><!-- /wrap -->

</div> 
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 

<script src="{{ asset('js/register.js') }}"></script>
<script src="{{ asset('js/particle.js') }}"></script>
