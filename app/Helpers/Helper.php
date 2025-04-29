<?php

use App\Models\Chat;
use App\Models\Store;
use App\Models\User;
use App\Models\WalletTransaction;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use Kreait\Firebase\Factory;

//use Kreait\Firebase\Factory;

// Status Codes
function success()
{
    return 200;
}

function register()
{
    return 201;
}

function validation()
{
    return 400;
}

function pending()
{
    return 300;
}

function failed()
{
    return 400;
}

function error()
{
    return 401;
}

function unauthorized()
{
    return 401;
}

function code_sent()
{
    return 402;
}

function token_expired()
{
    return 403;
}

function not_found()
{
    return 404;
}

function complete_register()
{
    return 405;
}

function not_accepted()
{
    return 406;
}

function nearest_radius()
{
    return 100; // 100km
}

function limousine_first_radius()
{
    return 3; // 3km
}

function checkGuard () {
    if (auth()->guard('host')->check()) {
        return auth()->guard('host')->user();
    } else if (auth()->guard('admin')->check()) {
        return auth()->guard('admin')->user();
    } else {
        return 0;
    }
}

function createLog($item, $_causer, $name, $url, $url_name)
{
    if ($_causer = 1) {
        $causer = checkGuard();
        $details = "(Admin) {$causer->name} create {$name} : {$url_name}";
    }

    activity($name)
        ->performedOn($item)
        ->causedBy($causer->id)
        ->withProperties(['details' => $details, 'type' => 'created', 'user' => $causer->name])
        ->log(ucfirst($name) . " has been created");
}

function editLog($item, $_causer, $name, $url, $url_name)
{
    if ($_causer = 1) {
        $causer = checkGuard();
        $details = "(Admin) {$causer->name} update {$name} : {$url_name}";
    }

    activity($name)
        ->performedOn($item)
        ->causedBy($causer->id)
        ->withProperties(['details' => $details, 'type' => 'updated', 'user' => $causer->name])
        ->log(ucfirst($name) . " has been updated");
}

function delLog($item, $_causer, $name, $deleted_item)
{
    if ($_causer = 1) {
        $causer = checkGuard();
        $details = "(Admin) {$causer->name} delete {$name} : {$deleted_item} ";
    }

    activity($name)
        ->performedOn($item)
        ->causedBy($causer->id)
        ->withProperties(['details' => $details, 'type' => 'deleted', 'user' => $causer->name])
        ->log(ucfirst($name) . " has been deleted");
}

function google_api_key()
{
    return "AIzaSyAGlTpZIZ49RVV5VX8KhzafRqjzaTRbnn0";
}

function msgdata($status = true, $msg = null, $data = null, $code = 200)
{
    $responseArray = [
        'status' => $code,
        'message' => $msg,
        'data' => $data,
    ];
    return response()->json($responseArray, $code);
}


function msg($status, $msg, $code = 200)
{
    $responseArray = [
        'status' => $code,
        'message' => $msg,
    ];
    return response()->json($responseArray, $code);
}

function providerOrderCommision($order, $price, $percent = 10)
{
    $total = ($price * $percent) / 100;
    if ($wallet = Auth::guard('provider')->user()->wallet > $total) {
        $discount = $wallet - $total;
        WalletTransaction::create([
            'price' => $total,
            'type' => 'outcome',
            'provider_id' => Auth::guard('provider')->id(),
            'default_wallet' => $wallet,
            'description_ar' => ' عملية  خصم خاصة بالطلب رقم   ' . $order->id,
            'description_enr' => ' Discount Transaction for order No   ' . $order->id,
            'order_id' => $order->id,
        ]);
        Auth::guard('provider')->user()->update(['wallet' => $discount]);
        return $price;
    } else {
        return $price - $total;
    }
}


function otp_code()
{
//    $code = mt_rand(1000, 9999);
    $code = 1111;
    return $code;
}

function sendToUser($tokens, $title, $msg, $notification_type, $order_id, $order_type)
{
    send($tokens, $title, $msg, $notification_type, $order_id, $order_type);
}

function sendToProvider($tokens, $title, $msg, $notification_type, $order_id, $order_type)
{
    send($tokens, $title, $msg, $notification_type, $order_id, $order_type);
}


function send($tokens, $title, $msg, $api_key, $type)
{

    $fields = array(
        "message" => array(
            "token" => $tokens,  // Here, you should pass the device token dynamically
            "notification" => array(
                "title" => $title,
                "body" => $msg
            ),
            "data" => array(
                "type" => "admin",
                "title" => $title,
                "body" => $msg
            )
        )
    );
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/v1/projects/monasba-26b9f/messages:send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);

    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }

    curl_close($ch);
    return $result;
}

