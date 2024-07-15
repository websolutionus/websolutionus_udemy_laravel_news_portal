<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <!-- Footer -->
        <footer>
            <div class="wrapper__footer bg__footer-dark pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <figure class="image-logo">
                                    <img src="{{ asset(@$footerInfo->logo) }}" alt="" class="logo-footer">
                                </figure>

                                <p>{{ @$footerInfo->description }}</p>


                                <div class="social__media mt-4">
                                    <ul class="list-inline">
                                        @foreach ($socialLinks as $link)
                                        <li class="list-inline-item">
                                            <a href="{{ $link->url }}" class="btn btn-social rounded text-white facebook">
                                                <i class="{{ $link->icon }}"></i>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ @$footerGridOneTitle->value }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">

                                    @foreach ($footerGridOne as $gridOne)
                                    <li>
                                        <a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ @$footerGridTwoTitle->value }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>
                                <ul class="list-unstyled option-content is-hidden">

                                    @foreach ($footerGridTwo as $gridTwo)
                                    <li>
                                        <a href="{{ $gridTwo->url }}">{{ $gridTwo->name }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ @$footerGridThreeTitle->value }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach ($footerGridThree as $gridThree)
                                    <li>
                                        <a href="{{ $gridThree->url }}">{{ $gridThree->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="wrapper__footer-bottom bg__footer-dark">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border-top-1 bg__footer-bottom-section">
                                <p class="text-white text-center">
                                    {{ @$footerInfo->copyright }}</p>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </footer>
    </div>
</section>
