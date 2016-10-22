# kavenegar-examples-yii2
Installation
-----
```
git clone https://github.com/KaveNegar/kavenegar-examples-yii2
```
or download from link
https://github.com/KaveNegar/kavenegar-examples-yii2/archive/master.zip


Configuration
-----
set your apikey in your config:
```php
return [
	'components' => [
		'Kavenegar' => [
			'class' => 'Kavenegar\Yii2\Kavenegar',
			'apikey' => '{ apikey }',
		],
	],
];
```

Usage
-----
/controllers/SmsController.php
```php
namespace app\controllers;
use Yii;
use yii\web\Controller;
class SmsController extends Controller
{
    public function actionIndex()
    {	
	try{
		$api = Yii::$app->Kavenegar->KavenegarApi();
		$sender = "10006707323323";
		$message = "خدمات پیام کوتاه کاوه نگار";
		$receptor = array("");
		$result = $api->Send($sender,$receptor,$message);
		if($result){
			foreach($result as $r){
				echo "messageid = $r->messageid";
				echo "message = $r->message";
				echo "status = $r->status";
				echo "statustext = $r->statustext";
				echo "sender = $r->sender";
				echo "receptor = $r->receptor";
				echo "date = $r->date";
				echo "cost = $r->cost";
			}       
		}
	}
	catch(\Kavenegar\Exceptions\ApiException $e){
		// در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
		echo $e->errorMessage();
	}
	catch(\Kavenegar\Exceptions\HttpException $e){
		// در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
		echo $e->errorMessage();
	}
	catch(\yii\base\InvalidConfigException $e){
		echo $e->getMessage();
	}	
	//return $this->render('@app/views/site/index.php');   
	}  
}
```
