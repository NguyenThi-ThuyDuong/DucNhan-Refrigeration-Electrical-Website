<?php
include "ajax_config.php";
if (isset($_POST["key"])) {
    $key = (isset($_POST["key"])) ? htmlspecialchars($_POST["key"]) : 0;
    $lang = (isset($_POST["lang"])) ? htmlspecialchars($_POST["lang"]) : 'vi';
    $type = (isset($_POST["type"])) ? htmlspecialchars($_POST["type"]) : '';
    // Define the prompt to be sent

    $setting = $d->rawQueryOne("select * from #_setting limit 0,1");
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;

    if ($type == 'mota') {
        if ($lang == 'vi') {
            $prompt = 'Viết mô tả sản phẩm "' . $key . '" một cách chi tiết và hấp dẫn khoảng 100 từ, bao gồm các phần:
                    - Giới thiệu tổng quan: Mô tả ngắn gọn nhưng nổi bật về sản phẩm.
                    - Thông số kỹ thuật / đặc điểm chính: Liệt kê những điểm nổi bật về cấu tạo, kích thước, chất liệu, màu sắc, công dụng,... 
                    - Đoạn mô tả tổng quan bằng thẻ <p>.
                    - Danh sách đặc điểm sản phẩm bằng thẻ <ul> và <li>, mỗi mục có định dạng: <strong>Tên đặc điểm:</strong> Mô tả.
                    - line-height các thẻ là 2
                    - Không sử dụng markdown (**, *). Không sử dụng dấu html hoặc ở đầu hoặc cuối như "```html","```".';
        } else {
            $prompt = '请始终使用简体中文回答。请用大约100字详细且有吸引力地描述产品 "' . $key . '"，包括以下部分：
                    - 总体介绍：简短但突出地描述该产品。
                    - 技术参数 / 主要特点：列出产品的结构、尺寸、材质、颜色、用途等亮点。
                    - 用<p>标签输出的总览描述段落。
                    - 用<ul>和<li>标签列出产品特点，每项格式为：<strong>特点名称：</strong>描述内容。
                    - 所有标签的 line-height 为2。
                    - 不使用markdown格式（如**、*），不输出包含 "```html" 或 "```" 的代码块。';
        }
    } elseif ($type == "noidung") {
        if ($lang == 'vi') {
            $prompt = 'Bạn là một người viết nội dung chuyên nghiệp cho blog.
                     Viết một bài viết chuẩn SEO với độ dài khoảng 1000 từ cho sản phẩm "' . $key . '" bao gồm các phần:
                    - Không được viết các câu như “Dưới đây là…”, “Bài viết này sẽ trình bày…”, hoặc bất kỳ phần giới thiệu mang tính hệ thống.
                    - Chi tiết thông số kỹ thuật, đặc điểm chính: Liệt kê những điểm nổi bật về cấu tạo, kích thước, chất liệu, màu sắc, công dụng,... 
                    - Đoạn nội dung tổng quan bằng thẻ <p>.
                    - Danh sách đặc điểm sản phẩm bằng thẻ <ul> và <li>, mỗi mục có định dạng: <strong>Tên đặc điểm:</strong> Mô tả.
                    - Lợi ích, Công dụng: Nêu rõ sản phẩm dùng để làm gì, phù hợp với ai, tại sao nên chọn sản phẩm này.
                    - Kêu gọi hành động: Khuyến khích khách hàng mua hàng (CTA).
                     - Văn phong: thân thiện, dễ hiểu, hướng đến người dùng Việt Nam.
                    - Cấu trúc rõ ràng: mở bài, thân bài (có H2, H3, H4,H5,H6 ví dụ <h2></h2>,<h3></h3>,<h4></h4>,<h5></h5>,<h6></h6>), kết luận.
                    - Các thẻ HTML như <a></a>, <strong></strong>, <br>, <p></p>, <i></i> và nhiều thẻ HTML khác nữa phải hiển thị ra, không hiển thị các ký tự đặc biệt.
                    - Chèn từ khóa tự nhiên, không nhồi nhét.
                    - Không cần ghi rõ các từ như là Nội Dung Bài Viết, mở bài, thân bài, kết bài.
                    - Quan trọng nhất là phải có thẻ <h2></h2> và <h3></h3> chứ không phải là các ký tự đặc biệt.
                    - bài viết có các thẻ ul, li rõ ràng
                    - line-height các thẻ là 1.5
                    - Quan trọng: Các thẻ H2, H3, H4, H5, H6 css font-size:18px và màu chữ #013765.
                    - Lưu ý: Không sử dụng markdown (**, *). Không sử dụng dấu html hoặc ở đầu hoặc cuối như "```html","```".';
                    $prompt .= '- Cuối bài thay thế các thông tin liên hệ:
                    + Tên công ty: ' . $setting['ten' . $lang];
                    $prompt .= '+ Địa chỉ: ' . $optsetting['diachi'];
                    $prompt .= '+ Số điện thoại: ' . $optsetting['hotline'];
                    $prompt .= '+ Email: ' . $optsetting['email'];
        } else {
            $prompt = '请始终使用简体中文回答。请撰写一篇大约800字的SEO优化文章，围绕关键词 "' . $key . '" 展开内容优化。
            文章应包括：内容丰富、有吸引力、结构清晰（使用 <h2> 分段）、合理自然地插入关键词，并在结尾加入行动号召（CTA）。';
            $prompt .= '请为网站撰写一篇符合SEO标准的文章，仅包含正文内容（不包括标题或Meta描述）。
            
            要求：
            - 主要关键词："'. $key . '"
            - 字数：大约1500字
            - 文风：亲切、易懂，面向越南用户
            - 结构清晰：引言、正文（包含 <h2>, <h3>, <h4>, <h5>, <h6> 示例如 <h2></h2>, <h3></h3> 等），以及结论
            - HTML标签如 <a></a>, <strong></strong>, <br>, <p></p>, <i></i> 等必须完整显示，不要显示特殊字符
            - 自然嵌入关键词，避免堆砌
            - 概述：简短但突出的产品描述。
            - 技术规格和主要特点：列出产品的结构、尺寸、材质、颜色、用途等亮点。
            - 不需要写出“文章内容”、“引言”、“正文”、“结论”这样的提示词
            - 必须使用 <h2></h2> 与 <h3></h3> 标签，不能用其他特殊字符代替
            - 使用 <ul>, <li> 标签组织列表内容
            - 所有段落标签 line-height 为1.5
            - 重要说明：所有 H2, H3, H4, H5, H6 标签的 CSS 样式应为 font-size:18px，字体颜色为 #013765
            - 注意：不要在文章开头加入诸如“以下是符合您要求的SEO文章内容”等类似句子
            - 在文章结尾处替换为以下联系信息：
            + 公司名称：' . $setting['ten'.$lang] . '
            + 地址：' . $optsetting['diachi'] . '
            + 电话：' . $optsetting['hotline'] . '
            + 邮箱：' . $optsetting['email'] . '
            请用中文回答,。';
             $prompt .= '注意：请勿用越南语回复';
           

        }
    }





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

        echo htmlspecialchars_decode($result['candidates'][0]['content']['parts'][0]['text']);
    }

    curl_close($ch);
}
