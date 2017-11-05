<?php

return [
    //Site Ayarları
    'icon-framework' => 'fa',  // Font Awesome Icon framework
    'loadingImage' => '/web/image/loading.gif', // İstatistikler için yükleme gifi

    //Sunucu Ayarları
    'serverName' => 'XXX UO Sunucusu', //Sunucu ismi

    //Veritabanı Ayarları
    'dbHost' => 'localhost',//Veritabanı sunucusu
    'dbName' => 'lanfear', //Veritabanı adı
    'dbUser' => 'root',//Veritabanı kullanıcı adı
    'dbPassword' => '',//Veritabanı kullanıcısının şifresi

    //Güvenlik Ayarları
    'cookieValidationKey' => 'kyzaghanLanfearSeleneRandLewisAlThor',//Her sunucu mutlaka değiştirmeli
    'confirmEmail' => false, //Eğer true ise kullanıcılar mutlaka e-posta onaylaması yapmalı.
    'checkEmailDomains' => true, //Sadece belirtilen domainlerden maili kabul etmesi için true yapılmalı.
    'validEmailDomains' => 'gmail.com,hotmail.com,ismailkose.com.tr,yandex.com,yandex.com.tr,yahoo.com,outlook.com,msn.com', //İzin verilen e-posta domainleri
    'IpRegisterLimit' => true, // Aynı ip üzerinden açılabilecek maksimum hesap sınırı için true yapılmalı
    'IpRegisterLimitCount'  => 2, // Aynı ip üzerinden maksimum buraya girilen değer kadar üyelik açılabilir.

    //Smtp Ayarları
    'smtpServer' => 'smtp.yandex.com', //Smtp Sunucusu
    'smtpUsername' => 'ik@ismailkose.com.tr', //Smtp kullanıcı adı
    'smtpPort' => 465, //Smtp Port
    'smtpPassword' => '', //Smtp Şifresi
    'smtpEncryption' => 'ssl', //ssl veya tls
    'adminEmail' => 'ik@ismailkose.com.tr', //Yönetici e-postası
];
