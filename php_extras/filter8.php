<?php

if (isset($_POST['my_sentence'])) {

// Filter8 Client SDK
//
// Copyright (c) 2013 Filter8 ( http://www.filter8.com )
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.

function post_it($content){
		$url1 = "https://api.filter8.com/content/item.js";
		$timestamp = time();
		$nonceParam = 'nonce=' . $timestamp;
		$url = $url1 . '?' . $nonceParam;
		$credentials = "0c0a793e693148ca89b690e17c01145f" . ':'. md5($timestamp . "0af7106099014e5cac9347b093c32862");
		$data = 'content=' . urlencode($content);
		
		// construct the url request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, $credentials);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_json = json_decode($response);
		// return the json object
		return $response_json;
}

$my_sentence = $_POST['my_sentence'];
$response = post_it($my_sentence);
$response = $response.filter.response;
echo $response;

}
?>