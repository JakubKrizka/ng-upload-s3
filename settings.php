<?php
class S3Provider {
    private $bucket_name;
    private $aws_access_key_id;
    private $aws_secret_key;

    public function __construct($bucket_name) {
        $this->bucket_name = $bucket_name;
        $this->aws_access_key_id = '***'; // Access Key ID
        $this->aws_secret_key  = '****'; // Secret Access Key
    }

    public function access_token() {
        $now = time() + (12 * 60 * 60 * 1000);
        $expire = gmdate('Y-m-d\TH:i:s\Z', $now);

        $url = 'https://' . $this->bucket_name . '.s3.amazonaws.com'; 
        $policy_document = '
            {"expiration": "' . $expire . '",
             "conditions": [
                {"bucket": "' . $this->bucket_name . '"},
                ["starts-with", "$key", ""],
                {"acl": "public-read"},
                ["content-length-range", 0, 10485760000],
                ["starts-with", "$Content-Type", ""]
            ]
        }';

        $policy = base64_encode($policy_document); 

        $hash = $this->hmacsha1($this->aws_secret_key, $policy);

        $signature = $this->hex2b64($hash);

        $token = array('policy' => $policy,
                       'signature' => $signature,
                       'key' => $this->aws_access_key_id);

        return json_encode($token);
    }

    private function hmacsha1($key, $data) {
        $blocksize = 64;
        $hashfunc = 'sha1';
        if(strlen($key) > $blocksize)
            $key = pack('H*', $hashfunc($key));
        $key = str_pad($key, $blocksize, chr(0x00));
        $ipad = str_repeat(chr(0x36), $blocksize);
        $opad = str_repeat(chr(0x5c), $blocksize);
        $hmac = pack('H*', $hashfunc(($key ^ $opad).pack('H*', $hashfunc(($key ^ $ipad).$data))));
        return bin2hex($hmac);
    }

    private function hex2b64($str) {
        $raw = '';
        for($i=0; $i < strlen($str); $i+=2) {
            $raw .= chr(hexdec(substr($str, $i, 2)));
        }
        return base64_encode($raw);
    }
}

$bucket_name = isset($_REQUEST['bucket']) ? $_REQUEST['bucket'] : '';

$s3_provider = new S3Provider($bucket_name);
echo $s3_provider->access_token();
exit;