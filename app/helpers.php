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


/**
 * Checks if user agent is mobile or not
 *
 * @return boolean
 */
if (! function_exists('isMobile')) {
    function isMobile()
    {
        $useragent=$_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
            return true;
        } else {
            return false;
        }
    }
}

if (! function_exists('humanFilesize')) {
    function humanFilesize($size, $precision = 2)
    {
        $units = ['B','kB','MB','GB','TB','PB','EB','ZB','YB'];
        $step = 1024;
        $i = 0;

        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }

        return round($size, $precision).$units[$i];
    }
}

/**
 * Checks if the uploaded document is an image
 */
if (! function_exists('isFileImage')) {
    function isFileImage($filename)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $array = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF'];
        $output = in_array($ext, $array) ? true : false;

        return $output;
    }
}

function isAppInstalled()
{
    $envPath = base_path('.env');
    return file_exists($envPath);
}
