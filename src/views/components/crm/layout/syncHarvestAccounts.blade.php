<v-card elevation="2" color="{{ $color ?? 'blue' }} lighten-2" rounded class="pa-4 white--text">
    <v-row>
        <v-col cols="2" class="text-center">
            <a href="{{ $link ?? '#' }}">
                <div data-v-9b42d352="" class="text-center col col-2"><span data-v-9b42d352="" aria-hidden="true"
                        class="v-icon notranslate mr-2 theme--light white--text"
                        style="font-size: 70px; height: 70px; width: 70px;"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" role="img" aria-hidden="true" class="v-icon__svg"
                            style="font-size: 70px; height: 70px; width: 70px;">
                            <path
                                d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z">
                            </path>
                        </svg></span></div>
            </a>
        </v-col>
        <v-col cols="10" class="text-right">
            <div class="text-md"> {{ $title ?? 'Please add a title' }} </div>
            <br>
            <div style="display: black" id="button-container">
                <v-btn depressed color="primary" onclick="apiSyncUsers()">
                    Sync
                </v-btn>
            </div>
            <div style="display: none" id="loader-container">
                <v-progress-circular :size="70" :width="7" color="primary" indeterminate></v-progress-circular>
            </div>
        </v-col>
    </v-row>
</v-card>

@push('scripts')
<script>
    function apiSyncUsers() {
            // Ref to the containers
            var buttonContainer               = document.getElementById('button-container');
            var loaderContainer               = document.getElementById('loader-container');
            // Loadin state
            buttonContainer.style.display = "none";
            loaderContainer.style.display = "block";

            (async () => {
                const rawResponse = await fetch('/admin/sync/harvest/accounts', {
                    method: 'POST',
                    headers: {
                        "Content-Type"    : "application/json",
                        "Accept"          : "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token"    : '{{ csrf_token() }}'
                    }
                });
                const content = await rawResponse.json();

                // Check for errors
                if (content.errors) {
                    for (const [key, value] of Object.entries(content.errors)) {
                        console.log(value);
                    }
                } else {
                    window.$app.vue.$store.commit("activateSnackbar", {
                    title  : "",
                    type   : "success",
                    message: content.message
                    });
                }
                // Remove the loading state
                buttonContainer.style.display = "block";
                loaderContainer.style.display = "none";
            })();

        }

</script>
@endpush
