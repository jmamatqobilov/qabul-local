<!DOCTYPE html>
<html style="width:705px;margin: 0 auto;border: 1px solid;">
<head>
    <meta HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8"/>
</head>
<body LANG="ru-RU" DIR="Ltr">
<table style="page-break-before: always">
    <tr Valign=TOP>
        <td width="238" style="border: none; padding: 0in">
            <p align=center style="margin-bottom: 0in"><b>O‘ZBEKISTON
                    RESPUBLIKASI AXBOROTLASHTIRISH VA TELEKOMMUNIKATSIYALAR SOHASIDA
                    NAZORAT BO‘YICHA DAVLAT INSPEKSIYASI</b></p>
            <p align=center><b>FARMOYISHI</b></p>
        </td>
        <td width="206" style="border: none; padding: 0in">
            <p align=center><IMG SRC="{{ asset('assets/img/gerb.png') }}" align=bOTTOM HEIGHT=108 bORDER=0></p>
        </td>
        <td width="238" style="border: none; padding: 0in">
            <p align=center><b>РАСПОРЯЖЕНИЕ
                </b><b>ГОСУДАРСТВЕННОЙ
                    ИНСПЕКЦИИ ПО КОНТРОЛЮ В СФЕРЕ
                    ИНФОРМАТИЗАЦИИ И ТЕЛЕКОММУНИКАЦИЙ
                    РЕСПУБЛИКИ УЗБЕКИСТАН</b></p>
        </td>
    </tr>
</table>

<p style="text-indent: 0.39in; margin-bottom: 0.11in">
    {{ $application->decree_format }}</p>
<p align=center style="text-indent: 0.39in;margin-bottom: 0.11in">
    <b>“{{ $application->owner->company_name }}” Mas’uliyati cheklangan jamiyatining qurilishi tugallangan aloqa ob’yektlarini foydalanishga qabul qilish komissiyasi tarkibida ishtirok etish to‘g‘risida</b>
</p>
<p style="text-indent: 0.39in; margin-bottom: 0.11in">
    “{{ $application->owner->company_name }}” Mas’uliyati cheklangan jamiyatining (Jamiyat)
    {{ $application->created_at }} sanada Qabul tizimi orqali yaratilgan
    {{ $application->id }} raqamli murojaatiga muvofiq qurilishi tugallangan aloqa ob’yektlarini foydalanishga qabul
    qilishda Jamiyat tarmog‘ida qurilayotgan aloqa ob’yektlari hujjatlarni o‘rganish hamda O‘zbekiston Respublikasi Axborotlashtirish va telekommunikasiyalar sohasida nazorat bo‘yicha davlat inspeksiyasi
    (O‘zkomnazorat) mutaxassislarining qabul qilish komissiyasida ishtirok etishini ta’minlash <b>maqsadida:</b></p>
<ol>
    <li><p>{{ $application->hududiy->name_uz }} hududiy inspeksiyasi boshlig‘i
            {{ $application->hududiy->director_fio }}:</p>
</ol>
<p style="text-indent: 0.39in; margin-bottom: 0.11in">Jamiyatning
    <a href="{{ route('file.get', $application->order->id) }}" target="_blank">buyrug‘iga</a> asosan qurilishi tugallangan aloqa ob’yektlarini
    foydalanishga qabul qilish komissiyasi tarkibida ishtirok etish uchun mutaxassis ajratsin;</p>
<ul>
    <li><p>qurilishi tugallangan aloqa ob’yektlarini ko‘rikdan o‘tkazish ma’lumotnomasini rasmiylashtirsin;</p>
    <li><p>o‘rganish jaryonida aniqlangan kamchiliklarni bartaraf etish to‘g‘risida Jamiyatga hulosa bersin va amalga oshirilgan ishlar bo‘yicha
            ma’lumotlar hamda qurilishi tugallangan aloqa ob’yektlariga tegishli bo‘lgan hujjatlar to‘plamini iloqa qilgan holda
            Ma’lumotlarni uzatish bo‘limiga ma’lumot taqdim etib borsin;</p>
    <li><p>aloqa ob’yektlarini amaldagi normativ hujjatlar va O‘zkomnazoratning 2019 yil 18 martdagi 39-son buyrug‘i bilan amalga kiritilgan
            “Qurilishi tugallangan telekommunikasiya ob’yektlarining hujjatlarinin qo‘rib chiqish va Komissiya tarkibida ishtirok
            etish to‘g‘risidagi Reglament” (Reglament) talablariga muvofiq amalga oshirsin.</p>
</ul>
<ol>
    <li><p>{{ $application->direction->name_uz }} bo‘limi boshlig‘i:</p>
</ol>
<ul>
    <li><p>joylardan olingan ma’lumotlar va axborotlar doimiy ravishda tahlil etib borilishini ta’minlasin;</p>
    <li><p>aloqa ob’yektlarini amaldagi normativ hujjatlar va Reglament talablariga muvofiq amalga oshirilishini nazoratga olsin.</p>
    <li><p><b>
                {{ $application->deadline_date_format }} sanasiga </b>qadar
            ob’yektlarni foydalanishga qabul qilish natijalari to‘g‘risida O‘zkomnazorat boshlig‘i o‘rinbosarlariga ma’lumot taqdim etilishini ta’minlasin.</p>
</ul>
<ol START=3>
    <li><p>Mazkur farmoyishning bajarilishini nazorat qilish boshliq o‘rinbosari O.Xolmuxamedov zimmasiga yuklatilsin.</p>
</ol>
<p align=center style="text-indent: 0.39in; margin-bottom: 0.11in"><b>Boshliq A.Xodjayev</b></p>
</body>
</html>
