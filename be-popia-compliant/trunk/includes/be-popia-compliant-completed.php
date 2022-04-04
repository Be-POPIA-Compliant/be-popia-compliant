<?php

function be_popia_compliant_active_check()
{
    if (isset($_REQUEST)) {
        global $wpdb;
        $url = "https://py.bepopiacompliant.co.za/api/domain/check_expiry/" . $_SERVER['SERVER_NAME'];
        $args = array(
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
            'body' => array(),
        );
        $response = wp_remote_get($url, $args);
        $response_code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);
        if (401 === $response_code) {
            echo "Unauthorized access, You do not seem to be authorised to access this data!";
        }
        if (200 === $response_code) {
            $trim_brackets = trim($body, "[{}]");
            $explode = explode(',', $trim_brackets);
            $trim_date = str_replace('"renew_date":', '', $explode[1]);
            $trim_date = str_replace('"', '', $trim_date);
            $go_on = str_replace('"is_subscribed":', '', $explode[2]);
            $consent_form_complete = str_replace('"consent_form_complete":', '', $explode[3]);
            $domain_form_complete = str_replace('"domain_form_complete":', '', $explode[4]);
            $domain_form_complete = str_replace('"', '', $domain_form_complete);
            $domain_form_complete = str_replace('"', '', $domain_form_complete);
            $other_parties = str_replace('"other_parties":', '', $explode[5]);
            $other_parties = str_replace('"', '', $other_parties);
            $trim_date = trim($trim_date, '"');
            $go_on = trim($go_on, '"');
            $date = strtotime($trim_date);
            $date = date('Y-m-d', $date);
            if ($date >= date("Y-m-d") && $consent_form_complete == 1 && $domain_form_complete == 1 && ($other_parties != null) || ($other_parties != '')) {
                if ($go_on == 1) {
                    global $wpdb;
                    $privacy = '';
                    $table_name = $wpdb->prefix . 'be_popia_compliant_admin';
                    $wpdb->update($table_name, array('value' => 0), array('id' => 3));
                    
                    $banner_background = get_option('be_popia_compliant_banner-field11-background-color');
                    $banner_text = get_option('be_popia_compliant_banner-field12-text-color');
                    echo '<style>
                            .BePopiaCompliant {
                                background-color:' . $banner_background . ';
                                color:' . $banner_text . ';
                                text-align: center;
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                            }
                            .cont1 {
                                margin: auto;
                                width: 90%;
                                height: 80px;
                                display: flex;
                            }
                            .be_popia_compliant_img {
                                margin: 20px auto auto 10%;
                                width: 150px;
                            }
                            span.bpc_contnents {
                                padding: 2%;
                            }
                            .be_popia_compliant_links {
                                margin: auto auto auto 0;
                                width: -webkit-fill-available;
                                font-weight:500;
                                font-size: 20px;
                            }
                            .be_popia_compliant_links a {
                                color:' . $banner_text . ';
                                text-decoration: none;
                                font-variant-caps: all-petite-caps;
                                font-weight: 500;
                            }
                            @media only screen and (max-width: 600px) {    
                                .be_popia_compliant_img {
                                    margin: auto auto auto auto;
                                    padding: 15px;
                                }
                                .be_popia_compliant_links {
                                    margin: auto auto auto auto;
                                    width: 100%;
                                    font-weight: 700;
                                    font-size: 23px;
                                }
                                .cont1 {
                                    margin: auto;
                                    width: 80%;
                                    height: 245px;
                                    display: block;  
                                }
                            }
                        </style>
                        <div class="BePopiaCompliant">
                            <div class="cont1">
                                <div class="be_popia_compliant_img">';
                                    if(strval(get_option('be_popia_compliant_cookie-field10-banner-logo-selector')) == 'white') {
                                    echo '<a href="https://bepopiacompliant.co.za" target="_blank"><img alt="POPIA Compliant" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABUCAMAAAAPpfpfAAAACXBIWXMAAC4jAAAuIwF4pT92AAAC5VBMVEVHcEz////9/f3////9/f39/f3+/v7////////////9/f3////////////////+/v7////+/v7+/v7////19fX////////////////////////////////////////////////////////////////////////////////////////+/v7////////+/v7+/v7////+/v7+/v7////+/v7////////+/v7////9/f3+/v7////////9/f3////////////8/Pz9/f3////////////////////+/v7+/v7+/v7+/v7////+/v7+/v7////9/f3////////////////+/v7////////////+/v7+/v7////+/v7////+/v7////+/v7+/v7////+/v7////////+/v7////////+/v7////////////////////////8/Pz////+/v7+/v7////+/v7////////////////8/Pz+/v7////////////+/v7////+/v7////////////+/v7////////+/v7////+/v7+/v7///////////9h///////+/v7////////////////////////+/v7+/v7////////////////8/Pz////////////////////+/v79/f3////////////////+/v7////////////////////////////+/v7////////////+/v7////////////////////////////9/f3+/v7////////+/v7+/v74+Pj+/v7////////////////////+/v7+/v7////////////////////////////////////////////+/v7////+/v7////+/v7+/v7////////////////////+/v7////////////////////////////////+/v7////////////+/v7+/v7////+/v7+/v4AXAj////xcqsmAAAA9XRSTlMASwS5BwMM90b5C/66TP20srMK7QFasK+x/PDns+ikpvvr+KXc7+7x6TMEqfNcp6jyLrI0tcT6OFsIE67sCerPWQUGYKqkSKkPKCkr4DAi4g2Qnsv0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" oncontextmenu="return false;" />
                                    </a>';
                                } elseif(strval(get_option('be_popia_compliant_cookie-field10-banner-logo-selector')) == 'black') {
                                    echo '<a href="https://bepopiacompliant.co.za" target="_blank"><img alt="POPIA Compliant" src="data:image/png;base64,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" oncontextmenu="return false;" />
                                    </a>';
                                } elseif(strval(get_option('be_popia_compliant_cookie-field10-banner-logo-selector')) == 'grey') {
                                    echo '<a href="https://bepopiacompliant.co.za" target="_blank"><img alt="POPIA Compliant" src="data:image/png;base64,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" oncontextmenu="return false;" />
                                    </a>';
                                } else {  echo '<a href="https://bepopiacompliant.co.za" target="_blank"><img alt="POPIA Compliant" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABUCAMAAAAPpfpfAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAALiMAAC4jAXilP3YAAAMAUExURUdwTDMwMTQxMjQxMjQxMi0rLDQxMjQxMjQxMjQxMjQxMjQxMjQxMjEuMDQxMjQxMjMxMjQxMjQxMjQwMjQxMjQxMjQwMTQxMjQxMjMxMjMwMbcZGmcjJDQxMjQxMjQxMjQxMjMxMrcZGjQxMjQxMrcZGTQxMjIvMTQwMTQxMrcZGjQxMjQxMrcZGjQxMrUXGDQxMjQxMjQxMjMxMjQxMjQxMjQxMbcZGjMwMTMwMbcZGjQxMTEwMbcZGjMwMTQxMjQxMrcZGrcZGrcZGjQxMjQxMjQxMjMwMTQxMjQxMjQwMTQxMrcZGrcZGrYYGTMxMjQxMjMwMTQxMrcZGrcZGrcZGjQxMjMwMTQxMjQxMjQxMjQxMrcYGbcYGbcZGjMwMTQxMrcZGrcZGjQwMTMxMTQxMjQxMrcZGbcZGjQxMrcZGjMwMTQxMrcZGjQxMrcYGTQxMrcZGrcYGTQwMbcZGrcZGjMvMbcZGjQxMjQxMjQxMjQwMTQxMjQxMjQxMrUVGLcZGrcZGrgXGLcYGbcZGjQwMTQxMjQxMjMwMbcZGrcYGbcZGjQxMrcYGbcZGjMwMTQxMrcZGrcZGjMwMbcZGjQxMrcZGjQxMjQxMjQxMrcZGrcZGbcZGjQxMjMwMbcZGrcZGjMxMrcZGrcZGjQxMjQxMjQxMjQxMrcZGrcYGTQxMjQxMrcYGbcZGrcZGjMwMbcZGrcZGrcYGjQxMrcZGrcYGjQxMjQxMjQxMjQxMrcZGjQxMjQxMrYYGTQxMrcZGrcZGrcZGrcYGTQxMrcZGrcZGrcZGjMxMrcZGrcYGrcZGrcZGrcZGjQxMrcZGrcZGrcZGjQxMrcZGjQxMrcZGrcZGjMwMbcZGrcZGrcZGrcZGrcZGrcZGjQxMrcZGbcZGjMxMjQxMrcZGrcZGrcZGbcZGrcZGrcZGrYYGjQxMrcZGjQxMjQxMrcZGrcZGjQxMrcYGbcYGbcZGrcZGrcZGrcZGrcZGrcZGrcZGrcZGjQxMjQxMRozNaAcHjQxMrcZGteN0fMAAAD+dFJOUwAe34vdAquOcN73+PkD7YxC/o1EqugdQfscG/0B50VJQ0b+4uk06wVA5PHv9fblA3+xTBry5lBbDQv0TgT8CLz8Wjr69r/cFoRiJ19g8gcu4UeKaThniB+uekjJFBFXD5U9kylKzrc279deJNr4awlmnSUo+8kH2MPUoTA0cWUCllIEJ+Er0aUU7RrnqB5kGG3Ubgnpd0JcfZ5KHIlZBt6tm71xmMs2xcEXVIAMmX4SSEUwhbpQN8d0VYBSkQYyMqLcDj3rm80hsyti2uiDt4OQo6k5ey4Q5cVN0FSwaCGNO7R0rCnSn3IkV6aUc3l3ui07bJWFYYyYS2s8PAMZ+IoU/QAAFpJJREFUeNrtnAlYFMe2x0uiomw6Jugo43VhUwckKMKwCYpKkAiIrCpEwyIMKEhAEAEjiCIqahTBuD1UjBJcUFE0Ci64EjUGBfc1xl2D2Uzee9X3VHX3TA+7L+Ymec7/+8Tumuqe7l+fOnWq6vQg9LpKubMUqdUqLY8dhU3y2qlBtEJRyToYY0NPNYmW1SsMUGHts7ZqFC1paAcTwkorf52aRUva8USHsgo0VbNoSf4BmLZBNauWlTmSstL5Ut0GW46uCikrZ7+hahYtae88ykr0RN0PtqjNLCs8v+bt5uDapnn5d3dAnmEsq/Alpj2aUvf/gLq+vtq8OXWVIScvjWZl+I5p1Bcsq8LRyzU7tm1CHf+W0niTWoT64+Y14aRrOLulUe3g54zfYhkhw+YrtE1ZnsxuSR+hXJ23mRXu2QIs6VeSsyI2aMhHeVb4LYfVbDMUlyF3M64jtO038O1mBc0wqUmX3bat15N1tznLCzspm+81SqC2f1P9iZ3FBNTL2tranmoQp1Dyj6hX5vIeSSwrvVDkad247BvRoGYU2px6KTS+ocY2UB+l/tWM3m2o3o2oc0N1E+o2ijThZcRJn5PJohrTTSwrUT7qE61n8voyakb6zalncxrSUAMbqn9zMlTKqzUiocMEpIedR1Bp1ZN2ZApy02JhvagJmSnSESul8yal/Qal9UY1QiBnrI9M8IV+3RpT5xDk2ZZlNaRadgf79e7TCr1eY2hBvZtW59dWtybVrzU6lgy9oQn+oKmRkG17rhEGok96ita+5ePjfAprd1MfTxOzsEZmoU+GiPLeclhfUlh+TXzKN0KrUKSGxcPyRjNSdgcur//hDG6YgwtMCSyshtUTGTmFrg0wwWLv+rT2c6G7F1kkVMNiLevFf8+nI5t3VGktmcAZVj5Sw1I2w/yaRZSWqm0Fcqxm+nOw3NWwaG/ov4/S2i1YjMjU4MKGVFQflq7sIyJZvaULWZvRUa4Oit11XK0ZygLhAQ4yyT8SFsRZ/fTpMle+YklQ9wlnWPN61IcVcmHfBKJ9TgfHK5YvTKv9kjrq95/3XhpbH3Wz5GqF766mZ+1tue+FMqGkPDmpk2vDC5pYl3Nxu+/KrYqC2TdLn6/56eXKidx+TN2ckq3CI26+mjPlEJKcvmZDNKzU+Ch73Olr1y5ZKKt5DA8uvanYk/xwbUq6Ym81nMKDr+czZ+dqFFMi/1BF8pIYJSwUSCetRjzl76bahIPFGpYQ1m7lnIVZQDlbFrVJjysSzXMnC4sOAcpaeptOAk1L0qR5Pq5kfN6pfi5OxoETY/oyDGN39XwcW7Lrx/UuDCk5cZdF9MDOceqGOOUhw+/HOy6wQbuqDFjFR2w5UwzlxkcMDOZOVtaziTBwTFjM7wXXGiwYp3hAG+IdIw4cYnfkEY7xG4Ku2fWtJ7s56H0FrB1ObEjlxjUZPmyI9G8Aa5Jwiif6GCm6HSYo0npHBnGHk7BWUhQaStZo27bhzrGUPBujvSqoijeuZxSqmgMlh3znKku21EFJ+j2yeUphWxknyP7HaFhfZcX4b8GE5GTrN+XJv4Fd8zrelO7D3vrvuL1dEeQzjt2PsB3xwwOmgR4IYKFurCkZ2dNjOku52/wSNQ8LJ4GxeM7kMLERv6jTunqwcPIMFVj+7AHJwkSAoOOOwos7lY7SL5oLS9bvBFj/RTePF7PHbD1Hdz9FNgbCmteD0M+E3mfKs39MgPCWdpHW+mY2u2dMYDGVr+jONgJr18r1A4jo15vTzfUlQljt/DhT2Uzi0UXcTfbPbByW9pMOqWWrCFFnd7Sc1tYJjx1v7TeKtua1LCy9D1JTcwPIxIW02lQIK5+bs35XeTfpv9A7cDmyZUsVtDzHjdBY7GjJsnMbWANLPM3Dit9O3VHxdEYIqzIxMXEh2XfMQR82AyvuCD3q6ylCWEziLgUsY/RwCsj4AJzVYLsx2X5oIYSFunJN6QtoeL15w1ql2zgsq9vETdKx4ybUi0SvVqky2onSlaCkmnUEVseuUDJUk5QsdRDACunInd5SGayUDCBXnCBfHBOzWp7w9ZpilE2b2H2brR4xcQcWkO3v0zlYjF0O4XveUQXWga3Z2ad/JD7ulEUzsCRrOAP8Pl0Ii9mQrYTFahic1TGYP4UQFno0gr2DC7YO87mbseqNlLDchLCoqxptBJvt6QSh6CwXCUSRtWuz3g4ElgZ1eL0I0rPrlLAkmnzrHFHEn9/iMG17qzmfmwH+9kMC4Ool3kET06mYzcFivoY26cu3Ug7WRnroVdhaFiRvGlZFLXfYgJUqsJjDxfVgyQmsYY3CGnqBW6R4eozv2sIVT370QFVYt+mAiOBdVUNCfa8olWA2VVdhWWxBmaAZpvQkTTSc+PiRfDpAdhVc5cIKgQ+j+Kbyz3U2uQtmnITAos48seLzFYwqrAe0aSaQDyc2DSv9ODkkgnx+PUYFluMBi1bDQp5cHKq/jw8D3FATsLQC7a2/yvcilW4MJn5qpALrIGJIfqYEllGsvXWRJiFv9q4Slukq2sCjiJMX8yetIFd8PV0A6yi566psfreUNK9bFgRW5QZyp/dJ3zn1lJ0S1vN0D4+JG0nBhkNNN8PJpEUvzCF+y3yOAlYiIW93pvWwUGq99WaludSHhZ1hapkdDbVpo6ECK1RHAUsEldhT3rGdoYBFe9oh5exsWeFgLl4i9/irSny6jPiwo4qAagzsbqM+q3byOd6mjlNXx8FKPLdnz4mppPh50w7e41vaE7I94oYgHtZx2qYXlnzaalg7RqrCes+0SVi8TL5CWcRLjfLna3YgxR10VUIHmM1XhA7LabgaGZjbiUATPeWCnUq4yntCywqizkcRUe2cqrCs2punE7nYaytlWD90SFjdNKwr5KmsKJnoQwzT5QwPa1v6T6S3WHa5OVj6KtPKRVoqsKahFmCJJoRKkAOJHERlwtjcrJuDAJbOnRSkhGVtpvIdkSfZiInY0dzvBLAOnSL394rfXaP0WbVx6HPCljlijOoagZUAMUFTsI5SozSvSqyiccmJrbxloeLvGc4fthKWTMUepClNwhLpw+rQTMvYJaQgj7QnE3dqhoNXiZShg3ggLCHNm7+fBBU8rBqnesu8Z1kHTt3u4SAumM+GOOoutR1uiLKyVtkbAizaE1aCy2kAK379GnJIU7BsXFTi8r4PFLBQ9h6usJWwkLtYcBuFO5qEZba/u7+/K5ddWvOChhnJ1uXV0+gkmHYeG5Qa/t7Vv00WOxHBw6LfoK1HJXXm5xaBBrlkg1MlQbMtgj4/VXU3HWXQ0c+WlTFIEiSnceTjQ+k8rPQze66XSlRh7Tlw/vyzYHa4TGG9bABr4uV6o5jEmwpY6PT914PlKhzkFUhUYKU1iLMUOZTsZL1YyiWObFrOwuror6zDwuqaNYHmmHiWE6VQ9/WEBr7pt+iFjkn49l4CtBC7awi9pFYQseH49wnUbc81RgpY4Knp0FcIa6Pgkiisb3zqqHbF8LB+I/WOTD9ORVo+c14JizXf1sNSTPmpBg4twEJjowWMRclZ3EBaowGsHm6kle7L4gppQKfPmtbEw32Fj/xbCxRzS2W0uGAYEsJiJYT1QHBFdGzoYmdOFfGchVWXTWzH5WeuzivituZmVChgIfmY14IVpbxtI8/GYX1A3Fm56uRKuaWiaxiS/xE/RTNzibIGO0WTNQ1giRXTiA4k+DfZzAVW279WkllBxjPF2yME4+hgCTfrUPtQMEVjx8461LcsuQr567PprIPPFQM+XkCKKCLnUoQiarHYHk9g8bExeQQGwU3DQrki3CB8V4WVOX9CUoO1IJn1hZl6VlZD9vmVs423s2Whk5twwqpPeFiSm0TWodCoQKYoDJlg4mTNjz8lU47PpbbkWHt4OJ0SsNh5isO1cDo77nk2lel7Lkh51sUn+jJ2clSxnsQDgm+bMlcI6xaSA9Srixefi2fsSpVmWcn0Tbi0FaJfc1+uZ/kVmn4CHwn7QLOsNW4G1o47fIevskAhgAUzwo3ld+su8azeO1qZzTxDVg/o0Bp6WFaITLgskincs4gbdn7b9J+GZSgCrpjhGz99/Pgb3x+4kuKdZ4IXC88aN+wMdAGzd8nlPsIozcL4zDiFgrNRzErfD09DWx/2jVxZbXbwr74AJkPuu7OYHzeU+sozFCcZnpPjY9EMLBRSqPDSqrBi/6rJb8nfY7a+MVgoM8BMpKNxVjXj/a+E9TdRo7CQbbe8QVH1nqYaVhOwGpMalhrW68PaLXGoJ9P60s0ciG+gdv9s6f4hwbohgRUdQGXZnJy0cNii9/6Y2v+j9d5MgCXFarVSeuh970b0zl+hTn9QXf6oNFvQWeStqVYr9SVyVjev1soEaashtFYD1bBar/5qWK/zCp2TSE2hldqH/N06qNUquYUgtdRS6/+B2kXtZRNrbVM8Z/yfz+LQ2p/Gm926aum76mBhY6JP3Oy/FayT80Yk08XppVb6oY1VKP7sR6KLwvQrlOJ98OBBzdRZdEpWZq+56EL+Xljn0X0ExQe93bvDim+uN5uiO/pLN+4hpBvfnX54zaujrbiqulrz8yh9m3liRuMsL/kE/RWwZklxEl2j6YIbnyGsGMCuSNUGCwq5F4qH5MKrBLPu0GVHk3d2oCw2N1cUForsnfEqgtI2gE8RfHicJoSYn8to+apK45nDkvTrylXA+izttr+BtZTWFQv2PXlYnbByvUwoHzvG5euFlQYks4A/VgIpbVJ9PRHWdkchkDQwoqMhBHzJMtdo7GyiD3kAo0YXOeP57bjcnpEk7+LhZbKmONeccfm8mStVZr8dlqBdL0s9Gv/YkZn+GrevcDmhgaHVqTdoEJHlPin5/c3t0CeBN4aikLJ+EtTr7F4JGr10U0F+igSV57pldvAb5CCZlVtQUPYJ8TTVHW6sVcISvZ9XFgrLgyld8uBbd+Sn0vctfMYwJ4zjKhIYc1gHven74/TzdbPRKizK/cTTW4zDZQXwSwjW3aOewrtpblmRuGevkN8hjzf1KxYWzRoTg8la/AqJHDlxi189vgj5jT88m77NF3JQt778LO7KxeCjR4MvzjmKPIKfrVx5N+cmD8t44zWo+zDnweThz+Qxqz/bePrVMzkcNfl7Aybhrg27XGj6e6BmWQr4AFe4fXKfFEuvfCp3WGDPKiorylzaAbKjdszDUkiC14Db83QicxBGT5dfwFbdbMPh6XaNxGGuRXRNf0heu/lYB37mIfrk0iE0taobsj0L2Qp6YiUsPWestahrzRe4J2SdTsPs/D7A2lI8/MERZkUF+pymY1SOA8sSPaJNuHCzF9avJvWeivAd/0hs2IamxHlzlpUmxmZiHNYD3VzPROyk/kaCZp+hS84nJqOfIWNyDOPy7b14xuV4TFwtUzmA6btsJwvr0HVmwS50DXLfIhYyAyp8gbYd0/dEnccGNg3Fh64rHyQToCbT0KyRZDSjn0qTp7K4HBmRO2ARY20v+n4cGD52loqwSb8aeIZSQ7i2/bmwyBoKWWdlsSLcHn4HQ1zoZAbvh0ECg7i/Vfu1VlgrKUmMX9hCYqWIJKcpmiHWgizJCzLYCv9oSRjWKuJhrSYpopePxlUxBlf3DIB8jAIs6hJatEiEF0FquBN9ByrTBM/zjMQmsYPc4EpjWcsaHIZ1AuHCcklew2V+5bhkAWNQCw7sRPY44sT6sn+m7syAMhdwkVUZVwismD2M3ZQpsApvZ0ASQzaSapDZdXnxY/g7dUDVacS+AUDu3zuL3H5/Z2xGL1pmKdWzAnj6vYlpa5EhtDeFpf1+yhMRnjRIG8/rd9LbGbcPaYsNSQrfzDA8IhQya5KOVYdBinJ7LNp9cm8beFelfcr4/rhjeRg2y+83XwBrQmieIZZuhpcVRWUdRDjclocV9PxcLWP3Cp7t1RLjLYzLzgKamAp2ObbfCC4l1VMPh2VGklRUuMgJS1jLguSLUWN3i8CejQcwCVwPJoHct+NxUy4zfW3gjJdLrpM/kGFzMWMFM2DcFMj4eM7DGuMDSSH3Jt+1Y8yHA6wTr64sY1yuTHzuyFz3ySBr821GYbPAzWXervZiPO9YVBcwD5pStmRWH3AGkaFoP5Tbk9bFwtIPQZ3NcHtoNgXwjpMV3mfrTS2Q/HGSQY6R1Ku/tnNSmwCsNRaaOCSvmXj1FIsXefbH0YPRWC0lLLDUACy2RoOkWG8gHvEV4mF50FS+X85D+vncWnPHqw8L2N+mLCxCUV5Y2osQyAcz6x7JZh0GeKL9AIum9YitiPX6ZS9j7Gh/Wnwo/RR18pA7eRcs6xc0juTUwp81361gEreSXKFvSDNEHgBr8j0mvpTk81JY52limy/pLDkH7wlLNq7Es98gb0CgY2Y4ic1ciHpPLHoBr5ikYqyJUDIPS/ReLORTnf3XCDxq/95kuGTJLMhVd7aU0vwgsKx50/Ju5IboAqzxbEfmlOY+LbVHTSHW1rS3FFjWvLUd9El+pW4Xmogj42Etu/b5FXj8B3KghXwmz3lWQRz8qrS0XnCZugeh77vhuddPis2swcFL89Pcq+F6CSzSRqyM4KdHxHhgOWQYL9xeZ+y75eNiuOF7w0uXMY7XCCLC6RbyZWG5bPsN3s3IeeXC7PnuKLEsQLpnzhpzFhbEC7c4WOdOH/2ffm6b4fFo+Y3drblkvBaOLqqeT9zIIPcQ1A1cwUz3zv1qrHVwtNsNQx4W+2bhJxDQYG3oteE568KD1ygHMyzMIvnxZiPnj+w4TdcSaxMTGCvF0vBFX0TboxvgocQqPssZzLEAQsjukEw/wloROhi4TIVknhXDFy9jpl5+vGf9ReLg+V+KaANPSqQHT8b5HdMl0diQzcklsC6U98dWeaNDQjIhy3fT/5KEKrsBBoxLiTH49zHmJNnqN86yFLDYd0smgodznLvyHPisS5CPFM9wPms7fUPMF1UsYOIr14zWwDMHkywrcEldPuJuX6/zu1Y4oJpkrOuYaWn51UBikUik8FnSmVbScEi3PbmI2Psod+iDbhvhLvCGiphkLLO9IZ6km4ylJOVPd+lA7iXXGWX9RSINKb5DDTcf64zSxlYFdPBzFnMeC3p5+voRY1All6CdtDdkHqd3wlr2ijEAfWcKGwbaoh2FOLI7WzreDB8cZIUv0M5prxE4hKCLR0g62oLvV6Mr92HLZc8lJHdkLiIbR6AwLJ76rBVVdpWP41DQKeger3zLVF5CJSfimRXrmcpdOQYkKXc74zIMefwEmV+PQ7xwdI/l+eRnsbzy0Mn25Paj3ck3W47lXzMpQFEBZtgsUuwcSGFFeu5NobZh2ydwdxp9VUC3T5orGlqUR+83KlZzkrfbEhQS+xXdl3imHpy0+xEk2kgy89aOHpvGJgl2d98fZe92jPZsSwoVhoUO7SRZUr7BNGNvcc6tT3/xXYxOuhUpU7NmVD892OlGCEQ4kurYflx2m2x/WtS60ED2zYV2j3JHw383bc6veWlM4szV8p+2l5LRn82Z1eTPYhRkcyYbLGtDRt0l8p7J1tJx8qBLvlegcvacD41Pf/jKY6KNzVZyZDAcd2jKz+N+cBi7tLcu3ERaYBr5ctuxgbvd4Pts908rN+0zjSoWwknZu259Tj5aO5iF5frGx0Dw+mW47D8/9DoNsGL+xPO7Rv4JsGxHgrP+C8ap31X+ubCWb9KY9MZ/A9g0d2DAX2BYaOK99dv/vDmZfwNlsSz/W2iLsgAAAABJRU5ErkJggg==" oncontextmenu="return false;" />
                                </a>';
                                }

                                echo '</div>
                                <div class="be_popia_compliant_links">
                                        ';
                    echo '<center>
                    <span class="bpc_contnents"><a href="' . esc_url('https://bepopiacompliant.co.za/#/privacy/' . $_SERVER['SERVER_NAME']) . '" target="_blank"><span style="white-space:nowrap">PRIVACY POLICY</span></a></span>
                    <span class="bpc_contnents"><a href="' . esc_url('https://manageconsent.co.za/#/main/request/' . $_SERVER['SERVER_NAME']) . '" target="_blank"><span style="white-space:nowrap">MANAGE CONSENT</span></a></span>
                    <span class="bpc_contnents"><a href="' . esc_url('https://bepopiacompliant.co.za/#/details/' . $_SERVER['SERVER_NAME']) . '" target="_blank"><span style="white-space:nowrap">RESPONSIBLE PARTIES</span></a></span>
                    <span class="bpc_contnents"><a href="https://bepopiacompliant.co.za/#/regulator/' . $_SERVER['SERVER_NAME']  . '" target="_blank"><span style="white-space:nowrap">INFORMATION REGULATOR</span></a></span></center>';
                    echo '</div>
                    <span style="font-size:0px; position:absolute;">';
                    update_option('bpc_report', '8');
                    echo "BPC REPORT 8: " . get_option("bpc_v");
                    $has_active_keys = get_option('has_active_keys');
                    if ($has_active_keys == 1) {
                        echo " PRO ";
                    } else {
                        echo " Free ";
                    }
                    if (get_option("cron_last_fired_at")) {
                        echo date("d/m/Y H:i:s", get_option("cron_last_fired_at") + 7200);
                    } else {
                        echo "No Run";
                    }
                    if (get_option("be_popia_compliant_cookie-field9-disable-bpc-cookie-banner") != 1) {
                        echo " Active ";
                    } else {
                        echo " Deactivated ";
                    }
                    if (is_ssl()) {
                        echo "Has SSL";
                    } else {
                        echo "No SSL";
                    }
                    $table_name = $wpdb->base_prefix . 'be_popia_compliant_checklist';
                    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));

                    if (!$wpdb->get_var($query) == $table_name) {
                        echo ' Checklist Table Not Built';
                    } else {
                        echo ' Checklist Table Built';
                    }
                    echo '</span>
                            </div>
                        </div>';
                } else {
                    global $wpdb;
                    $table_name = $wpdb->prefix . 'be_popia_compliant_admin';
                    $wpdb->update($table_name, array('value' => 1), array('id' => 3));
                    $table_name = $wpdb->prefix . 'be_popia_compliant_checklist';
                    $needComms = $wpdb->get_var("SELECT `does_comply` FROM $table_name WHERE id = 2");
                    $needMarketing = $wpdb->get_var("SELECT `does_comply` FROM $table_name WHERE id = 3");
                    if ($needComms == 1 && $needMarketing == 0) {
                        $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND does_comply = 1 AND (id != 3) AND (id != 59) AND is_active = 1");
                        $rowcount = $wpdb->num_rows;
                        $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND (id != 3) AND (id != 59) AND is_active = 1");
                        $rowcount2 = $wpdb->num_rows;
                    } elseif ($needComms == 0 && $needMarketing == 1) {
                        $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND does_comply = 1 AND (id != 2) AND (id != 58) AND is_active = 1");
                        $rowcount = $wpdb->num_rows;
                        $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND (id != 2) AND (id != 58) AND is_active = 1");
                        $rowcount2 = $wpdb->num_rows;
                    } elseif ($needComms == 1 && $needMarketing == 1) {
                        $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND does_comply = 1 AND is_active = 1");
                        $rowcount = $wpdb->num_rows;
                        $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND is_active = 1");
                        $rowcount2 = $wpdb->num_rows;
                    } elseif ($needMarketing == 0 && $needComms == 0) {
                        $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND does_comply = 1 AND (id != 2) AND (id != 3) AND (id != 58) AND (id != 59) AND is_active = 1");
                        $rowcount = $wpdb->num_rows;
                        $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND (id != 2) AND (id != 3) AND (id != 58) AND (id != 59) AND is_active = 1");
                        $rowcount2 = $wpdb->num_rows;
                    }
                    update_option('bpc_rowcount', $rowcount);
                    --$rowcount2;
                    update_option('bpc_rowcount2', $rowcount2);
                    $rowcount = ($rowcount / $rowcount2) * 100;
                    $rowcount = sanitize_text_field(get_option('bpc_rowcount'));
                    $rowcount2 = sanitize_text_field(get_option('bpc_rowcount2'));
                    $rowcount = ($rowcount / $rowcount2) * 100;
                    echo '<br>';
                    $url = wp_http_validate_url("https://py.bepopiacompliant.co.za/api/plugindetailscheck/" . $_SERVER['SERVER_NAME']);
                    $args = array(
                        'headers' => array(
                            'Content-Type' => 'application/json',
                        ),
                        'body' => array(),
                    );
                    $response = wp_remote_get($url, $args);
                    $response_code = wp_remote_retrieve_response_code($response);
                    $body = wp_remote_retrieve_body($response);

                    if (401 === $response_code) {
                        echo "Unauthorized access";
                    }

                    if (200 === $response_code) {
                        $body = json_decode($body);
                        if ($body != []) {
                            foreach ($body as $data) {
                                $is_approved = $data->is_approved;
                                // IF Premium expired and the free vresion is 100% and not blocked by PBC Office it will show the free footer instead.
                                if ($is_approved) {
                                    if ($rowcount == 100) {
                                        $table_name = $wpdb->prefix . 'be_popia_compliant_checklist';
                                        $privacy = $wpdb->get_var("SELECT content FROM $table_name WHERE id = 6");
                                        $data = $wpdb->get_var("SELECT content FROM $table_name WHERE id = 21");
                                        $parties = $wpdb->get_var("SELECT content FROM $table_name WHERE id = 32");
                                        echo '<style>
                                            .BePopiaCompliant {
                                                background-color: whitesmoke;
                                                color: #000;
                                                text-align: center;
                                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                            }
                                            .cont1 {
                                                margin: auto;
                                                width: 50%;
                                                height: 125px;
                                                display: flex;
                                            }
                                            .be_popia_compliant_img {
                                                margin: auto 0 auto auto;
                                            }
                                            .be_popia_compliant_links {
                                                margin: auto auto auto 0;
                                                width: 75%;
                                                font-weight:900;
                                                font-size: 23px;
                                            }
                                            .be_popia_compliant_links a {
                                                color: #BD2E2E;
                                                text-decoration: none;
                                                font-variant-caps: all-petite-caps;
                                            }
                                            @media only screen and (max-width: 600px) {    
                                                .be_popia_compliant_img {
                                                    margin: auto 0 auto auto;
                                                }
                                                .be_popia_compliant_links {
                                                    margin: auto auto auto 0;
                                                    width: 100%;
                                                    font-weight: 900;
                                                    font-size: 23px;
                                                }
                                                .cont1 {
                                                    margin: auto;
                                                    width: 50%;
                                                    height: 245px;
                                                    display: block;
                                                }
                                            }
                                        </style>
                                        <div class="BePopiaCompliant">
                                            <div class="cont1">
                                                <div class="be_popia_compliant_img">
                                                    <a href="https://bepopiacompliant.co.za" target="_blank"><img alt="POPIA Compliant" src="data:image/png;base64,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" oncontextmenu="return false;" />
                                                    </a>
                                                </div>
                                                <div class="be_popia_compliant_links">
                                                    <a href="' . esc_url($privacy) . '" target="_blank"><span style="white-space:nowrap">PRIVACY POLICY</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="' . esc_url($data) . '" target="_blank"><span style="white-space:nowrap">DATA REQUESTS</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="' . esc_url($parties) . '" target="_blank"><span style="white-space:nowrap">RESPONSIBLE PARTIES</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="https://bepopiacompliant.co.za/information_regulator" target="_blank"><span style="white-space:nowrap">INFORMATION REGULATOR</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                                <span style="font-size:0px; position:absolute;">';
                                        update_option('bpc_report', '9');
                                        echo "BPC REPORT 9: " . get_option("bpc_v");
                                        $has_active_keys = get_option('has_active_keys');
                                        if ($has_active_keys == 1) {
                                            echo " PRO ";
                                        } else {
                                            echo " Free ";
                                        }
                                        if (get_option("cron_last_fired_at")) {
                                            echo date("d/m/Y H:i:s", get_option("cron_last_fired_at") + 7200);
                                        } else {
                                            echo "No Run";
                                        }
                                        if (get_option("be_popia_compliant_cookie-field9-disable-bpc-cookie-banner") != 1) {
                                            echo " Active ";
                                        } else {
                                            echo " Deactivated ";
                                        }
                                        if (is_ssl()) {
                                            echo "Has SSL";
                                        } else {
                                            echo "No SSL";
                                        }
                                        $table_name = $wpdb->base_prefix . 'be_popia_compliant_checklist';
                                        $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
                                        if (!$wpdb->get_var($query) == $table_name) {
                                            echo ' Checklist Table Not Built';
                                        } else {
                                            echo ' Checklist Table Built';
                                        }
                                        echo "is_subscribed = 0";
                                        echo '</span>
                                            </div>
                                        </div>';
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                global $wpdb;
                $table_name = $wpdb->prefix . 'be_popia_compliant_checklist';
                $needComms = $wpdb->get_var("SELECT does_comply FROM $table_name WHERE id = 2");
                $needMarketing = $wpdb->get_var("SELECT does_comply FROM $table_name WHERE id = 3");
                if ($needComms == 1 && $needMarketing == 0) {
                    $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND does_comply = 1 AND (id != 3) AND (id != 59) AND is_active = 1");
                    $rowcount = $wpdb->num_rows;
                    $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND (id != 3) AND (id != 59) AND is_active = 1");
                    $rowcount2 = $wpdb->num_rows;
                } elseif ($needComms == 0 && $needMarketing == 1) {
                    $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND does_comply = 1 AND (id != 2) AND (id != 58) AND is_active = 1");
                    $rowcount = $wpdb->num_rows;
                    $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND (id != 2) AND (id != 58) AND is_active = 1");
                    $rowcount2 = $wpdb->num_rows;
                } elseif ($needComms == 1 && $needMarketing == 1) {
                    $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND does_comply = 1 AND is_active = 1");
                    $rowcount = $wpdb->num_rows;
                    $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND is_active = 1");
                    $rowcount2 = $wpdb->num_rows;
                } elseif ($needMarketing == 0 && $needComms == 0) {
                    $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND does_comply = 1 AND (id != 2) AND (id != 3) AND (id != 58) AND (id != 59) AND is_active = 1");
                    $rowcount = $wpdb->num_rows;
                    $wpdb->get_results("SELECT * FROM $table_name WHERE (type < 8 AND type > 0) AND (id != 2) AND (id != 3) AND (id != 58) AND (id != 59) AND is_active = 1");
                    $rowcount2 = $wpdb->num_rows;
                }
                --$rowcount2;
                $rowcounttotal = ($rowcount / $rowcount2) * 100;
                if ($rowcounttotal == 100) {
                    $url = wp_http_validate_url("https://py.bepopiacompliant.co.za/api/plugindetailscheck/" . $_SERVER['SERVER_NAME']);
                    $args = array(
                        'headers' => array(
                            'Content-Type' => 'application/json',
                        ),
                        'body' => array(),
                    );
                    $response = wp_remote_get(wp_http_validate_url($url), $args);
                    $response_code = wp_remote_retrieve_response_code($response);
                    $body         = wp_remote_retrieve_body($response);

                    if (401 === $response_code) {
                        echo "Unauthorized access";
                    }

                    if (200 === $response_code) {
                        $body = json_decode($body);
                        if ($body != []) {
                            foreach ($body as $data) {
                                $is_approved = $data->is_approved;
                                if ($is_approved) {
                                    $table_name = $wpdb->prefix . 'be_popia_compliant_checklist';
                                    $privacy = $wpdb->get_var("SELECT content FROM $table_name WHERE id = 6");
                                    $data = $wpdb->get_var("SELECT content FROM $table_name WHERE id = 21");
                                    $parties = $wpdb->get_var("SELECT content FROM $table_name WHERE id = 32");
                                    echo '<style>
                                        .BePopiaCompliant {
                                            background-color: whitesmoke;
                                            color: #000;
                                            text-align: center;
                                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                        }
                                        .cont1 {
                                            margin: auto;
                                            width: 50%;
                                            height: 125px;
                                            display: flex;
                                        }
                                        .be_popia_compliant_img {
                                            margin: auto 0 auto auto;
                                        }
                                        .be_popia_compliant_links {
                                            margin: auto auto auto 0;
                                            width: 75%;
                                            padding: 1%;
                                            font-weight:900;
                                            font-size: 23px;
                                        }
                                        .be_popia_compliant_links a {
                                            color: #BD2E2E;
                                            text-decoration: none;
                                            font-variant-caps: all-petite-caps;
                                        }
                                        @media only screen and (max-width: 600px) {    
                                            .be_popia_compliant_img {
                                                margin: auto 0 auto auto;
                                            }
                                            .be_popia_compliant_links {
                                                margin: auto auto auto 0;
                                                width: 100%;
                                                font-weight: 900;
                                                font-size: 23px;
                                            }
                                            .cont1 {
                                                margin: auto;
                                                width: 50%;
                                                height: 245px;
                                                display: block;
                                            }
                                        }
                                    </style>
                                    <div class="BePopiaCompliant">
                                        <div class="cont1">
                                            <div class="be_popia_compliant_img">
                                                <a href="https://bepopiacompliant.co.za" target="_blank"><img alt="Self Audited - POPIA Compliant" src="data:image/png;base64,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" oncontextmenu="return false;" />
                                                </a>
                                            </div>
                                            <div class="be_popia_compliant_links">
                                                <a href="' . esc_url($privacy) . '" target="_blank"><span style="white-space:nowrap">PRIVACY POLICY</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="' . esc_url($data) . '"target="_blank"><span style="white-space:nowrap">DATA REQUESTS</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="' . esc_url($parties) . '" target="_blank"><span style="white-space:nowrap">RESPONSIBLE PARTIES</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="https://bepopiacompliant.co.za/#/regulator/' . $_SERVER['SERVER_NAME'] . '" target="_blank"><span style="white-space:nowrap">INFORMATION REGULATOR</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                            <span style="font-size:0px; position:absolute;">';
                                    update_option('bpc_report', '10');
                                    echo "BPC REPORT 10: " . get_option("bpc_v");
                                    $has_active_keys = get_option('has_active_keys');
                                    if ($has_active_keys == 1) {
                                        echo " PRO ";
                                    } else {
                                        echo " Free ";
                                    }
                                    if (get_option("cron_last_fired_at")) {
                                        echo date("d/m/Y H:i:s", get_option("cron_last_fired_at") + 7200);
                                    } else {
                                        echo "No Run";
                                    }
                                    if (get_option("be_popia_compliant_cookie-field9-disable-bpc-cookie-banner") != 1) {
                                        echo " Active ";
                                    } else {
                                        echo " Deactivated ";
                                    }
                                    if (is_ssl()) {
                                        echo "Has SSL";
                                    } else {
                                        echo "No SSL";
                                    }
                                    $table_name = $wpdb->base_prefix . 'be_popia_compliant_checklist';
                                    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
                                    if (!$wpdb->get_var($query) == $table_name) {
                                        echo ' Checklist Table Not Built';
                                    } else {
                                        echo ' Checklist Table Built';
                                    }
                                    echo '</span>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

be_popia_compliant_active_check();
