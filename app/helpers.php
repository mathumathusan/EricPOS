<?php

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Routing\Route;

// Get Site url

if (!function_exists('site_url')) {
    function site_url()
    {
        return !empty(env('APP_URL')) ? env('APP_URL') : url('');
    }
}


if (!function_exists('systemVersion')) {
    function systemVersion()
    {
        return '0.01';
    }
}


if (!function_exists('siteLogo')) {
    function siteLogo()
    {
        return '';
    }
}


if (!function_exists('formatTime12Hour')) {
    function formatTime12Hour($time)
    {
        return Carbon::parse($time)->format('h:i A');
    }
}

if (!function_exists('makeSlug')) {
    function makeSlug($string, $separator = '-')
    {
        // Regular expression to match accented characters and remove their accents
        $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
        // Special cases array to replace certain characters with their substitutes
        $special_cases = array('&' => 'and', "'" => '');
        // Convert the string to lowercase and remove whitespace from both ends
        $string = mb_strtolower(trim($string), 'UTF-8');
        // Replace the characters in the special cases array with their substitutes
        $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
        // Remove accents from accented characters
        $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
        // Replace spaces with the separator
        $string = str_replace(" ", "$separator", $string);
        // Remove dots
        $string = str_replace(".", "", $string);
        // Replace any punctuation marks or whitespace characters with the separator
        $string = preg_replace('/[\p{P}\p{Zs}]+/u', $separator, $string);
        // Replace any consecutive separators with a single separator
        $string = preg_replace("/[$separator]+/u", "$separator", $string);

        // Return the resulting slug
        return $string;
    }
}

if (!function_exists('isHttps')) {
    function isHttps()
    {
        return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
    }
}
if (!function_exists('userID')) {
    function userID()
    {
        if (!auth()->guest()) {
            return auth()->user()->id;
        }
        return 0;
    }
}


if (!function_exists('extract_numbers')) {
    function extract_numbers($string, $stat = true)
    {
        $numbers = preg_replace('/[^0-9]/', '', $string);
        $letters = preg_replace('/[^a-zA-Z]/', '', $string);
        if ($stat) {
            return $numbers;
        }
        return $letters;
    }
}
if (!function_exists('uniqueSeries')) {
    function uniqueSeries()
    {
        $t = microtime(true);
        $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
        $d = new DateTime(date('Y-m-d H:i:s.' . $micro, $t));
        $series = substr(csrf_token(), 0, 10) . $d->format("YmdHisu");
        return $series;
    }
}
if (!function_exists('strDates')) {
    function strDates($range)
    {
        return  date('Y-m-d', strtotime($range));
    }
}
if (!function_exists('annual')) {
    function annual($r = 'start')
    {
        $d = [
            'start' => date('Y-01-01'),
            'end' => date('Y-12-31')
        ];
        return $d[$r];
    }
}


if (!function_exists('all')) {
    function all($r = 'start')
    {
        $d = [
            'start' => '2010-01-01',
            'end' => date('Y-m-d')
        ];
        return $d[$r];
    }
}

if (!function_exists('todayR')) {

    function todayR($r = 'start')
    {
        $d = [
            'start' => stoday(),
            'end' => stoday()
        ];
        return $d[$r];
    }
}

if (!function_exists('stoday')) {
    function stoday()
    {
        return  strDates('today');
    }
}

if (!function_exists('thisMonth')) {
    function thisMonth($r = 'start')
    {
        $d = [
            'start' => strDates('first day of this month'),
            'end' => stoday()
        ];
        return $d[$r];
    }
}
if (!function_exists('lastMonth')) {

    function lastMonth($r = 'start')
    {
        $d = [
            'start' => strDates('first day of last month'),
            'end' => strDates('last day of last month')
        ];
        return $d[$r];
    }
}
if (!function_exists('thisWeek')) {
    function thisWeek($r = 'start')
    {
        $d = [
            'start' => strDates('monday this week'),
            'end' => strDates('sunday this week')
        ];
        return $d[$r];
    }
}
if (!function_exists('lastWeek')) {
    function lastWeek($r = 'start')
    {
        $d = [
            'start' => strDates('last week monday'),
            'end' => strDates('last week sunday')
        ];
        return $d[$r];
    }
}
if (!function_exists('rangeMonth')) {
    function rangeMonth($datestr, $r = 'start')
    {
        date_default_timezone_set(date_default_timezone_get());
        $dt = strtotime($datestr);
        $res['start'] = date('Y-m-d', strtotime('first day of this month', $dt));
        $res['end'] = date('Y-m-d', strtotime('last day of this month', $dt));
        return $res[$r];
    }
}


