@include('header')

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1>Welcome!!</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Generation Time (ms)</th>
                            <th>UTC Offset (seconds)</th>
                            <th>Timezone</th>
                            <th>Elevation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $weatherData['latitude'] }}</td>
                            <td>{{ $weatherData['longitude'] }}</td>
                            <td>{{ $weatherData['generationtime_ms'] }}</td>
                            <td>{{ $weatherData['utc_offset_seconds'] }}</td>
                            <td>{{ $weatherData['timezone'] }}</td>
                            <td>{{ $weatherData['elevation'] }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="table-responsive" style="height: 500px;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Temperature</th>
                            <th>Relative Humidity</th>
                            <th>Wind Speed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weatherData['hourly']['time'] as $index => $dateTime)
                        @php
                        $dateTimeParts = explode('T', $dateTime);
                        $date = $dateTimeParts[0];
                        $time = $dateTimeParts[1];
                        @endphp
                        <tr>
                            <td>{{ $date }}</td>
                            <td>{{ $time }}</td>
                            <td>{{ $weatherData['hourly']['temperature_2m'][$index] }}</td>
                            <td>{{ $weatherData['hourly']['relativehumidity_2m'][$index] }}</td>
                            <td>{{ $weatherData['hourly']['windspeed_10m'][$index] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>