# Airports-project Back-end

Bu proje, modern web uygulamaları geliştirmek için kullanılan Laravel framework'ü üzerine inşa edilmiştir. Projede, api araçları ile gerçekleştirilebilecek çeşitli özellikler bulunmaktadır.

## Kullanılan Teknolojiler

- Laravel 11: Web uygulamasının temelini oluşturan ve güçlü bir altyapı sağlayan PHP tabanlı bir framework.

- Sail: Laravel projelerini Docker ile hızlıca çalıştırmak için kullanılan bir geliştirme ortamı.

- MeiliSearch: Güçlü arama yetenekleri sunan tam metin tabanlı açık kaynaklı bir arama motoru.

- Sanctum: Laravel'in sağladığı kimlik doğrulama hizmetlerini sağlayan bir paket.


## Başlangıç
```shell
# ./vendor/bin/sail up -d

# ./vendor/bin/sail bash or shell or root-shell

# composer install

# php artisan migrate:fresh --seed
```

## Görüntüleme
```shell
# localhost empty-page

# localhost:8080 phpmyadmin

# localhost:7700 Meilisearch
```

## Postman
import `Airports-Project.postman_collection.json`


## Kullanım

- Auth Countries Search alanları yetkilendirme bulunmamaktadır.

- Airports alanı için Auth yetkilendirilmesi mevcuttur.

- Auth klasöründeki register veya login alanından gelen response da token alınabiliyor.

- Örn: "token": "1|8bVPLdY26ADP1jLJiaj2G6wJ9T9rAtPAmAKYuK4Ycd8c4199"

- Gelen token Airports klasörünün Authorization kısmında "type: Bearer Token" ekle

- Artık Airports alanında ekleme güncelleme silme ve listeleme yapılabilir.

- Havalimanları ülkeye göre filtrelenebilmektedir.

- Countries alanında listeleme ekleme düzenleme ve silme yapılabilir.

- Search get route u Meilisearch kullanarak Airports tablosundaki kayıtları ve ilişkili ülkeleri tam metin aramasıyla arar

- Search post route u Kullanıcıların post yoluyla enlem ve boylam bilgilerini göndererek konumlarına en yakın 5 havalimanını listeler

- Auth, Countries, Airports alanlarında get route a {{URL}}/get/id gönderilirse o id gelir gönderilmezse tüm kayıtlar gelir

## Lisans

Bu proje [MIT](https://choosealicense.com/licenses/mit/) Lisansı ile lisanslanmıştır.
