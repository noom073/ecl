<<<<<<< HEAD
<div class="container-fluid h-full">
=======
<div class="container-fluid h-full">  
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
    <div class="main container-fluid">
        <div class="">
            <div class="bg-white m-2 p-2">
                <div class="h2">วัน-เวลา การทดสอบ</div>
                <div class="">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-roundModal">+ เพิ่มวัน-เวลา การทดสอบ</button>
                </div>
            </div>

            <div class="m-2 p-2">
                <div class="table-responsive">
                    <table id="ecl-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">ชื่อห้องสอบ</th>
                                <th class="text-center">รอบที่</th>
                                <th class="text-center">วัน เวลาทดสอบ</th>
                                <th class="text-center">จำนวนที่นั่ง</th>
                                <th class="text-center">จำนวนผู้ลงทะเบียน</th>
                                <th class="text-center">สถานะ</th>
                                <th class="text-center">วันที่สร้าง</th>
                                <th class="text-center">วันที่แก้ไข</th>
                                <th class="text-center">แก้ไข</th>
                            </tr>
<<<<<<< HEAD
                        </thead>
=======
                        </thead>                        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="all-modal">

        <!-- Create round Modal -->
        <div class="modal fade" id="create-roundModal" tabindex="-1" role="dialog" aria-labelledby="create-roundModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create-roundModalLabel">สร้างวัน-เวลา การทดสอบ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<<<<<<< HEAD
                            <span aria-hidden="true">&times;</span>
=======
                        <span aria-hidden="true">&times;</span>
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="create-round-form">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>ประจำปี</label>
                                    <select class="form-control" name="year">
                                        <option value="<?= $thisYear ?>"><?= $thisYear ?></option>
<<<<<<< HEAD
                                        <option value="<?= $thisYear + 1 ?>"><?= $thisYear + 1 ?></option>
=======
                                        <option value="<?= $thisYear+1 ?>"><?= $thisYear+1 ?></option>
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>รอบที่</label>
                                    <span class="text-danger small">*รอบใหญ่</span>
                                    <input type="text" class="form-control" name="round" maxlength="1" required>
                                </div>
                            </div>

<<<<<<< HEAD

                            <div class="form-group">
                                <label>วันที่</label>
                                <?php
                                $year = date('Y') + 543;
                                $defaultDate = date('d') . "-" . date('m') . "-" . $year;
=======
                            
                            <div class="form-group">
                                <label>วันที่</label>
                                <?php 
                                    $year = date('Y')+543 ;
                                    $defaultDate = date('d') ."-". date('m') ."-". $year ;
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                ?>
                                <input type="text" class="form-control date bg-white col-md-4" name="date" maxlength="255" value="<?= $defaultDate ?>" readonly required>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>ชั่วโมง</label>
                                        <select class="form-control" name="hour" required>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                        </select>
                                    </div>
<<<<<<< HEAD

=======
                                    
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                    <div class="form-group col-md-2">
                                        <label>นาที</label>
                                        <select class="form-control" name="minute" required>
                                            <option value="00">00</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
<<<<<<< HEAD
                                        </select>
=======
                                        </select>                                       
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
<<<<<<< HEAD
                                <label>สถานที่</label>
                                <span id="select-room-loading">loading ...</span>
=======
                                <label>สถานที่</label> 
                                <span id="select-room-loading">loading ...</span>                               
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                <select id="list-select-room" class="form-control" name="room" required></select>
                            </div>
                            <div class="form-group">
                                <label>จำนวนที่นั่งสูงสุด</label>
                                <input type="number" class="form-control col-md-4" name="amount_seat" min="1" max="500" value="1" required>
                                <small class="text-danger">* ไม่สามารถเพิ่มจำนวนที่นั่งในครั้งต่อไป กรุณาใส่จำนวนที่นั่งสูงสุดของห้อง</small>
                            </div>
                            <button type="submit" class="btn btn-primary">ตกลง</button>
                        </form>
                        <div id="rs"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End create round Modal -->

        <!-- Edit round Modal -->
        <div class="modal fade" id="edit-round-Modal" tabindex="-1" role="dialog" aria-labelledby="edit-roundModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-roundModalLabel">แก้ไข วัน-เวลา การทดสอบ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="edit-round-form">
<<<<<<< HEAD
=======

