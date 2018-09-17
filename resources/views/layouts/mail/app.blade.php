<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="https://www.w3.org/1999/html">
<head>
</head>
<body>
<div class="container" style="width:100%; background-color: #ebebeb">
    <div class="contant" style="width:600px;margin:0 auto; padding-top:30px;">
        @include('layouts.mail._header')
        <table border="0" bgcolor="#ffffff" width="100%">
            <tr>
                <td width="60px;"></td>
                <td width="480px; " height="200px;">
                    @yield('content')
                <td width="60px;"></td>
            </tr>
        </table>
        @include('layouts.mail._footer')
    </div>
</div>
</body>
</html>
