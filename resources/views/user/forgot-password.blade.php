@extends('user/template/main')
@section('title', 'Login')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <img class="border-radius-15" src="assets/imgs/page/forgot_password.svg" alt="" />
                                <h2 class="mb-15 mt-15">Forgot your password?</h2>
                                <p class="mb-30">Not to worry, we got you! Let’s get you a new password. Please enter your email address or your Username.</p>
                                <div class="ss-alert-section">
                                    <?php if(Session::has('success')){ ?>
                                    <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
                                    <?php } ?>
                                    <?php if(Session::has('error')){ ?>
                                    <div class="alert alert-danger"><?php echo Session::get('error'); ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <form method="post" action="{{url('forgot-password-process')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required="" name="email" placeholder="Username or Email *" />
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <input type="text" required="" name="random_number" placeholder="Security code *" />
                                    </div>
                                    <span class="security-code">
                                        <?php 
                                            $rand_number = rand(1234, 9876); 
                                            $rand_number_array = array_map('intval', str_split($rand_number));
                                        ?>
                                        <b class="text-new"><?php echo $rand_number_array[0]; ?></b>
                                        <b class="text-hot"><?php echo $rand_number_array[1]; ?></b>
                                        <b class="text-sale"><?php echo $rand_number_array[2]; ?></b>
                                        <b class="text-best"><?php echo $rand_number_array[3]; ?></b>
                                    </span>
                                </div>
                                <div class="login_footer form-group mb-50">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                            <label class="form-check-label" for="exampleCheckbox1"><span>I agree to terms & Policy.</span></label>
                                        </div>
                                    </div>
                                    <a class="text-muted" href="#">Learn more</a>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="hidden_random_number" value="<?php echo $rand_number; ?>">
                                    <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Reset password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection