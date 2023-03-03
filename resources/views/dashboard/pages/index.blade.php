@extends('dashboard.layout')
@section('head')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.2.5/build/vanilla-calendar.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.2.5/build/vanilla-calendar.min.js">
    </script>

    <style>
        .vanilla-calendar {
            width: 100%;
            height: 250px;
        }
    </style>
@endsection
@section('script')
    <script>
        Highcharts.chart('surveypermonth', {
            chart: {
                type: 'column',
                height: 300
            },
            title: {
                text: "Survey pada {{ date('Y') }}"
            },
            credits: {
                enabled: false
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    // style: {
                    //     fontSize: '13px',
                    //     fontFamily: 'Verdana, sans-serif'
                    // }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Survey'
                },
                allowDecimals: false
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Jumlah survey: <b>{point.y}</b>'
            },
            series: [{
                name: 'Survey',
                data: @php echo json_encode($barchart_surveypermonth) @endphp,
                dataLabels: {
                    enabled: true,
                    // rotation: -90,
                    color: '#FFFFFF',
                    align: 'center',
                    format: '{point.y}', // one decimal
                    y: 0, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
        Highcharts.chart('surveyresulttotal', {
            chart: {
                type: 'column',
                height: 300
            },
            title: {
                text: "Kepuasan Pengguna"
            },
            subtitle: {
                text: "Kepuasan pengguna terhadap aplikasi di PERURI pada {{ date('Y') }}"
            },
            credits: {
                enabled: false
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    // style: {
                    //     fontSize: '13px',
                    //     fontFamily: 'Verdana, sans-serif'
                    // }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                },
                allowDecimals: false
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Nilai: <b>{point.y}</b>'
            },
            series: [{
                name: 'Survey',
                data: @php echo json_encode($barchart_surveyresulttotal) @endphp,
                dataLabels: {
                    enabled: true,
                    // rotation: -90,
                    color: '#FFFFFF',
                    align: 'center',
                    format: '{point.y}', // one decimal
                    y: 0, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const calendarPopups = new VanillaCalendar('#pir_calendar', {
                settings: {
                    selection: {
                        day: false,
                        month: true,
                        year: true
                    },
                    selected: {
                        dates: <?= json_encode(array_keys($thedates)) ?>,
                    },
                },
                popups: <?= json_encode($thedates) ?>,
            });
            calendarPopups.init();
        });
    </script>
@endsection
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Dashboard</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item active">

                            Dashboard

                        </li>

                    </ol>

                </div>
            </div>


        </div>
    </div>

    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Overview</div>
            </div>
            <div class="row card-group-row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="surveypermonth"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div id="pir_calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row card-group-row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="surveyresulttotal"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text">Jadwal PIR</div>
            </div>
            <div class="row card-group-row">
                <div class="col-8">
                    <div class="card table-responsive">
                        <table class="table table-flush table-nowrap">
                            <thead>
                                <tr>
                                    <th>Aplikasi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($batches as $item)
                                    <tr>
                                        <td>{{ $item->application->name }}</td>
                                        <td>{{ date('d M Y', strtotime($item->startdate)) }} s/d
                                            {{ date('d M Y', strtotime($item->enddate)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
