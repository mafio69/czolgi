<?php
function dayWeek($data)
{
    $day = false;
    $dzien_tyg = date("l", strtotime($data));
    switch ($dzien_tyg) {
        case 'Monday':
            $day = "poniedziałek";
            break;
        case 'Tuesday':
            $day = "wtorek";
            break;
        case 'Wednesday':
            $day = "środa";
            break;
        case 'Thursday':
            $day = "czwartek";
            break;
        case 'Friday':
            $day = "piątek";
            break;
        case 'Saturday':
            $day = "sobota";
            break;
        case 'Sunday':
            $day = "niedziela";
            break;
    }

    return $day;
}

function czas($date)
{ // zmienne pomocne przy obliczeniach (dlugość w sekundach)
      // date_default_timezone_set('Europe/Warsaw');
    $od = strtotime($date); // data do odliczenia
    $do = strtotime('now'); // czas teraz

    $diff = abs($do - $od); // diff w sekundach. Funkcja abs podaje wartosc bezwzgledna argumentu, w przypadku gdy 'do' jest wieksze niz 'od' tak jak w podanym przez Ciebie przypadku

// pozniej juz mozemy operowac na wartosci w sekundach. 1 minuta = 60 sekund, zatem...
    if ($diff > 120) {
        $result = '';
        $diff_week = floor($diff / (60 * 60 * 24 * 7));
        if ($diff_week > 0 && $diff_week == 1) {
            $result = $diff_week . ' tydzień ';
        } elseif ($diff_week > 1) {
            $result = $diff_week . ' tyg. ';
        }
        $mod_week = $diff % (60 * 60 * 24 * 7);
        $diff_day = floor($mod_week / (60 * 60 * 24));
        if ($diff_day == 1) {
            $result .= $diff_day . ' dzień ';
        } elseif ($diff_day != 0) {
            $result .= $diff_day . ' dni ';
        } elseif ($diff_week > 0 && $diff_day == 0) {
            $result .= '0 dni ';
        }
        $mod_hour = $mod_week % (60 * 60 * 24);
        $diff_godzin = floor($mod_hour / (60 * 60));
        if ($diff_godzin > 0 || $diff_day > 0) {
            $result .= $diff_godzin . ' godz. ';
        }
        $mod_min = $mod_hour % (60 * 60);
        $diff_minutes = floor($mod_min / (60));
        $result .= $diff_minutes . ' min. ';
    } else {
        $result = "chwila";
    }
    return $result;
}

function diff_date($date, $time_zone = 'Europe/Warsaw')
{
    date_default_timezone_set('Europe/Warsaw');
    $od = strtotime($date); // data do odliczenia
    $do = strtotime('now'); // czas teraz

    $diff = abs($do - $od); // diff w sekundach. Funkcja abs podaje wartosc bezwzgledna argumentu, w przypadku gdy 'do' jest wieksze niz 'od' tak jak w podanym przez Ciebie przypadku

// pozniej juz mozemy operowac na wartosci w sekundach. 1 minuta = 60 sekund, zatem...
    if ($diff > 120) {
        $result = '';
        $diff_week = floor($diff / (60 * 60 * 24 * 7));
        if ($diff_week > 0 && $diff_week == 1) {
            $result = $diff_week . ' tydzień ';
        } elseif ($diff_week > 1) {
            $result = $diff_week . ' tyg. ';
        }
        $mod_week = $diff % (60 * 60 * 24 * 7);
        $diff_day = floor($mod_week / (60 * 60 * 24));
        if ($diff_day == 1) {
            $result .= $diff_day . ' dzień ';
        } elseif ($diff_day != 0) {
            $result .= $diff_day . ' dni ';
        } elseif ($diff_week > 0 && $diff_day == 0) {
            $result .= '0 dni ';
        }
        $mod_hour = $mod_week % (60 * 60 * 24);
        $diff_godzin = floor($mod_hour / (60 * 60));
        if ($diff_godzin > 0 || $diff_day > 0) {
            $result .= $diff_godzin . ' godz. ';
        }
        $mod_min = $mod_hour % (60 * 60);
        $diff_minutes = floor($mod_min / (60));
        $result .= $diff_minutes . ' min. ';
    } else {
        $result = "chwila";
    }
    return $result;
}

function dzien($data)
{
    $dzien = date("Y-m-d", strtotime($data));
    return $dzien;
}

function godzina($data)
{
    $godzina = date("H:i", strtotime($data));
    return $godzina;
}

function many_word($data, $number_char)
{

    $data_st =strip_tags($data);
    $data_st = $data_st.' ';
    If (strlen($data_st) > $number_char)
        return substr($data_st, 0, strpos($data_st, ' ', $number_char)).'...';
    else {
        return $data_st;
    }
}
function is_redactor()
{
    return ((Auth()->check() && Auth()->user()->role->type === 'admin') || (Auth()->check() && Auth()->user()->role->type === 'moderator'));
}