function sendRandomNotification($tokens, $title, $msg, $id ,$type)
{
    $api_key = getServerKey2();
    $fields = array
    (
        "registration_ids" => $tokens,
        "priority" => 10,
        'data' => [
            'title' => $title,
            'sound' => 'default',
            'message' => $msg,
            'body' => $msg,
            'notification_type' => "notification",
            'id' => $id,
            'type' => $type,


        ],
        'notification' => [
            'title' => $title,
            'sound' => 'default',
            'message' => $msg,
            'body' => $msg,
            'notification_type' => "notification",
            'id' => $id,
            'type' => $type,


        ],
        'vibrate' => 1,
        'sound' => 1
    );
    $headers = array
    (
        'accept: application/json',
        'Content-Type: application/json',
        'Authorization: key=' . $api_key
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    //  var_dump($result);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);

    return $result;
}


function getServerKey2()
{
    return 'AAAAincKY9U:APA91bGsNUd7nT6tUsEstEovl1uU7EZlFpxkcMdmIxVYJ4mqTYVzfKXckL7-1JsRdudqnx4kyBWghLJ7EO_NDaHEdZnQOQjIIc8gfXcvIjjarpm6XGmfkGJ8uyyTwY6lckXlHlgfFap8';
// return 'ya29.c.c0ASRK0GbAc9DpvfssdkeRe9GlhJOc2o3KKtoxMIV16RsrzUUWABvlbwJryEfWJeaQ7So7MXChje70zLcNA031-zgU-2EZ0MKDVuMBesvHxAP4QvuMkUa1EkPiK5du3qCfgEMv57kNmBY1xyUjGVJya8AJ47d8JU09rUt-arB7JcAuvFPyJod5SkX76-2uw_RsWfjk2x4jAPHRQ3rVUl_b30yZ1io_qjIR5YhYRRFXddgbocAkl-0E6V15DZNHewM_s6lMMydprQsqCnVF5Tqt4y_D6JJUl658uPj38haiO1ByL_qbVIram3gvELq7IaCt3feztV5uE978gfa4WmSkIz4rdHVDM6LW3-0VWsgU83-6_0KP0nK3d8a8xAH387CdwS99Vav1temrsUtr8bfFiFhngyJ7B08s9XauftfjsSasgYp6poa9ZI0sUckkRzyFhceuJajFdQ-dUg_yX6OhoeJxdBpucfihQvWcJ57YX6wagiykfmznqcMi96IIbMk8l5F8k4Sdl29c--kwfFvp1Uie-Mvwes2tzc3y1qbfR9sufVlep6m6nSt-zd147qd25bBme5Us2Bqe28bdWMOeY3wSZvBvdmh8cJ96z0IBhM6ev27inJYU0hbZodrs69f7O6_pSm_cWwYQgJVVVFvv5htxfM_qp2yU7cFhhvz8O6U-z7J1mvUbW0fh8i36WS9yhQg2Sz6M2a1egZSgpVSMp577Zhr_2gkSeWmwb6isgUekcX7Upq0r8WIfVmY9_rYY-BosX0ve1e-dMyioyjBbalxBnSd9u-_pubamirXB23RSUiaBJMgzho6d5qXnk-OlFVWczJiwMv1VOWkjvxtX_B_7i8mx9Rp2uBmQe_i35gwlpyFSvRdF9exnnhJdozWx82vl2o09-_8SIw66WsuoJww87qUyuVRV2_m41ibekVgrSIiMSbZZUdtao4cI7toW85a4B-oboYRhVX9qiiWblwyzjQWj1kxO183UYphxsv9O5ftSp4_IejV';
}
function getServerKey()
{
         $FIREBASE_MESSAGING_SCOPE = 'https://www.googleapis.com/auth/firebase.messaging';
            try {
                $jsonString = '{
                "type": "service_account",
                "project_id": "monasba-26b9f",
                "private_key_id": "6b49ba7bc4068912192a90534a2092f2b01fe7c2",
                "private_key": "-----BEGIN PRIVATE KEY-----\\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDCOz4vaHJ7sVak\\n...\\n-----END PRIVATE KEY-----\\n",
                "client_email": "firebase-adminsdk-l87v9@monasba-26b9f.iam.gserviceaccount.com",
                "client_id": "105752101940293655665",
                "auth_uri": "https://accounts.google.com/o/oauth2/auth",
                "token_uri": "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-l87v9%40monasba-26b9f.iam.gserviceaccount.com",
                "universe_domain": "googleapis.com"
            }';

//                $credentials = new ServiceAccountCredentials(
//                    [self::$FIREBASE_MESSAGING_SCOPE],
//                    json_decode($jsonString, true)
//                );

                $token = $credentials->fetchAuthToken();
                return $token['access_token'];
            } catch (GoogleException $e) {
                return $e->getMessage();
            } catch (\Exception $e) {
                return $e->getMessage();
            }

}
function callback_data($status, $key, $data = null, $token = "")
{
    $language = request()->header('lang');
    $response = [
        'status' => $status,
        'msg' => isset($language) && Config::has('response.' . $key) ? Config::get('response.' . $key . '.' . request()->header('lang')) : $key,
        'data' => $data,
    ];
    $token ? $response['token'] = $token : '';
    return response()->json($response);
}

function rateValue($amount, $rate)
{
    return round(($amount * $rate / 100), 2);
}


function getStartOfDate($date)
{
    return date('Y-d-m', strtotime($date)) . ' 00:00';
}

