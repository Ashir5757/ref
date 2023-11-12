<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['title']}}</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Referral System Message</h2>
                <p>Dear {{$data['name']}},</p>

                <p>
                    We are excited to inform you about our referral program. Share the good news and earn rewards!
                </p>

                <p>
                    Here's how it works:
                </p>

                <ul>
                    <li>Refer your friends and family to our platform.</li>
                    <li>Your referrals make a purchase or sign up.</li>
                    <li>You earn rewards or bonuses for each successful referral.</li>
                </ul>

                <p>
                    Start referring today and unlock great benefits. Thank you for being a part of our community!
                </p>

<p>You can add user to your Network by sharing <a href="{{$data['url']}}">Referral Link</a></p>
<p><b>Username :</b>{{$data['email']}}</p>
<p><b>Password :</b>{{$data['password']}}</p>
                <p>Best regards,<br>Your Company Name</p>
            </div>
        </div>
    </div>
</body>
</html>

