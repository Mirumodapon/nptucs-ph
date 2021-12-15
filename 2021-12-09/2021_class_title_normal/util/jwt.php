<?php

class JWT {

  static private function jwt_encode($data) {
    return rtrim(strtr(base64_encode(json_encode($data)), '+/', '-_'), '=');
  }
  static private function base64url_decode($data) {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  }

  static function encode($header, $payload, $secert) {
    $headers_encoded = JWT::jwt_encode($header);
    $payload_encoded = JWT::jwt_encode($payload);
    $signature = hash_hmac('sha256', "$headers_encoded.$payload_encoded", $secert, true);
    $signature_encoded = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');
    return "$headers_encoded.$payload_encoded.$signature_encoded";
  }

  static function decode($token, $secert) {
    $token_arr = preg_split ("/\./", $token);

    $header = JSON_decode(JWT::base64url_decode($token_arr[0]));
    $payload = JSON_decode(JWT::base64url_decode($token_arr[1]));

    if ($header->alg != 'HS256' && $header->typ != 'JWT') {
      return [
        'verified' => false,
        'msg' => 'alg method not allow',
        'header' => $header,
        'payload' => $payload
      ];
    }

    $signature = hash_hmac('sha256', "$token_arr[0].$token_arr[1]", $secert, true);
    $signature_encoded = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');

    return [
      'verified' => $signature_encoded == $token_arr[2],
      'msg' => $signature_encoded == $token_arr[2]? 'Signature Verified': 'Invalid Signature',
      'header' => $header,
      'payload' => $payload
    ];
  }
}

?>