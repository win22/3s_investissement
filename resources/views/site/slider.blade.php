<div class="site-showcase">
    <div class="slider-mask overlay-transparent"></div>
    <!-- Start Hero Slider -->
    <div class="hero-slider flexslider clearfix" style="height:200px" data-autoplay="yes" data-pagination="no"
         data-arrows="yes" data-style="fade" data-pause="yes">
        <ul class="slides">
            <li class="parallax" style="background-image:url({{ asset('site/image/02.jpg')}}); height: 680px">

            </li>
            <li class="parallax" style="background-image:url({{ asset('site/image/05.jpg')}}); height: 680px">

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