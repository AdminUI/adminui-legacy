<v-row>
    <v-col sm="6">
        <v-card>
            <v-toolbar color="toolbar" class="text--white" dense flat>
                <div>Last 30 days Sales</div>
            </v-toolbar>
            <v-card-text class="pt-10">
                <canvas id="last30sales"></canvas>
                <v-progress-circular :size="70" :width="7" color="amber" indeterminate id="remove-last30sales">
                </v-progress-circular>
            </v-card-text>
        </v-card>
    </v-col>
    <v-col sm="6">
        <v-card>
            <v-toolbar color="toolbar" class="text--white" dense flat>
                <div>Last 12 Months Sales</div>
            </v-toolbar>
            <v-card-text class="pt-10">
                <canvas id="last12months"></canvas>
                <v-progress-circular :size="70" :width="7" color="red" indeterminate id="remove-last12months">
                </v-progress-circular>
            </v-card-text>
        </v-card>
    </v-col>
</v-row>
{{-- {{ dd($finalSalesFigure) }} --}}

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Need so crsf token don,t block us
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

    setTimeout(() => {
        //**************LAST 30 DAYS SALES BEGIN*******************************//
        $urlDataLast30Days = '{{ $apiEndPoint30Days }}';
        // Get the last 30 days of sales based in the api
        (async () => {
            const rawResponse = await fetch($urlDataLast30Days, {
                method: 'GET',
                headers: {
                    "Content-Type"    : "application/json",
                    "Accept"          : "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token"    : csrfToken
                }
            });
            const content      = await rawResponse.json();
            var   Figure30Days = content['data'];
            // Check for errors
            if (content.errors) {
                for (const [key, value] of Object.entries(content.errors)) {
                    console.log(value);
                }
            } else {

            var ctx = document.getElementById('last30sales');

            // Build the labels
            var LabelLast30Days                 = [];
            var Last30DaysColorBackground       = [];
            var Last30DaysSecondColorBackground = [];
            var Last30DaysHighestValue          = [];
            var Last30DaysSumValue              = [];

            // Loop the values and prepare them to the javascript canvas
            for (const [key, value] of Object.entries(Figure30Days)) {
                // Push the label
                LabelLast30Days.push(key);
                // Push the color
                Last30DaysColorBackground.push('rgba(255, 206, 86, 0.2)');
                Last30DaysSecondColorBackground.push('rgba(54, 162, 235, 0.2)');
                // Push the sum
                Last30DaysSumValue.push(value['sum']);
                Last30DaysHighestValue.push(value['highest']);
            }

            //yellow 'rgba(54, 162, 235, 0.2)',
            //blue 'rgba(255, 206, 86, 0.2)',
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: LabelLast30Days,
                    datasets: [
                        {
                            label: '# Total Day Sale',
                            data: Last30DaysSumValue,
                            backgroundColor: Last30DaysColorBackground,
                            borderWidth: 1
                        },
                        {
                            label: '# Highest Sale',
                            data: Last30DaysHighestValue,
                            backgroundColor: Last30DaysSecondColorBackground,
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Remove the loading
            var loading = document.querySelector('#remove-last30sales').remove();

            }
        })();
    }, 500);
    //**************LAST 30 DAYS SALES END*******************************//

    setTimeout(() => {
    /*** BEGIN LAST 12 MONTHS OF SALES ********/
        $apiEndPoint12Months = '{{ $apiEndPoint12Months }}';
        // Do the api request
        (async () => {
            const rawResponse = await fetch($apiEndPoint12Months, {
                method: 'GET',
                headers: {
                    "Content-Type"    : "application/json",
                    "Accept"          : "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token"    : csrfToken
                }
            });
            const content = await rawResponse.json();

            // Check for errors
            if (content.errors) {
                for (const [key, value] of Object.entries(content.errors)) {
                    console.log(value);
                }
            } else {
                // Build the labels
                var LabelLast12Mounts                 = [];
                var Last12MountsHighestValue          = [];
                var Last12MountsSumValue              = [];

                for (const [key, value] of Object.entries(content['data'])) {
                    LabelLast12Mounts.push(key);
                    Last12MountsHighestValue.push(value['highest'])
                    Last12MountsSumValue.push(value['sum'])
                }

                var ctx = document.getElementById('last12months').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line', // also try bar or other graph types

                    // The data for our dataset
                    data: {
                        labels: LabelLast12Mounts,
                        // Information about the dataset
                    datasets: [
                            {
                                label          : '# Month Sale',
                                backgroundColor: 'lightblue',
                                borderColor    : 'royalblue',
                                data           : Last12MountsSumValue,
                            },
                            {
                                label          : '# Highest Month Sale',
                                backgroundColor: 'coral',
                                borderColor    : 'red',
                                data           : Last12MountsHighestValue,
                            },
                        ]
                    },

                    // Configuration options
                    options: {
                    layout: {
                    padding: 10,
                    },
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Last 12 monts Sales'
                        },
                        scales: {
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Sales'
                                }
                            }],
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Month of the Year'
                                }
                            }]
                        }
                    }
                });
                // Remove the loading
                var loading = document.querySelector('#remove-last12months').remove();
            }
        })();
    /* END LAST 12 MONTHS OF SALES */

    }, 1000);

</script>

@endpush
