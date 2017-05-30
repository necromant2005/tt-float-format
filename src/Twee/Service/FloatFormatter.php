<?php

namespace Twee\Service;

class FloatFormatter
{
    public function format(float $float, int $limit = 2) : string
    {
        $sign = '';
        if ($float < 0) {
            $sign = '-';
        }

        $float = abs($float);
        if ($float == 0) {
            return '0';
        }

        if ($float > 1) {
            $formatted = sprintf('%0.' . $limit . 'f', $float);
            if (rtrim(rtrim($formatted, '0')) == (string) ((int) $float)) {
                return sprintf('%d', $float);
            }

            return sprintf('%0.' . $limit . 'f', $float);
        }
        $string = sprintf('%0.20F', $float);
        $string = substr($string, strpos($string, '.') + 1);
        $trimmed = ltrim($string, '0');
        if (strlen($trimmed) == strlen($string)) {
            return $sign . sprintf('%0.' . $limit . 'f', $float);
        }
        if (!$trimmed) {
            return sprintf('%0.' . $limit . 'f', $float);
        }
        $delta = strlen($string) - strlen($trimmed);

        return $sign . sprintf('%0.' . ($limit + $delta) . 'f', $float);
    }
}