<template>
    <div class="w-full min-h-screen bg-blue-50">
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold text-center mb-12">Все для животных рядом</h1>

            <div class="mb-4 flex justify-center" v-if="!locationPermissionGranted">
                <button @click="requestGeolocation" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Разрешить определение местоположения
                </button>
            </div>

            <div v-if="locationError" class="mb-4 text-red-500 text-center">
                {{ locationError }}
            </div>

            <div ref="data-table" id="map" class="w-full p-1 mt-3" style="height: 700px;"></div>
        </div>
    </div>
</template>

<script>
import { markRaw, nextTick, toRaw } from 'vue';
export default {
    name: 'ReasonsList',
    data() {
        return {
            map_obj: markRaw({
                myMap: markRaw({}),
                clusterer: markRaw({})
            }),
            locationPermissionGranted: false,
            locationError: null,
            userLocation: null,
            petPlaces: [
                {
                    type: 'shop',
                    name: 'Зоомагазин "Усатый-Полосатый"',
                    coordinates: [43.238453, 76.889709],
                    description: 'Большой выбор кормов и аксессуаров для животных',
                    icon: 'shop'
                },
                {
                    type: 'playground',
                    name: 'Площадка для выгула собак',
                    coordinates: [43.245678, 76.912345],
                    description: 'Огороженная площадка с тренажерами для собак',
                    icon: 'playground'
                },
                {
                    type: 'vet',
                    name: 'Ветеринарная клиника "ЗооДоктор"',
                    coordinates: [43.218765, 76.834567],
                    description: 'Круглосуточная ветеринарная помощь',
                    icon: 'vet'
                },
                {
                    type: 'grooming',
                    name: 'Груминг-салон "Пушистик"',
                    coordinates: [43.225678, 76.856789],
                    description: 'Стрижка, мытье и уход за шерстью питомцев',
                    icon: 'grooming'
                },
                {
                    type: 'park',
                    name: 'Парк для прогулок с животными',
                    coordinates: [43.208765, 76.878901],
                    description: 'Большая территория для прогулок с питомцами',
                    icon: 'park'
                }
            ]
        };
    },
    mounted() {
        this.checkGeolocationPermission();
    },
    methods: {
        checkGeolocationPermission() {
            if (navigator.geolocation) {
                navigator.permissions.query({ name: 'geolocation' }).then(permissionStatus => {
                    if (permissionStatus.state === 'granted') {
                        this.locationPermissionGranted = true;
                        this.getUserLocation();
                    } else {
                        this.locationPermissionGranted = false;
                        // Инициализируем карту с дефолтным центром
                        this.map();
                    }
                });
            } else {
                this.locationError = "Ваш браузер не поддерживает геолокацию";
                this.map();
            }
        },
        requestGeolocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    position => {
                        this.locationPermissionGranted = true;
                        this.userLocation = [position.coords.latitude, position.coords.longitude];
                    },
                    error => {
                        switch(error.code) {
                            case error.PERMISSION_DENIED:
                                this.locationError = "Доступ к определению местоположения отклонен пользователем";
                                break;
                            case error.POSITION_UNAVAILABLE:
                                this.locationError = "Информация о вашем местоположении недоступна";
                                break;
                            case error.TIMEOUT:
                                this.locationError = "Истекло время ожидания при определении местоположения";
                                break;
                            default:
                                this.locationError = "Произошла неизвестная ошибка при определении местоположения";
                                break;
                        }
                    }
                );
            } else {
                this.locationError = "Ваш браузер не поддерживает геолокацию";
            }
        },
        getUserLocation() {
            navigator.geolocation.getCurrentPosition(
                position => {
                    this.userLocation = [position.coords.latitude, position.coords.longitude];
                },
                error => {
                    console.error("Ошибка определения местоположения:", error);
                }
            );
        },
        map() {
            ymaps.ready(this.init);
        },
        init() {
            const mapCenter = this.userLocation || [43.2199387972459, 76.8524551391602];
            const zoom = this.userLocation ? 13 : 9;

            this.map_obj.myMap = new ymaps.Map('map', {
                center: mapCenter,
                zoom: zoom
            }, {searchControlProvider: 'yandex#search'});

            // Добавляем маркер пользователя, если есть геолокация
            if (this.userLocation) {
                const userPlacemark = new ymaps.Placemark(this.userLocation, {
                    balloonContentHeader: 'Вы здесь',
                    balloonContentBody: 'Ваше текущее местоположение',
                    hintContent: 'Вы здесь'
                }, {
                    preset: 'islands#blueCircleDotIcon'
                });
                this.map_obj.myMap.geoObjects.add(userPlacemark);
            }

            // Создаем кастомный макет для балуна
            const customItemContentLayout = ymaps.templateLayoutFactory.createClass(
                '<h3 class="ballon_header">{{ properties.balloonContentHeader|raw }}</h3>'
                + '<div class="ballon_body">{{ properties.balloonContentBody|raw }}</div>'
                + '<div class="ballon_footer">{{ properties.balloonContentFooter|raw }}</div>'
            );

            // Создаем кластеризатор
            this.map_obj.clusterer = new ymaps.Clusterer({
                clusterIconLayout: 'default#pieChart',
                clusterIconPieChartRadius: 26,
                clusterIconPieChartCoreRadius: 15,
                clusterIconPieChartStrokeWidth: 3,
                hasBalloon: true,
                clusterBalloonContentLayout: 'cluster#balloonAccordion',
                clusterBalloonItemContentLayout: customItemContentLayout
            });

            // Добавляем метки с местами для животных
            const placemarks = this.petPlaces.map(place => {
                // Определяем иконку в зависимости от типа места
                let iconPreset = 'islands#blueDotIcon';
                switch (place.type) {
                    case 'shop':
                        iconPreset = 'islands#greenShoppingIcon';
                        break;
                    case 'playground':
                        iconPreset = 'islands#yellowSportIcon';
                        break;
                    case 'vet':
                        iconPreset = 'islands#redMedicalIcon';
                        break;
                    case 'grooming':
                        iconPreset = 'islands#pinkBeautyIcon';
                        break;
                    case 'park':
                        iconPreset = 'islands#darkGreenParkIcon';
                        break;
                }

                return new ymaps.Placemark(place.coordinates, {
                    balloonContentHeader: place.name,
                    balloonContentBody: place.description,
                    hintContent: place.name
                }, {
                    preset: iconPreset
                });
            });

            // Добавляем метки в кластеризатор
            this.map_obj.clusterer.add(placemarks);
            this.map_obj.myMap.geoObjects.add(this.map_obj.clusterer);

        },
    }
};
</script>

<style scoped>
.break-words {
    word-wrap: break-word;
    word-break: break-word;
}

.ballon_header {
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 8px;
}

.ballon_body {
    margin-bottom: 5px;
}

.ballon_footer {
    font-size: 12px;
    color: #666;
}
</style>
