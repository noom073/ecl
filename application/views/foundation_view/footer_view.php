    <div class="text-center">
        <div class="text-center">สถาบันภาษากองทัพไทย</div>
        <div class="text-center">RTARF Language Institute</div>
        <div class="text-center">โทร. 0 2241 2716</div>
        <a id="log-in" href="<?= site_url('admin/index') ?>" data-toggle="modal" data-target="#log-inModal">Administrator</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="log-inModal" tabindex="-1" role="dialog" aria-labelledby="log-inModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="<?= base_url('assets/images/RTES1.png') ?>" width="75" alt="RSES">
                    <span class="mx-2">ผู้ดูแลระบบ การทดสอบวัดระดับภาษาอังกฤษ ของ บก.ทท.</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="logIn-form">
                        <div class="form-group">
                            <label>RTARF Mail</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="user">
                                <div class="input-group-append">
                                    <span class="input-group-text">@rtarf.mi.th</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" id="logIn-form-submit-btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="container" id="rs"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center py-2">
        <img src="<?= base_url('assets/images/RTES1.png') ?>" width="100" alt="RSES">
        <span class="d-block">
            Version 2.0
        </span>
    </div>
    </body>

    <!-- <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/my-css.css') ?>">
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/popper/popper.min.js') ?>"></script>   -->

    <script>
        $(document).ready(function() {

            $("#logIn-form").submit(function() {
                let formData = $(this).serialize();
                $("#logIn-form-submit-btn").prop('disabled', true);
                $("#rs").html('Loading...');
                $.ajax({
                    url: '<?= site_url('login/ajax_login_proc') ?>',
                    data: formData,
                    type: 'POST',
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        if (res.status) {
                            $("#rs").attr('class', 'alert alert-success');
                            $("#rs").html(`${res.data.nameth}`);

                            setInterval(() => {
                                window.location.replace("<?= site_url('admin/index') ?>");
                            }, 1500);

                        } else {
                            $("#rs").attr('class', 'alert alert-warning');
                            $("#rs").html(`${res.text}`);
                            $("#logIn-form-submit-btn").prop('disabled', false);
                        }
                    },
                    error: function(jhx, status, error) {
                        console.log(`${jhx} ${status} ${error}`);
                    }
                });

                return false;
            });
        });
    </script>

    </html>