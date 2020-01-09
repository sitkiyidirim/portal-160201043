# AirCron Modülü
Modül yapım aşamasındadır.

Bu modülde kullanıcılar giriş yaptığı taktirde arayüzdeki tablo üzerinden zamanlı görevler ekleyip düzenleyebilir. Kullanıcılar tarafından yapılan değişiklikler; <kullanıcı adı> değişkeni ile birlikte sql'de log olarak tutulmaktadır.

Modülü KouOsl Portal sistemine kurabilmek için composer.json dosyasına aşağıdaki kodlar eklenmelidir


```
 "repositories": [
        ..........
        {
            "type": "vcs",
            "url": "https://github.com/2019-BLM317/portal-160201043.git"
        },
    ],
    
***********

 "require": {
        ..........
        "kouosl/portal-AirCron": "dev-master"
    }, 
 ```
    
    
Ardından Frontend ve Backend için portal klasöründe  portal\frontend\config ve portal\backend\config klasöründeki main.php dosyası aşağıdaki gösterildiği üzere düzenlenir


```
'modules' => [
       ...
     'AirCron' => [
            'class' => 'kouosl\AirCron\Module',
        ],

   ],

 ```

portal\vendor\kouosl\ adresinde portal-AirCron adlı bir klasör açılıp git clone ile bu dizin de çekilebilir.
Modül dosya olarak sisteme implemente edilmiştir. Composer'ın kurulumu tamamlaması için vagrant başlatılır;

```
vagrant up
```

Ardından ssh ile sanal makina olan vagrant'a bağlanılmalıdır

vagrant-portal dizinine cmd ile gidilir ve

```
vagrant ssh
```

yazılır.

Ardından veritabanına modül ile alakalı tabloların yüklenebilmesi için migrate işlemi yapılmalıdır.

```
php yii migrate/up --migrationPath=@vendor/kouosl/portal-AirCron/migrations  
```

yazılır.

Artık modülümüz hazır.

##Modüle Erişmek için ;

http://portal.kouosl/AirCron