>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                            <div class="form-group">
                                <label>รอบที่</label>
                                <small class="text-danger">**ตัวอย่าง: 2562/1</small>
                                <input type="text" class="form-control col-md-4" name="round" required>
                            </div>
<<<<<<< HEAD
                            <div class="form-group">
                                <label>วันที่</label>
=======
                            
                            <div class="form-group">
                                <label>วันที่</label>                                
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                <input type="text" class="form-control date bg-white col-md-4" name="date" maxlength="255" value="" readonly required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>ชั่วโมง</label>
                                    <input type="number" class="form-control" name="hour" min="8" max="18" value="7" required>
                                </div>
<<<<<<< HEAD

=======
                                
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                <div class="form-group col-md-2">
                                    <label>นาที</label>
                                    <input type="number" class="form-control" name="minute" min="0" max="59" value="0" required>
                                </div>
                            </div>
                            <div class="form-group">
<<<<<<< HEAD
                                <label>สถานที่</label>
                                <select id="list-select-edit" class="form-control" name="room" required></select>
                            </div>
                            <div class="form-group">
                                <label>จำนวนที่นั่งสูงสุด</label>
                                <input type="number" class="form-control col-md-4" name="amount_seat" min="1" max="500" required>
                                <small class="text-danger">* ไม่สามารถเพิ่มจำนวนที่นั่งในครั้งต่อไป กรุณาใส่จำนวนที่นั่งสูงสุดของห้อง</small>
                            </div>
=======
                                <label>สถานที่</label>                            
                                <select id="list-select-edit" class="form-control" name="room" required></select>
                            </div>
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                            <input type="hidden" name="round_id">
                            <button type="submit" class="btn btn-primary">ตกลง</button>
                            <button type="button" class="btn btn-danger delete-round">- ลบ</button>
                        </form>

                        <div id="rs-edit-round"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Edit round Modal -->

        <!-- View round detail Modal -->
        <div class="modal fade" id="round-detail-Modal" tabindex="-1" role="dialog" aria-labelledby="round-detail-ModalLabel" aria-hidden="true">
<<<<<<< HEAD
            <div class="modal-dialog modal-lg" role="document">
=======
            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="round-detail-ModalLabel">รายละเอียด ผู้ลงทะเบียน</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
<<<<<<< HEAD
                        <form id="round-detail-form">
                            <div id="round-detail-loading"></div>
                            <div id="round-detail-heading" class="h5"></div>
                            <div id="reload-round-detail" class="btn btn-primary btn-sm mb-3">Reload</div>

                            <div class="table-d">
                                <table id="member-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>ที่นั่ง</th>
                                            <th>ชื่อ นามสกุล</th>
                                            <th>หน่วย</th>
                                            <th>เบอร์โทร</th>
                                            <th>ลงทะเบียนเมื่อ</th>
                                            <!-- <th>ยืนยันแล้ว</th> -->
                                            <th>Active</th>
                                            <th>ห้อง</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- <button type="button" class="btn btn-primary float-right m-1 submit-detail close-seat">ปิดที่นั่ง</button>
                            <button type="button" class="btn btn-primary float-right m-1 submit-detail open-seat">เปิดที่นั่ง</button>
                            <button type="button" class="btn btn-primary float-right m-1 submit-detail clear-seat">ลบผู้ลงทะเบียน</button> -->
=======
                        <form id="round-detail-form"> 
                            <div id="round-detail-loading"></div>
                            <div id="round-detail-heading" class="h5"></div>  
                            <div id="reload-round-detail" class="btn btn-primary btn-sm mb-3">Reload</div>


                            <table id="member-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>ที่นั่ง</th>
                                        <th>ชื่อ นามสกุล</th>
                                        <th>หน่วย</th>
                                        <th>เบอร์โทร</th>
                                        <th>ลงทะเบียนเมื่อ</th>
                                        <th>ยืนยันแล้ว</th>
                                        <th>Active</th>
                                        <th>ห้อง</th>
                                    </tr>
                                </thead>
                            </table>                       
                            <button type="button" class="btn btn-primary float-right m-1 submit-detail close-seat">ปิดที่นั่ง</button>
                            <button type="button" class="btn btn-primary float-right m-1 submit-detail open-seat">เปิดที่นั่ง</button>
                            <button type="button" class="btn btn-primary float-right m-1 submit-detail clear-seat">ลบผู้ลงทะเบียน</button>
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                            <div id="rs-round-detail-form"></div>
                        </form>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End View round detail Modal -->

    </div>