function getEndOfDate($date)
{
    return date('Y-d-m', strtotime($date)) . ' 23:59';
}

function getTimeSlot($interval, $start_time, $end_time)
{
    $start = new DateTime($start_time);
    $end = new DateTime($end_time);
    $startTime = $start->format('H:i');
    $endTime = $end->format('H:i');
    $i = 0;
    $time = [];
    while (strtotime($startTime) <= strtotime($endTime)) {
        $start = $startTime;
        $end = date('H:i', strtotime('+' . $interval . ' minutes', strtotime($startTime)));
        $startTime = date('H:i', strtotime('+' . $interval . ' minutes', strtotime($startTime)));
        $i++;
        if (strtotime($startTime) <= strtotime($endTime)) {
            $time[$i]['slot_start_time'] = $start;
            $time[$i]['slot_end_time'] = $end;
        }
    }
    return $time;
}


if (!function_exists('ArabicDate')) {
    function ArabicDate()
    {
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        $your_date = date('y-m-d'); // The Current Date
        $en_month = date("M", strtotime($your_date));
        foreach ($months as $en => $ar) {
            if ($en == $en_month) {
                $ar_month = $ar;
            }
        }

        $find = array("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
        $replace = array("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
        $ar_day_format = date('D'); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);

        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
        $current_date = $ar_day . ' - ' . date('d') . ' ' . $ar_month . ' ' . date('Y');
        $arabic_date = str_replace($standard, $eastern_arabic_symbols, $current_date);

        return $arabic_date;
    }
}


function distance($lat1, $lon1, $lat2, $lon2, $unit = 'K')
{
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}

function upload($file, $dir)
{
    $image = time() . uniqid() . '.' . $file->getClientOriginalExtension();
//    $path = $image->store
//Publicly("images","s3") ;

    $file->storeAs('uploads' . '/' . $dir,$image,'s3');
//    $file->move(public_path('uploads' . '/' . $dir), $image);
    return $image;
}

function unlinkFile($image, $path)
{
    if ($image != null) {
        if (!strpos($image, 'https')) {
            if (file_exists(storage_path("app/public/$path/") . $image)) {
                unlink(storage_path("app/public/$path/") . $image);
            }
        }
    }
    return true;
}


function unlinkImage($image)
{
    if ($image != null) {
        if (!strpos($image, 'https')) {
            if (file_exists($image)) {
                unlink($image);
            }
        }
    }
    return true;
}

// Firebase Connect

function firebase_connect()
{
    $firebase = (new Factory)
        ->withServiceAccount(app_path('goapp-90825-firebase-adminsdk-cp0vq-17f2269a1a.json'))
        ->withDatabaseUri('https://goapp-90825-default-rtdb.firebaseio.com/')
        ->createDatabase();
    return $firebase;
}

function driverChangeOrderStatus($status, $order_type)
{
    if ($order_type == 'Magic') {
        return [
            'AcceptedDelivery' => 'GoToStore',
            'GoToStore' => 'ArriveToStore', // 3
            'ArriveToStore' => 'SendPriceList', // 4
            'AcceptedList' => 'OnWay', // 6
            'OnWay' => 'Arrived',
            'Arrived' => 'Completed',
        ][$status];
    }
    // subscribed
    return [
        'AcceptedDelivery' => 'GoToStore',
        'GoToStore' => 'ArriveToStore', // 3
        'ArriveToStore' => 'OnWay', // 6
        'OnWay' => 'Arrived',
        'Arrived' => 'Completed',
    ][$status];
}

// Admin Helper Functions

if (!function_exists('company_parent')) {
    function company_parent()
    {
        if (Auth::guard('companies')->user()->type == 'Admin') {
            return Auth::guard('companies')->user()->id;
        } else {
            return Auth::guard('companies')->user()->company_id;
        }
    }
}

if (!function_exists('admin_url')) {
    function admin_url($url = null)
    {
        return url('admin/' . $url);
    }
}


if (!function_exists('company_url')) {
    function company_url($url = null)
    {
        return url('company/' . $url);
    }
}
if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admins');
    }
}
if (!function_exists('store')) {
    function store()
    {
        return auth()->guard('stores');
    }
}


function isBlockChat($user_id){
    $chat  = Chat::where(function ($q) use ($user_id){
        $q->where('user_id',Auth::guard('user')->user()->id)->where('provider_id',$user_id);
    })->OrWhere(function ($q)use ($user_id){
        $q->where('user_id',$user_id)->where('provider_id',Auth::guard('user')->user()->id);
    })->first();
    if(isset($chat)){
        if($chat->is_block == 1){
            return 1;
        }else{
            return 0;
        }
    }else{
        return 0;
    }

}
function AuthData()
{
    if(Auth::guard('user')->check()){
        return Auth::guard('user')->user();

    }elseif(Auth::guard('company')->check()){
        return Auth::guard('company')->user();
    }
}
function AuthModel()
{
    if(Auth::guard('user')->check()){
        return \App\Models\User::class;
    }elseif(Auth::guard('company')->check()){
        return \App\Models\Company::class;
    }
}


