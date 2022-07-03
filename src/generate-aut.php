<?php
    session_start();
    include_once "database-funs.php";
    include_once "wordtopdf.php";
    //generate file
    require_once 'vendor/autoload.php';
    use PhpOffice\PhpWord\TemplateProcessor;
    switch ($_SESSION["niveau"]) {
        case 0:
            $templateProcessor = new TemplateProcessor('C:\xampp\htdocs\request-intership-docs\src\docs\autorisation1.docx');
            break;
        case 1:
            $templateProcessor = new TemplateProcessor('C:\xampp\htdocs\request-intership-docs\src\docs\autorisation2.docx');
            break;
        case 2:
            $templateProcessor = new TemplateProcessor('C:\xampp\htdocs\request-intership-docs\src\docs\autorisation3.docx');
            break;
    }
    //replace fields
    $templateProcessor->setValue('nom', $_SESSION["name"]);
    $templateProcessor->setValue('filiere', $_SESSION["filiere"]);
    $templateProcessor->setValue('dateD', $_POST['DateD']);
    $templateProcessor->setValue('dateF', $_POST['DateF']);
    $templateProcessor->setValue('entreprise', $_POST['EntName']);
    $templateProcessor->setValue('entr', $_POST['EntName']);
    $templateProcessor->setValue('entr-loc', $_POST['EntSiege']);
    $templateProcessor->setValue('entr-tel', $_POST['Enttele']);
    $templateProcessor->setValue('entr-fax', $_POST['Entfax']);
    $filepath = 'C:/xampp/htdocs/request-intership-docs/src/docs/';
    $docx_file = 'autorisation.docx';
    $pdf_file = 'autorisation.pdf';
    ob_clean();
    //save file
    $templateProcessor->saveAS($filepath.$docx_file);
    //convert to pdf
    word2pdf("file:///".$filepath.$docx_file,"file:///".$filepath.$pdf_file);
    //delete pdf
    unlink($filepath.$docx_file) ;        
    //download pdf
    header('Content-Description: File Transfer');
    header("Content-type:application/pdf");
    header('Content-Disposition: attachment; filename="autorisation.pdf"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath.$pdf_file));
    readfile($filepath.$pdf_file);
    unlink($filepath.$pdf_file) ;        
    
?>