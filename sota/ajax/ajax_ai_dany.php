<?php
include "ajax_config.php";
if (isset($_POST["key"])) {
    $key = (isset($_POST["key"])) ? htmlspecialchars($_POST["key"]) : 0;
    $lang = (isset($_POST["lang"])) ? htmlspecialchars($_POST["lang"]) : 'vi';
    $pc = (isset($_POST["pc"])) ? htmlspecialchars($_POST["pc"]) : 0;
    $dd = (isset($_POST["dd"])) ? htmlspecialchars($_POST["dd"]) : 0;
    // Define the prompt to be sent

    $setting = $d->rawQueryOne("select * from #_setting limit 0,1");
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;

    if ($lang == 'vi') {
        $prompt = '- Tạo dàn ý cho một bài viết sử dụng từ khóa chính: "'.$key.'"
                   - Phong cách viết: '.$pc.'
                   - Kết quả trả về phải là một mảng JSON, mỗi phần tử gồm:
                   - h2: tiêu đề chính
                   - h3: một mảng các tiêu đề phụ liên quan
                   - Không cần viết nội dung mô tả, không chèn giải thích ngoài JSON
                   - Chỉ trả về nội dung JSON không bọc "```json " ở đầu và " ```" ở cuối dữ liệu trả về
                   - Trả về đúng cú pháp JSON chuẩn. Ví dụ nội dung trả về mẫu
                   ';
    }else{
        $prompt = '- Create an outline for an article using the main keyword: "'.$key.'"
           - Writing style: '.$pc.'
           - The result must be a JSON array, each element includes:
           - h2: main heading.
           - h3: an array of related subheadings.
           - Do not write descriptive content, do not include any explanation outside of the JSON.
           - Only return the JSON content, do not wrap it with "```json" at the beginning or "```" at the end.
           - Return valid JSON syntax. For example, sample output format.
           - Note: Respond in English. Do not repeat phrases like "Below is the description that meets your request" or similar. Do not include any HTML tags in the response.
           ';
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
    //$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (curl_errno($ch)) {
        
        echo 'Lỗi kết nối: ' . curl_error($ch);
    } else {
       
        
        $result = json_decode($response, true);
        $data['result'] = $result['candidates'][0]['content']['parts'][0]['text']; 
        echo json_encode($data);
       
    }

    curl_close($ch);
}
