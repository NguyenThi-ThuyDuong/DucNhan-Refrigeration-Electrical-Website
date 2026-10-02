<?php
include "ajax_config.php";
if (isset($_POST["key"])) {
    $key = (isset($_POST["key"])) ? htmlspecialchars($_POST["key"]) : 0;
    $lang = (isset($_POST["lang"])) ? htmlspecialchars($_POST["lang"]) : 'vi';
    // Define the prompt to be sent

    $setting = $d->rawQueryOne("select * from #_setting limit 0,1");
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;
  
    $prompt = 'Viết "1" tiêu đề bài viết chuẩn SEO, hướng đến người dùng có nhu cầu xây nhà. Từ khóa chính là "'.$key.'". Mỗi tiêu đề nên rõ ràng, kích thích sự tò mò, dài từ 8–15 từ, phù hợp để làm tiêu đề blog hoặc trang dịch vụ. Lưu ý kết quả chỉ trả về 1 tiêu đề, Không được viết lại các câu như “Dưới đây là…”, “Bài viết này sẽ trình bày…”, hoặc bất kỳ phần giới thiệu mang tính hệ thống.';


    $apiKey = 'AIzaSyD1EfrZENC-JEeADiSvud9XwJqz3sfnLIM'; // Thay bằng API Key của bạn

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
        $data[0]=htmlspecialchars_decode($result['candidates'][0]['content']['parts'][0]['text']);
        $data[1]=$func->changeTitle(htmlspecialchars($result['candidates'][0]['content']['parts'][0]['text']));
        echo json_encode($data);
        //echo htmlspecialchars_decode($result['candidates'][0]['content']['parts'][0]['text']);
    }

    curl_close($ch);
}
