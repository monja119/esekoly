<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-5">
            <div class="login-box">
                <div class="login-logo">
                    <b>Esekoly</b>
                </div>

                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">S'identifier</p>
                        <p id='error' class="login-box-msg text-danger">errorMessage</p>

                        <form action="/login" method="post" onSubmit="" >
                            <div class="    input-group mb-3">
                                <input name="email" type="email" id="email" class="form-control" placeholder="Email" />
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <i class="fa-solid fa-envelope"></i>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="password" type="password" id="password" class="form-control" placeholder="Mot de passe" />
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember" name="remeber"/>
                                            <label htmlFor="remember" class="ml-1">
                                                Se souvenir de moi
                                            </label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <input type="submit" id="signin" class="btn btn-primary btn-block" value="Sign In" />
                                </div>

                            </div>
                        </form>

                        <div class="social-auth-links text-center mb-3">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i> S'identifier via Facebook 
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google-plus mr-2"></i> S'identifier via Google+
                            </a>
                        </div>

                        <p class="mb-1">
                            <a href="">Mot de passe oublié ?</a>
                        </p>
                        <p class="mb-0">
                            <a href="register.php" class="text-center">Créer un compte</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>