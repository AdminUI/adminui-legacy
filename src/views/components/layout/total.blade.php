<v-card elevation="2" color="{{ $color ?? 'red' }} lighten-2" rounded class="pa-4 white--text">
    <v-row>
        <v-col cols="2" class="text-center">
            <a href="{{ $link ?? '#' }}" class="no-decoration">
                <v-icon color="white" style="font-size:70px;">{{ $icon ?? 'mdi-account-group' }}</v-icon>
            </a>
        </v-col>
        <v-col cols="10" class="text-right">
            <h2 class="font-weight-medium">
                {{ number_format($value) ?? 'Please add a value' }}
            </h2>
            <div class="text-md"> {{ $title ?? 'Please add a title' }} </div>
        </v-col>
    </v-row>
</v-card>
