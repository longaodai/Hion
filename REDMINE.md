Author: longvc - vochilong.work@gmail.com
Skills: PHP/Laravel, Sql basic, Html/Css, Js/Jquery

//=============Build PHP MVC Project===================//
Lifecycle:

1: Nhận request phía người dùng.
2: Handle xử lý request GET chuyển Route (Admin or Client)
3: Route nhận: class, method, params... => call Controller
4: Controller   => Model
                => View
    4.1 Model xử lý logic & thao tác với database
    4.2 View hiển thị giao diện về với người dùng

//=====================================================//

Note (07/05/2022):
    - Thiếu middleware: bảo mật
    PENDING PHẦN MIDDLEWARE

Note (12/06/2022):
    - Build 1 phần pagination
    - Cấu trúc lại code (Use repository design pattern)
    - Chăm viết docblock (Có author cho VÍP)
    - Nhiều cái vẫn còn thiếu -> ... Chưa có thời gian cụ thể sẽ thêm