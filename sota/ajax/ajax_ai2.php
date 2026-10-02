<?php
include "ajax_config.php";
if (isset($_POST["key"])) {
    $key = (isset($_POST["key"])) ? htmlspecialchars($_POST["key"]) : 0;
    $lang = (isset($_POST["lang"])) ? htmlspecialchars($_POST["lang"]) : 'vi';
    $pc = (isset($_POST["pc"])) ? htmlspecialchars($_POST["pc"]) : 0;
    $dd = (isset($_POST["dd"])) ? htmlspecialchars($_POST["dd"]) : 0;
    $dany = (isset($_POST["dany"])) ? htmlspecialchars($_POST["dany"]) : '';
    $dany = html_entity_decode($dany, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $dany = json_decode($dany, true);



    // Define the prompt to be sent

    $setting = $d->rawQueryOne("select * from #_setting limit 0,1");
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;

    if ($lang == 'vi') {
        $prompt = 'Bạn là một người viết nội dung theo phong cách ' . $pc . ' cho blog website. <br>
        Viết một bài viết chuẩn SEO với độ dài ' . $dd . ', tối ưu hóa từ khóa "' . $key . '" .<br>
        Yêu cầu:<br>
        - Quan trọng: Không thêm bất cứ thuộc tính css nào vào bài viết để tránh xung đột trong trang web.<br>
        - Từ khóa chính: "' . $key . '".<br> 
        - Không được viết các câu như “Dưới đây là…”, “Bài viết này sẽ trình bày…”, hoặc bất kỳ phần giới thiệu mang tính hệ thống.<br>
        - Viết nội dung bài viết chuẩn SEO cho website, chỉ phần nội dung (không bao gồm tiêu đề hay mô tả meta).<br>
        - Bài viết cần có:  Nội dung hay, đầy đủ, phân đoạn rõ ràng (H2), sử dụng từ khóa chính hợp lý và có lời kêu gọi hành động (CTA) cuối bài.<br>
        - Cấu trúc bài viết: trong thẻ h2 là các tiêu đề chính, và các thẻ h3 bên dưới là các tiêu đề phụ liên quan.<br>';
        for ($i=0; $i < count($dany); $i++) { 
            $prompt .='+ Thẻ h2: '.$dany[$i]['h2'].'.<br>';
            for ($j=0; $j < count($dany[$i]['h3']); $j++) { 
                if($dany[$i]['h3'][$j]!=''){
                    $prompt .='Thẻ h3: '.$dany[$i]['h3'][$j].'.<br>'; 
                }   
            }
        }
        $prompt .=' - Các thẻ HTML như <a></a>, <strong></strong>, <br>, <p></p>, <i></i> và nhiều thẻ HTML khác nữa phải hiển thị ra, không hiển thị các ký tự đặc biệt.<br>
        - Chèn từ khóa tự nhiên, không nhồi nhét.<br>
        - Không cần ghi rõ các từ như là Nội Dung Bài Viết, mở bài, thân bài, kết bài.<br>
        - Quan trọng nhất là phải có thẻ <h2></h2> và <h3></h3> chứ không phải là các ký tự đặc biệt.<br>
        - Tìm 3 ảnh thực tế liên quan đến "' . $key . '" gắn vào bài viết của tôi.<br>
        - bài viết có các thẻ ul, li rõ ràng.<br>
        - line-height các thẻ là 1.5.<br>
        - Lưu ý: không cần nhắc lại "Dưới đây là nội dung bài viết chuẩn SEO, đáp ứng các yêu cầu của bạn." hoặc tương tự.<br>
        - Cuối bài thay thế các thông tin liên hệ:<br>
        + Tên công ty: ' . $setting['ten' . $lang];
        $prompt .= '+ Địa chỉ: ' . $optsetting['diachi'];
        $prompt .= '+ Số điện thoại: ' . $optsetting['hotline'];
        $prompt .= '+ Email: ' . $optsetting['email'];
    } else {
        $prompt = 'You are a content writer with a ' . $pc . ' writing style for a blog website. <br>
        Write an SEO-standard article with a length of ' . $dd . ', optimized for the keyword "' . $key . '".<br>
        Requirements:<br>
        - Main keyword: "' . $key . '".<br>
        - Do not use phrases like “Below is…”, “This article will present…”, or any system-style introductions.<br>
        - Write SEO-optimized content for the website, only the content section (exclude title and meta description).<br>
        - The article must have: quality and complete content, clearly divided sections (H2), reasonable use of the main keyword, and a call to action (CTA) at the end.<br>
        - Article structure: inside the <h2> tags are main headings, and the <h3> tags below are related subheadings.<br>';
        for ($i = 0; $i < count($dany); $i++) {
            $prompt .= '+ H2 tag: ' . $dany[$i]['h2'] . '.<br>';
            for ($j = 0; $j < count($dany[$i]['h3']); $j++) {
                $prompt .= 'H3 tag: ' . $dany[$i]['h3'][$j] . '.<br>';
            }
        }
        $prompt .= ' - HTML tags such as <a></a>, <strong></strong>, <br>, <p></p>, <i></i>, and many others must be rendered properly, not as special characters.<br>
        - Naturally insert the keyword without keyword stuffing.<br>
        - Do not label content sections with headings like Introduction, Body, or Conclusion.<br>
        - Most important: Use real <h2></h2> and <h3></h3> tags, not special characters.<br>    
        - The article should include clear <ul> and <li> tags.<br>
        - All text should have a line-height of 1.5.<br>
        - Important: text/css does not set font-family by itself.<br>
        - Important: H2 and H3 tags must have CSS with font-size: 18px and color: #e84d4b.<br>
        - Important: Do not add phrases like “Below is the SEO-standard article that meets your requirements.” or similar.<br>
        - Do not wrap it with "```html" at the beginning or "```" at the end.<br>
        - At the end of the article, replace with contact information:<br>
        - Note: Respond in English. Do not repeat phrases like "Below is the description that meets your request" or similar. Do not include any HTML tags in the response.<br>
        + Company name: ' . $setting['ten' . $lang].'<br>';
        $prompt .= '+ Address: ' . $optsetting['diachi'].'<br>';
        $prompt .= '+ Phone number: ' . $optsetting['hotline'].'<br>';
        $prompt .= '+ Email: ' . $optsetting['email'];
        
    }

    // - Quan trọng: Các thẻ H2, H3 css font-size: 18px và màu chữ #221e6a.<br>

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
       // echo $prompt;
       $result['candidates'][0]['content']['parts'][0]['text'] = preg_replace('/```(?:html)?|```/', '', $result['candidates'][0]['content']['parts'][0]['text']);
        echo htmlspecialchars_decode($result['candidates'][0]['content']['parts'][0]['text']);
    }

    curl_close($ch);
}
