<?php
class AiService {
    private $apiUrl;
    public function __construct($apiUrl) { $this->apiUrl = $apiUrl; }
    public function analyzeImage($filePath){
        if (!file_exists($filePath)) return ['error'=>'file not found'];
        $cfile = new CURLFile($filePath);
        $post = ['image'=>$cfile];<?php
class AiService {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function analyzeImage($filePath) {
        if (!file_exists($filePath)) {
            return ['error' => 'file not found'];
        }

        $cfile = new CURLFile($filePath);
        $post = ['image' => $cfile];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_USERAGENT, 'AI-DermaAssist/1.0');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json'
        ]);

        $resp = curl_exec($ch);
        $err = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($resp === false) {
            return [
                'error' => 'api_error',
                'detail' => $err,
                'api_url' => $this->apiUrl
            ];
        }

        $json = json_decode($resp, true);

        if ($json === null) {
            return [
                'error' => 'invalid_response',
                'http_code' => $httpCode,
                'api_url' => $this->apiUrl,
                'raw' => substr($resp, 0, 500)
            ];
        }

        return $json;
    }
}
?>
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_USERAGENT, 'AI-DermaAssist/1.0');
        $resp = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if ($resp === false) return ['error'=>'api_error','detail'=>$err];
        $json = json_decode($resp,true);
        if ($json === null) return ['error'=>'invalid_response','raw'=>$resp];
        return $json;
    }
}
?>
