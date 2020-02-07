<?php
include 'mail-head.php';

function getTempContact($message) {
    global $head;
    
    return $head.'
        <body bgcolor="#fff">
        <table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
          <tr>
            <td align="center" valign="top" width="100%" style="background-color: #fff;" class="content-padding">
              <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
        		  <tr>
                    <td class="free-text">
                      <a href="https://www.domarket.com.ng"><img width="100" height="90" src="https://www.domarket.com.ng/assets/images/LOGOO2.png" alt="logo"></a>
                    </td>
                  </tr>
                  <tr>
                    <td class="header-lg">
                      Welcome to DoMarket
                    </td>
                  </tr>'.
                      $message
                  .'<tr>
                    <td class="button">
                      <div>
                      <a class="button-mobile" href="https://www.domarket.com.ng/shop"
                      style="background-color:#f89a20;border-radius:5px;color:#ffffff;display:inline-block;font-family:\'Cabin\', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">View Store</a></div>
                    </td>
                  </tr>
                </table>
              </center>
            </td>
          </tr>
        
          <tr>
            <td align="center" valign="top" width="100%" style="background-color: #fff; height: 100px;">
              <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
                  <tr>
                    <td style="padding: 25px 0 25px">
                      <strong>Domarket</strong><br />
                      Chevron drive, Lagos, Nigeria
                    </td>
                  </tr>
                </table>
              </center>
            </td>
          </tr>
        </table>
        </body>
        </html>';
}

function getTempReset($url) {
    global $head;
    
    return $head.'
        <body bgcolor="#fff">
        <table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
          <tr>
            <td align="center" valign="top" width="100%" style="background-color: #fff;" class="content-padding">
              <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
        		  <tr>
                    <td class="free-text">
                      <a href="https://www.domarket.com.ng"><img width="100" height="90" src="https://www.domarket.com.ng/assets/images/LOGOO2.png" alt="logo"></a>
                    </td>
                  </tr>
                  <tr>
                    <td class="header-lg">
                      Welcome to DoMarket
                    </td>
                  </tr>
                  <tr>
                    <td class="free-text">
                      To reset your password. Click the button below.<br>If you did not perform this action, please ignore this mail.
                    </td>
                  </tr>
                  <tr>
                    <td class="button">
                      <div>
                      <a class="button-mobile" href="'.$url.'"
                      style="background-color:#f89a20;border-radius:5px;color:#ffffff;display:inline-block;font-family:\'Cabin\', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Reset Password</a></div>
                    </td>
                  </tr>
                </table>
              </center>
            </td>
          </tr>
        
          <tr>
            <td align="center" valign="top" width="100%" style="background-color: #fff; height: 100px;">
              <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
                  <tr>
                    <td style="padding: 25px 0 25px">
                      <strong>Domarket</strong><br />
                      Chevron drive, Lagos, Nigeria
                    </td>
                  </tr>
                </table>
              </center>
            </td>
          </tr>
        </table>
        </body>
        </html>';
}

function getTempWelcome($message, $name) {
    global $head;
    
    return $head.'
    <body bgcolor="#fff">
    <table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
      <tr>
        <td align="center" valign="top" width="100%" style="background-color: #fff;" class="content-padding">
          <center>
            <table cellspacing="0" cellpadding="0" width="600" class="w320">
    		  <tr>
                <td class="free-text">
                  <a href="https://www.domarket.com.ng"><img width="100" height="90" src="https://www.domarket.com.ng/assets/images/LOGOO2.png" alt="logo"></a>
                </td>
              </tr>
              <tr>
                <td class="header-lg">
                  Welcome to DoMarket '.$name.'
                </td>
              </tr>
              <tr>
                <td class="free-text">
                  Thank you for signing up with Domarket! We hope you enjoy your time with us. Check out the button to view your new account.
                </td>
              </tr>'.
                  $message
              .'<tr>
                <td class="button">
                  <div>
                  <a class="button-mobile" href="https://www.domarket.com.ng/my-account"
                  style="background-color:#f89a20;border-radius:5px;color:#ffffff;display:inline-block;font-family:\'Cabin\', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">My Account</a></div>
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
    
      <tr>
        <td align="center" valign="top" width="100%" style="background-color: #fff; height: 100px;">
          <center>
            <table cellspacing="0" cellpadding="0" width="600" class="w320">
              <tr>
                <td style="padding: 25px 0 25px">
                  <strong>Domarket</strong><br />
                  Chevron drive, Lagos, Nigeria
                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
    </table>
    </body>
    </html>';
}

