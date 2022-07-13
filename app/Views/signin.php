<div class="signin">
    <div class="container">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <strong>ออกจากระบบสำเร็จ</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['fail'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <strong><?= $_SESSION['fail']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="bg-singin">
            <div class="container">
                <div class="cardlogin">
                    <form action="<?php echo base_url(); ?>/loginAuth" method="post">
                        <!-- Email input-->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">Username</label>
                            <input type="text" name="user_username" id="form2Example1" class="form-control" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example2">Password</label>

                            <input type="password" name="user_password" id="form2Example2" class="form-control" />
                        </div>

                        <!-- Submit button -->
                        <center><button type="submit" class="btn btn-primary btn-block mb-4">ตกลง</button> </center>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <!-- <p>Not a member? <a href="#!">Register</a></p> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>