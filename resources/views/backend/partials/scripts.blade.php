<script src="{{ mix('js/backend.js') }}"></script>
{{--<script src="{{ mix('js/tinymce.min.js') }}"></script>--}}
<script src="{{ mix('js/backend-custom.js') }}"></script>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
{{--<script async defer--}}
        {{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPikBMC5E8Sf3ZhVLJozF_-dXc9dDgCRw&callback=initMap">--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
    {{--function initialize() {--}}
        {{--geocoder = new google.maps.Geocoder();--}}
        {{--var latlng = new google.maps.LatLng(-34.397, 150.644);--}}
        {{--var mapOptions = {--}}
            {{--zoom: 8,--}}
            {{--center: latlng--}}
        {{--}--}}
        {{--map = new google.maps.Map(document.getElementById('map'), mapOptions);--}}
    {{--}--}}

    {{--function codeAddress() {--}}
        {{--var address = document.getElementById('address').value;--}}
        {{--geocoder.geocode({'address': address}, function(results, status) {--}}
            {{--if (status == 'OK') {--}}
                {{--map.setCenter(results[0].geometry.location);--}}
                {{--var marker = new google.maps.Marker({--}}
                    {{--map: map,--}}
                    {{--position: results[0].geometry.location--}}
                {{--});--}}
            {{--} else {--}}
                {{--alert('Geocode was not successful for the following reason: ' + status);--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
{{--</script>--}}
