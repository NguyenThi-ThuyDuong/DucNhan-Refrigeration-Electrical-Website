<?php
include "ajax_config.php";
if (isset($_POST["key"])) {
    $key = (isset($_POST["key"])) ? htmlspecialchars($_POST["key"]) : 0;
    $lang = (isset($_POST["lang"])) ? htmlspecialchars($_POST["lang"]) : 'vi';
    // Define the prompt to be sent

    $setting = $d->rawQueryOne("select * from #_setting limit 0,1");
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;
    if ($lang == 'vi') {
        $prompt = 'Viết mô tả ngắn gọn (khoảng 2 dòng) giới thiệu về "' . $key . '" , nêu rõ lợi ích chính và lý do khách hàng nên lựa chọn dịch vụ này. "' . $key . '".Lưu ý: không cần nhắc lại "Dưới đây là mô tả bài viết , đáp ứng các yêu cầu của bạn hoặc tương tự. không gắn các thẻ html vào câu trả lời';
    } else {
        $prompt = 'Write a brief description (around 2 lines) introducing "' . $key . '", clearly stating the main benefits and reasons why customers should choose this service. "' . $key . '". Note: Do not repeat phrases like "Below is the description that meets your request" or similar. Do not include any HTML tags in the response. Note: Respond in English. Do not repeat phrases like "Below is the description that meets your request" or similar. Do not include any HTML tags in the response.';

    }


    $apiKey = 'AIzaSyDgWl2RVRvYN-V0amQCU7enQCF9yy3w2UM'; // Thay bằng API Key của bạn

    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . $apiKey;

    // Dữ liệu bạn muốn gửi
    $data = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $prompt]
                ]
            ]
        ]
    ];

    // Khởi tạo cURL
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Gửi yêu cầu và nhận phản hồi
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Lỗi kết nối: ' . curl_error($ch);
    } else {
        $result = json_decode($response, true);
        echo htmlspecialchars_decode($result['candidates'][0]['content']['parts'][0]['text']);
    }

    curl_close($ch);
}
