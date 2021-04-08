<div class="container-fluid h-full">
    <div class="main container-fluid">
        <div class="">
            <div class="bg-white m-2 p-2">
                <div class="h2">Update คะแนนผู้สอบ จากบริษัท</div>
                <div class="">
                    <button id="pulling-score-btn" class="btn btn-sm btn-primary">+ Update Data</button>
                    <small class="d-block mt-1">
                        Lastest updated:
                        <span id="lastest-updated" class="text-danger"><?= $lastestDate ?></span>
                    </small>
                </div>
            </div>

            <div class="m-2 p-2">
                <div id="success-datail"></div>
                <div id="failure-datail"></div>
            </div>
        </div>
    </div>
</div>

<div class="all-modal"></div>

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
        $("#admin-score").addClass('active');
        $("#admin-score-ext-pulling").addClass('active');

        $("#pulling-score-btn").click(function() {
            let thisBtn = $(this);
            thisBtn.prop('disabled', true);
            $.get({
                url: '<?= site_url('score/ajax_get_external_jarmy_score') ?>',
                dataType: 'json'
            }).done(res => {
                console.log(res);
                if ($.isEmptyObject(res.scores) == false) {
                    if (res.scores.success.length) {
                        let num = 0;
                        let html = '';
                        res.scores.success.forEach(element => {
                            num++;
                            html += `<div>${num}. ${element.person.job_name} -> ${element.person.user_fname} **${element.text}</div>`;
                        });
                        $("#success-datail").prop('class', 'alert alert-success');
                        $("#success-datail").html(html);
                    }

                    if (res.scores.failure.length) {
                        let num = 0;
                        let html = '';
                        res.scores.failure.forEach(element => {
                            num++;
                            html += `<div>${num}. ${element.person.job_name} -> ${element.person.user_fname} **${element.text}</div>`;
                        });
                        $("#failure-datail").prop('class', 'alert alert-warning');
                        $("#failure-datail").html(html);
                    }
                }
                $("#lastest-updated").text(res.lastestDate);
                thisBtn.prop('disabled', false);
            }).fail((jhr, status, error) => console.error(jhr, status, error));
        });

    });
</script>