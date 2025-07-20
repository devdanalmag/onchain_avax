<?php

class ApiAccess extends Controller
{

    protected $model;

    public function __construct()
    {
        $this->model = new ApiModel;
    }

    //Send Email Notification
    public function sendEmailNotification($subject, $message, $email)
    {
        $this->model->sendEmailNotification($subject, $message, $email);
    }

    //Verify Access Token
    public function validateAccessToken($token)
    {
        $result = $this->model->validateAccessToken($token);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["usertype"] = $result->sType;
            $response["userid"] = $result->sId;
            $response["name"] = $result->sLname . " " . $result->sFname;
            $response["balance"] = $result->sWallet;
            $response["username"] = $result->sUsername;
            $response["refearedby"] = $result->sReferal;
            $response["regstatus"] = $result->sRegStatus;
        } else {
            $response["status"] = "fail";
        }
        return $response;
    }

    //Fetch User Details
    public function getUserDetails($token)
    {
        $result = $this->model->getUserDetails($token);
        $response = array();
        $response["name"] = $result->sLname . " " . $result->sFname;
        $response["balance"] = number_format($result->sWallet, 2);
        $response["tonwalletstatus"] = $result->tonaddstatus;
        $response["tonaddress"] = $result->sTonaddress;
        return $response;
    }

    //Fetch Site Settings
    public function getSiteSettings()
    {
        $result = $this->model->getSiteSettings();
        return $result;
    }

    //Verify Network Id
    public function verifyNetworkId($network)
    {
        $result = $this->model->verifyNetworkId($network);
        $response = array();
        if (is_object($result)) {
            $response = (array) $result;
            $response["status"] = "success";
        } else {
            $response["status"] = "fail";
        }
        return $response;
    }


    //Verify Data Plan Id
    public function verifyDataPlanId($network, $data_plan, $usertype)
    {
        $result = $this->model->verifyDataPlanId($network, $data_plan);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["dataplan"] = $result->planid;
            $response["name"] = $result->name;
            if ($usertype == 3) {
                $response["amount"] = (float) $result->vendorprice;
            } elseif ($usertype == 2) {
                $response["amount"] = (float) $result->agentprice;
            } else {
                $response["amount"] = (float) $result->userprice;
            }
            $response["buyprice"] = $result->price;
            $response["datatype"] = $result->type;
            $response["day"] = $result->day;
        } else {
            $response["status"] = "fail";
        }

        return $response;
    }

    //Verify Data Plan Id
    public function verifyDataPinId($network, $data_plan, $usertype)
    {
        $result = $this->model->verifyDataPinId($network, $data_plan);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["datapin"] = $result->planid;
            $response["name"] = $result->name;
            if ($usertype == 3) {
                $response["amount"] = (float) $result->vendorprice;
            } elseif ($usertype == 2) {
                $response["amount"] = (float) $result->agentprice;
            } else {
                $response["amount"] = (float) $result->userprice;
            }
            $response["buyprice"] = $result->price;
            $response["datatype"] = $result->type;
            $response["day"] = $result->day;
        } else {
            $response["status"] = "fail";
        }

        return $response;
    }

    //Verify Electricity Provider Id
    public function verifyElectricityId($provider)
    {
        $result = $this->model->verifyElectricityId($provider);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["electricityid"] = $result->electricityid;
            $response["provider"] = $result->provider;
            $response["providerStatus"] = $result->providerStatus;
        } else {
            $response["status"] = "fail";
        }

        return $response;
    }


    //Verify Exam Provider Id
    public function verifyExamId($provider)
    {
        $result = $this->model->verifyExamId($provider);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["examid"] = $result->examid;
            $response["provider"] = $result->provider;
            $response["providerStatus"] = $result->providerStatus;
            $response["amount"] = $result->price;
            $response["buying_price"] = $result->buying_price;
        } else {
            $response["status"] = "fail";
        }

        return $response;
    }


    //Verify Cable Provider Id
    public function verifyCableId($provider)
    {
        $result = $this->model->verifyCableId($provider);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["cableid"] = $result->cableid;
            $response["provider"] = $result->provider;
            $response["providerStatus"] = $result->providerStatus;
        } else {
            $response["status"] = "fail";
        }

        return $response;
    }

    //Verify Cable Plan Id
    public function verifyCablePlanId($provider, $plan, $usertype)
    {
        $result = $this->model->verifyCablePlanId($provider, $plan);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["cableplan"] = $result->planid;
            $response["name"] = $result->name;
            if ($usertype == 3) {
                $response["amount"] = (float) $result->vendorprice;
            } elseif ($usertype == 2) {
                $response["amount"] = (float) $result->agentprice;
            } else {
                $response["amount"] = (float) $result->userprice;
            }
            $response["day"] = $result->day;
            $response["buyprice"] = $result->price;
        } else {
            $response["status"] = "fail";
        }

        return $response;
    }

    //Verify Phone Number
    public function verifyPhoneNumber($phone, $network_name)
    {
        $response = array();
        $validate = substr($phone, 0, 4);
        $response["status"] = "success";

        if ($network_name == "MTN") {
            if (strpos(" 0702 0703 0713 0704 0706 0716 0802 0803 0806 0810 0813 0814 0816 0903 0913 0906 0916 0804 ", $validate) == FALSE || strlen($phone) != 11) {
                $response['msg'] = "This number is not an $network_name Number $phone";
                $response["status"] = "fail";
            }
        } else if ($network_name == "GLO") {
            if (strpos(" 0805 0705 0905 0807 0907 0707 0817 0917 0717 0715 0815 0915 0811 0711 0911 ", $validate) == FALSE || strlen($phone) != 11) {
                $response['msg'] = "This number is not an $network_name Number $phone";
                $response["status"] = "fail";
            }
        } else if ($network_name == "AIRTEL") {
            if (strpos(" 0904 0802 0902 0702 0808 0908 0708 0918 0818 0718 0812 0912 0712 0801 0701 0901 0907 0917 ", $validate) == FALSE || strlen($phone) != 11) {
                $response['msg'] = "This number is not an $network_name Number $phone";
                $response["status"] = "fail";
            }
        } else if ($network_name == "9MOBILE") {
            if (strpos(" 0809 0909 0709 0819 0919 0719 0817 0917 0717 0718 0918 0818 0808 0708 0908 ", $validate) == FALSE || strlen($phone) != 11) {
                $response['msg'] = "This number is not an $network_name Number $phone";
                $response["status"] = "fail";
            }
        } else {
            $response['msg'] = "Unidentified Network Id";
            $response["status"] = "fail";
        }

        return $response;
    }

    //Calculate Airtime Discount
    public function calculateAirtimeDiscount($network, $airtime_type, $amount, $usertype)
    {
        $response = array();
        $usertype = (float) $usertype;
        $network = (float) $network;
        $amount = (float) $amount;

        //Get Disount Persentage And Calculate Discount
        $result = $this->model->calculateAirtimeDiscount($network, $airtime_type);
        if ($usertype == 3) {
            $per = (float) $result->aVendorDiscount;
        } elseif ($usertype == 2) {
            $per = (float) $result->aAgentDiscount;
        } else {
            $per = (float) $result->aUserDiscount;
        }
        $amounttopay = ($amount * $per) / 100;
        $buyper = (float) $result->aBuyDiscount;
        $buyamount = ($amount * $buyper) / 100;

        $response["status"] = "success";
        $response["discount"] = $amounttopay;
        $response["buyamount"] = $buyamount;

        return $response;
    }

    //Check If Transaction Exist
    public function checkIfTransactionExist($ref)
    {
        $result = $this->model->checkIfTransactionExist($ref);
        $response = array();
        if ($result == 0) {
            $response["status"] = "fail";
        } else {
            $response["status"] = "success";
        }
        return $response;
    }



    //Check For Transaction Duplicate
    public function checkTransactionDuplicate($servicename, $servicedesc)
    {
        $result = $this->model->checkTransactionDuplicate($servicename, $servicedesc);
        $response = array();
        if (is_object($result)) {
            date_default_timezone_set('Africa/Lagos');
            $dateNow = date("Y-m-d H:i:s");
            $transDate = new DateTime($result->date);
            $transDateNow = new DateTime($dateNow);
            $timeLength = (float) $transDateNow->getTimestamp() - $transDate->getTimestamp();
            //file_put_contents("responsetime.txt","Seconds: ".$timeLength.", Trans Date: ".$result->date.", Date Now: ".$dateNow);

            //If same transaction occured in the last 1 minite, then dont send transaction.
            if ($timeLength > 60) {
                $response["status"] = "success";
            } else {
                $response["status"] = "fail";
            }
        } else {
            $response["status"] = "success";
        }
        return $response;
    }


    //Debit User BeforeTransaction
    public function debitUserBeforeTransaction($userid, $deibt)
    {
        return $this->model->debitUserBeforeTransaction($userid, $deibt);
    }

    //   Record Onchain Transaction
    public function recordchainTransaction($userid, $servicename, $servicedesc, $amountopay, $ref, $target_address, $tx_hash, $user_address, $nanoamount, $status)
    {
        $response = array();
        $result = $this->model->recordchainTransaction($userid, $servicename, $servicedesc, $ref, $amountopay, $target_address, $tx_hash, $user_address, $nanoamount, $status);
        // if (!$result) {
        //     $response["status"] = "fail";
        //     $response["msg"] = "Failed To Record Transaction";
        //     return $response;
        // }
        $response["status"] = "success";
        $response["amount"] = $amountopay;
        $response["service"] = $servicename;
        $response["description"] = $servicedesc;
        return $response;
    }
    // Record and Refund Transaction
    public function recordrefundchainTransaction($userid, $servicename, $servicedesc, $amountopay, $reference, $target_address, $tx_hash, $sender_adress, $nanoamount, $status)
    {
        $response = array();
        $result = $this->model->recordrefundchainTransaction($userid, $servicename, $servicedesc, $reference, $amountopay, $target_address, $tx_hash, $sender_adress, $nanoamount, $status);
        // if (!$result) {
        //     $response["status"] = "fail";
        //     $response["msg"] = "Failed To Record Transaction";
        //     return $response;
        // }
        $response["status"] = "success";
        $response["amount"] = $amountopay;
        $response["service"] = $servicename;
        $response["description"] = $servicedesc;
        return $response;
    }

    public function logError($message, $from, $userId)
    {
        $logFile = __DIR__ . '/../../log_error/error_log.txt';
        $timestamp = date(format: 'Y-m-d H:i:s');
        $userId = $_SESSION['user_id'] ?? 'Unknown'; // Assuming user ID is stored in session
        $logMessage = "[$timestamp] ERROR: $message\n";

        // Add request data to the log
        $logMessage .= "From: $from\n";
        $logMessage .= "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n";
        $logMessage .= "Request Data: " . json_encode($_POST) . "\n";
        $logMessage .= "User ID: " . $userId . "\n";
        $logMessage .= "--------------------------------------------------\n";

        file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
    }
    // Refund Transaction
    public function refundTransaction($ref, $fuser_address, $tonamount)
    {
        $response = array();
        $response = $this->model->refundTransaction($ref, $fuser_address, $tonamount);
        // if (!$result) {
        //     $response["status"] = "fail";
        //     $response["msg"] = "Failed To Record Transaction";
        //     return $response;
        // }
        // $response["status"] = "success";
        // $response["amount"] = $amountopay;
        // $response["service"] = $servicename;
        // $response["description"] = $servicedesc;
        return $response;
    }
    //Record Transaction & Debit User
    public function recordTransaction($userid, $servicename, $servicedesc, $amountopay, $userbalance, $ref, $status)
    {
        $response = array();
        $oldbalance = (float) $userbalance;
        $newbalance = $oldbalance - $amountopay;

        $result = $this->model->recordTransaction($userid, $servicename, $servicedesc, $ref, $amountopay, $oldbalance, $newbalance, $status);
        $response["status"] = "success";
        $response["amount"] = $amountopay;
        $response["oldbal"] = $oldbalance;
        $response["newbal"] = $newbalance;
        $response["service"] = $servicename;
        $response["description"] = $servicedesc;
        return $response;
    }
    //Save Profit
    public function saveProfit($ref, $profit)
    {
        $result = $this->model->saveProfit($ref, $profit);
    }

    //SaveData Pin
    public function saveDataPin($userid, $ref, $business, $networkname, $dataplansize, $quantity, $serial, $pin)
    {
        $result = $this->model->saveDataPin($userid, $ref, $business, $networkname, $dataplansize, $quantity, $serial, $pin);
    }


    //Update Transaction Status
    public function updateTransactionStatus($userid, $ref, $amountopay, $status)
    {
        $response = array();
        $result = $this->model->updateTransactionStatus($userid, $ref, $amountopay, $status);
    }

    public function updateFailedTransactionStatus($userid, $servicedesc, $ref, $amountopay, $status)
    {
        $response = array();
        $result = $this->model->updateFailedTransactionStatus($userid, $servicedesc, $ref, $amountopay, $status);
    }

    //----------------------------------------------------------------------------------------------------------------
    // Referal Bonus
    //----------------------------------------------------------------------------------------------------------------

    public function creditReferalBonus($referal, $referalname, $refearedby, $service)
    {
        $result = $this->model->creditReferalBonus($referal, $referalname, $refearedby, $service);
    }

    //Record Transaction & Debit User
    public function recordMonnifyTransaction($userid, $servicename, $servicedesc, $amount, $userbalance, $ref, $status)
    {
        $response = array();
        $oldbalance = (float) $userbalance;
        $newbalance = $oldbalance + $amount;

        $result = $this->model->recordMonnifyTransaction($userid, $servicename, $servicedesc, $ref, $amount, $oldbalance, $newbalance, $status);
        $response["status"] = "success";
        $response["amount"] = $amount;
        $response["oldbal"] = $oldbalance;
        $response["newbal"] = $newbalance;
        $response["service"] = $servicename;
        $response["description"] = $servicedesc;
        return $response;
    }

    //Record Transaction & Debit User
    // public function recordPaystackTransaction($userid, $servicename, $servicedesc, $amount, $userbalance, $ref, $status)
    // {
    //     $response = array();
    //     $oldbalance = (float) $userbalance;
    //     $newbalance = $oldbalance + $amount;

    //     $result = $this->model->recordTransaction($userid, $servicename, $servicedesc, $ref, $amount, $oldbalance, $newbalance, $status);
    //     $response["status"] = "success";
    //     $response["amount"] = $amount;
    //     $response["oldbal"] = $oldbalance;
    //     $response["newbal"] = $newbalance;
    //     $response["service"] = $servicename;
    //     $response["description"] = $servicedesc;
    //     return $response;
    // }

    //Verify Monnify Transaction
    public function verifyMonnifyRef($email, $monnifyhash, $token)
    {
        $result = $this->model->verifyMonnifyRef($email, $monnifyhash, $token);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["userid"] = $result->sId;
            $response["name"] = $result->sLname . " " . $result->sFname;
            $response["balance"] = $result->sWallet;
            $response["charges"] = $result->charges;
        } else {
            $response["status"] = "fail";
        }
        return $response;
    }

    //Verify Paystack Transaction
    public function verifyPaystackRef($email, $token)
    {
        $result = $this->model->verifyPaystackRef($email, $token);
        $response = array();
        if (is_object($result)) {
            $response["status"] = "success";
            $response["userid"] = $result->sId;
            $response["balance"] = $result->sWallet;
            $response["amount"] = $result->amount;
            $response["charges"] = $result->charges;
        } else {
            $response["status"] = "fail";
            $response["msg"] = $result;
        }
        return $response;
    }

    // ----------------------------------------------------------------------
    //Alpha Topup
    // ----------------------------------------------------------------------

    //Get Alpha Topup
    public function getAlphaTopupPlans()
    {
        $data = $this->model->getAlphaTopupPlans();
        return $data;
    }

    //Calculate AlphaTopup Discount
    public function calculateAlphaTopupDiscountDiscount($amount, $usertype)
    {
        $response = array();
        $usertype = (float) $usertype;
        $amount = (float) $amount;

        //Get Disount Persentage And Calculate Discount
        $result = $this->model->calculateAlphaTopupDiscountDiscount($amount);
        if ($usertype == 3) {
            $amounttopay = (float) $result->vendor;
        } elseif ($usertype == 2) {
            $amounttopay = (float) $result->agent;
        } else {
            $amounttopay = (float) $result->sellingPrice;
        }

        $buyamount = (float) $result->buyingPrice;


        $response["status"] = "success";
        $response["discount"] = $amounttopay;
        $response["buyamount"] = $buyamount;

        return $response;
    }
    // Check Blockchain transaction
    public function verifyTransaction($target_address, $tx_hash, $tx_lt, $user_address, $nanoamount)
    {
        $response = $this->model->verifyonchainTransaction($target_address, $tx_hash, $tx_lt, $user_address, $nanoamount);
        return $response;
    }
    // Get Friendly Adress
    public function toFriendlyAddress(string $rawAddress,  $bounceable = false,  $testOnly = false)
    {
        if (strpos($rawAddress, ':') !== false) {
            [$wc, $hex] = explode(':', $rawAddress);
            $wc = intval($wc);
        } else {
            $wc = 0;
            $hex = $rawAddress;
        }

        if (strlen($hex) !== 64) {
            throw new Exception("Invalid address: expected 64 hex characters, got " . strlen($hex));
        }

        $tag = 0x11; // non-bounceable
        if (!$bounceable) $tag = 0x51;
        if ($testOnly) $tag |= 0x80;

        $bytes = chr($tag) . chr($wc & 0xFF) . hex2bin($hex);
        $crc = $this->crc16xmodem($bytes);
        $bytes .= pack('n', $crc);

        return rtrim(strtr(base64_encode($bytes), '+/', '-_'), '=');
    }

    public function crc16xmodem(string $data)
    {
        $crc = 0;
        foreach (str_split($data) as $b) {
            $crc ^= ord($b) << 8;
            for ($i = 0; $i < 8; $i++) {
                $crc = ($crc & 0x8000) ? (($crc << 1) ^ 0x1021) : ($crc << 1);
                $crc &= 0xFFFF;
            }
        }
        return $crc;
    }
    public function convertNanoToTon($nanoTON)
    {
        return $nanoTON / 1e9;
    }
    public function checkPriceImpact($price, $tonAmount)
    {
        // Initialize response array
        $response = [
            'status' => '',
            'msg' => '',
            'current_price' => 0,
            'price_difference' => 0,
            'percentage_drop' => 0,
            'ton_amount' => $tonAmount
        ];

        try {
            // Mocked TON price in NGN (replace with actual API call)
            // $currentTonPrice = 1100; // Assuming 1 TON = 1100 NGN
            $currentTonPrice = $this->model->checkTonPrice();
            $priceResult = $currentTonPrice * $tonAmount;
            // $price = 20; // Assuming 20 NGN for the sake of example
            // Ensure we have valid numeric values
            if (!is_numeric($price) || !is_numeric($tonAmount)) {
                throw new InvalidArgumentException('Invalid input values');
            }

            // Calculate price difference and percentage drop
            $priceDifference = $priceResult - $price;
            $percentageDrop = ($priceDifference / $priceResult) * 100;

            // Populate response data
            $response['current_price'] = $priceResult;
            $response['price_difference'] = $priceDifference;
            $response['percentage_drop'] = $percentageDrop;

            // Check if price dropped by 1.5% or more
            if ($percentageDrop >= 1.5) {
                $response['status'] = 'fail';
                $response['msg'] = sprintf(
                    'Price drop alert: %.2f%% | Transaction Price: %.2f NGN | Current Value: %.2f NGN',
                    $percentageDrop,
                    $price,
                    $priceResult
                );
            } else {
                $response['status'] = 'success';
                $response['msg'] = sprintf(
                    'Price within acceptable range: %.2f%% drop | Transaction Price: %.2f NGN | Current Value: %.2f NGN',
                    $percentageDrop,
                    $price,
                    $priceResult
                );
            }
        } catch (Exception $e) {
            $response['status'] = 'fail';
            $response['msg'] = 'Error: ' . $e->getMessage();
        }

        return $response;
    }

    //Check If Error Show Status
    public function checkIfError()
    {
        $result = $this->model->checkIfError();
        if ($result == 1 || $result == "1") {
            return 1;
        } else {
            return 0;
        }
    }


    //Record Alpha Transaction Transaction & Debit User
    public function sendAlphaNotification($amount, $servicedesc)
    {
        return $result = $this->model->sendAlphaNotification($amount, $servicedesc);
    }
}
