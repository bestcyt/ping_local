<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>pay</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>


    </div>
</div>
<script src="{{ asset('/pingpp.js') }}"></script>
<script>
//    pingpp.setUrlReturnCallback(function (err, url) {
//        // 自行处理跳转或者另外打开支付页面地址(url)
//        // window.location.href = url;
//        console.log(url);
//    }, ['alipay_pc_direct', 'alipay_wap']);
    var object = {!! $charge !!};
    pingpp.createPayment(object, function(result, err){
        // 可按需使用 alert 方法弹出 log
        console.log(result);
        console.log(err.msg);
        console.log(err.extra);
        if (result == "success") {

            // 只有微信公众号 (wx_pub)、QQ 公众号 (qpay_pub)支付成功的结果会在这里返回，其他的支付结果都会跳转到 extra 中对应的 URL
        } else if (result == "fail") {
            // Ping++ 对象不正确或者微信公众号 / QQ公众号支付失败时会在此处返回
        } else if (result == "cancel") {
            // 微信公众号支付取消支付
        }
    });
</script>
</body>
</html>
