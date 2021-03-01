<div class="container-fluid h-full">
    <div class="main container-fluid">
        <div class="">
            <div class="bg-white m-2 p-2">
                <div class="h2">สรุปจำนวนผู้เข้าสอบ</div>
                <div class="">
                </div>
            </div>

            <div class="m-2 p-2">
                <div class="mb-3">
                    <div class="col-md-4">
                        <label>รอบที่</label>
                        <select name="round" class="form-control" id="round-select">
                            <option value="">ระบุรอบ</option>
                            <?php foreach ($round as $r) { ?>
                                <option value="<?= $r->round ?>"><?= $r->round ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="h3 text-center" id="search-result"></div>
                </div>
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


        let dataTable = $("#ecl-table").DataTable({
            // responsive: true,
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


        const getTesterTotal = round => {
            return $.post({
                url: '<?= site_url('admin/ajax_tester_total') ?>',
                data: {
                    round: round
                },
                dataType: 'json'
            }).done().fail((jhr, status, error) => console.error(jhr, status, error));
        };


        $("#round-select").change(async function() {
            $("#search-result").text('Loading...');
            dataTable.clear().draw();
            let round = $(this).val();
            console.log(round);
            let testerTotal = await getTesterTotal(round);
            dataTable.rows.add(testerTotal).draw();
            $("#search-result").text('');
        });

    });
</script>