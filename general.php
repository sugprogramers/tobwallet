<?php

function getArrayCohort() {
    return array(
        "EMP-Evanston",
        "EMP-Miami",
        "KS-Toronto",
        "KR-Israel",
        "KH-Hong Kong",
        "GU-China",
        "KW-Germany",
        "Other please type"
    );
}
function  getCountry(){
    return array(
        "Afghanistan",
"Albania",
"Algeria",
"Andorra",
"Angola",
"Antigua & Deps",
"Argentina",
"Armenia",
"Australia",
"Austria",
"Azerbaijan",
"Bahamas",
"Bahrain",
"Bangladesh",
"Barbados",
"Belarus",
"Belgium",
"Belize",
"Benin",
"Bhutan",
"Bolivia",
"Bosnia Herzegovina",
"Botswana",
"Brazil",
"Brunei",
"Bulgaria",
"Burkina",
"Burundi",
"Cambodia",
"Cameroon",
"Canada",
"Cape Verde",
"Central African Rep",
"Chad",
"Chile",
"China",
"Colombia",
"Comoros",
"Congo",
"Congo {Democratic Rep}",
"Costa Rica",
"Croatia",
"Cuba",
"Cyprus",
"Czech Republic",
"Denmark",
"Djibouti",
"Dominica",
"Dominican Republic",
"East Timor",
"Ecuador",
"Egypt",
"El Salvador",
"Equatorial Guinea",
"Eritrea",
"Estonia",
"Ethiopia",
"Fiji",
"Finland",
"France",
"Gabon",
"Gambia",
"Georgia",
"Germany",
"Ghana",
"Greece",
"Grenada",
"Guatemala",
"Guinea",
"Guinea-Bissau",
"Guyana",
"Haiti",
"Honduras",
"Hungary",
"Iceland",
"India",
"Indonesia",
"Iran",
"Iraq",
"Ireland {Republic}",
"Israel",
"Italy",
"Ivory Coast",
"Jamaica",
"Japan",
"Jordan",
"Kazakhstan",
"Kenya",
"Kiribati",
"Korea North",
"Korea South",
"Kosovo",
"Kuwait",
"Kyrgyzstan",
"Laos",
"Latvia",
"Lebanon",
"Lesotho",
"Liberia",
"Libya",
"Liechtenstein",
"Lithuania",
"Luxembourg",
"Macedonia",
"Madagascar",
"Malawi",
"Malaysia",
"Maldives",
"Mali",
"Malta",
"Marshall Islands",
"Mauritania",
"Mauritius",
"Mexico",
"Micronesia",
"Moldova",
"Monaco",
"Mongolia",
"Montenegro",
"Morocco",
"Mozambique",
"Myanmar, {Burma}",
"Namibia",
"Nauru",
"Nepal",
"Netherlands",
"New Zealand",
"Nicaragua",
"Niger",
"Nigeria",
"Norway",
"Oman",
"Pakistan",
"Palau",
"Panama",
"Papua New Guinea",
"Paraguay",
"Peru",
"Philippines",
"Poland",
"Portugal",
"Qatar",
"Romania",
"Russian Federation",
"Rwanda",
"St Kitts & Nevis",
"St Lucia",
"Saint Vincent & the Grenadines",
"Samoa",
"San Marino",
"Sao Tome & Principe",
"Saudi Arabia",
"Senegal",
"Serbia",
"Seychelles",
"Sierra Leone",
"Singapore",
"Slovakia",
"Slovenia",
"Solomon Islands",
"Somalia",
"South Africa",
"South Sudan",
"Spain",
"Sri Lanka",
"Sudan",
"Suriname",
"Swaziland",
"Sweden",
"Switzerland",
"Syria",
"Taiwan",
"Tajikistan",
"Tanzania",
"Thailand",
"Togo",
"Tonga",
"Trinidad & Tobago",
"Tunisia",
"Turkey",
"Turkmenistan",
"Tuvalu",
"Uganda",
"Ukraine",
"United Arab Emirates",
"United Kingdom",
"United States",
"Uruguay",
"Uzbekistan",
"Vanuatu",
"Vatican City",
"Venezuela",
"Vietnam",
"Yemen",
"Zambia",
"Zimbabwe"
        
    );
}




function getRandomArrayImageProject() {
    $items = getArrayImageProject();
    return $items[array_rand($items)];
}

function getArrayImageProject() {
    return array(
        "template/assets/photos/view-1-960x640.jpg",
        "template/assets/photos/view-2-960x640.jpg",
        "template/assets/photos/view-3-960x640.jpg",
        "template/assets/photos/view-4-960x640.jpg",
        "template/assets/photos/view-5-960x640.jpg",
        "template/assets/photos/view-6-960x640.jpg",
        "template/assets/photos/view-7-960x640.jpg",
        "template/assets/photos/view-8-960x640.jpg",
        "template/assets/photos/view-9-960x640.jpg",
    );
}

function getAction($id) {
    $action = array(
        1 => '<i class="icon fa-keyboard-o" aria-hidden="true" ></i>  Event Send Key',
        2 => '<i class="icon fa-mouse-pointer" aria-hidden="true" ></i>  Event Click',
        3 => '<i class="icon fa-link" aria-hidden="true" ></i>  Event Move Link',
        4 => '<i class="icon fa-check-square-o" aria-hidden="true" ></i>  Event Validate',
        5 => '<i class="icon wb-layout" aria-hidden="true" ></i>  Event Move Frame',
        6 => '<i class="icon wb-check" aria-hidden="true" ></i>  Event Validate Link',
        7 => '<i class="icon fa-hand-o-up" aria-hidden="true" ></i>  Event Double Click',
    );

    return $action[$id];
}