</div>

<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/my-css.css') ?>">
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/popper/popper.min.js') ?>"></script>

<script src="<?= base_url('assets/my-js/function.js') ?>"></script>

<!-- dataTable -->
<<<<<<< HEAD
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/dataTable/datatables.min.css') ?>" />
=======
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/dataTable/datatables.min.css') ?>"/> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
<script type="text/javascript" src="<?= base_url('assets/dataTable/datatables.min.js') ?>"></script>
<!-- End dataTable -->

<!-- datepicker -->
<<<<<<< HEAD
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datepicker/css/datepicker.css') ?>" />
=======
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datepicker/css/datepicker.css') ?>"/> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
<script type="text/javascript" src="<?= base_url('assets/datepicker/js/date-func.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datepicker/js/datepicker.js') ?>"></script>
<!-- End datepicker -->

<script>
    $(document).ready(function() {

        $(".nav-item").removeClass('active');
        $("#admin-manage-round.nav-item").addClass('active');

        function generate_datatable() {
            $("#ecl-table").DataTable({
<<<<<<< HEAD
                responsive:true,
=======
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                destroy: true,
                ajax: {
                    url: "<?= site_url('manage_round/ajax_list_rounds') ?>",
                    dataSrc: ""
                },
<<<<<<< HEAD
                columns: [{
                        data: null,
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'room_name',
                        render: function(data, type, row, meta) {
                            return `<span class="room-name">${data}</span>`;
                        }
                    },
                    {
                        data: 'round',
                        className: "text-center"
                    },
                    {
                        data: null,
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            var year = parseInt(row.date_test.substring(0, 4)) + 543;
                            var month = toThaiDate(row.date_test.substring(5, 7));
                            var date = `${row.date_test.substring(8)} ${month} ${year}`;
                            var time = `${row.time_test}:00`;
                            return `<span class="datetime-test">${date} ${time} น.</span>`;
                        }
                    },
                    {
                        data: 'total',
                        className: "text-center"
                    },
                    {
                        data: 'member',
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            let amount = row.idp != '' ? row.member : 0;
                            return amount;
                        }
                    },
                    {
                        data: 'active',
=======
                columns: [
                    { data: null,
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            return meta.row+1;
                        }
                    },
                    { data: 'room_name',
                        render: function (data, type, row, meta) {                           
                            return `<span class="room-name">${data}</span>`;
                        }   
                    },
                    { data: 'round',
                        className: "text-center"                    
                    },
                    { data: null,
                        className: "text-center",
                        render: function (data, type, row, meta) {
                            var year    = parseInt( row.date_test.substring(0,4) ) +543;
                            var month   = toThaiDate(row.date_test.substring(5,7));
                            var date    = `${row.date_test.substring(8)} ${month} ${year}`;
                            var time    = `${row.time_test}:00`;
                            return `<span class="datetime-test">${date} ${time} น.</span>`;
                        }                    
                    },
                    { data: 'total',
                        className: "text-center"
                    },
                    { data: 'member',
                        className: "text-center",
                        render: function (data, type, row, meta) {
                            var amount = 0;
                            if (row.idp != '') {
                                amount = row.member;
                            }

                            return amount;
                        }
                    },
                    { data: 'active',
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            var status = (data == 'y') ? `<span class="text-success">เปิดลงทะเบียน</span>` : `<span class="text-danger">ปิดลงทะเบียน</span>`;
                            return status;
                        }
                    },
<<<<<<< HEAD
                    {
                        data: 'time_create',
                        className: "text-center"
                    },
                    {
                        data: 'time_update',
                        className: "text-center"
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            var detail = `<button class="btn btn-sm btn-primary detail-round"` +
                                `data-round_id='${row.enc_id}'` +
                                `>รายละเอียด</button>`;

                            if (row.member == 0) {
                                var year = parseInt(row.date_test.substring(0, 4)) + 543;
=======
                    { data: 'time_create',
                        className: "text-center" 
                    },
                    { data: 'time_update',
                        className: "text-center" 
                    },
                    { data: null,
                        render: function (data, type, row, meta) {
                            var detail = `<button class="btn btn-sm btn-primary detail-round"`+
                                `data-round_id='${row.enc_id}'`+
                                `>รายละเอียด</button>`;

                            if (row.member == 0) {   
                                var year = parseInt( row.date_test.substring(0,4) ) +543;
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                var date = `${row.date_test.substring(8)}-${row.date_test.substring(5,7)}-${year}`;
                                var hour = `${row.time_test.substring(0,2)}`;
                                var minute = `${row.time_test.substring(3)}`;
                                var room_id = `${row.room_id}`;

<<<<<<< HEAD
                                var button = `<button class="btn btn-sm btn-primary edit-round"
                                    data-room="${row.room_name}"
                                    data-round_id="${row.enc_id}"
                                    data-round="${row.round}"
                                    data-date="${date}"
                                    data-hour="${hour}"
                                    data-minute="${minute}"
                                    data-active="${row.active}"
                                    data-total-seat="${row.total}"
                                    >แก้ไข</button>`;
=======
                                var button = `<button class="btn btn-sm btn-primary edit-round"`+
                                    `data-room='${row.room_name}'`+
                                    `data-round_id='${row.enc_id}'`+
                                    `data-round='${row.round}'`+
                                    `data-date='${date}'`+
                                    `data-hour='${hour}'`+
                                    `data-minute='${minute}'`+
                                    `data-active='${row.active}'`+
                                    `>แก้ไข</button>`;                                   
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                            } else {
                                button = `<a class="btn btn-sm btn-light" href="<?= site_url('manage_round/generate_excel/') ?>${row.enc_id}" > มีผู้ลงทะเบียนแล้ว </a>`;
                            }

                            if (row.active == 'y') {
                                var button2 = `<button class="btn btn-sm btn-danger disable-round" data-round_id="${row.enc_id}"> ปิดลงทะเบียน </button>`;
                            } else {
                                var button2 = `<button class="btn btn-sm btn-success enable-round" data-round_id="${row.enc_id}"> เปิดลงทะเบียน </button>`;
                            }

                            return `${detail} ${button2} ${button}`;
                        }
                    }
                ]
            });
        }

        generate_datatable();

        $("#create-round-form").submit(function() { // submit to create round
            $("#rs").html(`กำลังโหลดข้อมูล... <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>`);
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                url: "<?= site_url('manage_round/ajax_create_round') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    // console.log(data);
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

        $(document).on("click", ".edit-round", function() { // insert data in modal when click edit round 
<<<<<<< HEAD
            let room_name = $(this).data("room");
            let date = $(this).data("date");
            let hour = $(this).data("hour");
            let minute = $(this).data("minute").substring(0, 1);
            let round_id = $(this).data("round_id");
            let round = $(this).data("round");
            let active = $(this).data("active");
            let amountSeat = $(this).data("total-seat");

=======
            var room_name   = $(this).attr("data-room");
            var date        = $(this).attr("data-date");
            var hour        = $(this).attr("data-hour");
            var minute      = $(this).attr("data-minute");
            var round_id    = $(this).attr("data-round_id");
            var round       = $(this).attr("data-round");
            var active      = $(this).attr("data-active");
            console.log(minute);

            // $("form#edit-round-form").find("input[name='room']").val(room_name);
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
            $("form#edit-round-form").find("input[name='date']").val(date);
            $("form#edit-round-form").find("input[name='hour']").val(hour);
            $("form#edit-round-form").find("input[name='minute']").val(minute);
            $("form#edit-round-form").find("input[name='round_id']").val(round_id);
            $("form#edit-round-form").find("input[name='round']").val(round);
<<<<<<< HEAD
            $("form#edit-round-form").find("input[name='amount_seat']").val(amountSeat);
            $(".delete-round").data('round_id', round_id);

            $("#list-select-edit > option").each(function() {
                let name = $(this).text();
                if (name === room_name) {
                    $(this).attr({
                        "selected": true
                    });
                } else {
                    $(this).attr({
                        "selected": false
                    });
                }
            });

            // $("#round_active > option").each(function() {
            //     let name = $(this).val();
            //     if (name === active) {
            //         $(this).attr({
            //             "selected": true
            //         });
            //     } else {
            //         $(this).attr({
            //             "selected": false
            //         });
            //     }
            // });

            $("#rs-edit-room").html('');
            $("#rs-edit-room").attr('class', '');
=======
            $(".delete-round").attr({"data-round_id":round_id});

            $("#list-select-edit > option").each(function() {
                var name = $(this).text();

                if (name === room_name) {
                    $(this).attr({"selected": true});
                } else {
                    $(this).attr({"selected": false});
                }
            });

            $("#round_active > option").each(function() {
                var name = $(this).val();

                if (name === active) {
                    $(this).attr({"selected": true});
                } else {
                    $(this).attr({"selected": false});
                }
            });
            
            $("#rs-edit-room").html('');
            $("#rs-edit-room").attr('class', '');

>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
            $("#edit-round-Modal").modal();
        });

        $(function() { // list room in modal create round
            $.ajax({
                url: "<?= site_url('manage_round/ajax_list_room') ?>",
                dataType: "json",
                success: function(data) {
                    var option = '';
                    data.forEach(element => {
                        option += `<option value="${element.enc_id}">${element.room_name}</option>`
                    });
                    $("#select-room-loading").html('');
                    $("#list-select-room").html(option);
                    $("#list-select-edit").html(option);
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });
        });

        $("#edit-round-form").submit(function() { // submit to edit round           
            var formData = $(this).serialize();
<<<<<<< HEAD
=======
            console.log(formData);
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
            $.ajax({
                url: "<?= site_url('manage_round/ajax_update_round') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
<<<<<<< HEAD
=======
                    console.log(data);
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                    if (data.status) {
                        $("#rs-edit-round").html('');
                        $("#rs-edit-round").attr('class', 'alert alert-success');
                        $("#rs-edit-round").html(data.text);

                        generate_datatable();
                    } else {
                        $("#rs-edit-round").html('');
                        $("#rs-edit-round").attr('class', 'alert alert-danger');
                        $("#rs-edit-round").html(`! ${data.text}`);
                    }
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });

            return false;
        });

        $(document).on("click", ".detail-round", function() { // generate detail modal
            var room_name = $(this).parent('td').siblings('td').children('span.room-name').text();
            var datetime_test = $(this).parent('td').siblings('td').children('span.datetime-test').text();
            var round_id = $(this).attr("data-round_id");

            $("#round-detail-heading").html(`${datetime_test} ${room_name}`);
<<<<<<< HEAD
            $(".submit-detail").attr({
                "data-round_id": round_id
            });
            $("#reload-round-detail").attr({
                "data-round_id": round_id
            });
=======
            $(".submit-detail").attr({"data-round_id": round_id});
            $("#reload-round-detail").attr({"data-round_id": round_id});
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
            generate_detail(round_id);
            $("#round-detail-Modal").modal();
        });

        function generate_detail(round_id) {
            $("#member-table").DataTable({
<<<<<<< HEAD
                responsive: true,
=======
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                destroy: true,
                stateSave: true,
                ajax: {
                    url: "<?= site_url('manage_round/ajax_get_registered_data') ?>",
<<<<<<< HEAD
                    data: {
                        round: round_id
                    },
                    type: "POST",
                    dataSrc: ""
                },
                columns: [{
                        data: 'enc_id',
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            var checkbox = `<div class="form-check">` +
                                `<input class="form-check-input position-static" type="checkbox" style="width:20px;height:20px;" name="seat[]" value="${data}">` +
                                `</div>`;
=======
                    data: {round: round_id},
                    type: "POST",
                    dataSrc: ""
                },
                columns: [
                    { data: 'enc_id',
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            var checkbox = `<div class="form-check">`+
                                `<input class="form-check-input position-static" type="checkbox" style="width:20px;height:20px;" name="seat[]" value="${data}">`+
                            `</div>`;
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

                            return checkbox;
                        }
                    },
<<<<<<< HEAD
                    {
                        data: 'seat_number'
                    },
                    {
                        data: 'name',
                        className: "text-center"
                    },
                    {
                        data: 'unit_name',
                        className: "text-center"
                    },
                    {
                        data: 'tel_number',
                        className: "text-center"
                    },
                    {
                        data: 'time_user_register',
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            if (data) {
                                var position = data.indexOf('#');
                                var date = data.substring(position + 1);
                            } else {
                                var date = '-';
                            }
                            return date;
                        }
                    },
                    {
                        data: 'active',
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            var active = (data == 'y') ? `<span class="text-success">ที่นั่งเปิด</span>` : `<span class="text-danger">ที่นั่งปิด</span>`;

                            return active;
                        }
                    },
                    {
                        data: 'room_name',
                        className: "text-center"
                    }
=======
                    { data: 'seat_number'
                    },
                    { data: 'name',
                        className: "text-center"                    
                    },
                    { data: 'unit_name',
                        className: "text-center"
                    },
                    { data: 'tel_number',
                        className: "text-center"
                    },
                    { data: 'time_user_register',
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            if(data){
                                var position = data.indexOf('#');
                                var date = data.substring(position+1);
                            } else {
                                var date = '-';
                            } 
                            return date;
                        }
                    },
                    { data: 'confirm',
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            var confirm = (data == 'y') ? `<span class="text-success">ยืนยันแล้ว</span>` : `<span class="text-danger">ยังไม่ได้ยืนยัน</span>` ;

                            return confirm;
                        }
                    },
                    { data: 'active',
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            var active  = (data == 'y') ? `<span class="text-success">ที่นั่งเปิด</span>` : `<span class="text-danger">ที่นั่งปิด</span>` ;

                            return active;
                        } 
                    },
                    { data: 'room_name',
                        className: "text-center" 
                    }                    
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                ]

            });
        }

