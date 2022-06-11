<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image-1" style="background: url('../assets/img/carousel-1.jpg');"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <?php if (isset($validation)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                                if (session()->getFlashData('error')) {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashData('error') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                                }
                            ?>
                            <form class="user" action="<?= base_url('login') ?>" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>