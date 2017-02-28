<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body style="font-family: arial,sans-serif !important; color: #222;">
<table width="100%" style="background: #E9E9E9;" cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td colspan="2" align="center" style="padding: 20px 0 71px;">
                <table width="700px" cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th align="left">
                                {{ HTML::image(asset('img/minilogo.png'),p_config('app.project'),['style'=>'float: left; margin: 0 10px 0 0;']) }}

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center" style="background: #fff; border-radius: 6px 6px 0 0; -webkit-border-radius: 6px 6px 0 0; -moz-border-radius: 6px 6px 0 0;">
                                <h2 style="display: block; margin: 0; padding: 20px 0; font-size: 20px;">Password Reset</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="background: #fff; padding: 0 20px; font-size: 13px;">
                                To reset your password, complete this form: {{ url('admin/password/reset', array($token)) }}.
                            </td>
                        </tr>
                    </tbody>
                    <tfoot >
                        <tr>
                            <td colspan="2" align="center" style="background: #fff; font-size: 10px; padding: 10px; border-radius: 0 0 6px 6px; -webkit-border-radius: 0 0 6px 6px; -moz-border-radius: 0 0 6px 6px;">
                                <tt>&copy; {{ p_config('app.project') }}</tt>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>