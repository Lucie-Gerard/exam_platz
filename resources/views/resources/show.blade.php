{{-- 8. I fill the show vue with the detail.html page and adapt with assets 
    13. I fill the information with the data from the DB --}}

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Detailed Single Post</title>

    <!-- Behavioral Meta Data -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="icon" type="image/png" href="assets/img/small-logo-01.png" />
    <link
        href="http://fonts.googleapis.com/css?family=Roboto:400,900,900italic,700italic,700,500italic,400italic,500,300italic,300"
        rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/mess.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <a name="ancre"></a>

    <!-- CACHE -->
    <div class="cache"></div>

    <!-- HEADER -->

    <div id="wrapper-header">
        <div id="main-header" class="object">
            <a href="/">
                <div id="logo">
                    <img src="{{ asset('assets/img/logo-burst.svg') }}" alt="logo burstfly" height="38"
                        width="90" />
                </div>
            </a>
            <div id="main_tip_search">
                <form action="/">
                    <input type="text" name="search" id="tip_search_input" list="search" autocomplete="off"
                        required />
                </form>
            </div>
            <div id="stripes"></div>
        </div>
    </div>

    <!-- NAVBAR -->

    <div id="wrapper-navbar">
        <div class="navbar object">
            <div id="wrapper-bouton-icon">
                @foreach ($categories as $category)
                    <div id="bouton-ai">
                        {{-- 23a. I add "<a> tag" for the category filter  --}}
                        <a href="/?category={{ $category->name }}">
                            <img src="{{ asset('assets/img/' . $category->logo) }}" alt="{{ $category->name }}"
                                title="{{ $category->name }}" height="28" width="28" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- FILTER -->

    <div id="main-container-menu" class="object">
        <div class="container-menu">
            <div id="main-cross">
                <div id="cross-menu"></div>
            </div>

            <div id="main-small-logo">
                <div class="small-logo"></div>
            </div>

            <div id="main-premium-ressource">
                <div class="premium-ressource"><a href="#">Premium Resources</a></div>
            </div>

            <div id="main-themes">
                <div class="themes"><a href="#">Latest themes</a></div>
            </div>

            <div id="main-psd">
                <div class="psd"><a href="#">PSD Goodies</a></div>
            </div>

            <div id="main-ai">
                <div class="ai"><a href="#">Illustrator freebies</a></div>
            </div>

            <div id="main-font">
                <div class="font"><a href="#">Free fonts</a></div>
            </div>

            <div id="main-photo">
                <div class="photo"><a href="#">Free stock photos</a></div>
            </div>
        </div>
    </div>

    <!-- PORTFOLIO -->

    <div id="wrapper-container">
        <div class="container object">
            <div id="main-container-image">
                <div class="title-item">
                    <div class="title-icon"></div>
                    <div class="title-text">{{ $resource->title }}</div>
                    <div class="title-text-2">{{ $resource->updated_at }} by {{ $resource->users->name }}</div>
                </div>

                <div class="work">
                    <figure class="white">
                        <img src="{{ $resource->image ? asset('storage/' . $resource->image) : asset('/assets/img/no-image.jpeg') }}"
                            alt="" />
                        <figcaption>
                            {{-- 36. EDIT FORM --}}
                            <a href="/resources/{{ $resource->id }}/edit" class="btn btn-primary"
                                style="display: inline-block; margin: 1em 0">Edit</a>

                            {{-- 41. DELETE --}}
                            <form method="post" action="{{ Route("resources.destroy", ['resource' => $resource->id]) }}">
                                @csrf
                                @method('DELETE')

                                <button id="delete_btn" class="btn btn-secondary" style="display: inline-block; margin: 1em 0">
                                    Delete
                                </button>
                            </form>
                        </figcaption>
                    </figure>

                    <div class="wrapper-text-description">
                        <div class="wrapper-file">
                            <div class="icon-file">
                                <img src="{{ asset('assets/img/' . $resource->categories->logo) }}" alt=""
                                    width="21" height="21" />
                            </div>
                            <div class="text-file">{{ $resource->categories->name }}</div>
                        </div>

                        <div class="wrapper-weight">
                            <div class="icon-weight">
                                <img src="{{ asset('assets/img/icon-weight.svg') }}" alt="" width="20"
                                    height="23" />
                            </div>
                            <div class="text-weight"> {{ $resource->size }}Mo</div>
                        </div>

                        <div class="wrapper-desc">
                            <div class="icon-desc">
                                <img src="{{ asset('assets/img/icon-desc.svg') }}" alt="" width="24"
                                    height="24" />
                            </div>
                            <div class="text-desc">
                                {{ $resource->description }}
                            </div>
                        </div>

                        <div class="wrapper-download">
                            <div class="icon-download">
                                <img src="{{ asset('assets/img/icon-download.svg') }}" alt="" width="19"
                                    height="26" />
                            </div>
                            <div class="text-download">
                                <a href="#"><b>Download</b></a>
                            </div>
                        </div>

                        <div class="wrapper-morefrom">
                            <div class="text-morefrom">More from .psd</div>
                            <div class="image-morefrom">
                                @foreach ($resources as $resource)
                                    <a href="/resources/{{ $resource->id }}/{{ $resource->title }}">
                                        <div class="image-morefrom-1">
                                            <img src="{{ $resource->image ? asset('storage/' . $resource->image) : asset('/assets/img/no-image.jpeg') }}"
                                                alt="" width="430" height="330" />
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="post-reply">
                        <div id="title-post-send">
                            <hr />
                            <h2>Your comments</h2>
                        </div>
                    </div>

                    @foreach ($comments as $comment)
                        <div class="post-reply">
                            <div class="image-reply-post"></div>
                            <div class="name-reply-post">{{ $comment->users->name }}</div>
                            <div class="text-reply-post">
                                {{ $comment->content }}
                            </div>
                            <hr>
                        </div>
                    @endforeach

                    <div class="post-send">
                        <div id="main-post-send">
                            <div id="title-post-send">Add your comment</div>
                            <form id="contact" method="post" action="/onclickprod/formsubmit_op.asp">
                                <fieldset>
                                    <p>
                                        <textarea id="message" name="message" maxlength="500" placeholder="Votre Message" tabindex="5" cols="30"
                                            rows="4"></textarea>
                                    </p>
                                </fieldset>
                                <div style="text-align: center">
                                    <input type="submit" name="envoi" value="Envoyer" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="wrapper-thank">
            <div class="thank">
                <div class="thank-text">
                    bu<span style="letter-spacing: -5px">rs</span>tfly
                </div>
            </div>
        </div>

        <div id="main-container-footer">
            <div class="container-footer">
                <div id="row-1f">
                    <div class="text-row-1f">
                        <span
                            style="
                  font-weight: 600;
                  font-size: 15px;
                  color: #666;
                  line-height: 250%;
                  text-transform: uppercase;
                  letter-spacing: 1.5px;
                ">What
                            is Burstfly</span><br />Burstfly is just a blog showcasing hand-picked free themes,
                        design stuff, free fonts and other resources for web designers.
                    </div>
                </div>

                <div id="row-2f">
                    <div class="text-row-2f">
                        <span
                            style="
                  font-weight: 600;
                  font-size: 15px;
                  color: #666;
                  line-height: 250%;
                  text-transform: uppercase;
                  letter-spacing: 1.5px;
                ">How
                            does it work</span><br />Burstfly offers you all the latest freebies found all over
                        the fourth corners without to pay.
                    </div>
                </div>

                <div id="row-3f">
                    <div class="text-row-3f">
                        <span
                            style="
                  font-weight: 600;
                  font-size: 15px;
                  color: #666;
                  line-height: 250%;
                  text-transform: uppercase;
                  letter-spacing: 1.5px;
                ">Get
                            in touch!</span><br />Subscribe our RSS or follow us on Facebook, Google+,
                        Pinterest or Dribbble to keep updated.
                    </div>
                </div>

                <div id="row-4f">
                    <div class="text-row-4f">
                        <span
                            style="
                  font-weight: 600;
                  font-size: 15px;
                  color: #666;
                  line-height: 250%;
                  text-transform: uppercase;
                  letter-spacing: 1.5px;
                ">Newsletter</span><br />You
                        will be informed monthly about the latest content
                        avalaible.
                    </div>

                    <div id="main_tip_newsletter">
                        <form>
                            <input type="text" name="newsletter" id="tip_newsletter_input" list="newsletter"
                                autocomplete="off" required />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="wrapper-copyright">
            <div class="copyright">
                <div class="copy-text object">
                    Copyright © 2016. Template by
                    <a style="color: #d0d1d4" href="http://designscrazed.org/">Dcrazed</a>
                </div>

                <div class="wrapper-navbouton">
                    <div class="google object">g</div>
                    <div class="facebook object">f</div>
                    <div class="linkin object">i</div>
                    <div class="dribbble object">d</div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.localScroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-animate-css-rotate-scale.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fastclick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.flip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.animate-colors-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.animate-shadow-min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.localScroll();
            $(".cache").delay(1000).fadeOut(500);

            $("#wrapper-header")
                .delay(1500)
                .animate({
                    opacity: "1",
                    width: "100%"
                }, 500);
            $("#wrapper-navbar")
                .delay(2000)
                .animate({
                    opacity: "1",
                    height: "60px"
                }, 500);

            $("#main-container-image").delay(2500).animate({
                opacity: "1"
            }, 500);
        });

        /*TRANSITION PAGE*/

        var speed = "slow";

        $("html, body").hide();

        $(document).ready(function() {
            $("html, body").fadeIn(speed, function() {
                $("a[href], button[href]").click(function(event) {
                    var url = $(this).attr("href");
                    if (url.indexOf("#") == 0 || url.indexOf("javascript:") == 0)
                        return;
                    event.preventDefault();
                    $("html, body").fadeOut(speed, function() {
                        window.location = url;
                    });
                });
            });
        });

        /* DISABLE HOVER EFFECT WHILE YOU SCROLL FOR A SMOOTHY NAVIGATION */

        var body = document.body,
            timer;

        window.addEventListener(
            "scroll",
            function() {
                clearTimeout(timer);

                if (!body.classList.contains("disable-hover"))
                    body.classList.add("disable-hover");

                timer = setTimeout(function() {
                    body.classList.remove("disable-hover");
                }, 200);
            },
            false
        );

        /* BOUTON MENU */

        $(document).on("touchstart mouseover", "#stripes", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#stripes").stop().animate({
                    scale: "1.2",
                    opacity: "0.5"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        $(document).on("touchend mouseout", "#stripes", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#stripes").stop().animate({
                    scale: "1",
                    opacity: "1"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        /* MENU SIDE OPEN */

        var MENUSIDEOPEN = document.getElementById("stripes");

        MENUSIDEOPEN.addEventListener("click", function() {
            $("#main-container-menu").stop().animate({
                left: "0"
            }, 300);
        });

        /* BOUTON CROSS */

        $(document).on("touchstart mouseover", "#cross-menu", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#cross-menu")
                    .stop()
                    .animate({
                        scale: "1.2",
                        opacity: "0.5"
                    }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        $(document).on("touchend mouseout", "#cross-menu", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#cross-menu").stop().animate({
                    scale: "1",
                    opacity: "1"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        /* MENU SIDE CLOSE */

        var MENUSIDECLOSE = document.getElementById("cross-menu");

        MENUSIDECLOSE.addEventListener("click", function() {
            $("#main-container-menu").stop().animate({
                left: "-100%"
            }, 300);
        });

        /* BOUTON MENU ARROW-2 */

        $(document).on(
            "touchstart mouseover",
            "#wrapper-title-2",
            function(event) {
                event.stopPropagation();
                event.preventDefault();
                if (event.handled !== true) {
                    $("#fleche-nav-2")
                        .stop()
                        .animate({
                            rotate: "90deg",
                            opacity: "1"
                        }, 300);

                    event.handled = true;
                } else {
                    return false;
                }
            }
        );

        $(document).on("touchend mouseout", "#wrapper-title-2", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#fleche-nav-2")
                    .stop()
                    .animate({
                        rotate: "0deg",
                        opacity: "0.5"
                    }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        /* BOUTON MENU ARROW-3 */

        $(document).on(
            "touchstart mouseover",
            "#wrapper-title-3",
            function(event) {
                event.stopPropagation();
                event.preventDefault();
                if (event.handled !== true) {
                    $("#fleche-nav-3")
                        .stop()
                        .animate({
                            rotate: "90deg",
                            opacity: "1"
                        }, 300);

                    event.handled = true;
                } else {
                    return false;
                }
            }
        );

        $(document).on("touchend mouseout", "#wrapper-title-3", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#fleche-nav-3")
                    .stop()
                    .animate({
                        rotate: "0deg",
                        opacity: "0.5"
                    }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        /* BOUTON MENU */

        $(document).on("touchstart mouseover", "#stripes", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#stripes").stop().animate({
                    scale: "1.2",
                    opacity: "0.5"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        $(document).on("touchend mouseout", "#stripes", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#stripes").stop().animate({
                    scale: "1",
                    opacity: "1"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        /* BOUTON NEXT */

        $(document).on("touchstart mouseover", "#oldnew-next", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#oldnew-next")
                    .stop()
                    .animate({
                        scale: "1.2",
                        opacity: "0.5"
                    }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        $(document).on("touchend mouseout", "#oldnew-next", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#oldnew-next").stop().animate({
                    scale: "1",
                    opacity: "1"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        /* BOUTON PREV */

        $(document).on("touchstart mouseover", "#oldnew-prev", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#oldnew-prev")
                    .stop()
                    .animate({
                        scale: "1.2",
                        opacity: "0.5"
                    }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        $(document).on("touchend mouseout", "#oldnew-prev", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#oldnew-prev").stop().animate({
                    scale: "1",
                    opacity: "1"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        /* BOUTON PREV */

        $(document).on("touchstart mouseover", "#logo", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#logo").stop().animate({
                    scale: "1.1",
                    opacity: "0.5"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        $(document).on("touchend mouseout", "#logo", function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.handled !== true) {
                $("#logo").stop().animate({
                    scale: "1",
                    opacity: "1"
                }, 300);

                event.handled = true;
            } else {
                return false;
            }
        });

        /*FORMULAIRE NEWSLETTER*/

        // $("form").on("submit", function(event) {
        //     event.preventDefault();
        //     $.post(
        //         "/burstfly/form-burstfly-modified.asp",
        //         $("form").serialize(),
        //         function(data) {
        //             //alert(data);
        //         }
        //     );
        // });
    </script>
</body>

</html>
