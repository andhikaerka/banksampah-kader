<?php

/**
 * Undocumented function
 *
 * @param [type] $angka
 * @return void
 */
function float_two($angka)
{
    return str_replace(',', '', number_format((float) $angka, 2));
}

function currency_format($angka)
{
    return number_format((float) $angka, 2, '.', ',');
}

function bulan($bulan)
{
    switch ($bulan) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
