<div class="container-fluid">
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-5">
            <div class="register-box">
                <div class="register-logo">
                    <b>GoVersus</b>
                </div>

                <div class="card">
                    <div class="card-body register-card-body">
                        <p class="login-box-msg">Register as a new membership</p>

                        <p class="login-box-msg text-danger"><?php
                            echo $error_message;
                        ?></p>

                        <form action='/register' method="post">
                            <div class="input-group mb-3">
                                <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First name" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last name" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="birthday" name="birthday" type="date" max="2020-12-31" class="form-control" placeholder="Birthday" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-calendar"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="address" name="address" email="address" type="text" class="form-control" placeholder="Address" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-location-arrow"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="email" name="email" type="email" class="form-control" placeholder="Email" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <select id="account_type" name="account_type" type="text" class="form-control" placeholder="Typde de compte" required/>
                                    <option value="etudiant" selected>Etudiant</option>
                                    <option value="enseignant" >Enseignant</option>
                                    <option value="Admin" >Admin</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="input-group mb-3">
                                <input name="password" id="password" type="password" class="form-control" placeholder="Password" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="password2" id="password2" type="password" class="form-control"
                                        placeholder="Retype password" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="agreeTerms" name="terms" value="agree" required/>
                                            <label htmlFor="agreeTerms" class="ml-1">
                                                    J'accepte les <a href="/terms">termes</a>
                                            </label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <button type="submit" onSubmit="submission()" class="btn btn-primary btn-block">Register
                                    </button>
                                </div>

                            </div>
                        </form>

                        <div class="social-auth-links text-center">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i>
                                Sign up using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google-plus mr-2"></i>
                                Sign up using Google+
                            </a>
                        </div>

                        <div class="mt-4 text-center">
                            <a href='/login' class="text-center " >J'ai déjà un compte</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>