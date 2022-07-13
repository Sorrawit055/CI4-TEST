<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .card-img-top {
        width: 100%;
        height:100%;
        object-fit: cover;
    }

    a {
        padding-left: 5px;
        padding-right: 5px;
        margin-left: 5px;
        margin-right: 5px;
    }

    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example button:hover {
        background: #0b7dda;
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
<div class="home" style="margin-bottom:3rem">
    <div class="container">
        <?php if (isset($_SESSION['successLogin'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <?php $session = session(); ?>
                <strong><?= $_SESSION['successLogin']; ?> ยินดีต้อนรับคุณ : <?php echo $session->get('user_firstname'); ?> <?php echo $session->get('user_lastname'); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <?php $session = session(); ?>
                <strong><?= $_SESSION['success']; ?> </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form class="example" action="/home" style="margin:auto;max-width:300px">
            <input type="text" placeholder="Search.." value='<?= $search ?>' name="search" required>
            <?php if ($search == NULL) { ?>
                <button type="submit" id='btnsearch'><i class="fa fa-search"></i></button>
            <?php } else { ?>
                <button type="submit" id='btnsearch' onclick='document.getElementById("searchForm").submit();'><i class="fa fa-search"></i></button>
            <?php } ?>
        </form>

    </div>
    <br>
    <div class="container">
        <?php if ($work == NULL) { ?>
            <div class="center">
                <center>
                    <p class="center" style="color:red">ไม่พบข้อมมูลที่ค้นหา</p>
                </center>
            </div>
        <?php } ?>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <!--ADD CLASSES HERE d-flex align-items-stretch-->
            <?php
            if ($work) : ?>
                <?php foreach ($work as $work) : ?>
                    <?php if ($work['work_status'] == 1) { ?>
                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">

                            <div class="card" style="width: 30rem;margin: auto;
  border: 3px solid black;
  padding: 10px;">
                                <img src="data:image/jpeg;base64,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" class="card-img-top" alt="Card Image">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><a href="<?php echo base_url(); ?>/workDetail/<?php echo $work['work_id']; ?>"><?php echo $work['work_name']; ?></a></h5>
                                    <p class="card-text" style="padding-left: 5px; 
     padding-right: 5px; 
     margin-left: 5px; 
     margin-right: 5px; "><?php echo $work['work_information']; ?></p>
                                    <p class="card-text" style="    padding-left: 5px; 
     padding-right: 5px; 
     margin-left: 5px; 
     margin-right: 5px; "><small class="text-muted">ลงวันที่ <?php $strDate = $work['work_created_at'];
                                                                echo Dateok($strDate); ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <br>
    <div class="container">
        <div class="d-flex justify-content-end">

            <div style='margin-top: 10px;'>
                <?= $pager->links() ?>
            </div>

        </div>
    </div>
</div>
<?php
function Dateok($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    return "$strYear-$strMonth-$strDay";
}
?>