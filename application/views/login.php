    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('<?php echo base_url(); ?>/assets/images/bg-4.jpg');background-size: cover;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">

                                <a href="<?php echo base_url(); ?>" class="text-success">
                                     <span><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/akfarlogo.png" alt="Edua" height="80"></span>
                                    <h2>Digital Academic and Multi Access System</h2>
                                    <h4>Akademi Farmasi Surabaya<h4>
                                </a>
                            </h2>

                            <form class="" action="<?php echo site_url('login/cek_login') ?>" method="post">
                              <?php echo $this->session->flashdata('msg');?>
                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">Username</label>
                                        <input class="form-control" type="username" id="username" required="" name="username" placeholder="Contoh : 1250xxxxxx">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright">2018 © IT Akademi Farmasi Surabaya</p>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/waves.js"></script>
        <script src="<?php echo base_url();?>/assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url();?>/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>/assets/js/jquery.app.js"></script>

    </body>
</html>
