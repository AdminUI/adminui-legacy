<v-container fluid>
    <v-row>
        <v-col sm="8">
            <h1>{{ $title }}</h1>
        </v-col>
        <v-col sm="4" class="text-right">
            {{ $button ?? '' }}
        </v-col>
    </v-row>

    {{ $slot }}
</v-container>