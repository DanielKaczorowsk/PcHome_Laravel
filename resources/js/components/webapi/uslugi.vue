<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col order-0 p-4">
                <h3>Naprawa Laptopów</h3>
                <a>Oczyszczamy naprawiamy wymieniamy pastę termoprzewodzącą także matrycę
                wyczyścimy z jakich kolwiek wirusów, formatujemy i optymalizujemy przyspieszamy działanie
                laptopa.</a>
            </div>
            <div class="col order-1 p-4">
                <img :src="laptop">
            </div>
            <div class="col order-3 p-4 text-end">
                <h3>Naprawa Smartfonów</h3>
                <a>Wymieniamy wyświetlacz wyczyścimy po zalaniu, oczyścimy wejście micro usb i jacka, jeżeli
                posiadasz akt zakupu to pomożemy pozbyć się bypassa wymienimy rom i zaktualizujemy system.</a>
            </div>
            <div class="col order-2 p-4">
                <img :src="iphone">
            </div>
            <div class="col order-4 p-4">
                <h3>Naprawa Konsol</h3>
                Wyczyścimy z kurzu wraz z zmianą pasty termoprzewodzącej najwyższej jakości pomożemy w klonowaniu
                dysku przy zmianie na ssd przywrócimy dane gry, oczyścimy też wymienimy porty kosnoli.
            </div>
            <div class="col order-5 p-4">
                <img :src="konsola">
            </div>
        </div>
        </div>
</template>
<script>
    import laptop from '/resources/images/laptop.jpg';
    import iphone from '/resources/images/iphone.jpg';
    import konsola from '/resources/images/konsola.jpg';
    export default {
        data() {
            return {
                konsola: [konsola],
                laptop: [laptop],
                iphone: [iphone]

            }
        }
    }
</script>
