<<<<<<< HEAD
<div class="container-fluid h-full">
    <div class="main container">
        <div class="my-bg-image">
            <div class="my-3">
                <div class="h3 text-center">ระบบลงทะเบียน การทดสอบวัดระดับภาษาอังกฤษ ของ บก.ทท.</div>
                <div class="h4 text-center">รอบที่ <?= $round->round ?></div>

                <div id="marq" class="alert alert-danger">
                    <span class="h4">
                        <img src="<?= base_url('assets/images/AlertIcon.gif') ?>" width="25" />
                        สภท.บก.สปท. ปรับลดจำนวนผู้เข้ารับการทดสอบในแต่ละรอบ เพื่อดำเนินการตามมาตรการป้องกันการแพร่ระบาดของไวรัส COVID-19
                    </span>
                </div>

                <div class="">
                    <?php if ($avaiable == 0) { ?>
=======
<div class="container-fluid h-full">  
    <div class="main container">
        <div class="my-bg-image">
            <div class="my-3">
                <div class="h3 text-center">ระบบลงทะเบียน การทดสอบวัดระดับภาษาอังกฤษ ของ บก.ทท.</div> 
                <div class="h4 text-center">รอบที่ <?= $round->round ?></div>
				
				<div id="marq" class="alert alert-danger">
					<span class="h4">
						<img src="<?= base_url('assets/images/AlertIcon.gif') ?>" width="25" />
						สภท.บก.สปท. ปรับลดจำนวนผู้เข้ารับการทดสอบในแต่ละรอบ เพื่อดำเนินการตามมาตรการป้องกันการแพร่ระบาดของไวรัส COVID-19
					</span>
				</div>
				
                <div class="">
                    <?php if($avaiable == 0) { ?>
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                        <div class="alert alert-danger h5">
                            <span>** ปิดการลงทะเบียนแล้ว **</span>
                        </div>
                    <?php } ?>
<<<<<<< HEAD
                </div>
=======
                </div> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header my-bg-blue" id="register">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#register-contain" aria-expanded="true" aria-controls="register-contain">
<<<<<<< HEAD
                                    <div class="h4">ลงทะเบียนเข้ารับการทดสอบ</div>
=======
                                    <div class="h4">ลงทะเบียนเข้ารับการทดสอบ</div> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                </button>
                            </h2>
                        </div>

                        <div id="register-contain" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <form id="register-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>หมายเลขบัตรประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" name="idp" maxlength="13">
<<<<<<< HEAD
                                        </div>
=======
                                        </div> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label>รอบที่</label>
                                            <select class="form-control" name="round">
                                                <option value="<?= $round->round  ?>"><?= $round->round  ?></option>
                                            </select>
<<<<<<< HEAD
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                                <div id="rs-register-form" class="my-2"></div>
                                <div id="rs-register-detail" class="my-2"></div>
=======
                                        </div> 
                                    </div>                          
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form> 

                                <div id="rs-register-form" class="my-2"></div>                               
                                <div id="rs-register-detail" class="my-2"></div>                               
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header my-bg-blue" id="check-registered">
                            <h2 class="mb-0">
<<<<<<< HEAD
                                <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#check-registered-contain" aria-expanded="false" aria-controls="check-registered-contain">
                                    <div class="h4">ตรวจสอบผลการลงทะเบียน</div>
=======
                                <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#check-registered-contain" aria-expanded="false" aria-controls="check-registered-contain">                                
                                <div class="h4">ตรวจสอบผลการลงทะเบียน</div> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                </button>
                            </h2>
                        </div>

                        <div id="check-registered-contain" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
<<<<<<< HEAD
                                <form id="check-registered-form">
=======
                                <form id="check-registered-form">                                                    
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>หมายเลขบัตรประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" name="idp" maxlength="13">
<<<<<<< HEAD
                                        </div>
=======
                                        </div> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label>รอบที่</label>
                                            <select class="form-control" name="round">
                                                <option value="<?= $round->round  ?>"><?= $round->round  ?></option>
                                            </select>
<<<<<<< HEAD
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
=======
                                        </div> 
                                    </div>                                  
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>                                 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

                                <div id="check-registered-detail" class="my-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header my-bg-blue" id="check-score">
                            <h2 class="mb-0">
<<<<<<< HEAD
                                <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#check-score-contain" aria-expanded="false" aria-controls="check-score-contain">
                                    <div class="h4">ผลการทดสอบ</div>
=======
                                <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#check-score-contain" aria-expanded="false" aria-controls="check-score-contain">                                
                                <div class="h4">ผลการทดสอบ</div> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                                </button>
                            </h2>
                        </div>

                        <div id="check-score-contain" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <form id="check-score-form">
                                    <div class="form-group">
                                        <label>หมายเลขบัตรประจำตัวประชาชน</label>
                                        <input type="text" class="form-control col-md-4" name="idp" maxlength="13">
<<<<<<< HEAD
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
=======
                                    </div>                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form> 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

                                <div id="check-score-detail" class="my-2"></div>

                                <div class="my-2 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ชื่อ นามสกุล</th>
                                                <th>หน่วย</th>
                                                <th>เวลาที่สอบ</th>
                                                <th>คะแนน</th>
                                            </tr>
                                        </thead>
                                        <tbody id="score-table"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
<<<<<<< HEAD
    #marq {
        white-space: nowrap;
        overflow: hidden;
    }

    #marq span {
        display: inline-block;
        padding-left: 100%;
        animation: mymarq 50s linear infinite;
    }

    #marq span:hover {
        animation-play-state: paused
    }

    @keyframes mymarq {
        0% {
            transform: translate(0, 0);
        }

        100% {
            transform: translate(-100%, 0);
        }
    }
