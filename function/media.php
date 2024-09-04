<?php
//---------------کیبورد------------------//
$key['price'] = "📊 قیمت خدمات";
$key['order'] = "🛍 ثبت سفارش";
$key['info'] = "👤 اطلاعات حساب";
$key['pay'] = "💳 شارژ حساب";
$key['support'] = "📬 پشتیبانی";
$key['stutus'] = "💾 پیگیری";
$key['free'] = "💎 شارژ رایگان";
$key['sharecontact'] = "⏳(اشتراک گذاری) شماره⏳";
$key['back'] = "🔙";
$key['backtoshop'] = "برگشت به منوی قبل";
$key['joinchannel'] = "ورود به کانال";
$key['ozv'] = "عضو شدم";
$key['payoffline'] = "💳 کارت به کارت";
$key['payonline'] = "💸 پرداخت آنلاین";
$key['inforeferral'] = "📋 توضیحات زیرمجموعه گیری";
$key['changegiftbalance'] = "💰 تبدیل درآمد به موجودی";
$key['withdrawbalance'] = "💴 برداشت درآمد";
$key['balance'] = "🔐 موجودی";
$key['stutusorder'] = "💾 پیگیری سفارش";
$key['lastorder'] = "10 سفارش اخیر";
$key['lastpay'] = "10 پرداخت اخیر";
$key['closekey'] = "بستن لیست";
$key['product'] = "محصول";
$key['listprice'] = "قیمت";
$key['backpricekey'] = "برگشت";
$key['cancelorder'] = "لغو";
$key['okorder'] = "تایید";
$key['startbot'] = "🛍 ورود مستقیم به ربات 🛍";
//-------------------------------------//
class media
{
function keyboards($a)
{
	global $key;
	switch($a[0])
	{
		case 'home1' :
		$k=['resize_keyboard'=>true,'keyboard'=>[
		[['text' => $key['price']],['text' => $key['order']]],
		[['text' => $key['info']],['text' => $key['pay']]],
		[['text' => $key['support']],['text' => $key['stutus']],['text' => $key['free']]],
		]];
		break;
		case 'home2' :
		$k=['resize_keyboard'=>true,'keyboard'=>[
		[['text' => $key['price']],['text' => $key['order']]],
		[['text' => $key['info']],['text' => $key['pay']]],
		[['text' => $key['support']],['text' => $key['stutus']]],
		]];
		break;
		case 'request_contact' :
		$k=['keyboard'=>[
		[['text'=>$key['sharecontact'] , 'request_contact' => true]],
		[['text' => $key['back']]],
		],
		'resize_keyboard'=>true
		];
		break;
		case 'back' :
		$k= ['keyboard' => [
		[['text' => $key['back']]],
		],'resize_keyboard' => true
		];
		break;
		case 'lockchannel' :
		$channel= $a[1];
		$k= ['inline_keyboard' => [
		[['text' => $key['joinchannel'],'url' => "https://t.me/".$channel]],
		[['text' => $key['ozv'],'callback_data' => 'ozv']]
		]];
		break;
		case 'lockchannel2' :
		$channel= $a[1];
		$newid= $a[2];
		$k= ['inline_keyboard' => [
		[['text' => $key['joinchannel'],'url' => "https://t.me/".$channel]],
		[['text' => $key['ozv'],'callback_data' => 'refjoin'.$newid]]
		]];
		break;
		case 'pay0' :
		$k= ['keyboard' => [
		[['text'=>$key['payoffline']],['text'=>$key['payonline']]],
		[['text' => $key['back']]],
		],'resize_keyboard' => true
		];
		break;
		case 'pay1' :
		$k= ['keyboard' => [
		[['text'=>$key['payonline']],['text'=> $key['support']]],
		[['text' => $key['back']]],
		],'resize_keyboard' => true
		];
		break;
		case 'pay2' :
		$k= ['keyboard' => [
		[['text'=>$key['payoffline']]],
		[['text' => $key['back']]],
		],'resize_keyboard' => true
		];
		break;
		case 'gift' :
		$k= ['keyboard' => [
		[['text' => $key['balance']],['text'=>$key['inforeferral']]],
		[['text' => $key['withdrawbalance']],['text'=>$key['changegiftbalance']]],
		[['text' => $key['back']]],
		],'resize_keyboard' => true
		];
		break;
		case 'stutus' :
		$k=['keyboard' => [
		[['text'=>$key['stutusorder']]],
		[['text'=>$key['lastorder']],['text'=> $key['lastpay']]],
		[['text' => $key['back']]],
		],'resize_keyboard' => true
		];
		break;
	}
	
	return $k;
}
function text($tx){
	switch($tx[0])
	{	
		case 'back' :
		$starttext = $tx[1];
		$t = $starttext;
		break;
		case 'off_all' :
		$t = "این بخش موقتا غیرفعال است.";
		break;
		case 'ban' :
		$t = "شما از ربات بن شده اید اگر فکر میکنید اشتباه شده است با پشتیبانی ارتباط برقرار کنید";
		break;
		case 'fyk' :
		$t = "این دکمه نمایشی است";
		break;
		case 'close' :
		$channel = $tx[1];
		$t = "بسته شد. \n@".$channel;
		break;
		case 'notjoin' :
		$t = "هنوز عضو کانال نشده اید";
		break;
		case 'joined' :
		$t = "عضویت شما تایید شد";
		break;
		case 'lock_channel' :
		$channel = $tx[1];
		$t = "❌ برای استفاده از ربات ابتدا باید عضو کانال ما شوید \n@{$channel}\n بعد از عضویت در کانال بر روی دکمه عضو شدم کلیک کنید.";
		break;
		case 'firstgift' :
		$gift = $tx[1];
		$t = "کاربر گرامی مبلغ $gift تومان به عنوان هدیه اولین ورود به ربات به شما تعلق گرفت.";
		break;
		case 'Gift0' :
		$Porsant    = $tx[1];
		$freebalance = $tx[2];
		$t = "🌟 تبریک ! یک کاربر با استفاده از لینک دعوت شما وارد ربات شده و $freebalance تومان به موجودی شما افزوده شد.\n◾️همچنین  $Porsant درصد از هر خرید زیرمجموعه تان به شما تعلق میگیرد.";
		break;
		case 'Gift1' :
		$Porsant    = $tx[1];
		$t = "🌟 تبریک ! یک کاربر با استفاده از لینک دعوت شما وارد ربات شده است.\nبا هر شارژ حساب کاربر برای شما $Porsant درصد از مبلغ شارژ حساب به شما تعلق میگیرد.";
		break;
		case 'Gift2' :
		$freebalance = $tx[1];
		$t = "🌟 تبریک ! یک کاربر با استفاده از لینک دعوت شما وارد ربات شده و $freebalance تومان به موجودی شما افزوده شد.";
		break;
		case 'referral_authentication' :
		$t = "برای افزایش امنیت ربات و جلوگیری از زیرمجموعه گیری فیک فقط کاربران ایران مجاز به استفاده از ربات میباشد.";
		break;
		case 'ismember' :
		$t = "شما قبلا عضو ربات بودید و نمیتوانید زیرمجموعه کسی شوید";
		break;
		case 'notnewid' :
		$newid = $tx[1];
		$t = "هیچ کاربری با ایدی $newid یافت نشد.";
		break;
		case 'selfreferral' :
		$t = "شما نمیتوانید زیر مجموعه خود شوید";
		break;
		case 'wrongnewid' :
		$t = "ایدی معرف اشتباه است";
		break;
		case 'referral_authentication_sms' :
		$t = "یک پیامک حاوی کد فعالسازی به شماره ارسالی\nفرستاده شده لطفا کد را وارد کنید :";
		break;
		case 'again_referral_authentication' :
		$t = "لطفا شماره خود را دوباره وارد کنید";
		break;
		case 'notirancontact' :
		$t = "🔸تنها کاربران به شماره ایران میتوانند حساب خود را شارژ کنند!
		🔹 شماره اکانت شما مجازی میباشد و شما مورد تایید نمیباشید!
		
		📌لطفا با اکانت حقیقی خود به شماره ایران اقدام به استفاده از ربات و شارژ حساب خود کنید.";
		break;
		case 'onlykeyusecontact' :
		$t = "لطفا با استفاده از دکمه زیر اقدام به ثبت شماره خود نمایید👇🏻";
		break;
		case 'wrong_code_referral_authentication' :
		$t = "کد وارد شده صحیح نمیباشد";
		break;
		case 'int_code_referral_authentication' :
		$t = "لطفا فقط عدد انگلیسی وارد کنید";
		break;
		case 'info0' :
		$name = $tx[1];
		$fid = $tx[2];
		$balance = $tx[3];
		$all_orders = $tx[4];
		$all_pay = $tx[5];
		$joindate = $tx[6];
		$idbot = $tx[7];
		$t = "👤 نام : <a href ='tg://user?id={$fid}'>$name</a>
		👤 شناسه : <code>{$fid}</code>
		💰 موجودی : <code>{$balance}</code>
		🛍 تعداد سفارشات : <code>{$all_orders}</code>
		🛍 مجموع خرید شما : <code>{$all_pay}</code>
		
		⏳ تاریخ عضویت : <code>{$joindate}</code>
		
		@{$idbot}";
		break;
		case 'info1' :
		$name = $tx[1];
		$fid = $tx[2];
		$balance = $tx[3];
		$all_orders = $tx[4];
		$all_pay = $tx[5];
		$Giftbalance = $tx[6];
		$refral = $tx[7];
		$Gift1 = $tx[8];
		$Gift2 = $tx[9];
		$joindate = $tx[10];
		$idbot = $tx[11];
		$t = "👤 نام : <a href ='tg://user?id={$fid}'>$name</a>
		👤 شناسه : <code>{$fid}</code>
		💰 موجودی : <code>{$balance}</code>
		🛍 تعداد سفارشات : <code>{$all_orders}</code>
		🛍 مجموع خرید شما : <code>{$all_pay}</code>
		
		💰 درآمد شما : <code>{$Giftbalance}</code>
		💎 تعداد زیر مجموعه :  <code>{$refral}</code>
		🛍 هدیه زیر مجموعه گیری : <code>{$Gift1}</code>
		🛍 پورسانت خرید زیرمجموعه : <code>{$Gift2}</code>
		
		⏳ تاریخ عضویت : <code>{$joindate}</code>
		
		@{$idbot}";
		break;
		case 'info2' :
		$name = $tx[1];
		$fid = $tx[2];
		$balance = $tx[3];
		$all_orders = $tx[4];
		$all_pay = $tx[5];
		$Giftbalance = $tx[6];
		$refral = $tx[7];
		$Gift2 = $tx[8];
		$joindate = $tx[9];
		$idbot = $tx[10];
		$t = "👤 نام : <a href ='tg://user?id={$fid}'>$name</a>
		👤 شناسه : <code>{$fid}</code>
		💰 موجودی : <code>{$balance}</code>
		🛍 تعداد سفارشات : <code>{$all_orders}</code>
		🛍 مجموع خرید شما : <code>{$all_pay}</code>
		
		💰 درآمد شما : <code>{$Giftbalance}</code>
		💎 تعداد زیر مجموعه :  <code>{$refral}</code>
		🛍 پورسانت خرید زیرمجموعه : <code>{$Gift2}</code>
		
		⏳ تاریخ عضویت : <code>{$joindate}</code>
		
		@{$idbot}";
		break;
		case 'info3' :
		$name = $tx[1];
		$fid = $tx[2];
		$balance = $tx[3];
		$all_orders = $tx[4];
		$all_pay = $tx[5];
		$Giftbalance = $tx[6];
		$refral = $tx[7];
		$Gift1 = $tx[8];
		$joindate = $tx[9];
		$idbot = $tx[10];
		$t = "👤 نام : <a href ='tg://user?id={$fid}'>$name</a>
		👤 شناسه : <code>{$fid}</code>
		💰 موجودی : <code>{$balance}</code>
		🛍 تعداد سفارشات : <code>{$all_orders}</code>
		🛍 مجموع خرید شما : <code>{$all_pay}</code>
		
		💰 درآمد شما : <code>{$Giftbalance}</code>
		💎 تعداد زیر مجموعه :  <code>{$refral}</code>
		🛍 هدیه زیر مجموعه گیری : <code>{$Gift1}</code>
		
		⏳ تاریخ عضویت : <code>{$joindate}</code>
		
		@{$idbot}";
		break;
		case 'support' :
		$t = "📥 لطفا با در نظر گرفتن قوانین پیام خود را ارسال کنید :
		✉️ پیام های رکیک و بی ربط باعث بلاک شدن شما از ربات میشود🚫";
		break;
		case 'pendingsupport' :
		$t = "شما قبلا یک پیام ارسال کرده اید. تا زمانی که پاسخ ان را دریافت نکنید نمیتوانید دوباره پیامی را ارسال کنید❌
		محض آنلاین شدن پشتیبانی جواب شما را خواهد داد . با تشکر از صبر شما❤";
		break;
		case 'oksupport' :
		$t = "🔶پیام شما با موفقیت به پشتیبانی ارسال شد
		لطفا منتظر جواب باشید🔷";
		break;
		case 'pay_authentication' :
		$t = "🔒 در راستای افزایش امنیت در پرداخت ، شماره را خود را با استفاده از دکمه زیر برای ما ارسال نمایید.
		
		❗️ ☎️ شماره شما نزد ما محفوظ است و امکان دسترسی به آن برای کسی مقدور نیست.";
		break;
		case 'pay_selection' :
		$t = "لطفا روش پرداخت خود را انتخاب کنید :";
		break;
		case 'off_pay' :
		$t = "بخش پرداخت موقتا غیرفعال شده است";
		break;
		case 'pay_amount' :
			$mindeposit = $tx[1];
			$maxdeposit = $tx[2];
		$t = "✅ مبلغ مورد نظر را به تومان ارسال کنید. (حداقل $mindeposit و حداکثر $maxdeposit هزار تومان)";
		break;
		case 'link_pay' :
		$t = "👇🏻👇🏻👇🏻لینک پرداخت👇🏻👇🏻👇🏻";
		break;
		case 'payment' :
		$amount = $tx[1];
		$payment = $tx[2];
		$t = "$amount تومان | $payment";
		break;    
		case 'pay' :
		$fid = $tx[1];
		$balance = $tx[2];
		$code = $tx[3];
		$t = "🌐 » لینک پرداخت شما ساخته شد:
		
		♻️ » پس از پرداخت وجه، اتوماتیک حساب شما شارژ می شود.
		
		🏷 » شناسه : {$fid}
		💳 » موجودی : {$balance} تومان
		♻️ » شماره پیگیری : {$code}
		
		✅ » لطفا روی دکمه زیر کلیک کنید👇";
		break;
		case 'pay_int' :
		$t = "مبلغ وارد شده صحیح نمیباشد";
		break;
		case 'pay_mistake' :
		$t = "مشکلی پیش آمده است دقایقی دیگر تلاش کنید";
		break;
		case 'pay_authentication_wrongcode' :
		$t = "کد وارد شده صحیح نمیباشد";
		break;
		case 'pay_authentication_int' :
		$t = "لطفا فقط عدد وارد کنید";
		break;
		case 'pay_authentication_sendsms' :
		$t = "یک پیامک حاوی کد فعالسازی به شماره ارسالی\nفرستاده شده لطفا کد را وارد کنید :";
		break;
		case 'pay_authentication_sendsms_again' :
		$t = "لطفا شماره خود را دوباره وارد کنید";
		break;
		case 'pay_authentication_justkey' :
		$t = "لطفا با استفاده از دکمه زیر اقدام به ثبت شماره خود نمایید👇🏻";
		break;
		case 'pay_authentication_notiran' :
		$t = "🔸تنها کاربران به شماره ایران میتوانند حساب خود را شارژ کنند!
		🔹 شماره اکانت شما مجازی میباشد و شما مورد تایید نمیباشید!
		
		📌لطفا با اکانت حقیقی خود به شماره ایران اقدام به استفاده از ربات و شارژ حساب خود کنید.";
		break;
		case 'referral_text1' :
		$free = $tx[1];
		$porsant = $tx[2];
		$t = "🔺 بنر بالا حاوی لینک دعوت اختصاصی شما برای وروده به ربات است با اشتراک بنر برای گروه ها و دوستانتان موجودی جمع کنید.
		
		◾️ با زیرمجموعه گیری به ازای هر دوست خود که دعوت میکنید {$free} تومان هدیه میگیرد.
		◾️  {$porsant} درصد از هر شارژ حساب زیرمجموعه تان به شما تعلق میگیرد. ";
		break;
		case 'referral_text2' :
		$free = $tx[1];
		$t = "🔺 بنر بالا حاوی لینک دعوت اختصاصی شما برای وروده به ربات است با اشتراک بنر برای گروه ها و دوستانتان موجودی جمع کنید.
		
		◾️ با زیرمجموعه گیری به ازای هر دوست خود که دعوت میکنید {$free} تومان هدیه میگیرد.";
		break;
		case 'referral_text3' :
		$porsant = $tx[1];
		$t = "🔺 بنر بالا حاوی لینک دعوت اختصاصی شما برای وروده به ربات است با اشتراک بنر برای گروه ها و دوستانتان موجودی جمع کنید.
		
		◾️  {$porsant} درصد از هر شارژ حساب زیرمجموعه تان به شما تعلق میگیرد. ";
		break;
		case 'off_referral' :
		$t = "این بخش غیرفعال میباشد";
		break;
		case 'inforeferral0' :
		$name = $tx[1];
		$fid = $tx[2];
		$Gift1 = $tx[3];
		$Gift2 = $tx[4];
		$refral = $tx[5];
		$GiftMoj = $tx[6];
		$gipay = $tx[7];
		$idbot = $tx[8];
		$t = "👤 نام : <a href ='tg://user?id={$fid}'>{$name}</a>
		👤 شناسه : <code>{$fid}</code>
		
		💰 درآمد شما : <code>{$GiftMoj}</code>
		💰 هدیه مصرف شده : <code>$gipay</code>
		💎 تعداد زیر مجموعه :  <code>{$refral}</code>
		🛍 هدیه زیر مجموعه گیری : <code>{$Gift1}</code>
		🛍 پورسانت خرید زیرمجموعه : <code>{$Gift2}</code>
		
		@$idbot";
		break;
		case 'inforeferral1' :
		$name = $tx[1];
		$fid = $tx[2];
		$Gift2 = $tx[3];
		$refral = $tx[4];
		$GiftMoj = $tx[5];
		$gipay = $tx[6];
		$idbot = $tx[7];
		$t = "👤 نام : <a href ='tg://user?id={$fid}'>{$name}</a>
		👤 شناسه : <code>{$fid}</code>
		
		💰 درآمد شما : <code>{$GiftMoj}</code>
		💰 هدیه مصرف شده : <code>$gipay</code>
		💎 تعداد زیر مجموعه :  <code>{$refral}</code>
		🛍 پورسانت خرید زیرمجموعه : <code>{$Gift2}</code>
		
		@$idbot";
		break;
		case 'inforeferral2' :
		$name = $tx[1];
		$fid = $tx[2];
		$Gift1 = $tx[3];
		$refral = $tx[4];
		$GiftMoj = $tx[5];
		$gipay = $tx[6];
		$idbot = $tx[7];
		$t = "👤 نام : <a href ='tg://user?id={$fid}'>{$name}</a>
		👤 شناسه : <code>{$fid}</code>
		
		💰 درآمد شما : <code>{$GiftMoj}</code>
		💰 هدیه مصرف شده : <code>$gipay</code>
		💎 تعداد زیر مجموعه :  <code>{$refral}</code>
		🛍 هدیه زیر مجموعه گیری : <code>{$Gift1}</code>
		
		@$idbot";
		break;
		case 'amountgiftbalance' :
	    $mintomovebalnce = $tx[1];
		$GiftMoj = $tx[2];
		$t = "مبلغ مورد نظر خود را از $mintomovebalnce الی {$GiftMoj} وارد کنید";
		break;
		case 'mingiftbalance' :
		$mintomovebalnce = $tx[1];
		$t = "کمترین حد تبدیل $mintomovebalnce تومان است";
		break;
		case 'okgiftbalance' :
		$amount = $tx[1];
		$t = "مبلغ {$amount} تومان به کیف پول شما انتقال داده شد";
		break;
		case 'amountgiftbalance_wrong' :
		$mintomovebalnce = $tx[1];
		$GiftMoj = $tx[2];
		$t = "لطفا عددی از بازه $mintomovebalnce الی {$GiftMoj} وارد کنید";
		break;
		case 'giftbalance_int' :
		$t = "لطفا یک مقدار عددی ارسال کنید";
		break;
		case 'amountwithdrawbalance' :
		$minwithdrawbalance = $tx[1];
		$GiftMoj = $tx[2];
		$t = "مبلغ مورد نظر خود را ارسال کنید از بازه $minwithdrawbalance تا {$GiftMoj} به تومان ارسال کنید";
		break;
		case 'minwithdrawbalance' :
		$minwithdrawbalance = $tx[1];
		$t = "کمترین حد برداشت $minwithdrawbalance تومان است";
		break;
		case 'amountwithdrawbalance_wrong' :
		$minwithdrawbalance = $tx[1];
		$GiftMoj = $tx[2];
		$t = "لطفا عددی بین بازه $minwithdrawbalance تا {$GiftMoj} بفرستید";
		break;
		case 'infowithdrawbalance' :
		$t = "اطلاعات کارت بانکی خود را بفرستید: 
		شماره کارت - نام صاحب کارت - نام بانک";
		break;
		case 'okwithdrawbalance' :
		$code = $tx[1];
		$t = "درخواست شما ثبت شد\n\nکد پیگیری : $code";
		break;
		case 'error_withdrawbalance' :
		$t = "با عرض پوزش مشکلی پیش آمده است مجددا تلاش کنید";
		break;
		case 'stutus' :
		$t = "انتخاب کن";
		break;
		case 'lastpay0' :
		$t = "10 پرداخت اخیر شما:\n";
		break;
		case 'lastpay1' :
		// موفق
		$stp = 'موفق';
		$amount = $tx[2];
		$paycode = $tx[3];
		$code = $tx[4];
		$date = $tx[5];
		$t = "$stp | مبلغ : {$amount} تومان\nشماره پیگیری درگاه : {$paycode} | شماره پیگیری ربات : {$code}\n{$date}\n-------\n";
		break;
		case 'lastpay2' :
		// پرداخت نشده است
		$stp = 'پرداخت نشده است';
		$amount = $tx[2];
		$code = $tx[3];
		$date = $tx[4];
		$t = "$stp | مبلغ : {$amount} تومان\nشماره پیگیری ربات : {$code}\n{$date}\n-------\n";
		break;
		case 'lastpay3' :
		// ناموفق
		$stp = 'نا موفق';
		$amount = $tx[2];
		$code = $tx[3];
		$date = $tx[4];
		$t = "$stp | مبلغ : {$amount} تومان\nشماره پیگیری ربات : {$code}\n{$date}\n-------\n";
		break;
		case 'notpay' :
		$t = "شما پرداختی انجام نداده اید.";
		break;
		case 'lastorder0' :
		$t = "10 سفارش اخیر شما :\n";
		break;
		case 'lastorder1' :
		$sefaresh = $tx[1];
		$status = $tx[2];
		$code = $tx[3];
		$link = $tx[4];
		$count = $tx[5];
		$date = $tx[6];
		$t = "سفارش : {$sefaresh}\nوضعیت : {$status} | کد پیگیری : {$code}\nاطلاعات : {$link} | تعداد : {$count}\n{$date}\n-------\n";
		break;
		case 'lastorder2' :
		$sefaresh = $tx[1];
		$status = $tx[2];
		$code = $tx[3];
		$codeapi = $tx[4];
		$link = $tx[5];
		$count = $tx[6];
		$date = $tx[7];
		$t = "سفارش : {$sefaresh}\nوضعیت : {$status} | کد پیگیری : {$code}\nاطلاعات : {$link} | تعداد : {$count}\n{$date}\n-------\n";
		break;
		case 'notorder' :
		$t = "شما سفارشی ثبت نکرده اید.";
		break;
		case 'ordercode' :
		$t = "📍شماره پیگیری را وارد نمایید :";
		break;
		case 'Pending' :
		$t = "سفارش شما در صف انتظار است";
		break;
		case 'Processing' :
		$t = "سفارش شما در حال پردازش هست";
		break;
		case 'In progress' :
		$t = "سفارش شما در حال انجام است";
		break;
		case 'Completed' :
		$t = "سفارش شما تکمیل شده است";
		break;
		case 'Canceled' :
		$t = "این سفارش لغو شده است";
		break;
		case 'Partial' :
		$t = "این سفارش به دلیل بروز مشکل کامل نشده و هزینه باقی مانده عودت داده شده است";
		break;
		case 'Unknown_status' :
		$t = "وضعیت این سفارش نا مشخص است.";
		break;
		case 'wrong_code' :
		$t = "شماره پیگیری اشتباه لطفا دوباره بفرستید";
		break;
		case 'price_info' :
		$idbot = $tx[1];
		$t = "بخش مورد نظر خود را انتخاب کنید : 
		■ تمامی قیمت ها بر حسب 1000 عدد میباشد.
		■ قیمت بر حسب تومان میباشد.
		
		@$idbot";
		break;
		case 'shop1' :
		$t = "یک گزینه انتخاب کنید :";
		break;
		case 'off_buy' :
		$t = "بخش خرید موقتا غیرفعال شده است";
		break;
		case 'shop2' :
		$category = $tx[1];
		$t = "دسته انتخابی : $category\nیک گزینه انتخاب کنید :";
		break;
		case 'shop_justkey' :
		$t = "لطفا از دکمه های ربات استفاده کنید";
		break;
		case 'shop3' :
		$category = $tx[1];
		$product = $tx[2];
		$price = $tx[3];
		$min = $tx[4];
		$max = $tx[5];
		$info = $tx[6];
		$t = "نام محصول : {$category} | {$product}
		
		قیمت هرکا : {$price}
		حداقل : {$min}
		حداکثر : {$max}
		
		توضیحات : 
		{$info}
		🔸🔸🔹🔹🔸🔸🔹🔹
		تعداد مورد نظر خود را از بازه {$min} تا {$max} بفرستید";
		break;
		case 'shop4' :
		$channel = $tx[1];
		$t = "اطلاعات خود را به صورت زیر بفرستید:
		کانال تلگرام :
		@{$channel} 
		فالور :
		@username 
		لایک و کامنت :
		instagram.com/linkpost
		سین پست : 
		https://t.me/{$channel}/1";
		break;
		case 'lowbalance' :
		$balance_required = $tx[1];
		$t = "موجودی حساب شما برای ثبت سفارش کافی نمی باشد.
		هزینه ثبت این سفارش $balance_required تومان است پس از شارژ حساب اقدام نمایید.";
		break;
		case 'shop_range' :
		$min = $tx[1];
		$max = $tx[2];
		$t = "لطفا عددی بین بازه {$min} - {$max} ارسال فرمایید";
		break;
		case 'shop5' :
		$sefaresh = $tx[1];
		$count = $tx[2];
		$link = $tx[3];
		$price = $tx[4];
		$t = "اطلاعات زیر را بررسی کرده و درصورت صحیح بودن تایید کنید
		سفارش : {$sefaresh}
		تعداد : {$count}
		اطلاعات : {$link}
		قیمت فاکتور : {$price}
		درصورت تایید کردن امکان لغو سفارش وجود ندارد";
		break;
		case 'shop_justen' :
		$t = "لطفا فقط از زبان انگلیسی استفاده کنید";
		break;
		case 'order_receipt1' :
		$sefaresh = $tx[1];
		$first_name = $tx[2];
		$fid = $tx[3];
		$count = $tx[4];
		$link = $tx[5];
		$code = $tx[6];
		$codeapi = $tx[7];
		$price = $tx[8];
		$date = $tx[9];
		$oldbalance = $tx[10];
		$newbalance = $tx[11];
		$t = "❇️ سفارش  {$sefaresh}
		ثبت شده توسط: <a href='tg://user?id={$fid}'>{$first_name}</a>
		ایدی عددیش: <code>{$fid}</code>
		تعداد درخواستی : {$count}
		اطلاعات فرستاده شده : {$link}
		کد پیگیری ربات : {$code}
		کد پیگیری سایت : {$codeapi}
		قیمت فاکتور : {$price}
		تاریخ ثبت : {$date}";
		break;
		case 'order_receipt2' :
		$sefaresh = $tx[1];
		$first_name = $tx[2];
		$fid = $tx[3];
		$count = $tx[4];
		$link = $tx[5];
		$code = $tx[6];
		$price = $tx[7];
		$date = $tx[8];
		$oldbalance = $tx[9];
		$newbalance = $tx[10];
		$t = "❇️ سفارش  {$sefaresh}
		ثبت شده توسط: <a href='tg://user?id={$fid}'>{$first_name}</a>
		ایدی عددیش: <code>{$fid}</code>
		تعداد درخواستی : {$count}
		اطلاعات فرستاده شده : {$link}
		کد پیگیری ربات : {$code}
		قیمت فاکتور : {$price}
		تاریخ ثبت : {$date}";
		break;
		case 'order_receipt0' :
		$category = $tx[1];
		$product = $tx[2];
		$count = $tx[3];
		$price = $tx[4];
		$date = $tx[5];
		$idbot = $tx[6];
		$t = "✅ گزارش #خرید #موفق
		‏__________________________________
		⤵️ اطلاعات خرید :
		
		▪️نام محصول : {$category}
		
		▫️بسته انتخابی : {$product}
		
		🔸تعداد : {$count}
		🔹قیمت : {$price}
		🔸تاریخ ثبت : {$date}
		‏__________________________________
		➊وارد ربات @{$idbot} شوید.
		➋موجودی خود را افزایش دهید.
		➌خدمات تلگرام و اینستاگرام بگیرید.";
		break;
		case 'order_receipt_okapi' :
		$category = $tx[1];
		$product = $tx[2];
		$link = $tx[3];
		$count = $tx[4];
		$code = $tx[5];
		$codeapi = $tx[6];
		$date = $tx[7];
		$t = "سفارش شما با موفقیت ثبت شد.
		لینک : {$link}
		تعداد : {$count}
		زمان انجام سفارش 2 الی 48 ساعت میباشد 
		لطفا صبور باشید
		کد پیگیری شما : <code>{$code}</code>
		زمان ثبت : {$date}";
		break;
		case 'order_receipt_oknoapi' :
		$category = $tx[1];
		$product = $tx[2];
		$link = $tx[3];
		$count = $tx[4];
		$code = $tx[5];
		$date = $tx[6];
		$t = "سفارش شما با موفقیت ثبت شد.
		لینک : {$link}
		تعداد : {$count}
		زمان انجام سفارش 2 الی 48 ساعت میباشد 
		لطفا صبور باشید
		کد پیگیری شما : <code>{$code}</code>
		زمان ثبت : {$date}";
		break;
		case 'error_order' :
		$t = "با عرض پوزش مشکلی پیش امده دوباره تلاش کنید";
		break;
		case 'not_product' :
		$t = "محصول مورد نظر موقتا غیرفعال شده است";
		break;
		case 'support_pm2' :
		$text = $tx[1];
		$t = "👤یک پیام از پشتیبان برای شما :\n$text";
		break;
		case 'upcoin' :
		$amount = $tx[1];
		$date = $tx[2];
		$t = "کاربر عزیز\n{$amount} تومان از طرف مدیریت به حساب شما انتقال داده شد.";
		break;
		case 'docoin' :
		$amount = $tx[1];
		$date = $tx[2];
		$t = "کاربر عزیز\n{$amount} تومان از طرف مدیریت از حساب شما کسر شد";
		break;
		case 'payoutok' :
		$date = $tx[1];
		$t = "درخواست برداشت شما انجام شد و به حساب شما واریز شد";
		break;
		case 'cancel_payout' :
		$date = $tx[1];
		$t = "کاربر گرامی درخواست برداشت شما لغو شد و موجودی به حساب شما بازگردانده شد.";
		break;
		case 'order_confirmation1' :
		$code = $tx[1];
		$channel = $tx[2];
		$time = $tx[3];
		$date = $tx[4];
		$t = "💹 سفارش شما تکمیل شد.
		📝 کد پیگیری سفارش : <code>{$code}</code>
		
		باتشکر از اعتماد شما 🌹
		
		🆔 @{$channel}
		----------
		⚠️توجه : این گزارش در ساعت  {$time} و تاریخ {$date} دریافت شده است.";
		break;
		case 'order_cancel1' :
		$code = $tx[1];
		$factor = $tx[2];
		$channel = $tx[3];
		$time = $tx[4];
		$date = $tx[5];
		$t = "💹 سفارش شما لغو شد.
		📝 کد پیگیری سفارش : <code>{$code}</code>
		
		مبلغ {$factor} به حساب شما عودت داده شد.
		
		🆔 @{$channel}
		----------
		⚠️توجه : این گزارش در ساعت  {$time} و تاریخ {$date} دریافت شده است.";
		break;
		case 'order_confirmation2' :
		$code = $tx[1];
		$codeapi = $tx[2];
		$channel = $tx[3];
		$time = $tx[4];
		$date = $tx[5];
		$t = "💹 سفارش شما تکمیل شد.
		📝 کد پیگیری سفارش : <code>{$code}</code>
		
		باتشکر از اعتماد شما 🌹
		
		🆔 @{$channel}
		----------
		⚠️توجه : این گزارش در ساعت  {$time} و تاریخ {$date} دریافت شده است.";
		break;
		case 'order_cancel2' :
		$code = $tx[1];
		$codeapi = $tx[2];
		$factor = $tx[3];
		$channel = $tx[4];
		$time = $tx[5];
		$date = $tx[6];
		$t = "💹 سفارش شما لغو شد.
		📝 کد پیگیری سفارش : <code>{$code}</code>
		
		مبلغ {$factor} به حساب شما عودت داده شد.
		
		🆔 @{$channel}
		----------
		⚠️توجه : این گزارش در ساعت  {$time} و تاریخ {$date} دریافت شده است.";
		break;
		case 'order_partial' :
		$code = $tx[1];
		$codeapi = $tx[2];
		$back = $tx[3];
		$factor = $tx[4];
		$channel = $tx[5];
		$time = $tx[6];
		$date = $tx[7];
		$t = "💹 سفارش شما به دلیل بروز مشکل کامل انجام نشد.
		📝 کد پیگیری سفارش : <code>{$code}</code>
		
		مبلغ باقی مانده از سفارش {$back} به حساب شما عودت داده شد.
		
		🆔 @{$channel}
		----------
		⚠️توجه : این گزارش در ساعت  {$time} و تاریخ {$date} دریافت شده است.";
		break;
		case 'ok_payment' :
		$pay = $tx[1];
		$Amount = $tx[2];
		$balanceold = $tx[3];
		$balancenew = $tx[4];
		$payment = $tx[5]; // نام درگاه
		$channel = $tx[6];
		$t = "تراکنش موفقیت آمیز بود \n شماره پیگیری درگاه : <code>$pay</code> \n مبلغ پرداختی : $Amount \n موجودی قبلی : $balanceold \n موجودی جدید : $balancenew \n باتشکر از پرداخت شما \n @$channel";
		break;
		case 'cancel_payment' :
		$t = "تراکنش توسط کاربر لغو شد";
		break;
		case 'notpay_payment' :
		$t = "تراکنش انجام نشد";
		break;
		case 'error_payment' :
		$t = "خطا رخ داده است";
		break;
		case 'refralGift_payment' :
		$fid = $tx[1];
		$name = $tx[2];
		$Amount = $tx[3];
		$gifi = $tx[4];
		$t = "زیر مجموعه شما <a href = 'tg://user?id=$fid'>$name</a> مقدار $Amount حساب خود را شارژ کرده و مقدار $gifi پورسانت برای شما واریز شد";
		break;
		case 'First_Gift' :
		    $gift = $tx[1];
		    $t = "$gift تومان به عنوان هدیه به حساب شما واریز شد.";
	    break;
	}
	return $t;
}
}	