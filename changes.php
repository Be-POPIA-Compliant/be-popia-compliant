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