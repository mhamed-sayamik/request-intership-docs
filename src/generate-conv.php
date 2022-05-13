<?php
    require_once 'vendor/autoload.php';
    use PhpOffice\PhpWord\TemplateProcessor;
    $templateProcessor = new TemplateProcessor('C:\xampp\htdocs\request-intership-docs\src\docs\Hello mester.docx');
    $templateProcessor->setValue('stud_name', $_POST['entr-loc']);
    $filepath = 'C:/xampp/htdocs/request-intership-docs/src/docs/result.docx';
    ob_clean();
    $templateProcessor->saveAS($filepath);
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment; filename="autorisation.docx"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    unlink($filepath) ;       
?>