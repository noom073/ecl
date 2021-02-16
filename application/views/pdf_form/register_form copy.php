<?php
// $y      = substr($obj->date_test, 0, 4) + 543;
// $m      = $this->CI->main_model->thai_month(substr($obj->date_test, 5, 2));
// $d      = substr($obj->date_test, 8);
// $date   = "$d $m $y";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$fontname = TCPDF_FONTS::addTTFfont(FCPATH . 'assets/fonts/THSarabun.ttf', 'TrueTypeUnicode', '', 96);
$pdf->SetFont($fontname, 'B', 16, '', true);
$pdf->AddPage();

$params = $pdf->serializeTCPDFtagParameters(array($obj->idp, 'C39', '', '', 80, 30, 0.4, array('position' => 'C', 'padding' => 4, 'fgcolor' => array(0, 0, 0), 'bgcolor' => array(255, 255, 255), 'text' => true, 'font' => 'thsarabun', 'fontsize' => 16, 'stretchtext' => 1), 'N'));
$barCode = '<tcpdf method="write1DBarcode" params="' . $params . '" />';

$html = <<<EOF
<div>
<h2 style="text-align:center; font-size:32px; margin:10px">บัตรประจำตัวผู้เข้าสอบ</h2>
<div style="border: 2px solid black;">
<div style="text-align:center; font-size:25px" >
    การทดสอบวัดระดับทักษะภาษาอังกฤษของ บก.ทท.
</div>

<table cellspacing="0" cellpadding="5" border="0">
    <tr>
        <td style="font-size:24px" width="110"> ชื่อผู้สอบ</td>
        <td width="300" style="font-size:18px; line-height:31px;">$obj->name</td>
        <td rowspan="3" align="center" width="130" style="font-size:32px" border="1">เลขที่นั่ง <br> $obj->seat_number</td>
    </tr>
    <tr>
        <td style="font-size:24px"> สังกัด</td>
        <td style="font-size:18px; line-height:31px;">$obj->unit_name</td>
    </tr>
    <tr>
        <td style="font-size:24px"> วันสอบ</td>
        <td style="font-size:18px; line-height:31px;">$date</td>
    </tr>
    <tr>
        <td style="font-size:24px"> เวลาสอบ</td>
        <td style="font-size:18px; line-height:31px;">$obj->time_test น.</td>
    </tr>
    <tr>
        <td style="font-size:24px"> สถานที่สอบ</td>
        <td style="font-size:18px; line-height:31px;">$obj->room_name</td>
    </tr>
    <tr>
        <td colspan="4" style="font-size:24px">$barCode</td>
    </tr>  
</table>

</div>
<h2>คำชี้แจงและข้อปฏิบัติในการเข้ารับการทดสอบภาษาอังกฤษ</h2>
<ol>
<li style="font-size:15px;"> เข้ารับการทดสอบตามรอบที่ลงทะเบียนไว้เท่านั้น หากไม่มาสอบจะถือว่าสละสิทธิ์</li>
<li style="font-size:15px;"> ไม่อนุญาตให้เข้าห้องสอบหลังจากเริ่มการทดสอบแล้ว</li>
<li style="font-size:15px;"> ไม่สามารถสมัครเพิ่มเติมหรือเปลี่ยนแปลงรอบการทดสอบหลังจากปิดระบบลงทะเบียน</li>
<li style="font-size:15px;"> นำบัตรประจำตัวประชาชนหรือบัตรข้าราชการ พร้อมดินสอ 2B และยางลบไปในวันทดสอบ</li>
<li style="font-size:15px;"> ห้ามนำเครื่องมือสื่อสารหรืออุปกรณ์อิเล็กทรอนิกส์ทุกชนิดเข้าห้องสอบ</li>
<li style="font-size:15px;"> พิมพ์หลักฐานการลงทะเบียน และนำไปแสดงต่อเจ้าหน้าที่ก่อนเข้าห้องสอบ</li>
</ol>
</div>
EOF;
$pdf->writeHTML($html);

$filename = "$obj->idp.pdf";
$result = $pdf->Output(FCPATH . "/assets/PDF_generate/$filename", 'F');