function getActionLabel($id) {
    $action = array(
        1 => 'Event Send Key',
        2 => 'Event Click',
        3 => 'Event Move Link',
        4 => 'Event Validate',
        5 => 'Event Move Frame',
        6 => 'Event Validate Link',
        7 => 'Event Double Click',
    );

    return $action[$id];
}

function getActionIcon($id) {
    $action = array(
        1 => '<i class="icon fa-keyboard-o" aria-hidden="true" ></i>',
        2 => '<i class="icon fa-mouse-pointer" aria-hidden="true" ></i>',
        3 => '<i class="icon fa-link" aria-hidden="true" ></i>',
        4 => '<i class="icon fa-check-square-o" aria-hidden="true" ></i>',
        5 => '<i class="icon wb-layout" aria-hidden="true" ></i>',
        6 => '<i class="icon wb-check" aria-hidden="true" ></i>',
        7 => '<i class="icon fa-hand-o-up" aria-hidden="true" ></i>',
    );

    return $action[$id];
}

function saveAdmAudit($id) {
    $val = new AdmAudit();
    $val->Logindate = QDateTime::Now();
    $val->Loginip = $_SERVER['REMOTE_ADDR'];
    $val->Connstring = $_SERVER['HTTP_USER_AGENT'];
    $val->AdmUserAdmUserId = $id;
    $val->Save();
}

function isEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        return true;
    } else {
        return false;
    }
}

function isDni($dni) {
    if (!is_numeric($dni)) {
        return false;
    } else {
        if (strlen($dni) !== 8) {
            return false;
        } else {
            return true;
        }
    }
}

//http://localhost/docufresh/verifyemail/985237b4aee1e6151cce518c3c1a9a63/03d67827ebe62126ce126844ec96f719/577e80736060f
function verifyRegister($idUser) {
    //try {

    $user = AdmUser::LoadByAdmUserId($idUser);
    if ($user) {
        $user->Tokenlogin = md5(uniqid());
        $user->Save();

        $date = md5(date("Y-m-d", strtotime('today')));
        $idUniq = $user->UniqueId;
        $accesstoken = $user->Tokenlogin;
        $link = __DOMAIN_BASE__ . "/verifyemail/$date/$idUniq/$accesstoken";


        $email = $user->Email;

        $body = "verify " . $link;

        $subject = "Welcome Please verify your email";


        $newemail = new CoreQueueemail();
        $newemail->Regdate = QDateTime::Now();
        $newemail->Body = $body;
        $newemail->AdmUserAdmUserId = $user->AdmUserId;
        $newemail->Log = "";
        $newemail->EmailTo = $email;
        $newemail->Status = 1;
        $newemail->Subject = $subject;
        $newemail->Save();
    }
    /* } catch (Exception $exc) {

      } */
}

function resetPassword($idUser) {
    try {
        $user = AdmUser::LoadByAdmUserId($idUser);
        if ($user) {
            $user->Tokenlogin = md5(uniqid());
            $user->Save();

            $email = $user->Email;

            $date = md5(date("Y-m-d", strtotime('today')));
            $idUniq = $user->UniqueId;
            $accesstoken = $user->Tokenlogin;
            $link = __DOMAIN_BASE__ . "/reset/$date/$idUniq/$accesstoken";

            $body = "reset " . $link;

            $subject = "Welcome reset Password";

            $newemail = new CoreQueueemail();
            $newemail->Regdate = QDateTime::Now();
            $newemail->Body = $body;
            $newemail->AdmUserAdmUserId = $user->AdmUserId;
            $newemail->Log = "";
            $newemail->EmailTo = $email;
            $newemail->Status = 1;
            $newemail->Subject = $subject;
            $newemail->Save();
        }
    } catch (Exception $exc) {
        
    }
}


function saveLog($nameLog, $body) {
    try {
        $open = fopen(__DOCROOT__ . __SUBDIRECTORY__ . "/logs/".$nameLog, 'a');
        $write = fwrite($open, date('Y/m/d H:i:s') . ' -> ' . $body . "\n");
        fclose($open);
    } catch (Exception $e) {
        
    }
}

function simpleEmailSend($iduser, $email,$subject , $body) {
    try {
            $newemail = new Queueemail();
            $newemail->CreateDateTime = QDateTime::Now();
            $newemail->Body = $body;
            $newemail->IdUser = $iduser;
            $newemail->Log = "";
            $newemail->To = $email;
            $newemail->Status = 1;
            $newemail->Subject = $subject;
            $newemail->Save();
    } catch (Exception $exc) {
        
    }
}


function sendEmail($body, $to, $subject) {
    date_default_timezone_set('America/Toronto');
    require_once('PHPMailer/class.smtp.php');
    require_once('PHPMailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $body = eregi_replace("[\]", '', $body);
    $mail->IsSMTP();
    $mail->SMTPDebug = 0; //cambiar a 0   1  luego de ver los errores
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = __SMTP_SECURE__;
    $mail->Host = __SMTP_HOST__;
    $mail->Port = __SMTP_PORT__;
    $mail->IsHTML(true);
    $mail->Username = __SMTP_USERNAME__;
    $mail->Password = __SMTP_PASSWORD__;
    $mail->SetFrom(__SMTP_USERNAME__, __SMTP_FROMNAME__);
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($to);

    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}
