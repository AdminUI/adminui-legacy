<v-row>
    <v-col sm="6">
        <v-card>
            <v-toolbar color="toolbar" class="text--white" dense flat>
                <div>Last 30 days time Tracking</div>
            </v-toolbar>
            <v-card-text class="pt-10">
                <canvas id="timetrack"></canvas>
                {{-- <v-progress-circular :size="70" :width="7" color="amber" indeterminate id="remove-last30sales">
                </v-progress-circular> --}}
            </v-card-text>
        </v-card>
    </v-col>
    <v-col sm="6">
        <v-card>
            <v-toolbar color="toolbar" class="text--white" dense flat>
                <div>Last 30 days time Expense time tracking</div>
            </v-toolbar>
            <v-card-text class="pt-10">
                <canvas id="timetrackvalue"></canvas>
                {{-- <v-progress-circular :size="70" :width="7" color="amber" indeterminate id="remove-last30sales">
                </v-progress-circular> --}}
            </v-card-text>
        </v-card>
    </v-col>
</v-row>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    function fetchHarvest() {
        (async () => {
            const rawResponse = await fetch('/admin/harvest/graph', {
                method: 'GET',
                headers: {
                    "Content-Type"    : "application/json",
                    "Accept"          : "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token"    : "{{ csrf_token() }}"
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
                var LabelLast30Days                 = [];
                var Last30DaysColorBackground       = [];
                var Last30DaysSecondColorBackground = [];
                var Last30DaysHighestValue          = [];
                var Last30DaysSumValue              = [];

                // Loop the values and prepare them to the javascript canvas
                for (const [key, value] of Object.entries(content.finalTimeTrack)) {
                    // Push the label
                    LabelLast30Days.push(key);
                    // Push the color
                    Last30DaysColorBackground.push('rgba(255, 206, 86, 0.2)');
                    Last30DaysSecondColorBackground.push('rgba(54, 162, 235, 0.2)');
                    // Push the sum
                    Last30DaysSumValue.push(value['sum']);
                    Last30DaysHighestValue.push(value['highest']);
                }


                // Build the labels
                var LabelLast30DaysExpense                 = [];
                var Last30DaysColorBackgroundExpense       = [];
                var Last30DaysSecondColorBackgroundExpense = [];
                var Last30DaysHighestValueExpense          = [];
                var Last30DaysSumValueExpense              = [];

                // Loop the values and prepare them to the javascript canvas
                for (const [key, value] of Object.entries(content.finalValueTrack)) {
                    // Push the label
                    LabelLast30DaysExpense.push(key);
                    // Push the color
                    Last30DaysColorBackgroundExpense.push('orange');
                    Last30DaysSecondColorBackgroundExpense.push('black');
                    // Push the sum
                    Last30DaysSumValueExpense.push(value['sum']);
                    Last30DaysHighestValueExpense.push(value['highest']);
                }

                // Grahs times track start here
                var ctx = document.getElementById('timetrack');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                            labels: LabelLast30Days,
                            datasets: [
                                {
                                    label: '# Total Time Tracked',
                                    data: Last30DaysSumValue,
                                    backgroundColor: Last30DaysColorBackground,
                                    borderColor: Last30DaysSecondColorBackground,
                                    borderWidth: 1
                                },
                                {
                                    label: '# Highest value',
                                    data: Last30DaysHighestValue,
                                    backgroundColor: Last30DaysSecondColorBackground,
                                    borderColor: Last30DaysColorBackground,
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
                // Grah time tack end here

                // Grahs times track value start here
                var ctx = document.getElementById('timetrackvalue');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                            labels: LabelLast30Days,
                            datasets: [
                                {
                                    label: '# Total Expense',
                                    data: Last30DaysSumValueExpense,
                                    backgroundColor: Last30DaysColorBackgroundExpense,
                                    borderColor: Last30DaysSecondColorBackgroundExpense,
                                    borderWidth: 1
                                },
                                {
                                    label: '# Highest Expense',
                                    data: Last30DaysHighestValueExpense,
                                    backgroundColor: Last30DaysSecondColorBackgroundExpense,
                                    borderColor: Last30DaysColorBackgroundExpense,
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
                // Grah time tack value end here

            }
        })();
    }

    this.fetchHarvest();
</script>
@endpush
