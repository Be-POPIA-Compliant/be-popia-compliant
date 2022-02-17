<?php



                case 'market_email' :
                    $check_market_email = $user_output[2];
                    if(isset($check_market_email) && ($check_market_email == 1)){
                        $market_email= '<input type="checkbox" class="bpc_down" name="bpc_market_email" checked="checked" onclick="save_comms_market_val(\'market_email\', ' . $user . ', 0)"' . $_SESSION['disable'] . ' />';
                    } else {
                        $market_email= '<input type="checkbox" class="bpc_down" name="bpc_market_email" onclick="save_comms_market_val(\'market_email\', ' . $user . ', 1)"' . $_SESSION['disable'] . ' />';
                    }
                    return $market_email;
                break;












// dummy data to better show the issue, we want to change the title of `coffee_id` 12
$parameters = array(
    'coffee_id' => '12',
    'title' => 'A Delicious Cappuchino',
    'type' => 'espresso',
);
 
// try to find some `favorite_coffee` user meta 
$previous_favorite_coffee = get_user_meta( $user_id, 'favorite_coffee', false );
 
/**
* First, the condition for when no favorite_coffee user meta data exists
**/
if ( empty( $previous_favorite_coffee ) ) {
    add_user_meta( $user_id, 'favorite_coffee', $parameters );
}
 
/**
* Second, the condition for when some favorite_coffee user_meta data already exists
**/
// search recursively through records returned from get_user_meta for the record you want to replace, as identified by `coffee_id` - credit: http://php.net/manual/en/function.array-search.php#116635
$coffee_id = array_search( $parameters['coffee_id'], array_column( $previous_favorite_coffee, 'coffee_id' ) );
if ( false === $coffee_id ) {
    // add if the wp_usermeta meta_key[favorite_coffee] => meta_value[ $parameters[ $coffee_id ] ] pair does not exist
    add_user_meta( $user_id, 'favorite_coffee', $parameters );
} else {
    // update if the wp_usermeta meta_key[favorite_coffee] => meta_value[ $parameters[ $coffee_id ] ] pair already exists
    update_user_meta( $user_id, 'favorite_coffee', $parameters, $previous_favorite_coffee[ $coffee_id ] );
































    function be_popia_compliant_save_comms_market_val() {
        $meta_key = 'bpc_' . sanitize_text_field($_REQUEST['comms_market']);
        $user_id = sanitize_text_field($_REQUEST['user']);
        $meta_value = sanitize_text_field($_REQUEST['val']);
    
        $meta_value = sanitize_text_field($_REQUEST['val']);
    
        $timestamp = sanitize_text_field($_REQUEST['timestamp']);
        $consent_link = sanitize_text_field($_REQUEST['consent_link']);
        
        $cp=sanitize_text_field($_REQUEST['cp']); $cs=sanitize_text_field($_REQUEST['cs']); $cw=sanitize_text_field($_REQUEST['cw']); $cm=sanitize_text_field($_REQUEST['cm']); $ct=sanitize_text_field($_REQUEST['ct']); $ce=sanitize_text_field($_REQUEST['ce']); $cc1=sanitize_text_field($_REQUEST['cc1']); $cc2=sanitize_text_field($_REQUEST['cc2']); $cc3=sanitize_text_field($_REQUEST['cc3']); $mp=sanitize_text_field($_REQUEST['mp']); $ms=sanitize_text_field($_REQUEST['ms']); $mw=sanitize_text_field($_REQUEST['mw']); $mm=sanitize_text_field($_REQUEST['mm']); $mt=sanitize_text_field($_REQUEST['mt']); $me=sanitize_text_field($_REQUEST['me']); $mc1=sanitize_text_field($_REQUEST['mc1']); $mc2=sanitize_text_field($_REQUEST['mc2']); $mc3=sanitize_text_field($_REQUEST['mc3']);
    
        if($meta_key=='comms_phone') {$cp=$meta_value;} if($meta_key=='comms_sms') {$cs=$meta_value;} if($meta_key=='comms_whatsapp') {$cw=$meta_value;} if($meta_key=='comms_messenger') {$cm=$meta_value;} if($meta_key=='comms_telegram') {$ct=$meta_value;} if($meta_key=='comms_email') {$ce=$meta_value;} if($meta_key=='comms_custom1') {$cc1=$meta_value;} if($meta_key=='comms_custom2') {$cc2=$meta_value;} if($meta_key=='comms_custom3') {$cc3=$meta_value;} if($meta_key=='market_phone') {$mp=$meta_value;} if($meta_key=='market_sms') {$ms=$meta_value;} if($meta_key=='market_whatsapp') {$mw=$meta_value;} if($meta_key=='market_messenger') {$mm=$meta_value;} if($meta_key=='market_telegram') {$mt=$meta_value;}  if($meta_key=='market_email') {$me=$meta_value;} if($meta_key=='market_custom1') {$mc1=$meta_value;} if($meta_key=='market_custom2') {$mc2=$meta_value;} if($meta_key=='market_custom3') {$mc3=$meta_value;}
    
        $value = array($timestamp, $consent_link, $cp, $cs, $cw, $cm, $ct, $ce, $cc1, $cc2, $cc3, $mp, $ms, $mw, $mm, $mt, $me, $mc1, $mc2, $mc3);
      
        update_user_meta($user_id, 'bpc_comms_market', $value);
        echo ('<script>' . $value . '</script>');
    }



    a:20:{
        
        i:0;s:10:"1643632167";
        i:1;s:103:"https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569";
        i:2;s:1:"1";
        i:3;s:1:"1";
        i:4;s:1:"1";
        i:5;s:1:"1";
        i:6;s:1:"1";
        i:7;s:1:"1";
        i:8;s:1:"1";
        i:9;s:1:"1";
        i:10;s:1:"1";
        i:11;s:1:"1";
        i:12;s:1:"1";
        i:13;s:1:"1";
        i:14;s:1:"1";
        i:15;s:1:"1";
        i:16;s:1:"1";
        i:17;s:1:"1";
        i:18;s:1:"1";
        i:19;s:1:"1";
    }

    onclick="
    save_comms_market_val(
            \'comms_phone\', ' . 
            $user . ', 
            0, ' . 


            get_option( 'bpc_timestamp' ) . ', \'' . 
            get_option( 'bpc_consent_url' ) . '\', ' . 
            get_option( 'bpc_cp') . ', ' . 
            get_option( 'bpc_cs') . ', ' . 
            get_option( 'bpc_cw') . ', ' . 
            get_option( 'bpc_cm' ) . ', ' . 
            get_option( 'bpc_ct' ) . ', ' . 
            get_option( 'bpc_ce' ) . ', ' . 
            get_option( 'bpc_cc1' ) . ', ' . 
            get_option( 'bpc_cc2' ) . ', ' . 
            get_option( 'bpc_cc3' ) . ', ' . 

            get_option( 'bpc_mp' ) . ', ' . 
            get_option( 'bpc_ms' ) . ', ' . 
            get_option( 'bpc_mw' ) . ', ' . 
            get_option( 'bpc_mm' ) . ', ' . 
            get_option( 'bpc_mt' ) . ', ' . 
            get_option( 'bpc_me' ) . ', ' . 
            get_option( 'bpc_mc1' ) . ', ' . 
            get_option( 'bpc_mc2' ) . ', ' . 
            get_option( 'bpc_mc3' ) . 
        ')