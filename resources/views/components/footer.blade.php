<footer id="footer" class="s-footer target-section">

    <div class="row">
        <div class="column lg-12">
            <div class="section-header light-on-dark" data-num="03">
                <h2 class="text-display-title">Get In Touch.</h2>
            </div> <!-- end section-header -->
        </div>
    </div>

    <div class="row s-footer__content">

        <div class="column xl-6 md-12 s-footer__block s-footer__about">
            @if ($footer && $footer->content)
                <p class="attention-getter">
                    {!! nl2br(e($footer->content)) !!}
                </p>
            @else
                <!-- Fallback content nếu không có dữ liệu -->
                <p class="attention-getter">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas illum quasi facere libero,
                    fugiat laboriosam possimus amet consectetur adipisicing elit reprehenderit eveniet tempore quisquam
                    ipsa
                    id esse. Facere ratione dignissimos.
                </p>
            @endif
        </div> <!-- end section-footer__about -->

        <div class="column xl-6 md-12 s-footer__block s-footer__site-links">
            <div class="row">
                <div class="column xl-4 lg-5 md-6 tab-12">
                    <h5>Follow Me</h5>
                    @if ($socials->count() > 0)
                        <ul class="link-list">
                            @foreach ($socials as $social)
                                <li>
                                    <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer">
                                        {{ ucfirst($social->platform) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <!-- Fallback content -->
                        <ul class="link-list">
                            <li><a href="#0">Facebook</a></li>
                            <li><a href="#0">Twitter</a></li>
                            <li><a href="#0">Instagram</a></li>
                            <li><a href="#0">Dribbble</a></li>
                        </ul>
                    @endif
                </div>
                <div class="column xl-6 md-6 tab-12">
                    <h5>Contact Me</h5>
                    @if ($contacts->count() > 0)
                        <ul class="link-list">
                            @foreach ($contacts as $contact)
                                <li>
                                    @switch($contact->type)
                                        @case('email')
                                            <a href="mailto:{{ $contact->value }}">{{ $contact->label ?: $contact->value }}</a>
                                        @break

                                        @case('phone')
                                            <a href="tel:{{ $contact->value }}">{{ $contact->label ?: $contact->value }}</a>
                                        @break

                                        @case('website')
                                            <a href="{{ $contact->value }}" target="_blank"
                                                rel="noopener noreferrer">{{ $contact->label ?: $contact->value }}</a>
                                        @break

                                        @case('address')
                                            <a href="https://maps.google.com/?q={{ urlencode($contact->value) }}"
                                                target="_blank"
                                                rel="noopener noreferrer">{{ $contact->label ?: $contact->value }}</a>
                                        @break

                                        @case('skype')
                                            <a
                                                href="skype:{{ $contact->value }}?call">{{ $contact->label ?: $contact->value }}</a>
                                        @break

                                        @case('whatsapp')
                                            <a href="https://wa.me/{{ $contact->value }}" target="_blank"
                                                rel="noopener noreferrer">{{ $contact->label ?: $contact->value }}</a>
                                        @break

                                        @default
                                            <a href="{{ $contact->value }}">{{ $contact->label ?: $contact->value }}</a>
                                    @endswitch
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <ul class="link-list">
                            <li><a href="mailto:info@example.com">info@example.com</a></li>
                            <li><a href="tel:+1234567890">+1 234 567 890</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div> <!-- end section-footer__site-links -->

    </div> <!-- end section-footer__content -->


    <div class="row s-footer__buttons">

        <div class="column xl-6 tab-12">
            <a href="mailto:#0" class="btn btn--primary btn--large u-fullwidth">Message Me</a>
        </div>

        <div class="column xl-6 tab-12">
            @php
                $cv = \App\Models\CV::getActiveCv();
            @endphp

            @if ($cv)
                <a href="{{ route('cv.view') }}" target="_blank" class="btn btn--stroke btn--large u-fullwidth"
                    rel="noopener noreferrer">Get My CV
                </a>
            @else
                <button class="btn btn--stroke btn--large u-fullwidth" disabled>
                    CV Not Available
                </button>
            @endif
        </div>

    </div> <!-- end section-footer__buttons -->

    <div class="row s-footer__bottom">

        <div class="column xl-6 lg-12">
            @if ($socials->count() > 0)
                <ul class="s-footer__social social-list">
                    @foreach ($socials as $social)
                        <li>
                            <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer">
                                @switch($social->platform)
                                    @case('facebook')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                            <path
                                                d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z">
                                            </path>
                                        </svg>
                                    @break

                                    @case('twitter')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                            <path
                                                d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809 c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793 c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05 c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032 c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028 c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22 c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z">
                                            </path>
                                        </svg>
                                    @break

                                    @case('instagram')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
                                            <path
                                                d="M11.999,7.377c-2.554,0-4.623,2.07-4.623,4.623c0,2.554,2.069,4.624,4.623,4.624c2.552,0,4.623-2.07,4.623-4.624 C16.622,9.447,14.551,7.377,11.999,7.377L11.999,7.377z M11.999,15.004c-1.659,0-3.004-1.345-3.004-3.003 c0-1.659,1.345-3.003,3.004-3.003s3.002,1.344,3.002,3.003C15.001,13.659,13.658,15.004,11.999,15.004L11.999,15.004z">
                                            </path>
                                            <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                            <path
                                                d="M20.533,6.111c-0.469-1.209-1.424-2.165-2.633-2.632c-0.699-0.263-1.438-0.404-2.186-0.42 c-0.963-0.042-1.268-0.054-3.71-0.054s-2.755,0-3.71,0.054C7.548,3.074,6.809,3.215,6.11,3.479C4.9,3.946,3.945,4.902,3.477,6.111 c-0.263,0.7-0.404,1.438-0.419,2.186c-0.043,0.962-0.056,1.267-0.056,3.71c0,2.442,0,2.753,0.056,3.71 c0.015,0.748,0.156,1.486,0.419,2.187c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45 c0.963,0.042,1.268,0.055,3.71,0.055s2.755,0,3.71-0.055c0.747-0.015,1.486-0.157,2.186-0.419c1.209-0.469,2.164-1.424,2.633-2.633 c0.263-0.7,0.404-1.438,0.419-2.186c0.043-0.962,0.056-1.267,0.056-3.71s0-2.753-0.056-3.71C20.941,7.57,20.801,6.819,20.533,6.111z M19.315,15.643c-0.007,0.576-0.111,1.147-0.311,1.688c-0.305,0.787-0.926,1.409-1.712,1.711c-0.535,0.199-1.099,0.303-1.67,0.311 c-0.95,0.044-1.218,0.055-3.654,0.055c-2.438,0-2.687,0-3.655-0.055c-0.569-0.007-1.135-0.112-1.669-0.311 c-0.789-0.301-1.414-0.923-1.719-1.711c-0.196-0.534-0.302-1.099-0.311-1.669c-0.043-0.95-0.053-1.218-0.053-3.654 c0-2.437,0-2.686,0.053-3.655c0.007-0.576,0.111-1.146,0.311-1.687c0.305-0.789,0.93-1.41,1.719-1.712 c0.534-0.198,1.1-0.303,1.669-0.311c0.951-0.043,1.218-0.055,3.655-0.055c2.437,0,2.687,0,3.654,0.055 c0.571,0.007,1.135,0.112,1.67,0.311c0.786,0.303,1.407,0.925,1.712,1.712c0.196,0.534,0.302,1.099,0.311,1.669 c0.043,0.951,0.054,1.218,0.054,3.655c0,2.436,0,2.698-0.043,3.654H19.315z">
                                            </path>
                                        </svg>
                                    @break

                                    @case('dribbble')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M20.66 6.98a9.932 9.932 0 0 0-3.641-3.64C15.486 2.447 13.813 2 12 2s-3.486.447-5.02 1.34c-1.533.893-2.747 2.107-3.64 3.64S2 10.187 2 12s.446 3.487 1.34 5.02a9.924 9.924 0 0 0 3.641 3.64C8.514 21.553 10.187 22 12 22s3.486-.447 5.02-1.34a9.932 9.932 0 0 0 3.641-3.64C21.554 15.487 22 13.813 22 12s-.446-3.487-1.34-5.02zM12 3.66c2 0 3.772.64 5.32 1.919-.92 1.174-2.286 2.14-4.1 2.9-1.002-1.813-2.088-3.327-3.261-4.54A7.715 7.715 0 0 1 12 3.66zM5.51 6.8a8.116 8.116 0 0 1 2.711-2.22c1.212 1.201 2.325 2.7 3.34 4.5-2 .6-4.114.9-6.341.9-.573 0-1.006-.013-1.3-.04A8.549 8.549 0 0 1 5.51 6.8zM3.66 12c0-.054.003-.12.01-.2.007-.08.01-.146.01-.2.254.014.641.02 1.161.02 2.666 0 5.146-.367 7.439-1.1.187.373.381.793.58 1.26-1.32.293-2.674 1.006-4.061 2.14S6.4 16.247 5.76 17.5c-1.4-1.587-2.1-3.42-2.1-5.5zM12 20.34c-1.894 0-3.594-.587-5.101-1.759.601-1.187 1.524-2.322 2.771-3.401 1.246-1.08 2.483-1.753 3.71-2.02a29.441 29.441 0 0 1 1.56 6.62 8.166 8.166 0 0 1-2.94.56zm7.08-3.96a8.351 8.351 0 0 1-2.58 2.621c-.24-2.08-.7-4.107-1.379-6.081.932-.066 1.765-.1 2.5-.1.799 0 1.686.034 2.659.1a8.098 8.098 0 0 1-1.2 3.46zm-1.24-5c-1.16 0-2.233.047-3.22.14a27.053 27.053 0 0 0-.68-1.62c2.066-.906 3.532-2.006 4.399-3.3 1.2 1.414 1.854 3.027 1.96 4.84-.812-.04-1.632-.06-2.459-.06z">
                                            </path>
                                        </svg>
                                    @break

                                    @case('pinterest')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M11.99 2C6.472 2 2 6.473 2 11.99c0 4.232 2.633 7.85 6.35 9.306-.088-.79-.166-2.006.034-2.868.182-.78 1.172-4.966 1.172-4.966s-.299-.599-.299-1.484c0-1.388.805-2.425 1.808-2.425.853 0 1.264.64 1.264 1.407 0 .858-.546 2.139-.827 3.327-.235.994.499 1.805 1.479 1.805 1.775 0 3.141-1.872 3.141-4.575 0-2.392-1.719-4.064-4.173-4.064-2.843 0-4.512 2.132-4.512 4.335 0 .858.331 1.779.744 2.28a.3.3 0 0 1 .069.286c-.076.315-.245.994-.277 1.133-.044.183-.145.222-.335.134-1.247-.581-2.027-2.405-2.027-3.871 0-3.151 2.289-6.045 6.601-6.045 3.466 0 6.159 2.469 6.159 5.77 0 3.444-2.171 6.213-5.184 6.213-1.013 0-1.964-.525-2.29-1.146l-.623 2.374c-.225.868-.834 1.956-1.241 2.62a10 10 0 0 0 2.958.445c5.517 0 9.99-4.473 9.99-9.99S17.507 2 11.99 2">
                                            </path>
                                        </svg>
                                    @break

                                    @case('linkedin')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z">
                                            </path>
                                        </svg>
                                    @break

                                    @case('github')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z">
                                            </path>
                                        </svg>
                                    @break

                                    @case('youtube')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z">
                                            </path>
                                        </svg>
                                    @break

                                    @default
                                        <!-- Icon mặc định -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                        </svg>
                                @endswitch
                                <span class="u-screen-reader-text">{{ ucfirst($social->platform) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div> <!-- end section-footer__social -->

        <div class="column xl-6 lg-12">
            <p class="ss-copyright">
                <span>© Copyright Wyatt Hoangf Tuaans 2025</span>
            </p>
        </div>

    </div> <!-- end section-footer__bottom -->

    <div class="ss-go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                <path
                    d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A1 1 0 0 0 5 3v18a1 1 0 0 0 .536.886z">
                </path>
            </svg>
        </a>
        <span>Back To Top</span>
    </div> <!-- end ss-go-top -->

</footer>
