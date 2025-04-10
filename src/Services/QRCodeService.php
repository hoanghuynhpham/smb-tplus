<?php

namespace Smb\Tplus\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeService
{
    /**
     * Tạo mã QR dưới dạng SVG (nhẹ, không cần Imagick).
     */
    public function generateSvg(string $text, int $size = 200): string
    {
        $text = $this->ensureUtf8($text);

        return QrCode::format('svg')
            ->encoding('UTF-8')
            ->size($size)
            ->generate($text);
    }

    /**
     * Tạo mã QR SVG và trả về dưới dạng HTML để nhúng vào view.
     */
    public function generateHtml(string $text, int $size = 200): string
    {
        return $this->generateSvg($text, $size);
    }

    /**
     * Tạo mã QR vCard (danh thiếp).
     */
    public function generateVCard(array $contact, int $size = 200): string
    {
        $escape = fn($value) => str_replace(
            [';', "\n", "\r"],
            ['\;', '\\n', ''],
            trim($value)
        );

        $vcard = "BEGIN:VCARD\n";
        $vcard .= "VERSION:3.0\n";
        $vcard .= "N:" . $escape($contact['last_name'] ?? '') . ";" . $escape($contact['first_name'] ?? '') . "\n";
        $vcard .= "FN:" . $escape(($contact['first_name'] ?? '') . ' ' . ($contact['last_name'] ?? '')) . "\n";

        if (!empty($contact['organization'])) {
            $vcard .= "ORG:" . $escape($contact['organization']) . "\n";
        }

        if (!empty($contact['title'])) {
            $vcard .= "TITLE:" . $escape($contact['title']) . "\n";
        }

        if (!empty($contact['phone'])) {
            $vcard .= "TEL;TYPE=CELL:" . $escape($contact['phone']) . "\n";
        }

        if (!empty($contact['email'])) {
            $vcard .= "EMAIL:" . $escape($contact['email']) . "\n";
        }

        if (!empty($contact['website'])) {
            $vcard .= "URL:" . $escape($contact['website']) . "\n";
        }

        $vcard .= "END:VCARD";

        return $this->generateSvg($vcard, $size);
    }

    /**
     * Đảm bảo chuỗi là UTF-8, tránh lỗi hiển thị QR.
     */
    private function ensureUtf8(string $text): string
    {
        if (!mb_check_encoding($text, 'UTF-8')) {
            $text = mb_convert_encoding($text, 'UTF-8');
        }

        return $text;
    }
}
