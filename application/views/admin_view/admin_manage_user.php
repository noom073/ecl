<div class="container-fluid h-full">
    <div class="main container-fluid">
        <div class="">
            <div class="bg-white m-2 p-2">
                <div class="h2">รายการ Admin ระบบ</div>
                <div class="">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-adminModal">+ เพิ่ม Admin</button>
                </div>
            </div>

            <div class="m-2 p-2">
                <div class="table-responsive">
                    <table id="ecl-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">RTARF Mail</th>
                                <th class="text-center">วันที่แก้ไข</th>
                                <th class="text-center">ลบ</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="all-modal">

        <!-- Create admin Modal -->
        <div class="modal fade" id="create-adminModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create-roomModalLabel">เพิ่ม Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="create-admin-form">
                            <div class="form-group">
                                <label>RTARF Mail</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="email">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">@rtarf.mi.th</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                        <div id="create-admin-form-result"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End create admin Modal -->

        <!-- Create admin Modal -->
        <div class="modal fade" id="edit-adminModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-adminModalLabel">เพิ่ม Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-admin-form">
                            <div class="form-group">
                                <label>RTARF Mail</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="edit-admin-form-email" name="email">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">@rtarf.mi.th</span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="rowID" id="edit-admin-form-row-id">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                        <div id="edit-admin-form-result"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End create admin Modal -->

    </div>
</div>

<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/my-css.css') ?>">
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/popper/popper.min.js') ?>"></script>

<!-- dataTable -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/dataTable/datatables.min.css') ?>" />
<script type="text/javascript" src="<?= base_url('assets/dataTable/datatables.min.js') ?>"></script>
<!-- End dataTable -->

<!-- datepicker -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datepicker/css/datepicker.css') ?>" />
<script type="text/javascript" src="<?= base_url('assets/datepicker/js/date-func.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datepicker/js/datepicker.js') ?>"></script>
<!-- End datepicker -->

<script>
    $(document).ready(function() {

        $(".nav-item").removeClass('active');
        $("#admin-manage-user.nav-item").addClass('active');


        let userAdminTable = $("#ecl-table").DataTable({
            responsive: true,
            ajax: {
                url: "<?= site_url('admin/ajax_list_admin') ?>",
                dataSrc: ""
            },
            columns: [{
                    data: null,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'email'
                },
                {
                    data: 'time_update',
                    className: "text-center"
                },
                {
                    data: null,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        let editBtn = `<button class="btn btn-sm btn-primary edit-admin" data-row-id="${row.row_id}">แก้ไข</button>`;
                        let deleteBtn = `<button class="btn btn-sm btn-danger delete-admin" data-row-id="${row.row_id}">ลบ</button>`;
                        return `${editBtn} ${deleteBtn}`;
                    }
                }
            ]
        });


        $("#create-admin-form").submit(function(event) {
            event.preventDefault();
            let thisForm = $(this);
            let formData = thisForm.serialize();
            $.post({
                url: '<?= site_url('admin/ajax_add_admin') ?>',
                data: formData,
                dataType: 'json'
            }).done(res => {
                console.log(res);
                if (res.status) {
                    $("#create-admin-form-result").prop('class', 'alert alert-success');
                    $("#create-admin-form-result").text(res.text);
                    userAdminTable.ajax.reload();
                } else {
                    $("#create-admin-form-result").prop('class', 'alert alert-danger');
                    $("#create-admin-form-result").text(res.text);
                }
                setTimeout(() => {
                    $("#create-admin-form-result").prop('class', '');
                    $("#create-admin-form-result").text('');
                }, 2500);
            }).fail((jhr, status, error) => console.error(jhr, status, error));
        });


        const getAdminDetail = rowID => {
            return $.post({
                url: '<?= site_url('admin/ajax_admin_detail') ?>',
                data: {
                    rowID: rowID
                },
                dataType: 'json'
            }).done().fail((jhr, status, error) => console.error(jhr, status, error));
        };


        $(document).on('click', ".edit-admin", async function() {
            let rowID = $(this).data('row-id');
            let adminDetail = await getAdminDetail(rowID);
            $("#edit-admin-form-email").val(adminDetail.email);
            $("#edit-admin-form-row-id").val(adminDetail.row_id);
            $("#edit-adminModal").modal();
        });


        $("#edit-admin-form").submit(function(event) {
            event.preventDefault();
            let thisForm = $(this);
            let formData = thisForm.serialize();
            $.post({
                url: '<?= site_url('admin/ajax_edit_admin') ?>',
                data: formData,
                dataType: 'json'
            }).done(res => {
                if (res.status) {
                    $("#edit-admin-form-result").prop('class', 'alert alert-success');
                    $("#edit-admin-form-result").text(res.text);
                    userAdminTable.ajax.reload();
                } else {
                    $("#edit-admin-form-result").prop('class', 'alert alert-danger');
                    $("#edit-admin-form-result").text(res.text);
                }
                setTimeout(() => {
                    $("#edit-admin-form-result").prop('class', '');
                    $("#edit-admin-form-result").text('');
                }, 2500);
            }).fail((jhr, status, error) => console.error(jhr, status, error));
        });


        $(document).on('click', ".delete-admin", async function() {
            if (confirm('ยืนยันการลบ Admin ?')) {
                let rowID = $(this).data('row-id');
                $.post({
                    url: '<?= site_url('admin/ajax_delete_admin') ?>',
                    data: {
                        rowID: rowID
                    },
                    dataType: 'json'
                }).done(res => {
                    if (res.status) {
                        $("#edit-admin-form-result").prop('class', 'alert alert-success');
                        $("#edit-admin-form-result").text(res.text);
                        userAdminTable.ajax.reload();
                    } else {
                        $("#edit-admin-form-result").prop('class', 'alert alert-danger');
                        $("#edit-admin-form-result").text(res.text);
                    }
                    setTimeout(() => {
                        $("#edit-admin-form-result").prop('class', '');
                        $("#edit-admin-form-result").text('');
                    }, 2500);
                }).fail((jhr, status, error) => console.error(jhr, status, error));
            } else {
                return false;
            }

        });

    });
</script>