<div class="{{ $slides->container_size ?? 'container-fluid' }} slide-container px-0" id="{{ $element }}"
    style="--slide-count: {{ count($slides->slides) }}">
    @if ($hidearrows !== true)
        <button class="slider-navigation-button slider-prev"><span>&lsaquo;</span></button>
    @endif
    <ul class="slider-projector row no-gutters">
        @if ($slides->slides[0])
            <li class="px-0 slide-element">
                @if ($slides->slides[0]->link != '')
                    <a href="{{ $slides->slides[0]->link }}">
                @endif

                {{-- slide itself --}}
                <div class="slider-image-content" style="background-image: url({!! $slides->slides[0]->mediaLink() !!});">
                    <div class="slider-html-content {{ $slides->slides[0]->class }}">
                        {!! $slides->slides[0]->content !!}
                    </div>
                </div>
                {{-- end slide --}}

                @if ($slides->slides[0]->link != '')
                    </a>
                @endif
            </li>
        @endif
    </ul>
    @if ($hidearrows !== true)
        <button class="slider-navigation-button slider-next"><span>&rsaquo;</span></button>
    @endif
</div>

@once
    @push('css')
        <style>
            .slide-container {
                max-width: 100%;
                height: var(--slider-height, 90vh);
                position: relative;
            }

            .slider-no-overlay .slider-projector {
                margin: 0 100px !important;
                width: calc(100% - 200px);
            }

            .slider-image-content {
                background-repeat: no-repeat;
                background-position: center;
                background-size: var(--slide-background-size, cover);
                position: relative;
                height: 100%;
            }

            .slider-html-content {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }

            .slider-projector {
                display: flex;
                flex-flow: row;
                flex-wrap: nowrap;
                width: 100%;
                height: 100%;
                position: relative;
                overflow: hidden;
            }

            .slide-element {
                position: absolute;
                top: 0;
                left: 0;
                width: calc(100% / var(--concurrent-slides, 1));
                height: 100%;
            }

            .slider-delimiter-container {
                background-color: rgba(0, 0, 0, 0.3);
                padding: 10px 0;
                position: absolute;
                bottom: 0;
                display: flex;
                flex-flow: row;
                flex-wrap: nowrap;
                justify-content: center;
                gap: 10px;
                width: 100%;
            }

            .slider-delimiter {
                cursor: pointer;
                position: relative;
                width: 35px;
                height: 35px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0);
                transition: background-color 150ms ease-in-out;
            }

            .slider-delimiter.active {
                background-color: rgba(255, 255, 255, 0.18);
            }

            .slider-delimiter::after {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgba(255, 255, 255, 0.5);
                transition: background-color 150ms ease-in-out;
                width: 20px;
                height: 20px;
                border-radius: 50%;
            }

            .slider-delimiter:hover::after {
                background-color: rgba(255, 255, 255, 1);
            }

            .slider-navigation-button {
                position: absolute;
                top: 50%;
                transform: translateY(-50%) scaleY(1.5);
                font-size: 100px;
                z-index: 9;
                cursor: pointer;
                padding: 8px;
                color: #999;
                mix-blend-mode: difference;
            }

            .slider-navigation-button::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: currentColor;
                opacity: 0;
                transition: opacity 150ms ease-in-out;
            }

            .slider-navigation-button span {
                opacity: 0.7;
                line-height: 1;
                margin-top: -0.17em;
            }

            .slider-navigation-button:hover::before {
                opacity: 0.5;
            }

            .slider-prev {
                left: 25px;
            }

            .slider-next {
                right: 25px;
            }

            .slide-prev-enter-active,
            .slide-next-enter-active,
            .slide-prev-leave-active,
            .slide-next-leave-active {
                transition: transform 1000ms ease-in-out;
            }

            .slide-prev-enter-from,
            .slide-next-leave-to {
                transform: translate3d(-100%, 0, 0);
            }

            .slide-prev-leave-to,
            .slide-next-enter-from {
                transform: translate3d(100%, 0, 0);
            }

        </style>
    @endpush
@endonce

