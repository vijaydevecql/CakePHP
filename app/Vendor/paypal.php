
<?php
/*  PAYPAL Direct Payment API Code
 *  Code is originally from my beloved Smashing Magazine
 *  http://coding.smashingmagazine.com/2011/09/05/getting-started-with-the-paypal-api/
 *
 *  You need to have Business account in your sandbox and it must be using Website Payment Pro
 *  as its payment solution.
 *
 */
class Paypal {
    /**
     * Last error message(s)
     * @var array
     */

    protected $_errors = array();
    /**
     * API Credentials
     * Use the correct credentials for the environment in use (Live / Sandbox)
     * @var array
     */

    /**Live credentils**/
   /**  protected $_credentials = array(
        'USER' => 'blacklistbackpage_api1.gmail.com',
        'PWD' => 'MFKJPCVB4NWY2NP3',
        'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31A2jaDwmN-YtBn1W1CLGd0.AdhGRP',
    );
     */


    /**Sandbox credentils**/

   /*
   protected $_credentials = array(
        'USER' => 'pankaj_api1.cqlsus.co.uk',
         'PWD' => 'B7XJEUZLLZWDH4FU',
       'SIGNATURE' => 'AQU0e5vuZCvSg-XJploSa.sGUDlpAu5g--ZJDuudbslGWxUgYe1.Iy5.',


    );*/
   protected $_credentials = array(
        'USER' => 'testlate9-facilitator_api1.gmail.com',
         'PWD' => '37KRQ446WJ9WQPT8',
       'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31A3rizzUNqEBQhMBotpVgXcvGy4Ik',


    );

    /**
     * API endpoint
     * Live - https://api-3t.paypal.com/nvp
     * Sandbox - https://api-3t.sandbox.paypal.com/nvp
     * @var string
     */
  //  protected $_endPoint = 'https://api-3t.paypal.com/nvp';
    protected $_endPoint = 'https://api-3t.sandbox.paypal.com/nvp';
    /**
     * API Version
     * @var string
     */
    protected $_version = '86.0';
    /**
     * Make API request
     *
     * @param string $method string API method to request
     * @param array $params Additional request parameters
     * @return array / boolean Response array / boolean false on failure
     */
    public function request($method,$params = array()) {
        $this -> _errors = array();

        if( empty($method) ) { //Check if API method is not empty
            $this -> _errors = array('API method is missing');
            return false;
        }

        //Our request parameters
        $requestParams = array(
            'METHOD' => $method,
            'VERSION' => $this -> _version
        ) + $this -> _credentials;
        //Building our NVP string
        $request = http_build_query($requestParams + $params);

	//die;
        //cURL settings
        $curlOptions = array (
            CURLOPT_URL => $this -> _endPoint,
            CURLOPT_VERBOSE => 1,
            /*
             * If you are using API Signature rather then certificates, leave the code below commented out
             */
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_SSL_VERIFYHOST => FALSE,
           // CURLOPT_CAINFO => dirname(__FILE__) . '/cacert.pem', //CA cert file
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $request
        );
        $ch = curl_init();
        curl_setopt_array($ch,$curlOptions);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);        //  Skip peer certificate verification   - Comment this if you are using Certificates instead of API Signature
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);        // Skip host certificate verification    - Comment this as well if you are using Certificates instead of API Signature
        //Sending our request - $response will hold the API response
        $response = curl_exec($ch);


        //Checking for cURL errors
        if (curl_errno($ch)) {
            $this -> _errors = curl_error($ch);
            curl_close($ch);
            return false;
            //Handle errors
        } else  {
            curl_close($ch);
            $responseArray = array();
            parse_str($response,$responseArray); // Break the NVP string to an array
            return $responseArray;
        }
    }
}
