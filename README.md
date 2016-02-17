# Zalo-Sdk-Php

Installation
------------

#### Using Composer

```bash
  php composer.phar require zalopage/zalo-sdk-php
```

Example
------------
```
  try {
    $factory = new ZaloServiceFactory($pageId, $secretKey);
  
    $messageService = $factory->getZaloMessageService();
  
    $zaloPageResult = $messageService->sendTextMessageByPhoneNum($phone, $message, $sms, $isNotify);
  
    if ($zaloPageResult >= 0) {
      echo "Success";
    }
  
  } catch (ZaloSdkException $ex) {
    $error['code'] = $ex->getZaloSdkExceptionErrorCode();
    $error['message'] = $ex->getZaloSdkExceptionMessage();
  } catch (\Exception $ex) {
    $error['code'] = 500;
    $error['message'] = $ex->getMessage();
  }
```

Credits: 
* http://zms.apitoy.com/
* http://developer.page.zaloapp.com/
