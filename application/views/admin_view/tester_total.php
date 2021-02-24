<div class="container-fluid h-full">
    <div class="main container-fluid">
        <div class="">
            <div class="bg-white m-2 p-2">
                <div class="h2">สรุปจำนวนผู้เข้าสอบ</div>
                <div class="">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-roomModal">+ เพิ่มห้องสอบ</button>
                </div>
            </div>

            <div class="m-2 p-2">
                <div class="table-responsive">
                    <table id="ecl-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">รอบ</th>
                                <th class="text-center">จำนวนที่นั่ง</th>
                                <th class="text-center">จำนวนผู้สมัคร</th>
                                <th class="text-center">จำนวนผู้เข้าสอบ</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/my-css.css') ?>">
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/popper/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/my-js/function.js') ?>"></script>

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
        $("#admin-tester-total.nav-item").addClass('active');

        function generate_datatable() {
            $("#ecl-table").DataTable({
                destroy: true,
                ajax: {
                    url: "<?= site_url('admin/ajax_tester_total') ?>",
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
                        data: null,
                        render: (data, type, row, meta) => {
                            let y = parseInt(row.date_test.substring(0, 4)) + 543;
                            let m = toThaiDate(row.date_test.substring(5, 7));
                            let d = row.date_test.substring(8);
                            let date = `${d} ${m} ${y} ${row.time_test}`;
                            return `${date} ${row.room_name}`;
                        }
                    },
                    {
                        data: 'total_seat',
                        className: "text-center"
                    },
                    {
                        data: 'total_tester',
                        className: "text-center"
                    },
                    {
                        data: 'total_checkin',
                        className: "text-center"
                    }
                ]
            });
        }

        generate_datatable();

        $("#create-room-form").submit(function() {
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                url: "<?= site_url('admin/ajax_create_room') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.status) {
                        $("#rs").html('');
                        $("#rs").attr('class', 'alert alert-success');
                        $("#rs").html(data.text);

                        generate_datatable();
                    } else {
                        $("#rs").html('');
                        $("#rs").attr('class', 'alert alert-danger');
                        $("#rs").html(`!Error ${data.text}`);
                    }
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });

            return false;
        });

        $(document).on("click", ".edit-room", function() {
            var id = $(this).siblings(".id").val();
            var room_name = $(this).siblings(".room_name").val();
            var address = $(this).siblings(".address").val();

            $("form#edit-room-form").find("input[name='edit_room_name']").val(room_name);
            $("form#edit-room-form").find("input[name='edit_address']").val(address);
            $("form#edit-room-form").find("input[name='edit_enc_id']").val(id);

            $("#rs-edit-room").html('');
            $("#rs-edit-room").attr('class', '');

            $("#edit-roomModal").modal();
        });

        $("#edit-room-form").submit(function() {

            var formData = $(this).serialize();
            $.ajax({
                url: "<?= site_url('admin/ajax_update_room') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.status) {
                        $("#rs-edit-room").html('');
                        $("#rs-edit-room").attr('class', 'alert alert-success');
                        $("#rs-edit-room").html(data.text);

                        generate_datatable();
                    } else {
                        $("#rs-edit-room").html('');
                        $("#rs-edit-room").attr('class', 'alert alert-danger');
                        $("#rs-edit-room").html(`!Error ${data.text}`);
                    }
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });

            return false;
        });

        $("#del-room").click(function() {
            var message = "ยืนยันการลบห้องสอบ ?";

            if (confirm(message)) {
                var id = $("input[name='edit_enc_id']").val();

                $.ajax({
                    url: "<?= site_url('admin/ajax_delete_room') ?>",
                    data: {
                        enc_id: id
                    },
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.status) {
                            $("#rs-edit-room").html('');
                            $("#rs-edit-room").attr('class', 'alert alert-success');
                            $("#rs-edit-room").html(data.text);

                            generate_datatable();
                        } else {
                            $("#rs-edit-room").html('');
                            $("#rs-edit-room").attr('class', 'alert alert-danger');
                            $("#rs-edit-room").html(`!Error ${data.text}`);
                        }
                    },
                    error: function(jhx, status, error) {
                        console.log(`${jhx}, ${status}, ${error}`);
                    }
                });
            }

            return false;
        });
    });
</script>