<<<<<<< HEAD
        // $(document).on("click", ".close-seat", function() { // click close seat 
        //     $("#round-detail-loading").html(`กำลังโหลด...` +
        //         `<div class="spinner-border text-primary" role="status">` +
        //         `<span class="sr-only">Loading...</span>` +
        //         `</div>`);

        //     var formData = $(this).parent("#round-detail-form").serialize();
        //     var round_id = $(this).attr("data-round_id");
        //     // console.log(formData);

        //     $.ajax({
        //         url: "<?= site_url('manage_round/ajax_close_seat') ?>",
        //         data: formData,
        //         type: "POST",
        //         dataType: "json",
        //         success: function(data) {
        //             generate_detail(round_id);
        //             generate_datatable();
        //             $("#round-detail-loading").html('');
        //         },
        //         error: function(jhx, status, error) {
        //             console.log(`${jhx}, ${status}, ${error}`);
        //         }
        //     });
        // });

        // $(document).on("click", ".open-seat", function() { // click open seat 
        //     $("#round-detail-loading").html(`กำลังโหลด...` +
        //         `<div class="spinner-border text-primary" role="status">` +
        //         `<span class="sr-only">Loading...</span>` +
        //         `</div>`);

        //     var formData = $(this).parent("#round-detail-form").serialize();
        //     var round_id = $(this).attr("data-round_id");
        //     // console.log(formData);

        //     $.ajax({
        //         url: "<?= site_url('manage_round/ajax_open_seat') ?>",
        //         data: formData,
        //         type: "POST",
        //         dataType: "json",
        //         success: function(data) {
        //             generate_detail(round_id);
        //             generate_datatable();
        //             $("#round-detail-loading").html('');
        //         },
        //         error: function(jhx, status, error) {
        //             console.log(`${jhx}, ${status}, ${error}`);
        //         }
        //     });
        // });

        // $(document).on("click", ".clear-seat", function() { // click clear seat 
        //     $("#round-detail-loading").html(`กำลังโหลด...` +
        //         `<div class="spinner-border text-primary" role="status">` +
        //         `<span class="sr-only">Loading...</span>` +
        //         `</div>`);

        //     var message = `ยืนยันการลบ ผู้ลงทะเบียน`;
        //     if (confirm(message)) {
        //         var formData = $(this).parent("#round-detail-form").serialize();
        //         var round_id = $(this).attr("data-round_id");

        //         $.ajax({
        //             url: "<?= site_url('manage_round/ajax_clear_seat') ?>",
        //             data: formData,
        //             type: "POST",
        //             dataType: "json",
        //             success: function(data) {
        //                 generate_detail(round_id);
        //                 generate_datatable();
        //                 $("#round-detail-loading").html('');
        //             },
        //             error: function(jhx, status, error) {
        //                 console.log(`${jhx}, ${status}, ${error}`);
        //             }
        //         });

        //         return true;
        //     } else {
        //         $("#round-detail-loading").html('');
        //         return false;
        //     }
        // });
