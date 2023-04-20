<x-auistock::layout.layout :breadcrumb="$breadcrumb ?? ''" >

<v-container fluid>
    <div id="progress"   >

    </div>

    <v-btn
        small
        color="primary"
        dark
        onclick="setupFunction()"
    >
        Setup
    </v-btn>
</v-container>

@push('scripts')
<script>
    function setupFunction() {
        var parts = {
            part1: window.prefix + '/stock/part1',
            part2: window.prefix + '/stock/part2',
        };

        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        var progress         = document.querySelector('#progress');

        for (const [key, value] of Object.entries(parts)) {
            (async () => {
                const rawResponse = await fetch(value, {
                    method: 'POST',
                    headers: {
                        "Content-Type"    : "application/json",
                        "Accept"          : "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token"    : csrfToken
                    },
                    body: JSON.stringify({
                        // first_name           : first_name,              // first_name
                        // last_name            : last_name,               // last_name
                        // email                : email,                   // email
                        // password             : password,                // password
                        // password_confirmation: password_confirmation,   // password_confirmation
                    })
                });
                // Request Response
                const content = await rawResponse.json();
                // Check for errors
                if (content.errors) {
                    for (const [key, value] of Object.entries(content.errors)) {
                        console.log('error');
                    }
                } else {
                    // Add content to the terminal (PROGRESS BAR)
                    progress.innerHTML += `

                        <div role="alert" class="v-alert v-sheet theme--dark success"><div class="v-alert__wrapper"><span aria-hidden="true" class="v-icon notranslate v-alert__icon theme--dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" class="v-icon__svg"><path d="M12,2C17.52,2 22,6.48 22,12C22,17.52 17.52,22 12,22C6.48,22 2,17.52 2,12C2,6.48 6.48,2 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z"></path></svg></span><div class="v-alert__content">
                            ` + content.status +`
                        </div></div></div>
                    `;
                }
            })();
        }

        // console.log('mariojgt');
    }
</script>
@endpush
</x-auistock::layout.layout>

