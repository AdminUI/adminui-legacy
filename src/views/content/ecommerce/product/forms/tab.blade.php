<x-aui::layout.card>
    <v-tabs vertical>
        <v-tab class="justify-start">
            {{ __('Details') }}
        </v-tab>
        <v-tab class="justify-start">
            {{ __('SEO') }}
        </v-tab>
        {{-- Child Product --}}
        @if (empty($data->parent_id))
            <v-tab class="justify-start">
                {{ __('Categories') }}
            </v-tab>
        @endif
        <v-tab class="justify-start">
            {{ __('Appearance') }}
        </v-tab>
        <v-tab class="justify-start">
            {{ __('Description') }}
        </v-tab>
        <v-tab class="justify-start">
            {{ __('Specifications') }}
        </v-tab>
        <v-tab class="justify-start">
            {{ __('Pricing') }}
        </v-tab>
        {{--  --}}
        <v-tab class="justify-start">
            {{ __('Stock') }}
        </v-tab>
        {{-- Child Product --}}
        @if (empty($data->parent_id))
            <v-tab class="justify-start">
                {{ __('Child Products') }}
            </v-tab>
        @else
            <v-tab class="justify-start">
                {{ __('Variants') }}
            </v-tab>
        @endif

        <v-tab class="justify-start">
            {{ __('Images') }}
        </v-tab>
        {{-- Child Product --}}
        @if (empty($data->parent_id))
            <v-tab class="justify-start">
                {{ __('Documents') }}
            </v-tab>
            <v-tab class="justify-start">
                {{ __('Logos') }}
            </v-tab>
            <v-tab class="justify-start">
                {{ __('Addon Products') }}
            </v-tab>
            <v-tab class="justify-start">
                {{ __('Recommended Products') }}
            </v-tab>
            <v-tab class="justify-start mb-16">
                {{ __('Alternative Products') }}
            </v-tab>
        @endif

        <v-tab-item eager>
            <v-card flat>
                <v-card-title>Product Details</v-card-title>
                <v-card-text>
                    @include('aui::content.ecommerce.product.forms.details')
                </v-card-text>
            </v-card>
        </v-tab-item>

        {{-- Seo --}}
        <v-tab-item eager>
            <v-card flat>
                <v-card-title>SEO</v-card-title>
                <v-card-text>
                    <x-aui::seo.seo-fields :data="$data->seo" />
                </v-card-text>
            </v-card>
        </v-tab-item>

        {{-- Categories --}}
        {{-- Parent Product --}}
        @if (empty($data->parent_id))
            <v-tab-item eager>
                <v-card flat>
                    <v-card-title>Categories</v-card-title>
                    <v-card-text>
                        @include('aui::content.ecommerce.product.forms.category')
                    </v-card-text>
                </v-card>
            </v-tab-item>
        @endif

        {{-- Appearance --}}
        <v-tab-item eager>
            <v-card flat>
                <v-card-title>Appearance</v-card-title>
                <v-card-text>
                    @include('aui::content.ecommerce.product.forms.appearance')
                </v-card-text>
            </v-card>
        </v-tab-item>

        {{-- Description --}}
        <v-tab-item eager>
            <v-card flat>
                <v-card-title>Product Descriptions</v-card-title>
                <v-card-text>
                    @include('aui::content.ecommerce.product.forms.description')
                </v-card-text>
            </v-card>
        </v-tab-item>

        {{-- Specs --}}
        <v-tab-item eager>
            <v-card flat>
                <v-card-title>Product Specifications</v-card-title>
                <v-card-text>
                    @include('aui::content.ecommerce.product.forms.specs')
                </v-card-text>
            </v-card>
        </v-tab-item>

        {{-- Pricing --}}
        <v-tab-item eager>
            <v-card flat>
                <v-card-title>Product Pricing</v-card-title>
                <v-card-text>
                    @include('aui::content.ecommerce.product.forms.pricing')
                </v-card-text>
            </v-card>
        </v-tab-item>

        {{-- Stock --}}
        <v-tab-item eager>
            <v-card flat>
                <v-card-title>Product Stock</v-card-title>
                <v-card-text>
                    @include('aui::content.ecommerce.product.forms.stock')
                </v-card-text>
            </v-card>
        </v-tab-item>

        {{-- Child Product --}}
        @if (empty($data->parent_id))
            <v-tab-item eager>
                <v-card flat>
                    <v-card-title>Child Products</v-card-title>
                    <v-card-text>
                        @include('aui::content.ecommerce.product.forms.children')
                    </v-card-text>
                </v-card>
            </v-tab-item>
        @else
            <v-tab-item eager>
                <v-card flat>
                    <v-card-title>Product Variants</v-card-title>
                    <v-card-text>
                        @include('aui::content.ecommerce.product.forms.variants')
                    </v-card-text>
                </v-card>
            </v-tab-item>
        @endif

        {{-- Images --}}
        <v-tab-item eager>
            <v-card flat>
                <v-card-title>Product Images</v-card-title>
                <v-card-text>
                    @include('aui::content.ecommerce.product.forms.images')
                </v-card-text>
            </v-card>
        </v-tab-item>

        {{-- Documents --}}
        {{-- Child Product --}}
        @if (empty($data->parent_id))
            <v-tab-item eager>
                <v-card flat>
                    <v-card-title>Product Documents</v-card-title>
                    <v-card-text>
                        @include('aui::content.ecommerce.product.forms.documents')
                    </v-card-text>
                </v-card>
            </v-tab-item>

            {{-- Logo --}}
            <v-tab-item eager>
                <v-card flat>
                    <v-card-title>Product Logos</v-card-title>
                    <v-card-text>
                        @include('aui::content.ecommerce.product.forms.logo')
                    </v-card-text>
                </v-card>
            </v-tab-item>

            {{-- Addons --}}

            <v-tab-item eager>
                <v-card flat>
                    <v-card-title>Product Addons</v-card-title>
                    <v-card-text>
                        <ecommerce-addons-repeater productid="{{ $data->id }}"> </ecommerce-addons-repeater>
                    </v-card-text>
                </v-card>
            </v-tab-item>

            {{-- Recommended Products --}}


            <v-tab-item eager>
                <v-card flat>
                    <v-card-title>Recommended Products</v-card-title>
                    <v-card-text>
                        <ecommerce-recommended productid="{{ $data->id }}"> </ecommerce-recommended>
                    </v-card-text>
                </v-card>
            </v-tab-item>

            {{-- Alternative Products --}}


            <v-tab-item eager>
                <v-card flat>
                    <v-card-title>Alternative Products</v-card-title>
                    <v-card-text>
                        <ecommerce-alternatives productid="{{ $data->id }}"> </ecommerce-alternatives>
                    </v-card-text>
                </v-card>
            </v-tab-item>
    </v-tabs>
    @endif
</x-aui::layout.card>
