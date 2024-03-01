<?php


namespace App\tools;

class Converter
{
    public static $_instance;

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function converter($num)
    { {
            $num = str_replace(array(',', ' '), '', trim($num));
            if (!$num) {
                return false;
            }
            $num = (int) $num;
            $words = array();

            $list1 = array(
                '', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze',
                'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix-sept', 'dix-huit', 'dix-neuf'
            );
            $list2 = array('', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingt', 'quatre-vingt-dix');
            $list3 = array('', 'mille', 'million', 'milliard', 'billion', 'billiard', 'trillion', 'trilliard', 'quadrillion',
                'quadrilliard', 'quintillion', 'quintilliard', 'sextillion', 'sextilliard', 'septillion', 'septilliard',
                'octillion', 'octilliard', 'nonillion', 'nonilliard', 'décillion', 'décilliard', 'undécillion', 'undécilliard',
                'duodécillion', 'duodécilliard', 'trédécillion', 'trédécilliard', 'quatordecillion', 'quatordecilliard',
                'quindecillion', 'quindecilliard', 'sexdecillion', 'sexdecilliard', 'septendecillion', 'septendecilliard',
                'octodecillion', 'octodecilliard', 'novemdecillion', 'novemdecilliard', 'vigintillion', 'vigintilliard'
            );
            $num_length = strlen($num);
            $levels = (int) (($num_length + 2) / 3);
            $max_length = $levels * 3;
            $num = substr('00' . $num, -$max_length);
            $num_levels = str_split($num, 3);
            for ($i = 0; $i < count($num_levels); $i++) {
                $levels--;
                $hundreds = (int) ($num_levels[$i] / 100);
                $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' cent' . ' ' : '');
                $tens = (int) ($num_levels[$i] % 100);
                $singles = '';
                if ($tens < 20) {
                    $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
                } else {
                    $tens = (int)($tens / 10);
                    $tens = ' ' . $list2[$tens] . ' ';
                    $singles = (int) ($num_levels[$i] % 10);
                    $singles = ' ' . $list1[$singles] . ' ';
                }
                $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_levels[$i])) ? ' ' . $list3[$levels] . ' ' : '');
            } //end for loop
            $commas = count($words);
            if ($commas > 1) {
                $commas = $commas - 1;
            }
            return trim(implode(' ', $words));
        }
    }
}
