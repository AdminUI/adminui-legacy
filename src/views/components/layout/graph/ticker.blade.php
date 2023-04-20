<div id="chiron"></div>
<div class="ticker-wrap">
    <div class="ticker">
        <!--js populates series of <div class="ticker-item">Stuff...</div> -->
    </div>
</div>

@push('css')
<style>
    html,
    body {
        margin: 0;
        padding: 0;
        padding-bottom: 5rem;
        box-sizing: border-box;
    }

    * {
        box-sizing: border-box;
    }

    @keyframes ticker {
        0% {
            transform: translate(0, 0);
            visibility: visible;
        }

        100% {
            transform: translate(-100%, 0);
        }
    }

    .ticker-wrap {
        position: fixed;
        bottom: 0;
        width: 100%;
        overflow: hidden;
        height: 4rem;
        background-color: rgba(0, 0, 0, 0.9);
        padding-left: 100%;
        box-sizing: content-box;
    }

    .ticker {
        display: inline-block;
        height: 4rem;
        line-height: 4rem;
        white-space: nowrap;
        padding-right: 100%;
        box-sizing: content-box;
        will-change: transform;
        /*   animation: 30s ticker linear infinite; */
        /*   animation-name:ticker;
  animation-duration: 30s;
  animation-iteration-count: infinite;
  animation-timing-function: linear; */
    }

    .ticker-item {
        display: inline-block;
        padding: 0 2rem;
        font-size: 2rem;
        color: white;
        font-family: Roboto, sans-serif;
    }
</style>
@endpush


@push('scripts')
<script>
    const csrfTokenTicker = "{{ csrf_token() }}";
        (async () => {
            const rawResponse = await fetch("{{ $apiRequest }}", {
                method: 'GET',
                headers: {
                    "Content-Type"    : "application/json",
                    "Accept"          : "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token"    : csrfTokenTicker
                }
            });
            const content = await rawResponse.json();
            // Check for errors
            if (content.errors) {
                for (const [key, value] of Object.entries(content.errors)) {
                    console.log(value);
                }
            } else {

                var snippets = [];
                // Make the world
                for (const [key, value] of Object.entries(content.rates.rates)) {
                    if (content.symbols.symbols[key].code == "GBP") {
                        snippets.push(`
                            <span class="ma-2 v-chip theme--light v-size--default red"><span class="v-chip__content"> ` + content.symbols.symbols[key].description + ` </span></span>

                            ` + content.symbols.symbols[key].code + `

                            <span class="ma-2 v-chip theme--light v-size--default red white--text"><span class="v-chip__content"> ` + value.toFixed(2) + ` </span></span>
                        `);
                    } else {
                        snippets.push(`
                            <span class="ma-2 v-chip theme--light v-size--default primary"><span class="v-chip__content"> ` + content.symbols.symbols[key].description + ` </span></span>

                            ` + content.symbols.symbols[key].code + `

                            <span class="ma-2 v-chip theme--light v-size--default green white--text"><span class="v-chip__content"> ` + value.toFixed(2) + ` </span></span>
                        `);
                    }
                }
                // Login to populate the ticker
                var snippetContainer = "";
                for (var i = 0; i < snippets.length; i++) {
                snippetContainer += '<div class="ticker-item">(';
                snippetContainer += snippets[i];
                snippetContainer += ' )&nbsp;&nbsp;&nbsp;';
                snippetContainer += '</div>';
                }
                //write tickers to page
                var chyron = document.querySelector(".ticker");
                chyron.innerHTML = snippetContainer;

                //get length in characters of all snippets
                var snipJoin = snippets.join();
                characterLength = snipJoin.length;

                //set length of animation in ms to length of all snippet characters
                //multiplied by multiplier (150)
                chyron.style.animation = "" + (characterLength * 10) + "ms ticker linear infinite";
                // console.log(chiron.innerHTML);
            }
        })();

</script>
@endpush
