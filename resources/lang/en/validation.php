<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accept' => 'Thuộc tính: phải được chấp nhận.',
    'active_url' => 'Thuộc tính: không phải là một URL hợp lệ.',
    'after' => 'Thuộc tính: phải là ngày sau: date.',
    'after_or_equal' => 'Thuộc tính: phải là ngày sau hoặc bằng: date.',
    'alpha' => 'Thuộc tính: chỉ được chứa các chữ cái.',
    'alpha_dash' => 'Thuộc tính: chỉ được chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => 'Thuộc tính: chỉ được chứa các chữ cái và số.',
    'array' => 'Thuộc tính: phải là một mảng.',
    'before' => 'Thuộc tính: phải là một ngày trước: date.',
    'before_or_equal' => 'Thuộc tính: phải là một ngày trước hoặc bằng: date.',
    'between' => [
        'numeric' => 'Thuộc tính: phải nằm giữa: min và: max.',
        'file' => 'Thuộc tính: phải nằm trong khoảng: min và: max kilobyte.',
        'string' => 'Thuộc tính: phải nằm giữa các ký tự: min và: max.',
        'array' => 'Thuộc tính: phải có giữa các mục: min và: max.',
    ],
    'boolean' => 'Trường: thuộc tính phải đúng hoặc sai.',
    'xác nhận' => 'Xác nhận: thuộc tính không khớp.',
    'date' => 'Thuộc tính: không phải là ngày hợp lệ.',
    'date_equals' => 'Thuộc tính: phải là một ngày bằng: date.',
    'date_format' => 'Thuộc tính: không khớp với format: format.',
    'different' => 'Thuộc tính: và: khác phải khác.',
    'digits' => 'Thuộc tính: phải là: chữ số chữ số.',
    'umbers_between '=>' Thuộc tính: phải nằm giữa: chữ số tối thiểu và: chữ số tối đa. ',
    'dimensions' => 'Thuộc tính: có kích thước hình ảnh không hợp lệ.',
    'difference' => 'Trường: thuộc tính có giá trị trùng lặp.',
    'email' => 'Thuộc tính: phải là một địa chỉ email hợp lệ.',
    'end_with' => 'Thuộc tính: phải kết thúc bằng một trong các giá trị sau:: values.',
    'exists' => 'Thuộc tính đã chọn: không hợp lệ.',
    'file' => 'Thuộc tính: phải là một tệp.',
    'fill' => 'Trường: thuộc tính phải có một giá trị.',
    'gt' => [
        'numeric' => 'Thuộc tính: phải lớn hơn: value.',
        'file' => 'Thuộc tính: phải lớn hơn: giá trị kilobyte.',
        'string' => 'Thuộc tính: phải lớn hơn: các ký tự giá trị.',
        'array' => 'Thuộc tính: phải có nhiều hơn: giá trị mục.',
    ],
    'gte' => [
        'numeric' => 'Thuộc tính: phải lớn hơn hoặc bằng: value.',
        'file' => 'Thuộc tính: phải lớn hơn hoặc bằng: giá trị kilobyte.',
        'string' => 'Thuộc tính: phải lớn hơn hoặc bằng: các ký tự giá trị.',
        'array' => 'Thuộc tính: phải có: giá trị mục trở lên.',
    ],
    'image' => 'Thuộc tính: phải là một hình ảnh.',
    'in' => 'Thuộc tính đã chọn: không hợp lệ.',
    'in_array' => 'Trường: thuộc tính không tồn tại trong: other.',
    'integer' => 'Thuộc tính: phải là một số nguyên.',
    'ip' => 'Thuộc tính: phải là địa chỉ IP hợp lệ.',
    'ipv4' => 'Thuộc tính: phải là địa chỉ IPv4 hợp lệ.',
    'ipv6' => 'Thuộc tính: phải là địa chỉ IPv6 hợp lệ.',
    'json' => 'Thuộc tính: phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => 'Thuộc tính: phải nhỏ hơn: value.',
        'file' => 'Thuộc tính: phải nhỏ hơn: giá trị kilobyte.',
        'string' => 'Thuộc tính: phải nhỏ hơn: ký tự giá trị.',
        'array' => 'Thuộc tính: phải có ít hơn: giá trị các mục.',
    ],
    'lte' => [
        'numeric' => 'Thuộc tính: phải nhỏ hơn hoặc bằng: value.',
        'file' => 'Thuộc tính: phải nhỏ hơn hoặc bằng: giá trị kilobyte.',
        'string' => 'Thuộc tính: phải nhỏ hơn hoặc bằng: ký tự giá trị.',
        'array' => 'Thuộc tính: không được có nhiều hơn: giá trị mục.',
    ],
    'max' => [
        'numeric' => 'Thuộc tính: không được lớn hơn: max.',
        'file' => 'Thuộc tính: không được lớn hơn: max kilobyte.',
        'string' => 'Thuộc tính: không được lớn hơn: ký tự tối đa.',
        'array' => 'Thuộc tính: không được có nhiều hơn: max items.',
    ],
    'mimes' => 'Thuộc tính: phải là một tệp có kiểu:: giá trị.',
    'mimetypes' => 'Thuộc tính: phải là một tệp có kiểu:: giá trị.',
    'min' => [
        'numeric' => 'Thuộc tính: tối thiểu phải là: min.',
        'file' => 'Thuộc tính: phải có ít nhất: min kilobyte.',
        'string' => 'Thuộc tính: phải có ít nhất: ký tự tối thiểu.',
        'array' => 'Thuộc tính: phải có ít nhất: mục min.',
    ],
    'multiple_of' => 'Thuộc tính: phải là bội số của: value.',
    'not_in' => 'Thuộc tính đã chọn: không hợp lệ.',
    'not_regex' => 'Định dạng: thuộc tính không hợp lệ.',
    'numeric' => 'Thuộc tính: phải là một số.',
    'password' => 'Mật khẩu không chính xác.',
    'present' => 'Trường: thuộc tính phải có.',
    'regex' => 'Định dạng: thuộc tính không hợp lệ.',
    'Required' => "Trường: thuộc tính là bắt buộc.",
    'required_if' => 'Trường: thuộc tính là bắt buộc khi: khác là: giá trị.',
    'Requi_unless' => "Trường: thuộc tính là bắt buộc trừ khi: other nằm trong: giá trị.",
    'Requi_with' => 'Trường: thuộc tính là bắt buộc khi có: các giá trị.',
    'Requi_with_all' => "Trường: thuộc tính là bắt buộc khi có: các giá trị.",
    'Requi_without' => 'Trường: thuộc tính là bắt buộc khi: không có giá trị.',
    'Requi_without_all' => "Trường: thuộc tính là bắt buộc khi không có giá trị nào trong số:.",
    'prohibited' => 'Trường: Thuộc tính bị cấm.',
    'prohibited_if' => 'Trường: thuộc tính bị cấm khi: khác là: giá trị.',
    'prohibited_unless' => 'Trường: thuộc tính bị cấm trừ khi: trường khác nằm trong: giá trị.',
    'same' => 'Thuộc tính: và: other phải khớp.',
    'size' => [
        'numeric' => 'Thuộc tính: phải là: size.',
        'file' => 'Thuộc tính: phải là: kích thước kilobyte.',
        'string' => 'Thuộc tính: phải là: ký tự kích thước.',
        'array' => 'Thuộc tính: phải chứa: các mục kích thước.',
    ],
    'started_with' => 'Thuộc tính: phải bắt đầu bằng một trong những điều sau:: giá trị.',
     'string' => 'Thuộc tính: phải là một chuỗi.',
     'timezone' => 'Thuộc tính: phải là một múi giờ hợp lệ.',
     'unique' => 'Thuộc tính: đã được sử dụng.',
     'uploaded' => 'Không tải lên được thuộc tính:.',
     'url' => 'Định dạng: thuộc tính không hợp lệ.',
     'uuid' => 'Thuộc tính: phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
