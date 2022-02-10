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
































    1643632167', 'https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569', 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0



















    <td class='comms_phone column-comms_phone' data-colname="Comms Phone"><input type="checkbox" class="bpc_down" name="bpc_comms_phone" checked="checked" onclick="save_comms_market_val('comms_phone', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='comms_sms column-comms_sms' data-colname="Comms SMS"><input type="checkbox" class="bpc_down" name="bpc_comms_sms" checked="checked" onclick="save_comms_market_val('comms_sms', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='comms_whatsapp column-comms_whatsapp' data-colname="Comms WhatsApp"><input type="checkbox" class="bpc_down" name="bpc_comms_whatsapp" checked="checked" onclick="save_comms_market_val('comms_whatsapp', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='comms_messenger column-comms_messenger' data-colname="Comms Messenger"><input type="checkbox" class="bpc_down" name="bpc_comms_messenger" checked="checked" onclick="save_comms_market_val('comms_messenger', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='comms_telegram column-comms_telegram' data-colname="Comms Telegram"><input type="checkbox" class="bpc_down" name="bpc_comms_telegram" checked="checked" onclick="save_comms_market_val('comms_telegram', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='comms_email column-comms_email' data-colname="Comms Email"><input type="checkbox" class="bpc_down" name="bpc_comms_email" checked="checked" onclick="save_comms_market_val('comms_email', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='comms_custom1 column-comms_custom1' data-colname="Comms Custom 1"><input type="checkbox" class="bpc_down" name="bpc_comms_custom1" checked="checked" onclick="save_comms_market_val('comms_custom1', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='comms_custom2 column-comms_custom2' data-colname="Comms Custom 2"><input type="checkbox" class="bpc_down" name="bpc_comms_custom2" checked="checked" onclick="save_comms_market_val('comms_custom2', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='comms_custom3 column-comms_custom3' data-colname="Comms Custom 3"><input type="checkbox" class="bpc_down" name="bpc_comms_custom3" checked="checked" onclick="save_comms_market_val('comms_custom3', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='market_phone column-market_phone' data-colname="Marketing Phone"><input type="checkbox" class="bpc_down" name="bpc_market_phone" checked="checked" onclick="save_comms_market_val('market_phone', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='market_sms column-market_sms' data-colname="Marketing SMS"><input type="checkbox" class="bpc_down" name="bpc_market_sms" checked="checked" onclick="save_comms_market_val('market_sms', 1, 0, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='market_whatsapp column-market_whatsapp' data-colname="Marketing WhatsApp"><input type="checkbox" class="bpc_down" name="bpc_market_whatsapp" onclick="save_comms_market_val('market_whatsapp', 1, 1, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='market_messenger column-market_messenger' data-colname="Marketing Messenger"><input type="checkbox" class="bpc_down" name="bpc_market_messenger" onclick="save_comms_market_val('market_messenger', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0)" /></td>
    <td class='market_telegram column-market_telegram' data-colname="Marketing Telegram"><input type="checkbox" class="bpc_down" name="bpc_market_telegram" onclick="save_comms_market_val('market_telegram', 1, 1, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='market_email column-market_email' data-colname="Marketing Email"><input type="checkbox" class="bpc_down" name="bpc_market_email" onclick="save_comms_market_val('market_email', 1, 1, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='market_custom1 column-market_custom1' data-colname="Marketing Custom 1"><input type="checkbox" class="bpc_down" name="bpc_market_custom1" onclick="save_comms_market_val('market_custom1', 1, 1, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='market_custom2 column-market_custom2' data-colname="Marketing Custom 2"><input type="checkbox" class="bpc_down" name="bpc_market_custom2" onclick="save_comms_market_val('market_custom2', 1, 1, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td>
    <td class='market_custom3 column-market_custom3' data-colname="Marketing Custom 3"><input type="checkbox" class="bpc_down" name="bpc_market_custom3" onclick="save_comms_market_val('market_custom3', 1, 1, 1643632167, https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, )" /></td></tr><script>                                                    








    save_comms_market_val(\'comms_phone\', ' . $user . ', 0, ' . $_SESSION['timestamp'] . ', \'' . $_SESSION['consent_url'] . '\' ,' . $_SESSION['cp'] . ', ' . $_SESSION['cs'] . ', ' . $_SESSION['cw'] . ', ' . $_SESSION['cm'] . ', ' . $_SESSION['ct'] . ', ' . $_SESSION['ce'] . ', ' . $_SESSION['cc1'] . ', ' . $_SESSION['cc2'] . ', ' . $_SESSION['cc3'] . ', ' . $_SESSION['mp'] . ', ' . $_SESSION['ms'] . ', ' . $_SESSION['mw'] . ', ' . $_SESSION['mm'] . ', ' . $_SESSION['mt'] . ', ' . $_SESSION['me'] . ', ' . $_SESSION['cc1'] . ', ' . $_SESSION['cc2'] . ', ' . $_SESSION['cc3'] .  '

    onclick="save_comms_market_val('comms_phone', 3, 0, 1643632167, 'https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569' ,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1)"

    onclick="save_comms_market_val('comms_phone', 2, 0, 1643632167, 'https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569' ,1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1)"

                $value = array($timestamp, $consent_link, $cp, $cs, $cw, $cm, $ct, $ce, $cc1, $cc2, $cc3, $mp, $ms, $mw, $mm, $mt, $me, $mc1, $mc2, $mc3);

                a:14:{i:0;s:10:"1643632167";i:1;s:103:"https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569";i:2;i:1;i:3;i:1;i:4;i:1;i:5;i:1;i:6;i:1;i:7;i:1;i:8;i:1;i:9;i:1;i:10;i:1;i:11;i:1;i:12;i:1;i:13;i:1;}

                a:21:{i:0;s:1:"0";i:1;s:10:"1643632167";i:2;s:103:"https://bepopiacompliant.co.za/#/view_consent/test.local/test@test.com/da5c751a21084f5c872811c58a730569";i:3;s:1:"1";i:4;s:1:"1";i:5;s:1:"1";i:6;s:1:"1";i:7;s:1:"1";i:8;s:1:"1";i:9;s:1:"1";i:10;s:1:"1";i:11;s:1:"1";i:12;s:1:"1";i:13;s:1:"1";i:14;s:1:"1";i:15;s:1:"1";i:16;s:1:"1";i:17;s:1:"1";i:18;s:1:"1";i:19;s:1:"1";i:20;s:1:"1";}