//highlights the selected navigation on admin panel
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "current")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}


if (!function_exists('takeDate')) {
    function takeDate($date, $format = "year")
    {
        //year
        //month
        //day
        return $date ? Carbon::createFromFormat('Y-m-d', $date)->$format : '';
    }
}


if (!function_exists('takeDateDiff')) {
    function takeDateDiff($date, $format = 'year')
    {
        $now = \Carbon\Carbon::now();
        $date = \Carbon\Carbon::parse($date); // Convert $date to Carbon object

        switch ($format) {
            case 'year':
                return $date->diffInYears($now);
            case 'month':
                return $date->diffInMonths($now);
            case 'day':
                return $date->diffInDays($now);
        }
    }
}
if (!function_exists('numHash')) {
    function numHash($n)
    {
        return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
    }
}

if (!function_exists('encrypt_decrypt')) {
    function encrypt_decrypt($string, $action = 'encrypt')
    {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'HEYTHISISLONCEYTECHPVTLTDPLZCONTACTUS!!@#$%%'; // user define private key
        $secret_iv = 'h@FbawReQ9u9'; // user define secret key

        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}

if (!function_exists('newNICNumberFromOld')) {
    function newNICNumberFromOld($oldNic)
    {
        $current_year = substr(date('Y'), 2, 4);
        $nic_year = (int) substr($oldNic, 0, 2);
        $add = 1900;
        if ($nic_year < $current_year) {
            $add = 2000;
        }

        $oldNic = substr($oldNic, 2, 7);
        return ($nic_year + $add) . $oldNic;
    }
}
if (!function_exists('get_greeting_message')) {
    function get_greeting_message()
    {
        $Hour = date('G');
        if ($Hour >= 5 && $Hour <= 11) {
            $text =  "Good Morning";
        } else if ($Hour >= 12 && $Hour <= 18) {
            $text =  "Good Afternoon";
        } else if ($Hour >= 19 || $Hour <= 4) {
            $text =  "Good Evening";
        }
        $user_name = auth()->user()->name;

        return 'Welcome to Our Portal! ' . $text . ' ' . $user_name;
    }
}

if (!function_exists('convert_number_to_words')) {
    function convert_number_to_words($number)
    {

        $hyphen      = '';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'Zero',
            1                   => 'One',
            2                   => 'Two',
            3                   => 'Three',
            4                   => 'Four',
            5                   => 'Five',
            6                   => 'Six',
            7                   => 'Seven',
            8                   => 'Eight',
            9                   => 'Nine',
            10                  => 'Ten',
            11                  => 'Eleven',
            12                  => 'Twelve',
            13                  => 'Thirteen',
            14                  => 'Fourteen',
            15                  => 'Fifteen',
            16                  => 'Fixteen',
            17                  => 'Feventeen',
            18                  => 'Eighteen',
            19                  => 'Nineteen',
            20                  => 'Twenty',
            30                  => 'Thirty',
            40                  => 'Fourty',
            50                  => 'Fifty',
            60                  => 'Sixty',
            70                  => 'Seventy',
            80                  => 'Eighty',
            90                  => 'Ninety',
            100                 => 'Hundred',
            1000                => 'Thousand',
            1000000             => 'Million',
            1000000000          => 'Billion',
            1000000000000       => 'Trillion',
            1000000000000000    => 'Quadrillion',
            1000000000000000000 => 'Quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
}

if (!function_exists('getDateArray')) {

    function getDateArray($start = '', $end = '', $format = 'Y-m-d')
    {
        $start = empty($start) ? stoday() : $start;
        $end = empty($end) ? stoday() : $end;

        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1D'),
            new DateTime($end)
        );

        $dates = [];
        foreach ($period as $key => $value) {
            array_push($dates, $value->format($format));
        }
        array_push($dates, $end);
        return $dates;
    }
}

if (!function_exists('getCurrentDateTime')) {
    function getCurrentDateTime()
    {
        $currentDateTime = Carbon::now();
        return $currentDateTime->format('d/m/Y H:i A');
    }
}



if (!function_exists('slPrice')) {
    function slPrice($amount, $currency = false)
    {
        if ($currency) {
            return  'Rs ' . number_format($amount, 2, '.', ',');
        }

        return number_format($amount, 2, '.', ',');
    }
}