@once
    @push('js')
        <script>
            /** Class representing a slider */
            class Slider {
                /**
                 * Create a slider instance
                 * @param {object}  config                - Single object configuration
                 * @param {boolean} config.autoplay       - Cycle slides automatically without user interaction
                 * @param {boolean} config.hideArrows     - Remove the navigation arrows from the sides of the slider
                 * @param {boolean} config.hideDelimiters - Remove the navigation delimiters from the bottom of the slider
                 * @param {number}  config.interval       - In autoplay, the time (in ms) between transitions
                 * @param {boolean} config.overlayArrows  - Overlay navigation arrows onto the slides
                 * @param {boolean} config.preload        - Preload any slide images as soon as the slider is created
                 * @param {string}  config.selector       - The HTML selector of the slider container
                 * @param {array}   config.slides         - The content to be displayed in the slider. Requires 'content', 'mediaLink' and an optional 'link' property
                 * @param {string}  config.transition     - The name of the transition. Used to create animation classes, i.e. 'slide-next-enter-active'
                 */
                constructor({
                    autoplay = true,
                    hideArrows = false,
                    hideDelimiters = true,
                    interval = 5000,
                    overlayArrows = true,
                    preload = true,
                    selector,
                    slides = [],
                    transition = 'slide'
                }) {
                    this.selector = selector;
                    this.transition = transition;
                    this.slides = slides;

                    /** The current slide being displayed in the slider */
                    this.current = 0;
                    /** Total number of sliders contained in the slider */
                    this.total = this.slides.length;
                    /** The slide which is being loaded */
                    this.incoming = null;
                    /** The slide which is being removed */
                    this.outgoing = null;
                    /** The compound string used to create animation classes based on 'transition' and direction, i.e. 'fade-next' */
                    this.prepend = null;
                    /** Whether there is a slide transition in progress  */
                    this.loading = false;

                    this.options = {
                        autoplay,
                        hideArrows,
                        hideDelimiters,
                        interval,
                        overlayArrows,
                        preload,
                    }

                    this.registerElements();
                    if (this.options.hideDelimiters === false) this.drawDelimiters();
                    this.registerEventListeners();

                    if (preload) this.preloadImages();
                    if (autoplay) this.initAutoplay();
                }

                /**
                 * Save HTML elements used in the slider to the instance
                 */
                registerElements() {
                    this.el = {};
                    this.el.container = document.querySelector(this.selector);
                    this.el.projector = this.el.container.querySelector('.slider-projector');

                    if (this.options.overlayArrows === false) this.el.container.classList.add('slider-no-overlay')
                }

                /**
                 * Load any images used in the slider before their respective slides are navigated to
                 */
                preloadImages() {
                    this.slides.forEach((slide, index) => {
                        if (index === 0) return true;
                        const image = new Image();
                        image.src = slide.mediaLink;
                    })
                }

                /**
                 * Start cycling the slides automatically
                 */
                initAutoplay() {
                    // If there's already an interval running, abort
                    if (this.intervalCb) return false;

                    this.intervalCb = setInterval(() => {
                        // If there's a transition in progress, abort
                        if (this.loading === true) return false;
                        // Lock the slider
                        this.loading = true;
                        // Set the index of the slide to be transitioned to
                        this.current = this.getTargetIndex('next');
                        this.loadSlide('next');
                    }, this.options.interval);
                }

                /**
                 * Create the bottom navigation delimiters for the slider
                 */
                drawDelimiters() {
                    this.el.delimiters = document.createElement('nav');
                    this.el.delimiters.classList.add('slider-delimiter-container');

                    // Add the HTML element containing the delimiters to the DOM
                    this.el.container.appendChild(this.el.delimiters);

                    for (let i = 0; i < this.total; i++) {
                        const dot = document.createElement('button');
                        dot.classList.add('slider-delimiter');
                        if (i === 0) dot.classList.add('active');
                        dot.setAttribute('data-id', i);
                        this.el.delimiters.appendChild(dot);
                    }
                }

                /**
                 * Add the necessary event listeners used to navigation around the slider
                 */
                registerEventListeners() {
                    this.el.container.addEventListener('click', this.processClick.bind(this));
                    this.boundOnTransitionEnd = this.onTransitionEnd.bind(this);
                    this.el.projector.addEventListener('transitionend', this.boundOnTransitionEnd);

                    this.el.container.addEventListener('mouseenter', this.onMouseEnter.bind(this));
                    this.el.container.addEventListener('mouseleave', this.onMouseLeave.bind(this));
                }

                /**
                 * Called when the slider container is clicked. Processes event depending on click location
                 */
                processClick(ev) {
                    // Check if the click was registered on a delimiter, if so, redirect the event to onDelimiterClick
                    const delimiter = ev.target.closest('.slider-delimiter-container');
                    if (delimiter) return this.onDelimiterClick(ev);

                    // Check if the click was registered on a navigation arrow
                    const button = ev.target.closest('.slider-navigation-button');
                    if (button && this.loading === false) ev.preventDefault();
                    else return true;

                    // Transition depending on which navigation arrow was clicked
                    this.loading = true;
                    const direction = button.classList.contains('slider-next') ? 'next' : 'prev';
                    this.current = this.getTargetIndex(direction);

                    this.loadSlide(direction);
                }

                /**
                 * Called when a delimiter is clicked on. Navigates to required slide
                 */
                onDelimiterClick(ev) {
                    const target = ev.target.closest('.slider-delimiter');
                    const id = target.dataset.id;
                    const prev = this.current;

                    if (id === prev || this.loading === true) return false;

                    const direction = id > prev ? 'next' : 'prev';

                    this.loading = true;
                    this.current = id;
                    this.loadSlide(direction);
                }

                /**
                 * When the slider transitions, set the current slide's delimiter as active
                 */
                setDelimiter() {
                    const dots = this.el.delimiters.querySelectorAll('.slider-delimiter');
                    // Clear any existing dots with the active class
                    dots.forEach(dot => dot.classList.remove('active'));
                    // Add active to current slide
                    dots[this.current].classList.add('active');
                }

                /**
                 * Get the next slide index
                 *
                 * @return {number} newIndex - The index of the slide that will be transitioned to
                 */
                getTargetIndex(direction) {
                    let newIndex = direction === 'next' ? this.current + 1 : this.current - 1;
                    // Go to first slide if navigating beyond the last slide
                    if (newIndex > this.total - 1) newIndex = 0;
                    // Go to the last slide navigating beyond the first slide
                    else if (newIndex < 0) newIndex = this.total - 1;
                    return newIndex;
                }

                /**
                 * Load the next slide and handle the animation classes for the transition
                 */
                loadSlide(direction) {
                    this.incoming = this.createElement();
                    this.outgoing = this.outgoing || this.el.projector.querySelector('.slide-element');

                    this.prepend = `${this.transition}-${direction}`;

                    /**
                     * Remove the entry animation classes and add the leave classes
                     */
                    const switchClasses = () => {
                        this.incoming.classList.remove(`${this.prepend}-enter-from`);
                        this.outgoing.classList.remove(`${this.prepend}-leave-from`);
                        this.incoming.classList.add(`${this.prepend}-enter-to`);
                        this.outgoing.classList.add(`${this.prepend}-leave-to`);
                        if (this.options.hideDelimiters === false) this.setDelimiter();
                    }

                    window.requestAnimationFrame(() => {
                        this.incoming.classList.add(`${this.prepend}-enter-active`, `${this.prepend}-enter-from`);
                        this.outgoing.classList.add(`${this.prepend}-leave-active`, `${this.prepend}-leave-from`);

                        this.el.projector.appendChild(this.incoming);
                        window.requestAnimationFrame(switchClasses);
                    })
                }

                /**
                 * Create the HTML element of the slide being transitioned to
                 *
                 * @return {HTMLElement} - The <li> element containing the slide that will be transitioned to
                 */
                createElement(index = this.current) {
                    const container = document.createElement('li');
                    container.classList.add("px-0", "slide-element");

                    // If the slide doesn't exist, abort
                    if (!this.slides[index]) return false;
                    // The slide item to load
                    const load = this.slides[index];
                    // Check if the incoming slide has an <a> link
                    const hasLink = !!load.link;

                    // If there is a link, wrap the slide in an <a> element
                    const inner = hasLink ? container.appendChild(document.createElement('a')) : container;
                    // ...and add the href
                    if (hasLink) inner.href = this.slides[this.current].link

                    const content = document.createElement('div');
                    content.classList.add('slider-image-content');
                    content.style.backgroundImage = `url(${this.slides[this.current].mediaLink})`;
                    const html = content.appendChild(document.createElement('div'));
                    html.classList.add("slider-html-content");
                    if (this.slides[this.current]?.class) {
                        const additionalClasses = this.slides[this.current].class.split(" ");
                        html.classList.add(...additionalClasses);
                    }
                    if (this.slides[this.current]?.content) {
                        html.innerHTML = this.slides[this.current].content;
                    }
                    inner.appendChild(content);
                    return container;
                }

                /**
                 * Clean up slider when a transition is complete
                 */
                onTransitionEnd(ev) {
                    if (ev.propertyName === 'opacity' || this.loading === false) return false;

                    this.incoming.classList.remove(`${this.prepend}-enter-active`, `${this.prepend}-enter-to`);
                    this.outgoing.classList.remove(`${this.prepend}-leave-active`, `${this.prepend}-leave-to`);

                    if (this.outgoing.parentNode) this.outgoing.parentNode.removeChild(this.outgoing);

                    window.requestAnimationFrame(() => {
                        this.outgoing = this.incoming;
                        this.incoming = null;

                        this.loading = false;
                        this.prepend = null;
                    })
                }

                /**
                 * Detect when the user's mouse enters the slider, used to pause the autoplay functionality
                 */
                onMouseEnter(ev) {
                    if (this.intervalCb) {
                        clearInterval(this.intervalCb);
                        this.intervalCb = null;
                    }
                }

                /**
                 * Detect when the user's mouse leaves the slider, used to resume autoplay functionality
                 */
                onMouseLeave(ev) {
                    if (this.options.autoplay) this.initAutoplay();
                }
            }
        </script>
    @endpush
@endonce

@push('js')
    <script>
        (() => {
            const sliderData = [];
            let tmp;
            @foreach ($slides->slides as $slide)
                tmp = @json($slide);
                tmp.mediaLink = @json($slide->mediaLink());
                sliderData.push(tmp);
            @endforeach

            const slider = new Slider({
                slides: sliderData,
                selector: @json('#' . $element),
                hideDelimiters: @json($hidedelimiters),
                autoplay: @json($autoplay),
                hideArrows: @json($hidearrows)
            });
        })()
    </script>
@endpush
