<?php

use App\Models\SmtpSetting;

function setMailConfig($type = null)
{

    if ($type) {
        $smtp = SmtpSetting::where('mail_type', $type)->first();
    } else {
        $smtp = SmtpSetting::first();
    }

    if (!$smtp) {
        return false;
    }

    config([
        'mail.default' => 'smtp',
        'mail.mailers.smtp.transport' => 'smtp',
        'mail.mailers.smtp.host' => $smtp->mail_host,
        'mail.mailers.smtp.port' => $smtp->mail_port,
        'mail.mailers.smtp.username' => $smtp->mail_username,
        'mail.mailers.smtp.password' => $smtp->mail_password,
        'mail.mailers.smtp.encryption' => $smtp->mail_encryption,
        'mail.from.address' => $smtp->mail_from_address,
        'mail.from.name' => $smtp->mail_from_name,
    ]);

    return true;
}
