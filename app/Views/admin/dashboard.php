<div class="dashboard">
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
        <div class="container">
            <h3 style="margin-top:16px">จัดการ Work</h3>
            <button style="margin-bottom:16px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertwork">
                <i class="fa-solid fa-plus"></i> เพิ่ม Work
            </button>
            <table class="table table-bordered" id="work-list" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th>ชื่องาน</th>
                        <th>วันที่ลงงาน</th>
                        <th class="text-center">สถานะ</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    if ($work) : ?>
                        <?php foreach ($work as $work) : ?>
                            <tr>
                                <td class="text-center"><?php echo $i++ ?></td>
                                <td><?php echo $work['work_name']; ?></td>
                                <td><?php echo $work['work_created_at']; ?></td>
                                <td class="text-center"><?php echo $work['work_status']; ?></td>
                                <td class="text-center">
                                    <a type="button" href="<?php echo base_url(); ?>/editWork/<?= $work['work_id']; ?>" class="btn btn-info btn-min-width mr-1 mb-1" data-toggle="tooltip" data-placement="top" title="รายละเอียดข้อมูล" data-container="body" data-animation="true"> <i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td class="text-center">
                                    <button onclick="validateDeleteWork(this)" value="<?= $work['work_id']; ?>" class="btn btn-danger btn-min-width mr-1 mb-1" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล" data-container="body" data-animation="true"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="insertwork" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มงาน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="insertWork" action="<?= base_url('/InsertWork') ?>" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <label style="margin-top:8px"><b> ชื่องาน </b></label>
                                <input class="form-control" type="text" name="work_name" id="work_name" required>
                            </div>
                            <div class="col-lg-12">
                                <label style="margin-top:8px"><b> รายละเอียดงาน </b></label>
                                <textarea class="form-control" name="work_information" rows="3"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <label style="margin-top:8px"><b> ที่อยู่งาน </b></label>
                                <input class="form-control" type="text" name="work_address" id="work_address" required>
                            </div>
                            <div class="col-lg-12">
                                <label style="margin-top:8px"><b> เบอร์โทรศัพท์ </b></label>
                                <input type="number" id="work_phone" name="work_phone" class="form-control" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="hidden" id="work_status" name="work_status" value="1" class="form-control" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/85b7049ed9.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#work-list').DataTable({
                    "language": {
                        "emptyTable": "ไม่พบข้อมูล"
                    },
                });
            });

            $.extend(true, $.fn.dataTable.defaults, {
                "language": {
                    "sProcessing": "กำลังดำเนินการ...",
                    "sLengthMenu": "แสดง_MENU_ แถว",
                    "sZeroRecords": "ไม่พบข้อมูล",
                    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                    "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                    "sInfoPostFix": "",
                    "sSearch": "ค้นหา:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "เริ่มต้น",
                        "sPrevious": "ก่อนหน้า",
                        "sNext": "ถัดไป",
                        "sLast": "สุดท้าย"
                    }
                }
            });

            function validateDeleteWork(a) {
                var id = a.value;

                swal({
                    title: "ต้องการลบใช่รึไม่?",
                    text: "คุณต้องการลบจริงใช่รึไม่!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",

                    closeOnConfirm: false
                }, function() {
                    $(location).attr('href', '<?php echo base_url() ?>/deleteWork/' + id);
                });
            }
        </script>