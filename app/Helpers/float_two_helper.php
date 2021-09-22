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
