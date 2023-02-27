@extends('layouts.base')

@section('title', 'О нас')

@section('content')
<section class="intro pb-5 text-center">
    <div class="about_pic text-white">
        <h1>О нас</h1>
    </div>
    <div class="container mt-4 px-5">
        <p>
            Компания Travelling работает с 2002 года. Сейчас это крупная сеть туристических агентств,
            базирующаяся в Краснодаре. Все офисы Travelling работают по единому стандарту качества,
            с единой online базой туров.
        </p>
        <p>
            Миссия Travelling заключается в том, чтобы максимально способствовать созданию цивилизованного туристского рынка,
            где отношения в цепочке клиент — агент — оператор основаны на взаимном доверии и уважении.
            Конечная цель деятельности компании — сделать качественный отдых доступным для всех категорий населения страны.
            Мы дарим вам комфорт, скорость и целый мир новых возможностей.
            Мы делаем работу проще, а отдых — ярче!
        </p>
    </div>
</section>

<section class="promises lh-lg">
    <div class="d-flex promise">
        <img src="img/about_pics/hotels.jpg" class="promises_pics" alt="">
        <div class="p-5 align-middle">
            <h2 class="mb-4">Отели</h2>
            <p class="fs-5">С Travelling вы всегда найдете идеально подходящий вариант проживания. Огромное количество отелей, апартаментов и гостевых домов по всему миру гарантированно предоставляют места для наших туристов в любое время.</p>
        </div>
    </div>
    <div class="d-flex reverse">
        <div class="p-5 align-middle">
            <h2 class="mb-4">Актуальные направления</h2>
            <p class="fs-5">Travelling продолжает развиваться и открывать для туристов самые необычные направления, маршруты и типы отдыха.</p>
        </div>
        <img src="img/about_pics/destinations.jpg" class="promises_pics" alt="">
    </div>
    <div class="d-flex promise">
        <img src="img/about_pics/callcenter.webp" class="promises_pics" alt="">
        <div class="p-5 align-middle">
            <h2 class="mb-4">Круглосуточная поддержка</h2>
            <p class="fs-5">Специалисты собственных офисов Travelling в разных странах помогут с решением любых вопросов в путешествии — от встречи в аэропорту и проведения экскурсии до помощи при наступлении страхового случая, а сотрудники колл-центра обеспечат максимально оперативную поддержку туристов.</p>
        </div>
    </div>
</section>

<!-- <section class="stats container py-5">
    <div class="row d-flex flex-wrap">
        <div class="col lh-lg p-5">
            <h2 class="mb-5">Цели компании</h2>
            <p>
                Компания уделяет большое внимание клиентоориентированности и практикует в своей работе комплексный подход 
                к качеству. Это означает качество во всем, начиная с предлагаемого продукта и заканчивая работой сотрудников 
                всех подразделений Travelling. Благодаря этому визитной карточкой компании Travelling является неизменно 
                высочайшее качество предоставляемых услуг.
            </p>
        </div>
        <div class="col">
            <div class="row row-cols-2 gap-5 mb-5">
                <div class="col bg-dark w-25 h-25 px-5 py-4 text-center">
                    <h2 class="text-primary">11</h2>
                    <p class="text-white">лет работы</p>
                </div>
                <div class="col bg-dark w-25 h-25 px-5 py-4 text-center">
                    <h2 class="text-primary">51</h2>
                    <p class="text-white">возможная страна</p>
                </div>
            </div>
            <div class="row row-cols-2 gap-5">
                <div class="col bg-dark w-25 h-25 px-5 py-4 text-center">
                    <h2 class="text-primary">500</h2>
                    <p class="text-white">тысяч туристов</p>
                </div>
                <div class="col bg-dark w-25 h-25 px-5 py-4 text-center">
                    <h2 class="text-primary">15</h2>
                    <p class="text-white">тысяч партнёров</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="documents text-center py-5">
    <h2>Свидетельство о регистрации товарного знака</h2>
    <img src="img/about_pics/trademark_document.jpg" class="document mt-5" alt="">
</section>
@endsection