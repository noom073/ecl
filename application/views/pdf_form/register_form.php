<?php

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->SetMargins(10, 20, 10);
$fontname = TCPDF_FONTS::addTTFfont('assets/fonts/THSarabun.ttf', 'TrueTypeUnicode', '');
$pdf->SetFont($fontname, '', 16, '', true);

$pdf->AddPage();
$pdf->writeHTMLCell('', '', '', '', '<span style="font-weight:bold; font-size:32px;">บัตรประจําตัวผู้เข้าสอบ</span>', 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(190, 135, '', 40, '', 1, 0, false, true, 'J', true); // CREATE BORDER 

$pdf->writeHTMLCell('', '', 50, 45, '<span style="font-weight:bold; font-size:24px;">การทดสอบวัดระดับทักษะภาษาอังกฤษของ บก.ทท.</span>', 0, 0, false, true, 'J', true);

$pdf->writeHTMLCell('', '', 15, 65, '<span style="font-weight:bold; font-size:20px;">ชื่อผู้สอบ</span>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell('', '', 50, 65, '<span style="font-size:20px;">'.$obj->name.'</span>', 0, 0, false, true, 'J', true);

$pdf->writeHTMLCell('', '', 15, 80, '<span style="font-weight:bold; font-size:20px;">สังกัด</span>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell('', '', 50, 80, '<span style="font-size:20px;">'.$obj->unit_name.'</span>', 0, 0, false, true, 'J', true);

$pdf->writeHTMLCell('', '', 15, 95, '<span style="font-weight:bold; font-size:20px;">วันสอบ</span>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell('', '', 50, 95, '<span style="color: red; font-size:20px;">' . $date . '</span>', 0, 0, false, true, 'J', true);

$pdf->writeHTMLCell('', '', 15, 110, '<span style="font-weight:bold; font-size:20px;">เวลาสอบ</span>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell('', '', 50, 110, '<span style="color: red; font-size:20px;">'.$obj->time_test.' น.</span>', 0, 0, false, true, 'J', true);

$pdf->writeHTMLCell('', '', 15, 125, '<span style="font-weight:bold; font-size:20px;">สถานที่สอบ</span>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell('', '', 50, 125, '<span style="color: red; font-size:20px;">'.$obj->room_name.'</span>', 0, 0, false, true, 'J', true);

$pdf->writeHTMLCell(45, 45, 155, 65, '', 1, 0, false, true, 'J', true);
$pdf->writeHTMLCell(45, 45, 155, 68, '<span style="font-weight:bold; font-size:28px;">เลขที่นั่ง</span>', 0, 0, false, true, 'C', true);
$pdf->writeHTMLCell(45, 45, 155, 75, '<span style="font-weight:bold; font-size:56px;">'.$obj->seat_number.'</span>', 0, 0, false, true, 'C', true);

$styleBarCode = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$pdf->write1DBarcode($obj->idp, 'C39', 10, 145, '', 25, 0.4, $styleBarCode, 'N'); // CREATE BARCODE

$styleQRCode = array(
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);
$queryString = base64_encode('idp='.$obj->idp.'&round='. urlencode($obj->round));
// $url = site_url('admin_check_user/check_tester_qrcode?query='. $queryString);
$pdf->write2DBarcode($obj->idp, 'QRCODE,H', 150, 125, 50, 50, $styleQRCode, 'N');

$html = '<h2>คำชี้แจงและข้อปฏิบัติในการเข้ารับการทดสอบภาษาอังกฤษ</h2>
<ol>
    <li style="font-size:18px;"> เข้ารับการทดสอบตามรอบที่ลงทะเบียนไว้เท่านั้น หากไม่มาสอบจะถือว่าสละสิทธิ์</li>
    <li style="font-size:18px;"> ไม่อนุญาตให้เข้าห้องสอบหลังจากเริ่มการทดสอบแล้ว</li>
    <li style="font-size:18px;"> ไม่สามารถสมัครเพิ่มเติมหรือเปลี่ยนแปลงรอบการทดสอบหลังจากปิดระบบลงทะเบียน</li>
    <li style="font-size:18px;"> นำบัตรประจำตัวประชาชนหรือบัตรข้าราชการ พร้อมดินสอ 2B และยางลบไปในวันทดสอบ</li>
    <li style="font-size:18px;"> ห้ามนำเครื่องมือสื่อสารหรืออุปกรณ์อิเล็กทรอนิกส์ทุกชนิดเข้าห้องสอบ</li>
    <li style="font-size:18px;"> พิมพ์หลักฐานการลงทะเบียน และนำไปแสดงต่อเจ้าหน้าที่ก่อนเข้าห้องสอบ</li>
</ol>';
$pdf->writeHTMLCell('', '', '', 185, $html, 0, 0, false, true, 'J', true);

$filename = "{$obj->idp}.pdf";
$result = $pdf->Output(FCPATH . "/assets/PDF_generate/$filename", 'F');