=======
#marq {
	white-space: nowrap;
	overflow: hidden;
}

#marq span {
	display: inline-block;
	padding-left: 100%;	
	animation: mymarq 35s linear infinite;
}

#marq span:hover {
  animation-play-state: paused
}

@keyframes mymarq {
	0% {
		transform: translate(0, 0);
	}
	100% {
		transform: translate(-100%, 0);
	}
}
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
</style>

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

<script>
    $(document).ready(function() {

        $("#register-form").submit(function() {
            var formData = $(this).serialize();

            $.ajax({
                url: "<?= site_url('main/ajax_check_member_register') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    if (data.status == 'not-register') {
                        $("#rs-register-form").html('');
                        $("#rs-register-form").attr('class', 'my-2 alert alert-success');
                        $("#rs-register-form").html(data.text);

                        var html = set_detail_registered(data);
<<<<<<< HEAD
=======
                        console.log(555);
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                        $("#rs-register-detail").attr('class', 'my-2');
                        $("#rs-register-detail").html(html);

                    } else if (data.status == 'registered') {
                        $("#rs-register-form").html('');
                        $("#rs-register-form").attr('class', 'my-2 alert alert-info');
<<<<<<< HEAD
                        $("#rs-register-form").html(`${data.text}`);

=======
                        $("#rs-register-form").html(`${data.text}`);  
                        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                        var html = set_detail_registered(data);

                        $("#rs-register-detail").html(html);
                    } else if (data.status == 'multi-email') {
                        console.log('multi-email');
<<<<<<< HEAD
                        let emails = data.emails.join(', ');

=======
						let emails = data.emails.join(', ');
						
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                        $("#rs-register-form").html('');
                        $("#rs-register-form").attr('class', 'my-2 alert alert-danger');
                        $("#rs-register-form").html(`! ${data.text} : ${emails}`);
                        $("#rs-register-detail").html('');
                    } else {
                        console.log('not-found');
                        $("#rs-register-form").html('');
                        $("#rs-register-form").attr('class', 'my-2 alert alert-danger');
                        $("#rs-register-form").html(`! ${data.text}`);
                        $("#rs-register-detail").html('');
                    }
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });

            return false;
<<<<<<< HEAD

=======
            
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
        });

        function set_detail_registered(data) {
            if (data.status == 'registered') {
<<<<<<< HEAD
                var y = parseInt(data.registered.date_test.substring(0, 4)) + 543;
                var m = toThaiDate(data.registered.date_test.substring(5, 7));
                var d = data.registered.date_test.substring(8);
                var date = `${d} ${m} ${y} ${data.registered.time_test}`;

                var html = `<div>
                    <label>ยศ ชื่อ สกุล: </label><span> ${data.registered.name}</span>
                    </div>
                    <div>
                     <label>สังกัด: </label><span> ${data.registered.unit_name}</span>
                    </div>
                    <div>
                        <label>วันเดือนปี เข้ารับการทดสอบ: </label><span class="text-danger"> ${date} น.</span>
                    </div>
                    <div>
                        <label>ลำดับที่นั่ง: </label><span> ${data.registered.seat_number}</span>
                    </div>
                    <div>
                        <label>สถานที่: </label><span class="text-danger"> ${data.registered.room_name}</span>
                    </div>
                    <div>
                        <button class="btn btn-danger clear-registered" data-rid="${data.registered.row_id}">ยกเลิกการลงทะเบียน</button>
                    </div>`;

            } else if (data.status == 'not-register') {
                if (data.room.length > 0) {
                    var option = '';
                    data.room.forEach(element => {
                        var y = parseInt(element.date_test.substring(0, 4)) + 543;
                        var m = toThaiDate(element.date_test.substring(5, 7));
=======
                var y = parseInt(data.registered.date_test.substring(0,4)) + 543;
                var m = toThaiDate(data.registered.date_test.substring(5,7));
                var d = data.registered.date_test.substring(8);
                var date = `${d} ${m} ${y} ${data.registered.time_test}`;
    
                var html = `<div>`+
                            `<label>ยศ ชื่อ สกุล: </label><span> ${data.registered.name}</span>`+
                        `</div>`+
                        `<div>`+
                            ` <label>สังกัด: </label><span> ${data.registered.unit_name}</span>`+
                        `</div>`+
                        `<div>`+
                            `<label>วันเดือนปี เข้ารับการทดสอบ: </label><span class="text-danger"> ${date} น.</span>`+
                        `</div>`+
                        `<div>`+
                            `<label>ลำดับที่นั่ง: </label><span> ${data.registered.seat_number}</span>`+
                        `</div>`+
                        `<div>`+
                            `<label>สถานที่: </label><span class="text-danger"> ${data.registered.room_name}</span>`+
                        `</div>`+
                        `<div>`+
                            `<button class="btn btn-danger clear-registered" data-rid="${data.registered.row_id}">ยกเลิกการลงทะเบียน</button>`+
                        `</div>`;  

            } else if (data.status == 'not-register'){
                if (data.room.length > 0) {
                    var option = '';
                    data.room.forEach(element => {
                        var y = parseInt(element.date_test.substring(0,4)) + 543;
                        var m = toThaiDate(element.date_test.substring(5,7));
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                        var d = element.date_test.substring(8);
                        var date = `${d} ${m} ${y} ${element.time_test} น.`;
                        option += `<option value="${element.row_id}:${element.round}">วันที่ ${date} ${element.room_name}</option>`;
                    });

<<<<<<< HEAD
                    var html = `<form id="registering-form">
                            <div class="form-group">
                                <label>ยศ ชื่อ สกุล:</label>
                                <input type="text" class="form-control col-md-4 bg-white" name="name" value="${data.member.name}" readonly>
                                <input type="hidden" name="idp" value="${data.member.idp}">
                            </div>  
                            <div class="form-group">
                                <label>สังกัด:</label>
                                <input type="text" class="form-control col-md-4 bg-white" name="unit_name" value="${data.member.unitname}" readonly>
                                <input type="hidden" name="unit_code" value="${data.member.unit}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>หมายเลขโทรศัพท์:</label>
                                    <input type="text" class="form-control" name="tel_number" value="">                            
                                </div> 
                                <div class="form-group col-md-8">
                                    <label>E-mail:</label>
                                    <input type="text" class="form-control bg-white" name="email" value="${data.member.email}" readonly>
                                </div> 
                            </div>
                            <div class="form-group">
                                <label>วันเดือนปี เข้ารับการทดสอบ:</label>
                                <span class="text-danger"> แสดงเฉพาะรอบที่ยังไม่เต็ม</span>
                                <select class="form-control col-md-6" name="round">${option}</select>
                            </div>
                            <button type="submit" class="btn btn-primary">บันทึกการลงทะเบียน</button>
                        </form>`;

                } else {
                    var html = `<div class="alert alert-warning">จำนวนที่นั่งเต็มทุกห้อง | ยังไม่เปิดลงทะเบียน<div>`;
                }
=======
                    var html =`<form id="registering-form">`+
                            `<div class="form-group">`+
                                `<label>ยศ ชื่อ สกุล:</label>`+
                                `<input type="text" class="form-control col-md-4 bg-white" name="name" value="${data.member.name}" readonly>`+
                                `<input type="hidden" name="idp" value="${data.member.idp}">`+
                            `</div>`+  
                            `<div class="form-group">`+
                                `<label>สังกัด:</label>`+
                                `<input type="text" class="form-control col-md-4 bg-white" name="unit_name" value="${data.member.unitname}" readonly>`+
                                `<input type="hidden" name="unit_code" value="${data.member.unit}">`+
                            `</div>`+
                            `<div class="form-row">`+
                                `<div class="form-group col-md-4">`+
                                    `<label>หมายเลขโทรศัพท์:</label>`+
                                    `<input type="text" class="form-control" name="tel_number" value="">`+                            
                                `</div>`+ 
                                `<div class="form-group col-md-8">`+
                                    `<label>E-mail:</label>`+
                                    `<input type="text" class="form-control bg-white" name="email" value="${data.member.email}" readonly>`+
                                `</div>`+ 
                            `</div>`+
                            `<div class="form-group">`+
                                `<label>วันเดือนปี เข้ารับการทดสอบ:</label>`+
                                `<span class="text-danger"> แสดงเฉพาะรอบที่ยังไม่เต็ม</span>`+
                                `<select class="form-control col-md-6" name="round">${option}</select>`+
                            `</div>`+
                            `<button type="submit" class="btn btn-primary">บันทึกการลงทะเบียน</button>`+
                        `</form>`; 
                    
                } else {
                    var html = `<div class="alert alert-warning">จำนวนที่นั่งเต็มทุกห้อง | ยังไม่เปิดลงทะเบียน<div>`;
                }               
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
            }
            return html;
        }

        $(document).on("submit", "#registering-form", function() {
<<<<<<< HEAD

            var message = 'ยืนยันการลงทะเบียน';
            var thisForm = $(this);
            if (confirm(message)) {
=======
            
			var message = 'ยืนยันการลงทะเบียน';
            var thisForm = $(this);
			if( confirm(message) ) {
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                var formData = $(this).serialize();
                $("#rs-register-form").html(`กำลังโหลด ... <div class="spinner-border text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);

                thisForm.find("button[type='submit']").remove();

                $.ajax({
                    url: "<?= site_url('main/ajax_register_member') ?>",
                    data: formData,
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.status) {
                            $("#rs-register-form").html('');
                            $("#rs-register-form").attr('class', 'my-2 alert alert-success');
                            $("#rs-register-form").html(`${data.text}`);
                            $("#rs-register-detail").html('');

                        } else {
                            console.log('not-found');
                            $("#rs-register-form").html('');
                            $("#rs-register-form").attr('class', 'my-2 alert alert-danger');
                            $("#rs-register-form").html(`! ${data.text}`);
                            $("#rs-register-detail").html('');
                        }
                    },
                    error: function(jhx, status, error) {
                        console.log(`${jhx}, ${status}, ${error}`);
                    }
                });

                return false;
<<<<<<< HEAD

            } else {
                return false;
            }
=======
                
			} else {
				return false;
			}
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

        });

        $("#check-registered-form").submit(function() {
            var formData = $(this).serialize();
            $.ajax({
                url: "<?= site_url('main/ajax_check_member_register') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    if (data.status == 'registered') {
                        $("#check-registered-detail").html('');
                        $("#check-registered-detail").attr('class', 'my-2 alert alert-info');
<<<<<<< HEAD
                        $("#check-registered-detail").html(`${data.text}`);

                        var html = set_detail_registered(data);
                        console.log(data);
                        html += `<div class="mt-3">
                            <a href="<?= base_url('assets/PDF_generate/') ?>${data.registered.idp}.pdf" download="number.pdf">
                                <img class="rounded" src="<?= base_url('assets/images/pdf-icon.png') ?>" width="25" height="25">
                                Download file ลงทะเบียน
                            </a>
                        </div>`;
=======
                        $("#check-registered-detail").html(`${data.text}`);  
                        
                        var html = set_detail_registered(data);
                        console.log(data);
                        html += `<a href="<?= base_url('assets/PDF_generate/') ?>${data.registered.idp}.pdf" download="number.pdf">Download file ลงทะเบียน</a>`;
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b

                        $("#check-registered-detail").html(html);
                    } else {
                        console.log('not-found');
                        $("#check-registered-detail").html('');
                        $("#check-registered-detail").attr('class', 'my-2 alert alert-danger');
                        $("#check-registered-detail").html(`! ${data.text}`);
                    }
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });

            return false;
        });

        $("#check-score-form").submit(function() {
            var formData = $(this).serialize();

            $("#check-score-detail").html(`กำลังโหลด ... <div class="spinner-border text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>`);
<<<<<<< HEAD

=======
           
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
            $.ajax({
                url: "<?= site_url('main/ajax_check_score') ?>",
                data: formData,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        $("#check-score-detail").html('');
                        $("#check-score-detail").attr('class', 'my-2 alert alert-info');
<<<<<<< HEAD
                        $("#check-score-detail").html(`${data.text}`);
=======
                        $("#check-score-detail").html(`${data.text}`); 
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                        $("#score-table").html('');

                        var tr = '';
                        data.score.forEach(function(element) {
<<<<<<< HEAD
                            var year = parseInt(element.date_test.substring(0, 4)) + 543;
                            var month = toThaiDate(element.date_test.substring(5, 7));
                            var date = `${element.date_test.substring(8)} ${month} ${year}`;

                            tr += `<tr>` +
                                `<td>${element.name}</td>` +
                                `<td>${element.unit_name}</td>` +
                                `<td>${date} ${element.time_test}</td>` +
                                `<td>${element.score_test}</td>` +
                                `</tr>`;
                            $("#score-table").html(tr);
                        });

=======
                            var year    = parseInt( element.date_test.substring(0,4) ) +543;
                            var month   = toThaiDate(element.date_test.substring(5,7));
                            var date    = `${element.date_test.substring(8)} ${month} ${year}`;

                            tr +=`<tr>`+
                                `<td>${element.name}</td>`+
                                `<td>${element.unit_name}</td>`+
                                `<td>${date} ${element.time_test}</td>`+
                                `<td>${element.score_test}</td>`+
                                `</tr>`;
                                $("#score-table").html(tr);
                        });
                        
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                    } else {
                        $("#score-table").html('');
                        $("#check-score-detail").html('');
                        $("#check-score-detail").attr('class', 'my-2 alert alert-danger');
                        $("#check-score-detail").html(`! ${data.text}`);
                    }
                },
                error: function(jhx, status, error) {
                    console.log(`${jhx}, ${status}, ${error}`);
                }
            });

            return false;
<<<<<<< HEAD
        });

        // $("#clear-registered").click(function() {
        $(document).on("click", ".clear-registered", function() {
            var rid = $(this).attr("data-rid");
            var message = "ยืนยันการยกเลิก การลงทะเบียน";
            var this_button = $(this);

            if (confirm(message)) {
                $.ajax({
                    url: "<?= site_url('main/ajax_cancel_registered') ?>",
                    data: {
                        row: rid
                    },
=======
        }); 

        // $("#clear-registered").click(function() {
        $(document).on("click", ".clear-registered",function() {
            var rid     = $(this).attr("data-rid");
            var message = "ยืนยันการยกเลิก การลงทะเบียน";
            var this_button = $(this);

            if ( confirm(message) ) {
                $.ajax({
                    url: "<?= site_url('main/ajax_cancel_registered') ?>",
                    data: {row: rid},
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.status == true) {
<<<<<<< HEAD
                            this_button.parent().parent().attr('class', 'my-2 alert alert-success');
                            this_button.parent().parent().html(`${data.text}`);
                            $("#rs-register-form").html('');
                            $("#rs-register-form").attr('class', '');
                        } else {
                            $("#rs-register-detail").html('');
                            $("#rs-register-form").html('');
                            $("#rs-register-form").attr('class', 'my-2 alert alert-danger');
                            $("#rs-register-form").html(`! ${data.text}`);
                            $("#check-registered-detail").html('');
                            $("#check-registered-detail").attr('class', 'my-2 alert alert-danger');
=======

                            this_button.parent().parent().attr('class', 'my-2 alert alert-success');
                            this_button.parent().parent().html(`${data.text}`);

                            $("#rs-register-form").html('');
                            $("#rs-register-form").attr('class', '');
                            
                        } else {
                            $("#rs-register-detail").html(''); 

                            $("#rs-register-form").html('');
                            $("#rs-register-form").attr('class', 'my-2 alert alert-danger');
                            $("#rs-register-form").html(`! ${data.text}`);

                            $("#check-registered-detail").html('');
                            $("#check-registered-detail").attr('class', 'my-2 alert alert-success');
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                            $("#check-registered-detail").html(`${data.text}`);
                        }
                    },
                    error: function(jhx, status, error) {
                        console.log(`${jhx}, ${status}, ${error}`);
                    }
                });
<<<<<<< HEAD

=======
                
>>>>>>> e2d40a59919f96660da7aa7f439cf679458af65b
                return;

            } else {
                return false;
            }
        });

    });
</script>