=======
        $(document).on("click", ".close-seat", function() { // click close seat 
            $("#round-detail-loading").html(`กำลังโหลด...`+
                `<div class="spinner-border text-primary" role="status">`+
                    `<span class="sr-only">Loading...</span>`+
                `</div>`);

            var formData = $(this).parent("#round-detail-form").serialize();
            var round_id = $(this).attr("data-round_id");
            // console.log(formData);

            $.ajax({
                url: "<?= site_url('manage_round/ajax_close_seat') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    generate_detail(round_id);
                    generate_datatable();
                    $("#round-detail-loading").html('');
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });
        });

        $(document).on("click", ".open-seat", function() { // click open seat 
            $("#round-detail-loading").html(`กำลังโหลด...`+
                `<div class="spinner-border text-primary" role="status">`+
                    `<span class="sr-only">Loading...</span>`+
                `</div>`);
                
            var formData = $(this).parent("#round-detail-form").serialize();
            var round_id = $(this).attr("data-round_id");
            // console.log(formData);

            $.ajax({
                url: "<?= site_url('manage_round/ajax_open_seat') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    generate_detail(round_id);
                    generate_datatable();
                    $("#round-detail-loading").html('');
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });
        });

        $(document).on("click", ".clear-seat", function() { // click clear seat 
            $("#round-detail-loading").html(`กำลังโหลด...`+
                `<div class="spinner-border text-primary" role="status">`+
                    `<span class="sr-only">Loading...</span>`+
                `</div>`);
                
            var message = `ยืนยันการลบ ผู้ลงทะเบียน`;
            if ( confirm(message) ) {
                var formData = $(this).parent("#round-detail-form").serialize();
                var round_id = $(this).attr("data-round_id");

                $.ajax({
                    url: "<?= site_url('manage_round/ajax_clear_seat') ?>",
                    data: formData,
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        generate_detail(round_id);
                        generate_datatable();
                        $("#round-detail-loading").html('');
                    },
                    error: function(jhx, status, error) {
                        console.log(`${jhx}, ${status}, ${error}`);
                    }
                });
                
                return true;
            } else {
                $("#round-detail-loading").html('');
                return false;
            }
        });
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

        $(document).on("click", ".disable-round", function() { // click clear seat  
            var round_id = $(this).attr("data-round_id");

            $.ajax({
                url: "<?= site_url('manage_round/ajax_disable_round') ?>",
<<<<<<< HEAD
                data: {
                    round_id: round_id
                },
=======
                data: {round_id: round_id},
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                type: "POST",
                dataType: "json",
                success: function(data) {
                    generate_datatable();
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });
        });

        $(document).on("click", ".enable-round", function() { // click clear seat  
            var round_id = $(this).attr("data-round_id");

            $.ajax({
                url: "<?= site_url('manage_round/ajax_enable_round') ?>",
<<<<<<< HEAD
                data: {
                    round_id: round_id
                },
=======
                data: {round_id: round_id},
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                type: "POST",
                dataType: "json",
                success: function(data) {
                    generate_datatable();
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });
        });

        $(".delete-round").click(function() { // click clear seat  
<<<<<<< HEAD
            var round_id = $(this).data("round_id");
            var message = `ยืนยันการลบ วัน-เวลาการทดสอบนี้`;

            if (confirm(message)) {
                $.ajax({
                    url: "<?= site_url('manage_round/ajax_delete_round') ?>",
                    data: {
                        round_id: round_id
                    },
=======
            var round_id = $(this).attr("data-round_id");
            var message = `ยืนยันการลบ วัน-เวลาการทดสอบนี้`;
            
            if ( confirm(message) ) {
                $.ajax({
                    url: "<?= site_url('manage_round/ajax_delete_round') ?>",
                    data: {round_id: round_id},
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            $("#rs-edit-round").html('');
                            $("#rs-edit-round").attr('class', 'alert alert-success');
                            $("#rs-edit-round").html(data.text);

                            generate_datatable();
                        } else {
                            $("#rs-edit-round").html('');
                            $("#rs-edit-round").attr('class', 'alert alert-danger');
                            $("#rs-edit-round").html(`! ${data.text}`);
                        }
                    },
                    error: function(jhx, status, error) {
                        console.log(`${jhx}, ${status}, ${error}`);
                    }
                });

                return true;

            } else {
                return false;
            }
        });

        $("#reload-round-detail").click(function() {
            var round_id = $(this).attr("data-round_id");
            generate_detail(round_id);
            generate_datatable();
        });

    });
</script>