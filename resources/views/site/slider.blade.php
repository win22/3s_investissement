<div class="site-showcase">
    <div class="slider-mask overlay-transparent"></div>
    <!-- Start Hero Slider -->
    <div class="hero-slider flexslider clearfix" style="height:200px" data-autoplay="yes" data-pagination="no"
         data-arrows="yes" data-style="fade" data-pause="yes">
        <ul class="slides">
            <li class="parallax" style="background-image:url({{ asset('site/image/06.jpg')}}); height: 680px">
                <div class="flex-caption">
                    <strong class="title">1671 Grand Avenue, <em>NYC</em></strong>
                    <div class="price"><strong>$</strong><span>100000</span></div>
                    <a href="property-detail.html" class="btn btn-primary btn-block">Details</a>
                    <div class="hero-agent">
                        <img src="http://placehold.it/365x365&amp;text=IMAGE+PLACEHOLDER" alt=""
                             class="hero-agent-pic">
                        <a href="agent-detail.html" class="hero-agent-contact" data-placement="left"
                           data-toggle="tooltip" title="" data-original-title="Contact Agent"><i
                                class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </li>
            <li class="parallax" style="background-image:url({{ asset('site/image/05.jpg')}}); height: 680px">
                <div class="flex-caption">
                    <strong class="title">1671 Grand Avenue, <em>NYC</em></strong>
                    <div class="price"><strong>$</strong><span>100000</span></div>
                    <a href="property-detail.html" class="btn btn-primary btn-block">Details</a>
                    <div class="hero-agent">
                        <img src="http://placehold.it/365x365&amp;text=IMAGE+PLACEHOLDER" alt=""
                             class="hero-agent-pic">
                        <a href="agent-detail.html" class="hero-agent-contact" data-placement="left"
                           data-toggle="tooltip" title="" data-original-title="Contact Agent"><i
                                class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- End Hero Slider -->
    <!-- Site Search Module -->
    <div class="site-search-module">
        <div class="container">
            <div class="site-search-module-inside">
                <form action="#">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <select name="propery type" class="form-control input-lg selectpicker">
                                    <option selected>Type</option>
                                    <option>Villa</option>
                                    <option>Family House</option>
                                    <option>Single Home</option>
                                    <option>Cottage</option>
                                    <option>Apartment</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="propery contract type" class="form-control input-lg selectpicker">
                                    <option selected>Contract</option>
                                    <option>Rent</option>
                                    <option>Buy</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="propery location" class="form-control input-lg selectpicker">
                                    <option selected>Location</option>
                                    <option>New York</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i
                                        class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>