function getTempOrders($message, $pricing, $address, $orderDate, $serial) {
    global $head;
    
    return $head.'
    <body bgcolor="#fff">
<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #fff;" class="content-padding">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
		  <tr>
            <td class="free-text">
              <a href="https://www.domarket.com.ng"><img width="100" height="90" src="https://www.domarket.com.ng/assets/images/LOGOO2.png" alt="logo"></a>
            </td>
          </tr>
          <tr>
            <td class="free-text">
                Thank you for your order!<br>
                We\'ll let you know as soon as your items have shipped. To change or view your order, please view your account by clicking the button below. 
            </td>
          </tr>
          <tr>
            <td class="button">
              <div>
              <a class="button-mobile" href="https://www.domarket.com.ng/my-account"
              style="background-color:#f89a20;border-radius:5px;color:#ffffff;display:inline-block;font-family:\'Cabin\', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">My Account</a></div>
            </td>
          </tr>
          <tr>
            <td class="w320">
              <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td class="mini-container-left">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td class="mini-block-padding">
                          <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                            <tr>
                              <td class="mini-block">
                                <span class="header-sm">Shipping Address</span><br />'.
                                $address
                              .'</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td class="mini-container-right">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td class="mini-block-padding">
                          <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                            <tr>
                              <td class="mini-block">
                                <span class="header-sm">Date Ordered</span><br />'.
                                $orderDate.'<br />
                                <br />
                                <span class="header-sm">Order Serial</span> <br />'.
                                $serial
                              .'</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </center>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
      <center>
        <table cellpadding="0" cellspacing="0" width="600" class="w320">
            <tr>
              <td class="item-table">
                <table cellspacing="0" cellpadding="0" width="100%">
                    '.$message.'
                    <tr>
                        <td class="item-col item mobile-row-padding"></td>
                        <td class="item-col quantity"></td>
                        <td class="item-col price"></td>
                    </tr>
                    <tr>
                        <td class="item-col item">
                        </td>
                        <td class="item-col quantity" style="text-align:right; padding-right: 10px; border-top: 1px solid #cccccc;">
                          <span class="total-space">Subtotal</span> <br />
                          <span class="total-space">Shipping</span> <br />
                          <span class="total-space" style="font-weight: bold; color: #4d4d4d">Total</span>
                        </td>'.$pricing.'
                    </tr>  
                </table>
              </td>
            </tr>
        </table>
      </center>
    </td>
  </tr> 
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #fff; height: 100px;">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tr>
            <td style="padding: 25px 0 25px">
              <strong>Domarket</strong><br />
              Chevron drive, Lagos, Nigeria
            </td>
          </tr>
        </table>
      </center>
    </td>
  </tr>
</table>
</body>
</html>'; 
}

function getTempStatusOrders($message, $pricing, $address, $orderDate, $serial, $status) {
    global $head;
    
    return $head.'
    <body bgcolor="#fff">
<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #fff;" class="content-padding">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
		  <tr>
            <td class="free-text">
              <a href="https://www.domarket.com.ng"><img width="100" height="90" src="https://www.domarket.com.ng/assets/images/LOGOO2.png" alt="logo"></a>
            </td>
          </tr>
          <tr>
            <td class="free-text">
                Your order has '.$status.'!<br>
                We\'ll let you know as soon as your items have shipped. To change or view your order, please view your account by clicking the button below. 
            </td>
          </tr>
          <tr>
            <td class="button">
              <div>
              <a class="button-mobile" href="https://www.domarket.com.ng/track-your-order"
              style="background-color:#f89a20;border-radius:5px;color:#ffffff;display:inline-block;font-family:\'Cabin\', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Track Order</a></div>
            </td>
          </tr>
          <tr>
            <td class="w320">
              <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td class="mini-container-left">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td class="mini-block-padding">
                          <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                            <tr>
                              <td class="mini-block">
                                <span class="header-sm">Shipping Address</span><br />'.
                                $address
                              .'</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td class="mini-container-right">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td class="mini-block-padding">
                          <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                            <tr>
                              <td class="mini-block">
                                <span class="header-sm">Date Ordered</span><br />'.
                                $orderDate.'<br />
                                <br />
                                <span class="header-sm">Order Serial</span> <br />'.
                                $serial
                              .'</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </center>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #ffffff;  border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5;">
      <center>
        <table cellpadding="0" cellspacing="0" width="600" class="w320">
            <tr>
              <td class="item-table">
                <table cellspacing="0" cellpadding="0" width="100%">
                    '.$message.'
                    <tr>
                        <td class="item-col item mobile-row-padding"></td>
                        <td class="item-col quantity"></td>
                        <td class="item-col price"></td>
                    </tr>
                    <tr>
                        <td class="item-col item">
                        </td>
                        <td class="item-col quantity" style="text-align:right; padding-right: 10px; border-top: 1px solid #cccccc;">
                          <span class="total-space" style="font-weight: bold; color: #4d4d4d">Total</span>
                        </td>'.$pricing.'
                    </tr>  
                </table>
              </td>
            </tr>
        </table>
      </center>
    </td>
  </tr> 
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: #fff; height: 100px;">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tr>
            <td style="padding: 25px 0 25px">
              <strong>Domarket</strong><br />
              Chevron drive, Lagos, Nigeria
            </td>
          </tr>
        </table>
      </center>
    </td>
  </tr>
</table>
</body>
</html>';
} 
?>