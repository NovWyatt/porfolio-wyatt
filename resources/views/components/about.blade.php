<section id="about" class="s-about target-section">

    <div class="row s-about__content">
        <div class="column xl-12">

            <div class="section-header" data-num="01">
                <h2 class="text-display-title">About Me.</h2>
            </div> <!-- end section-header -->

            @if ($aboutMe && $aboutMe->content)
                <p class="attention-getter">
                    {!! nl2br(e($aboutMe->content)) !!}
                </p>
            @else
                <!-- Fallback content nếu không có dữ liệu -->
                <p class="attention-getter">
                    Welcome to my website! I'm passionate about creating amazing digital experiences.
                </p>
            @endif

            {{-- <div class="grid-list-items s-about__blocks">

                <div class="grid-list-items__item s-about__block">
                    <h4 class="s-about__block-title">Experience</h4>
                    <ul class="s-about__list">
                        <li>
                            Spotify
                            <span>Product Designer</span>
                        </li>
                        <li>
                            Dropbox
                            <span>Interface Developer</span>
                        </li>
                        <li>
                            Google
                            <span>Lead UI Designer</span>
                        </li>
                        <li>
                            Figma
                            <span>UI Designer</span>
                        </li>
                        <li>
                            Microsoft
                            <span>UI Designer</span>
                        </li>
                    </ul>
                </div> <!--end s-about__block -->

                <div class="grid-list-items__item s-about__block">
                    <h4 class="s-about__block-title">Awards</h4>

                    <ul class="s-about__list">
                        <li>
                            <a href="#0">
                                Site Of The Month
                                <span>Awwwards — 2023</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                Site Of The Day
                                <span>Awwwards — 2023</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                Agency of The Year
                                <span>Awwwards — 2022</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                FWA of The Month
                                <span>FWA — 2022</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                Site Of The Month
                                <span>Awwwards — 2022</span>
                            </a>
                        </li>
                    </ul>
                </div> <!--end s-about__block -->

                <div class="grid-list-items__item s-about__block">
                    <h4 class="s-about__block-title">Skills</h4>

                    <ul class="s-about__list">
                        <li>
                            Product Design
                        </li>
                        <li>
                            UI/UX Design
                        </li>
                        <li>
                            Prototyping
                        </li>
                        <li>
                            Frontend Development
                        </li>
                        <li>
                            Illustration
                        </li>
                        <li>
                            Visual Design
                        </li>
                    </ul>
                </div> <!--end s-about__block -->

            </div> --}}
            <!-- grid-list-items -->

        </div> <!--end column -->
    </div> <!--end s-about__content -->

</section>
