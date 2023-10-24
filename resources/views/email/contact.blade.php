<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liên hệ</title>
</head>
<body>
<div style="padding:20px">
    <p style="padding:4px 0px 10px 0px;margin:0px">Kính chào <b><a href="mailto:tuancuong.bota@gmail.com" target="_blank">{{ env('RECEIVER_EMAIL') }}</a>,</b></p>
    <p style="padding:1px 0px 15px 0px;margin:0px">Quý khách có 1 yêu cầu liên hệ mới.</p>
    <table width="100%" cellpadding="5" cellspacing="0" border="0" style="color:#6d6d6d">
        <tbody>
        <tr>
            <td width="140px" style="border-top:1px solid #dceff5"><b>•&nbsp;Tên khách hàng:</b></td>
            <td style="border-top:1px solid #dceff5;color:#494949">{{ $request['username'] }}</td>
        </tr>
        <tr>
            <td style="border-top:1px solid #dceff5"><b>•&nbsp;Email :</b></td>
            <td style="border-top:1px solid #dceff5;color:#494949"><a href="mailto:{{ $request['email'] }}" target="_blank">{{ $request['email'] }}</a></td>
        </tr>
        <tr>
            <td style="border-top:1px solid #dceff5"><b>•&nbsp;Nội dung:</b></td>
            <td style="border-top:1px solid #dceff5;color:#494949">{{ $request['content'] }}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>