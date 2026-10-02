<?php
include "ajax_config.php";
if (isset($_POST["key"])) {
    $key = (isset($_POST["key"])) ? htmlspecialchars($_POST["key"]) : 0;
    $lang = (isset($_POST["lang"])) ? htmlspecialchars($_POST["lang"]) : 'vi';
    // Define the prompt to be sent

    $setting = $d->rawQueryOne("select * from #_setting limit 0,1");
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;
    $prompt = "tạo 1 ảnh thực tế nhà phố, không cần gợi ý, không ràng buộc yêu cầu.";


    $apiKey = 'AIzaSyD1EfrZENC-JEeADiSvud9XwJqz3sfnLIM'; // Thay bằng API Key của bạn

    $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $apiKey;

    $prompt = 'A futuristic city skyline at sunset, with flying cars and towering skyscrapers.'; // Thay đổi prompt theo ý muốn của bạn
    
    $data = [
        'contents' => [
            [
                'parts' => [
                    ['text' => $prompt]
                ]
            ]
        ]
    ];
    
    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data)
        ]
    ];
    
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    if ($result === FALSE) {
        echo "Error calling Gemini API";
    } else {
        $response = json_decode($result, true);
        // Xử lý phản hồi từ API
        // Gemini Pro Vision không trực tiếp trả về hình ảnh mà cần một mô hình khác để tạo hình ảnh từ văn bản mô tả.
        // Để tạo hình ảnh từ văn bản, bạn sẽ cần sử dụng một API tạo hình ảnh chuyên dụng.
        // Ví dụ, bạn có thể sử dụng một API như DALL-E, Midjourney, hoặc Stable Diffusion.
        echo htmlspecialchars_decode($response['candidates'][0]['content']['parts'][0]['text']);
       
    }
}
