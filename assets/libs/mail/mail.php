<?php
include 'tmp/mail_header_tmp.php';
include 'tmp/default-main.php';

class Mail {
    public function MailNotification($email, $subject, $content) {
        $headers = "From: DoMarket@Support\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
		if(mail($email, $subject, $content, $headers)){
            return true;
		} else{
            return false;
		}	
    }
    
    public function MailNotificationOrders($email, $subject, $content) {
        $headers    = "From: Domarket@Orders\r\n";
        $emailAdmin = "info@domarket.com.ng";
        $headers    .= "Reply-To: ".strip_tags($emailAdmin)."\r\n";
        $headers    .= "Cc: ".$emailAdmin."\r\n";
        $headers    .= "MIME-Version: 1.0\r\n";
        $headers    .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
		if(mail($email, $subject, $content, $headers)){
            return true;
		} else{
            return false;
		}	
    }
    
    public function MailNotificationOrderStatus($email, $subject, $content) {
        $headers    = "From: Domarket@Orders\r\n";
        $headers    .= "MIME-Version: 1.0\r\n";
        $headers    .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
		if(mail($email, $subject, $content, $headers)){
            return true;
		} else{
            return false;
		}	
    }
    
    public function Contact($messageObj)
    {
        $message = "<tr>
                <td class=\"free-text\">
                  $messageObj->name ($messageObj->emailUser) has an enquiry. <br> $messageObj->message
                </td>
              </tr>";
        $content = getTempContact($message);
         return $this->MailNotification($messageObj->email, $messageObj->subject, $content);
    }
    
    public function ResetPassword($messageObj)
    {
        $content = getTempReset($messageObj->url);
        return $this->MailNotification($messageObj->email, $messageObj->subject, $content);
    }
    
    public function welcome($messageObj)
    {
        $message = "<tr>
                <td class=\"free-text\">
                  Referral Link: $messageObj->url
                </td>
              </tr>";
        $content = getTempWelcome($message, $messageObj->name);
        return $this->MailNotification($messageObj->email, $messageObj->subject, $content);
    }
    
    public function order($messageObj)
    {
        $message = "";
        foreach($messageObj->cartQ as $item) {
         $message .= "<tr>
                    <td class=\"title-dark\" width=\"300\">
                       Item
                    </td>
                    <td class=\"title-dark\" width=\"163\">
                      Qty
                    </td>
                    <td class=\"title-dark\" width=\"97\">
                      Total
                    </td>
                  </tr>
                  <tr>
                    <td class=\"item-col item\">
                      <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
                        <tr>
                          <td class=\"mobile-hide-img\">
                            <a href=\"\"><img width=\"110\" height=\"92\" src=\"".$item['cartPic']."\" alt=\"item1\"></a>
                          </td>
                          <td class=\"product\">
                            <span style=\"color: #4d4d4d; font-weight:bold;\">".$item['cartItem']."</span> <br />
                          </td>
                        </tr>
                      </table>
                    </td>
                    <td class=\"item-col quantity\">".
                      $item['cartQuantity']
                    ."</td>
                    <td class=\"item-col\">
                      ₦".$item['cartPrice']."
                    </td>
                  </tr>";
        }
        
        $pricing = "<td class=\"item-col price\" style=\"text-align: left; border-top: 1px solid #cccccc;\">
                      <span class=\"total-space\">₦$messageObj->subTotal</span> <br />
                      <span class=\"total-space\">₦$messageObj->shippingFee</span>  <br />
                      <span class=\"total-space\" style=\"font-weight:bold; color: #4d4d4d\">₦$messageObj->total</span>
                    </td>";
        $content = getTempOrders($message, $pricing, $messageObj->address, $messageObj->orderDate, $messageObj->sn);
        
        return $this->MailNotificationOrders($messageObj->email, $messageObj->subject, $content);
    }
    
     public function orderStatus($messageObj)
    {
        $message = "";
        foreach($messageObj->orderQuery as $item) {
         $message .= "<tr>
                    <td class=\"title-dark\" width=\"300\">
                       Item
                    </td>
                    <td class=\"title-dark\" width=\"163\">
                      Qty
                    </td>
                    <td class=\"title-dark\" width=\"97\">
                      Total
                    </td>
                  </tr>
                  <tr>
                    <td class=\"item-col item\">
                      <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
                        <tr>
                          <td class=\"mobile-hide-img\">
                            <a href=\"\"><img width=\"110\" height=\"92\" src=\"".$item['prodPicture1']."\" alt=\"item1\"></a>
                          </td>
                          <td class=\"product\">
                            <span style=\"color: #4d4d4d; font-weight:bold;\">".$item['prodName']."</span> <br />
                          </td>
                        </tr>
                      </table>
                    </td>
                    <td class=\"item-col quantity\">".
                      $item['quantity']
                    ."</td>
                    <td class=\"item-col\">
                      ₦".$item['prodNewPrice']."
                    </td>
                  </tr>";
        }
        
        $pricing = "<td class=\"item-col price\" style=\"text-align: left; border-top: 1px solid #cccccc;\">
                      <span class=\"total-space\" style=\"font-weight:bold; color: #4d4d4d\">₦$messageObj->total</span>
                    </td>";
        $content = getTempStatusOrders($message, $pricing, $messageObj->address, $messageObj->orderDate, $messageObj->sn, $messageObj->status);
        return $this->MailNotificationOrderStatus($messageObj->email, $messageObj->subject, $content);
    } 
    
}
?>