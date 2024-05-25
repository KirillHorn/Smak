<x-x-header />
<section class="section_product_nav">
    <div class="container d-flex flex-column gap-3">
        <div class="directory_nav">
            <a>О нас</a>
            <span>→</span>
            <a>Филиалы</a>
        </div>
        <div class="navigation d-flex flex-column gap-3">
            <div>
                <span>42 точки</span>
                <h2> Доставка еды в любой район</h2>
            </div>
            <div class="d-flex flex-column gap-4">
                <div class="d-flex flex-wrap gap-3  a_content_categories ">
                    <a href="{{ route('cafe', ['sort_order' => '0']) }}">Все районы</a>
                    @foreach ($area as $areas)
                    <a href="{{route ('cafe',['sort_order' => $areas->id ]) }}">{{$areas->title_area}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <section style="background-color: #fff; padding-bottom:40px;">
        <div class="d-flex container branch-container align-items-center justify-content-between flex-wrap">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6 d-flex slick-carousel w-100" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}' style="z-index:1;" >
                        <a onclick="updateAddress(`{{$branchs_first->street->title_street}},{{$branchs_first->location_detalis}}`)" class="restaurant-card card card-branch" id="branch">
                            <img src="/storage/img/{{$branchs_first->img}}" class="card-img-top" alt="Ресторан 1">
                            <div class="card-body">
                                <h5 class="card-title">{{$branchs_first->street->title_street}},{{$branchs_first->location_detalis}}</h5>
                                <p class="card-text">
                                    Пн - Чт: 11:45 - 23:00<br>
                                    Пт, Сб: 11:45 - 00:00<br>
                                    Вс: 11:45 - 23:00<br>
                                    Тел: {{$branchs_first->phone}}<br>
                                </p>
                            </div>
                        </a>
                        @foreach ($branchs as $branch)
                        <a onclick="updateAddress(`{{$branch->street->title_street}},{{$branch->location_detalis}}`)" class="restaurant-card card card-branch" id="branch">
                            <img src="/storage/img/{{$branch->img}}" class="card-img-top" alt="Ресторан 1">
                            <div class="card-body">
                                <h5 class="card-title">{{$branch->street->title_street}},{{$branch->location_detalis}}</h5>
                                <p class="card-text">
                                    Пн - Чт: 11:45 - 23:00<br>
                                    Пт, Сб: 11:45 - 00:00<br>
                                    Вс: 11:45 - 23:00<br>
                                    Тел: {{$branch->phone}}<br>
                                </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="map col-md-6">
                        <div class="map__container">
                            <div class="map__container_yamap" id="yamap"> </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <x-footer />
    <script type="text/javascript">
      $(document).ready(function(){
        
        $('.slick-carousel').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [ 
                {
                    breakpoint: 768, 
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
        document.addEventListener('DOMContentLoaded', () => {
            const initialAddress = `Уфа {{$branchs_first->street->title_street}},{{$branchs_first->location_detalis}}`;
            loadMap(initialAddress, '{{$branchs_first->street->title_street}}, {{$branchs_first->location_detalis}}');

            let map;

            window.updateAddress = function(address) {
                console.log('Адрес обновлен:', address);
                const fullAddress = `Уфа ${address}`;
                loadMap(fullAddress, address);
            };

            async function loadMap(address, displayAddress) {
                try {
                    const url = `https://geocode-maps.yandex.ru/1.x/?apikey=a99d831e-6248-429d-8ece-7c6b971f9050&geocode=${address}&format=json`;
                    const response = await fetch(url);
                    const data = await response.json();

                    const coordinates = data.response.GeoObjectCollection.featureMember[0].GeoObject.Point.pos.split(" ");
                    const latitude = parseFloat(coordinates[1]);
                    const longitude = parseFloat(coordinates[0]);

                    if (map) {
                        map.destroy();
                    }

                    initMap(longitude, latitude, displayAddress);
                } catch (error) {
                    console.error("Ошибка при получении или разборе данных:", error);
                }
            }

            async function initMap(longitude, latitude, displayAddress) {
                await ymaps3.ready;

                const {
                    YMap,
                    YMapDefaultSchemeLayer,
                    YMapDefaultFeaturesLayer
                } = ymaps3;

                const {
                    YMapDefaultMarker
                } = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');

                map = new YMap(document.getElementById('yamap'), {
                    location: {
                        center: [longitude, latitude],
                        zoom: 15
                    },
                    showScaleInCopyrights: true
                }, [
                    new YMapDefaultSchemeLayer({}),
                    new YMapDefaultFeaturesLayer({})
                ]);

                const marker = new YMapDefaultMarker({
                    coordinates: [longitude, latitude],
                    draggable: true,
                    popup: {
                        content: displayAddress,
                        position: 'right'
                    },
                    mapFollowsOnDrag: true
                });

                map.addChild(marker);
            }
        });









        //   function onResizeMap() {
        //     if (window.innerWidth <= 720) {
        //       map.setLocation({
        //         center: [55.95763677413744, 54.721993431428174],
        //         zoom: 18,
        //       });
        //     }
        //     if (window.innerWidth > 720) {
        //       map.setLocation({
        //         center: [55.956093418515174, 54.721436734286755],
        //         zoom: 18,
        //       });
        //     }
        //   }

        //   window.addEventListener("resize", onResizeMap);
        //   onResizeMap();
    </script>