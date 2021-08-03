    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
    

        
    
    <h1 class="text" id="welcome">Welcome. <span>please login.</span></h1>
    <br><br>
    
    <form method='post' id="theForm" action="{{ route('login') }}">
    @csrf

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
        <br>

        
    <div class="form-group row">
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder='Password' required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    
        <br>
        <br>
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                </div>
            </div>
        </div>

        <br>


        <br>
        <div class='login'>
        <br><br>

        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}"><i class="icon-cog"></i> I've fogotten my password</a>
        @endif
        
        <input type="submit" value='Login' class="btn btn-primary">
                                    
                                </input>
        
        </div><!-- /login -->
        
        <h3 class="text" id="welcome"><span>Not a member ? </span>
        <a href="{{ route('register') }}" >Register</h3></a>
        
    </form>
    
    </div><!-- /wrap -->

</div> 
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 


    

    <script src="{{ asset('js/login.js') }}"></script>
    <script src="{{ asset('js/particle.js') }}"></script>
    