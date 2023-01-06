<?php

$authUrl = 'https://iam.cn-north-1.myhuaweicloud.com/v3/auth/tokens?nocatalog=true';
$authJson = '{
    "auth": {
        "identity": {
            "methods": [
                "password"
            ],
            "password": {
                "user": {
                    "domain": {
                        "name": "hid_hdpn1iiwqm695o3"
                    },
                    "name": "hid_hdpn1iiwqm695o3",
                    "password": "zhi7231443"
                }
            }
        },
        "scope": {
            "project": {
                "id": "d24fd02a12434b20b5d95df6559d2593"
            }
        }
    }
}';
$tokenArr = doCurlPostRequest($authUrl, $authJson);
print_r($tokenArr);
exit;


$url = 'https://functiongraph.cn-north-1.myhuaweicloud.com/v2/d24fd02a12434b20b5d95df6559d2593/fgs/functions/urn:fss:cn-north-1:d24fd02a12434b20b5d95df6559d2593:function:default:fss_php:latest/invocations';
$data = array('author '=> 'szy','intro'=> '哎呦，错了');
$data = http_build_query($data);

$context = stream_context_create($opts);
$html = doCurlPostRequest($url, $data);
print_r($html);

function doCurlPostRequest($url, $requestString, $post = true)
{
    $con = curl_init((string)$url);
    curl_setopt($con, CURLOPT_HEADER, false);
    if ($post) {
        curl_setopt($con, CURLOPT_POSTFIELDS, $requestString);
        curl_setopt($con, CURLOPT_POST, $post);
    }
    curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($con, CURLOPT_TIMEOUT, 5);
    curl_getinfo($con, CURLINFO_HTTP_CODE);
    $rs = curl_exec($con);
    curl_close($con);
    return $rs;
}

exit;
