<?php
$user_name = isset($user) ? $user->getFullName() : '';
$token = isset($token) ? $token : '';
?>

<div
        style="border-radius: 5px;
	    max-width: 700px;
	    width: auto;
	    background: #fbfbfb;
	    margin-top: 50px;
	    margin-left: 20px;
	    font-family: 'Times New Roman', Times, serif;
	    font-size: 16px;"

>

    <div style="height: 30px;
	    background: #f0635d;
	    border-top-left-radius: 5px;
	    border-top-right-radius: 5px;">
        <p style="background: #f0635d;
	    width: 100px;
	    padding: 10px;
	    color: white;
	    margin-top: 14px;
	    border-bottom-right-radius: 50px;
	    border-top-left-radius: 30px;
	    padding-bottom: 15px;
	   	font-family: 'Times New Roman', Times, serif;">
            @lang('email.reset_password.title')
        </p>
    </div>

    <div style="text-align: justify;
	    font-weight: 500;
	    color: #272727;
	    padding-left: 20px;
	    padding-right: 20px;
	    padding-bottom: 20px;">

        <div style="text-align: right">
            <img class="logo" alt="Logo" src="https://komt.kidsonline.edu.vn/public/img/admin/logo2.png" style="max-width: 100px;">
        </div>

        <p>@lang('email.reset_password.dear') <b>{{$user_name}}</b>,</p>

        <p>
            @lang('email.reset_password.ordered_reset_password')<br/>
            @lang('email.reset_password.click_to_reset_link') <b><a href="{{ $url }}">{{ $url }}</a></b>.
        </p>
        <p>
            @lang('email.reset_password.note_support_hotline') <a href="tel:19000362">1900 0362</a> @lang('email.reset_password.note_send_email') <a href="mailto:kidsonline@omt.vn">kidsonline@omt.vn</a>
        </p>

        <p>@lang('email.reset_password.thank_you')</p>
        <p style="font-size: 12px;color: #232323;">
            @lang('email.automated_email') <b>KidsOnline</b>, @lang('email.no_spam')!
        <p/>

    </div>

    <div class="footer" style="
		height: 10px;
	    background: #f0635d;
	    border-bottom-left-radius: 5px;
	    border-bottom-right-radius: 5px;">
    </div>
</div>






