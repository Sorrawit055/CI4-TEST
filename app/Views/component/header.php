<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CI4 TEST</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet">
</head>
<body>
    <?php $session = session(); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="margin-bottom:5rem">
        <div class="container-fluid">
            <?php if (isset($_SESSION['user_role']) && $_SESSION["user_role"] == "1") { ?>
                <a class="navbar-brand" href="<?php echo base_url(); ?>/dashboard" style="color:white;text-decoration: none;
    font-weight: bold;
    font-size: 2rem;">Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <?php } else if (isset($_SESSION['user_role']) && $_SESSION["user_role"] == "0") { ?>
                <a class="navbar-brand" href="<?php echo base_url(); ?>/home" style="color:white;text-decoration: none;
    font-weight: bold;
    font-size: 2rem;">HOME</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <?php } else { ?>
                <a class="navbar-brand" href="<?php echo base_url(); ?>/index" style="color:white;text-decoration: none;
    font-weight: bold;
    font-size: 2rem;">TEST</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <?php } ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a id="nav-link" class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>/home"><b>????????????????????????</b></a>
                    </li>
                    <li class="nav-item">
                        <a id="nav-link" class="nav-link active" aria-current="page" href="#"><b>?????????????????????</b></a>
                    </li> -->
                </ul>
                <?php if (isset($_SESSION['user_role']) && $_SESSION["user_role"] == "1") { ?>
                    <form class="navbar-nav">
                        <li class="nav-item">
                            <a style="color:white"><b>Admin : <?php echo $session->get('user_firstname'); ?> <?php echo $session->get('user_lastname'); ?></b></a>
                            <a class="btn btn-success" aria-current="page" href="<?php echo base_url(); ?>/logout"><b>??????????????????????????????</b></a>
                        </li>
                    </form>
                <?php } else if (isset($_SESSION['user_role']) && $_SESSION["user_role"] == "0") { ?>
                    <form class="navbar-nav">
                        <li class="nav-item">
                            <a style="color:white"><b>????????? : <?php echo $session->get('user_firstname'); ?> <?php echo $session->get('user_lastname'); ?></b></a>
                            <a class="btn btn-success" aria-current="page" href="<?php echo base_url(); ?>/logout"><b>??????????????????????????????</b></a>
                        </li>
                    </form>
                <?php } else { ?>
                    <form class="navbar-nav">
                        <li class="nav-item">
                            <a id="" class="btn btn-success" aria-current="page" href="<?php echo base_url(); ?>/signin"><b>?????????????????????????????????</b></a>
                        </li>
                    </form>
                <?php } ?>
            </div>
        </div>
    </nav>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>