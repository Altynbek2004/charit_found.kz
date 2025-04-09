// ReasonsList.vue
<template>
    <div class="w-full min-h-screen bg-blue-50">
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold text-center mb-12">Все для животных рядом</h1>

            <div ref="data-table" id="map" class=" w-370 p-1 mt-3" style="height: 700px;"></div>

        </div>
    </div>
</template>

<script>
import {markRaw, nextTick, toRaw} from 'vue';
export default {
    name: 'ReasonsList',
    data() {
        return {
            map_obj: markRaw({
                myMap: markRaw({}),
                clusterer: markRaw({})
            }),
        };
    },
    mounted() {
        this.map();
    },
    methods:{
        map() {
            ymaps.ready(this.init);
        },
        init() {
            this.map_obj.myMap = new ymaps.Map('map', {
                center: [43.2199387972459, 76.8524551391602],
                zoom: 9
            }, {searchControlProvider: 'yandex#search'});
            const customItemContentLayout = ymaps.templateLayoutFactory.createClass(
                // Флаг "raw" означает, что данные вставляют "как есть" без экранирования html.
                '<h3 class=ballon_header>{{ properties.balloonContentHeader|raw }}</h3>'
                + '<div class=ballon_body>{{ properties.balloonContentBody|raw }}</div>'
                + '<div class=ballon_footer>{{ properties.balloonContentFooter|raw }}</div>'
            );

            this.map_obj.clusterer = new ymaps.Clusterer({
                // Макет метки кластера pieChart.
                clusterIconLayout: 'default#pieChart',
                // Радиус диаграммы в пикселях.
                clusterIconPieChartRadius: 26,
                // Радиус центральной части макета.
                clusterIconPieChartCoreRadius: 15,
                // Ширина линий-разделителей секторов и внешней обводки диаграммы.
                clusterIconPieChartStrokeWidth: 3,
                // Определяет наличие поля balloon.
                hasBalloon: true,
                clusterBalloonContentLayout: 'cluster#balloonAccordion',
                clusterBalloonItemContentLayout: customItemContentLayout
            });
            this.map_obj.myMap.geoObjects.add(this.map_obj.clusterer);
            this.getTechnicsCoordinatesBorders();
        },
        getTechnicsCoordinatesBorders() {
           /* axios.get('/map/get-technics').then(response => {
                const data = response.data;

                for (let i = 0; i < data.length; i++) {
                    const myGeoObject = new ymaps.GeoObject({
                        // Описываем геометрию геообъекта.
                        geometry: {
                            // Тип геометрии - "Многоугольник".
                            type: 'Polygon',
                            // Указываем координаты вершин многоугольника.
                            coordinates: [
                                // Координаты вершин внешнего контура.
                                data[i].coordinates
                            ]
                        },
                        // Описываем свойства геообъекта.
                        properties: {
                            // Содержимое балуна.
                            balloonContent: data[i].technic
                        }
                    }, {
                        // Описываем опции геообъекта.
                        // Цвет заливки.
                        fillColor: data[i].color,
                        // Цвет обводки.
                        strokeColor: data[i].colors,
                        // Общая прозрачность (как для заливки, так и для обводки).
                        opacity: 0.3,
                        // Ширина обводки.
                        strokeWidth: 5
                    });
                    // Добавляем геообъект в массив
                    this.technicBorders.push(myGeoObject);

                    // Если границы должны быть отображены, добавляем их на карту
                    if (this.showBorders === true) {
                        this.map_obj.myMap.geoObjects.add(myGeoObject);
                    }
                }
            });*/
        },
    }
};
</script>

<style scoped>
.break-words {
    word-wrap: break-word;
    word-break: break-word;
}
</style>
