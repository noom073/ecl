<div class="container-fluid h-full">
    <div class="main container-fluid">
        <div>
            <div class="bg-white m-2 p-2">
                <div class="h2">Check ผู้สอบ</div>
                <div class="container">
                    <form id="check-user-form">
                        <div class="form-group">
                            <label>เลขประชาชน</label>
                            <input type="text" class="form-control" maxlength="13" name="idp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">รอบ</label>
                            <select class="form-control" name="roundID">
                                <?php foreach ($roundsTest as $r) { ?>
                                    <?php
                                    $date = $this->main_model->convert_data_to_thai($r->date_test);

                                    ?>
                                    <option value="<?= $r->row_id ?>"><?= "วันที่ {$date} {$r->time_test} {$r->room_name}" ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" id="check-user-form-btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="container">
                    <div id="check-result"></div>
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

<script>
    $(document).ready(function() {

        $(".nav-item").removeClass('active');
        $("#admin-check-user.nav-item").addClass('active');


        $("#check-user-form").submit(function(event) {
            event.preventDefault();
            let formData = $(this).serialize();
            $("#check-user-form-btn").prop('disabled', true);
            $("#check-result").prop('class', '');
            $("#check-result").html('Loading...');
            $.post({
                url: '<?= site_url('admin_check_user/ajax_get_register_data_by_round') ?>',
                data: formData,
                dataType: 'json'
            }).done(res => {
                if (res.data) {
                    let y = parseInt(res.data.date_test.substring(0, 4)) + 543;
                    let m = toThaiDate(res.data.date_test.substring(5, 7));
                    let d = res.data.date_test.substring(8);
                    let date = `${d} ${m} ${y} ${res.data.time_test}`;
                    let html = `
                        <div>
                            <img src="${res.image}" alt="personImage" width="150">
                        </div>
                        <div><b>* พบข้อมูล</b></div>
                        <div>
                            <label>ยศ ชื่อ สกุล:</label><span> ${res.data.name}</span>
                        </div>
                        <div>
                            <label>สังกัด:</label><span> ${res.data.unit_name}</span>
                        </div>
                        <div>
                            <label>วันเดือนปี เข้ารับการทดสอบ:</label><span class="text-danger"> วันที่ ${date} น.</span>
                        </div>
                        <div>
                            <label>ลำดับที่นั่ง:</label><span class="text-danger"> ${res.data.seat_number}</span>
                        </div>
                        <div>
                            <label>สถานที่:</label><span class="text-danger"> ${res.data.room_name}</span>
                        </div>
                        <div>
                            <button id="tester-check-in" class="btn btn-success" data-row-id=${res.data.row_id}>Check In</button>
                            <button id="cancel-check-in" class="btn btn-danger">Cancel</button>
                        </div>
                        `;
                    $("#check-result").prop('class', 'alert alert-success');
                    $("#check-result").html(html);
                } else {
                    let html = `<div><b>! ไม่พบข้อมูล</b></div>`;
                    $("#check-result").prop('class', 'alert alert-danger');
                    $("#check-result").html(html);
                }
                $("#check-user-form-btn").prop('disabled', false);
            }).fail((jhr, status, error) => console.error(jhr, status, error));
        });


        $(document).on('click', "#cancel-check-in", function() {
            $("#check-user-form").trigger('reset');
            $("#check-result").html('');
            $("#check-result").prop('class', '');
        });


        $(document).on('click', "#tester-check-in", function() {
            if (confirm('ยืนยันการ Check In ?')) {
                let rowID = $(this).data('row-id');
                $.post({
                    url: '<?= site_url('admin_check_user/ajax_checkin_tester') ?>',
                    data: {
                        rowID: rowID
                    },
                    dataType: 'json'
                }).done(res => {
                    console.log(res);
                    if (res.status) {
                        alert('Check In สำเร็จ');
                    } else {
                        alert('!!! Check In ไม่สำเร็จ');                        
                    }
                }).fail((jhr, status, error) => console.error(jhr, status, error));
            } else {

            }
        });

    });
</script>