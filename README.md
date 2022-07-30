# Lazy Loading vs Eager Loading

- Loading işlemi, veriyi veritabanından çekerken yüklemek için kullanılır.
- Lazy Loading, sayfada yer alan bir ögenin ihtiyaç duyulmadığı takdirde çağrılmaması prensibi ile çalışır.
- Lazy Loading’in tam tersi yönde çalışır. Kullanacağımız nesneleri, nesnenin ihtiyaç anından çok önce yaratır ve bekletir.
- İkisi arasındaki fark bulunduğu duruma göre performans farkıdır.
- Lazy loading ve Eager loading arasındaki çalışma hızı farkını değerlendirecek olursak, lazy loadingin tekrar tekrar database’e bağlanması sebebiyle hızı kayıt sayısı arttıkça eager loadingin üzerine çıkıyor.

## REST API

- 'Week 6.postman_collection.json' adındaki dosyadan postman koleksiyonuna ulaşabilirsiniz.
