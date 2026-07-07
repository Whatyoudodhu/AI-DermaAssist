<?php
class AiService {
    private $apiUrl;
    public function __construct($apiUrl) { $this->apiUrl = $apiUrl; }
    public function analyzeImage($filePath){
        if (!file_exists($filePath)) return ['error'=>'file not found'];
        
        $imageData = base64_encode(file_get_contents($filePath));
        $payload = json_encode(['image' => $imageData]);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0 (compatible; AI-DermaAssist/1.0)'
        ]);
        $resp = curl_exec($ch);
        $err = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($resp === false) return ['error'=>'api_error','detail'=>$err];
        $json = json_decode($resp,true);
        if ($json === null) return ['error'=>'invalid_response','http_code'=>$httpCode,'raw'=>$resp];
        return $json;
    }
}
?>
