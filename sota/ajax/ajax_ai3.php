<?php
include "ajax_config.php";
if (isset($_POST["key"])) {
    $key = (isset($_POST["key"])) ? htmlspecialchars($_POST["key"]) : 0;
    // Define the prompt to be sent

    $setting = $d->rawQueryOne("select * from #_setting limit 0,1");
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;

    $prompt = 'Viết một bài viết chuẩn SEO với độ dài khoảng 800 từ, tối ưu hóa từ khóa "' . $key . '" 
Bài viết cần có:  Nội dung hay, đầy đủ, phân đoạn rõ ràng (H2), sử dụng từ khóa chính hợp lý và có lời kêu gọi hành động (CTA) cuối bài.';
    $prompt .= 'Viết nội dung bài viết chuẩn SEO cho website, chỉ phần nội dung (không bao gồm tiêu đề hay mô tả meta).

Yêu cầu:
- Từ khóa chính: "' . $key . '"
- Độ dài: khoảng 1500 từ.
- Văn phong: thân thiện, dễ hiểu, hướng đến người dùng Việt Nam.
- Cấu trúc rõ ràng: mở bài, thân bài (có H2, H3, H4,H5,H6 ví dụ <h2></h2>,<h3></h3>,<h4></h4>,<h5></h5>,<h6></h6>), kết luận.
- Các thẻ HTML như <a></a>, <strong></strong>, <br>, <p></p>, <i></i> và nhiều thẻ HTML khác nữa phải hiển thị ra, không hiển thị các ký tự đặc biệt.
- Chèn từ khóa tự nhiên, không nhồi nhét.
- Không cần ghi rõ các từ như là Nội Dung Bài Viết, mở bài, thân bài, kết bài.
- Quan trọng nhất là phải có thẻ <h2></h2> và <h3></h3> chứ không phải là các ký tự đặc biệt.
- tìm cho tôi 3 ảnh thực tế liên quan đến "' . $key . '" gắn vào bài viết của tôi.
- bài viết có các thẻ ul, li rõ ràng
- line-height các thẻ là 1.5
- Lưu ý: không cần nhắc lại "Dưới đây là nội dung bài viết chuẩn SEO, đáp ứng các yêu cầu của bạn." hoặc tương tự
- Cuối bài thay thế các thông tin liên hệ:
+ Tên công ty: ' . $setting['tenvi'];
    $prompt .= '+ Địa chỉ: ' . $optsetting['diachi'];
    $prompt .= '+ Số điện thoại: ' . $optsetting['hotline'];
    $prompt .= '+ Email: ' . $optsetting['email'];
    // $prompt = 'Tạo hình ảnh đèn trang trí từ các website thương mại điện tử hoặc nội thất. Ảnh phải rõ nét, không lỗi tải, đúng chủ đề đèn trang trí (đèn thả trần, đèn led, đèn tường...). Đảm bảo link ảnh trực tiếp là hợp lệ (tránh lỗi 404 hoặc ảnh trắng). trả về các thẻ img
    // ';
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
        $data1['tenvi'] = $key;
        $data1['noidungvi'] = htmlspecialchars($result['candidates'][0]['content']['parts'][0]['text']);
        $data1['ngaytao'] = time();
        $data1['hienthi'] = 1;
        $data1['type'] = 'chinh-sach';


        if ($d->insert('news', $data1)) {
            echo htmlspecialchars_decode($result['candidates'][0]['content']['parts'][0]['text']);
        } else {
            echo "loi";
        }
    }

    curl_close($ch);
}
