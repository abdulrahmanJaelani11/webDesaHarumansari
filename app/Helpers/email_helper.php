<?php

function kirim_email($attachment, $to, $title, $pesan)
{
    $email = \Config\Services::email();
    $email_pengirim = "randikaangga9044@gmail.com";
    $email_nama = "Abdul Rahman Jaelani";

    $config['protocol'] = "smtp";
    $config['SMTPHost'] = "smtp.gmail.com";
    $config['SMTPUser'] = $email_pengirim;
    $config['SMTPPass'] = "mtsmaarif2";
    $config['SMTPPort'] = 465;
    $config['SMTPCrypto'] = "ssl";
    $config['mailType'] = "html";

    $email->initialize($config);
    $email->setFrom($email_pengirim, $email_nama);
    $email->setTo($to);
    if ($attachment) {
        $email->attach($attachment);
    }

    $email->setSubject($title);
    $email->setMessage($pesan);

    if ($email->send()) {
        return true;
    } else {
        print_r($email->printDebugger(['headers']));
        return false;
    }
}
