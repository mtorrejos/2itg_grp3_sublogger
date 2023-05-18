<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- FAVICON -->
    <link rel="icon" href="https://i.ibb.co/nb8kpML/Sub-Logger-Logo.png" type="image/gif" sizes="16x16">
    <title>Due Date Reminder Mail</title>
    <style>
        body{
            margin: 0;
            background-color: #cccccc;
        }
        table {
            border-spacing: 0;
            margin: auto;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #cccccc;
            padding-bottom: 60px;
        }
        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: 'Noto Sans', sans-serif;
            color: #2e3192;
        }
        .imgSection {
            background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.6)),url(https://i.ibb.co/ZYgdVth/Background-Image.png);
            background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat;
            padding: 0;
        }
        .footer {
            background-color: #dee2e6;
            color: #2e3192;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <center class="wrapper">
        <table class="main" width="100%">
            <!--HEADER-->
            <tr>
                <td style="height:10px; background-color:#011025;"></td>
            </tr>
            <tr style="background-color:#031633; filter: drop-shadow(-2px -2px 5px rgba(0,0,0,0.3));">
                <td><table><tr>
                    <td style="padding-top:25px; padding-bottom:25px; text-align:right;"><img src="https://i.ibb.co/nb8kpML/Sub-Logger-Logo.png" width="90px"alt="SubLogger Logo" title="SubLogger Logo"></td>
                    <td><h1 style="font-size:35px; color:#0d6efd; font-weight:900; display:inline-block; padding-top:30px; padding-bottom:30px; padding-left:15px; margin:0;">SubLogger</h1></td>
                </tr></table></td>
            </tr>
            <!--TITLE-->
            <tr class="imgSection">
                <td><table><tr>
                    <td><h1 style="font-size:30px; color:#0d6efd; font-weight:900; padding:20px; margin:0; text-align:center; filter: drop-shadow(2px 2px 20px rgba(0,0,0,0.3)) drop-shadow(-2px -2px 20px rgba(0,0,0,0.3));">Your Updates</h1></td>
                </tr></table></td>
            </tr>
            <!--BODY-->
            <tr>
                <td><table>
                    <tr>
                        <td><h1 style="font-size:23px; font-weight:700; padding-top:20px; padding-bottom:5px; margin:0; text-align:center;">Hi {NAME}!</h1></td>
                    </tr>
                    <tr>
                        <td><h1 style="font-size:19px; font-weight:500; padding-top:5px; padding-bottom:20px; margin:0; text-align:center;">Here are updates on your subscriptions.</h1>
                        <hr style="margin:0; color:#dee2e6;"></td>
                    </tr>
                </table></td>
            </tr>
            <tr>
                <td><table style="padding-top:20px; padding-bottom:20px;">
                    <tr>
                        <td><p style="font-size:19px; font-weight:900; padding:10px; margin:0; text-align:center;">Subscription</p></td>
                        <td><p style="font-size:19px; font-weight:900; padding:10px; margin:0; text-align:center;">Due In</p></td>
                        <td><p style="font-size:19px; font-weight:900; padding:10px; margin:0; text-align:center;">Due Date</p></td>
                    </tr>
                    <!--TABLE ROW TO LOOP-->
                    <!-- <tr style="text-align:left;">
                        <td><p style="font-size:15px; font-weight:400; padding:10px; margin:0;">Canva</p></td>
                        <td><p style="font-size:15px; font-weight:400; padding:10px; margin:0;">0 years, 0 months, 2 days</p></td>
                        <td><p style="font-size:15px; font-weight:400; padding:10px; margin:0;">2023-05-20</p></td>
                    </tr> -->
                    {SUBSCRIPTIONS}
                </table></td>
            </tr>
            <!--FOOTER-->
            <tr class="footer">
                <td><table style="text-align:center; padding-top:10px; padding-bottom:10px;">
                    <tr>
                        <td><p style="padding:5px; margin:0;">Email brought to you by</p></td>
                    </tr><tr>
                        <td><h1 style="font-size:20px; font-weight:900; margin:0;">SubLogger</h1></td>
                    </tr><tr>
                        <td><p style="padding:5px; margin:0;">Want to change how you receive emails?</p></td>
                    </tr><tr>
                        <td><p style="padding:5px; margin:0;"><a href="editProfile.php" target="_blank" style="text-decoration:underline; color:#2e3192;">Manage your notification settings here.</a></p></td>
                    </tr>
                </table></td>
            </tr>
            <tr>
                <td style="height:10px; background-color:#B4B7BA;"></td>
            </tr>
        </table>
    </center>
</body>
</html>