<?php

namespace App\Services\BilalCenter;

use App\Models\BilalCenter\Product;

class BarcodeService
{
    /**
     * Generate a unique, checksum-valid EAN-13 barcode.
     */
    public static function generate(): string
    {
        do {
            $payload = '2' . str_pad((string) random_int(0, 99999999999), 11, '0', STR_PAD_LEFT);
            $barcode = $payload . static::checkDigit($payload);
        } while (Product::withTrashed()->where('barcode', $barcode)->exists());

        return $barcode;
    }

    /**
     * Calculate the EAN-13 check digit for a 12-digit payload.
     */
    protected static function checkDigit(string $twelveDigits): int
    {
        $sum = 0;

        foreach (str_split($twelveDigits) as $index => $digit) {
            $sum += $index % 2 === 0 ? (int) $digit : (int) $digit * 3;
        }

        return (10 - ($sum % 10)) % 10;
    }
}
