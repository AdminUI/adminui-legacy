@if (isset($paginator) && $paginator->lastPage() > 1)

    {{-- Pagination --}}
    <div class="pa-4 v-sheet theme--light rounded">
        <div class="text-center" file="v-pagination/usage">
            <nav role="navigation" aria-label="Pagination Navigation">
                <ul class="v-pagination theme--light">
                    @php
                    // number of links each side
                    $interval = 3;
                    // Get page path without /page/x
                    $path     = Illuminate\Support\Str::before(url()->current(), '/'.$page);
                    $path = rtrim($path, '/');
                    // Previous Page
                    $previous = $paginator->currentPage() - 1;
                    // Next Page
                    $next     = $paginator->currentPage() + 1;

                    // Set minimum page to always be 1
                    $from = $paginator->currentPage() - $interval;
                    if($from < 1){
                        $from = 1;
                    }

                    // Set Maximun page number
                    $to = $paginator->currentPage() + $interval;
                    if($to > $paginator->lastPage()){
                        $to = $paginator->lastPage();
                    }
                    @endphp

                    <!-- first/previous -->
                    @if($paginator->currentPage() > 1)
                        <li>
                            <a class="v-pagination__item" href="{{ $path }}" aria-label="First">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <li>
                            <a class="v-pagination__item" href="{{ $path }}{{ $previous != 1 ? '/'.$previous : '' }}" aria-label="Previous">
                                <span aria-hidden="true">&lsaquo;</span>
                            </a>
                        </li>
                    @endif

                    <!-- links -->
                    @for($i = $from; $i <= $to; $i++)
                        <li class="{{ $paginator->currentPage() == $i ? 'active' : '' }}">
                            @if ($paginator->currentPage() != $i)
                                <a class="v-pagination__item" href="{{ $path }}{{ $i != 1 ? '/'.$i : '' }}">
                                    {{ $i }}
                                </a>
                            @else
                                <a class="v-pagination__item v-pagination__item--active
                                primary">
                                    {{ $i }}
                                </a>
                            @endif
                        </li>
                    @endfor

                    <!-- next/last -->
                    @if($paginator->currentPage() < $paginator->lastPage())
                        <li>
                            <a class="v-pagination__item" href="{{ $path }}/{{ $next }}" aria-label="Next">
                                <span aria-hidden="true">&rsaquo;</span>
                            </a>
                        </li>

                        <li>
                            <a class="v-pagination__item" href="{{ $path }}/{{ $paginator->lastpage() }}" aria-label="Last">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>

@endif

