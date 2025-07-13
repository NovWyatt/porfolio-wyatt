<section id="works" class="s-works target-section">

    <div class="row">
        <div class="column xl-12">
            <div class="section-header" data-num="02">
                <h2 class="text-display-title">Selected Works.</h2>
            </div> <!-- end section-header -->
        </div>
    </div>

    <div class="row folio-entries">
        @if ($works->count() > 0)
            @foreach ($works as $work)
                <div class="column entry" style="padding-top: 10px;">
                    <a href="{{ Storage::disk('public')->url($work->gallery_image) }}" class="entry__link glightbox"
                        data-glightbox="title: {{ $work->title }}; description: .entry__desc-{{ $work->id }}">
                        <div class="entry__thumb">
                            <img src="{{ Storage::disk('public')->url($work->thumbnail_image) }}"
                                @if ($work->thumbnail_2x) srcset="{{ Storage::disk('public')->url($work->thumbnail_image) }} 1x, {{ Storage::disk('public')->url($work->thumbnail_2x) }} 2x" @endif
                                alt="{{ $work->title }}"
                                onerror="this.onerror=null; this.src='{{ asset('images/placeholder.jpg') }}';">
                        </div>
                        <div class="entry__info">
                            <h4 class="entry__title">{{ $work->title }}</h4>
                            <div class="entry__cat">{{ $work->category }}</div>
                        </div>
                    </a>

                    <div class="glightbox-desc entry__desc-{{ $work->id }}">
                        <p>
                            {{ $work->description }}
                            @if ($work->project_link)
                                <a href="{{ $work->project_link }}" target="_blank" rel="noopener noreferrer">Project
                                    Link</a>.
                            @endif
                        </p>
                    </div>
                </div> <!-- entry -->
            @endforeach
        @else
            <h2 class="text-display-title">No Works.</h2>
        @endif
    </div> <!-- folio entries -->


    {{-- <div class="row s-testimonials">
        <div class="column xl-12">

            <h3 class="s-testimonials__header">Hear it from My Happy Clients</h3>

            <div class="swiper-container s-testimonials__slider">

                <div class="swiper-wrapper">

                    <div class="s-testimonials__slide swiper-slide">
                        <div class="s-testimonials__author">
                            <img src="images/avatars/user-02.jpg" alt="Author image" class="s-testimonials__avatar">
                            <cite class="s-testimonials__cite">
                                <strong>John Rockefeller</strong>
                                <span>Standard Oil Co.</span>
                            </cite>
                        </div>
                        <p>
                            Molestiae incidunt consequatur quis ipsa autem nam sit enim magni. Voluptas tempore rem.
                            Explicabo a quaerat sint autem dolore ducimus ut consequatur neque. Nisi dolores quaerat
                            fuga rem nihil nostrum.
                            Laudantium quia consequatur molestias.
                        </p>
                    </div> <!-- end s-testimonials__slide -->

                    <div class="s-testimonials__slide swiper-slide">
                        <div class="s-testimonials__author">
                            <img src="images/avatars/user-03.jpg" alt="Author image" class="s-testimonials__avatar">
                            <cite class="s-testimonials__cite">
                                <strong>Andrew Carnegie</strong>
                                <span>Carnegie Steel Co.</span>
                            </cite>
                        </div>
                        <p>
                            Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas
                            animi adipisci.
                            Nisi eaque consequatur. Voluptatem dignissimos ut ducimus accusantium perspiciatis.
                            Quasi voluptas eius distinctio. Atque eos maxime.
                        </p>
                    </div> <!-- end s-testimonials__slide -->

                    <div class="s-testimonials__slide swiper-slide">
                        <div class="s-testimonials__author">
                            <img src="images/avatars/user-01.jpg" alt="Author image" class="s-testimonials__avatar">
                            <cite class="s-testimonials__cite">
                                <strong>John Morgan</strong>
                                <span>JP Morgan & Co.</span>
                            </cite>
                        </div>
                        <p>
                            Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia
                            nesciunt. Ducimus aut sed ipsam.
                            Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius
                            distinctio.
                            Voluptatem dignissimos ut.
                        </p>
                    </div> <!-- end s-testimonials__slide -->

                    <div class="s-testimonials__slide swiper-slide">
                        <div class="s-testimonials__author">
                            <img src="images/avatars/user-06.jpg" alt="Author image" class="s-testimonials__avatar">
                            <cite class="s-testimonials__cite">
                                <strong>Henry Ford</strong>
                                <span>Ford Motor Co.</span>
                            </cite>
                        </div>
                        <p>
                            Nunc interdum lacus sit amet orci. Vestibulum dapibus nunc ac augue. Fusce vel dui. In ac
                            felis
                            quis tortor malesuada pretium. Curabitur vestibulum aliquam leo. Qui sed at corrupti
                            expedita voluptas odit.
                            Nihil ea quia nesciunt. Ducimus aut sed ipsam.
                        </p>
                    </div> <!-- end s-testimonials__slide -->

                </div> <!-- end swiper-wrapper -->

                <div class="swiper-pagination"></div>

            </div> <!-- end swiper-container -->

        </div> <!-- end column -->
    </div> <!-- end s-testimonials --> --}}

</section>
