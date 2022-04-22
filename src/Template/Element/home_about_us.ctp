<section id="about-us">
    <div class="container">
    <div class="text-center">
        <div class="col-sm-8 col-sm-offset-2">
            <h2 class="title-one"><?php echo $homes->about_title; ?></h2>
            <p><?php echo $homes->about_subtitle; ?></p>
        </div>
    </div>
    <div class="about-us">
        <div class="row">
            <div class="col-sm-6">
                <h3><?php echo $homes->about_title; ?></h3>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-chain-broken"></i> About</a></li>
                    <li><a href="#mission" data-toggle="tab"><i class="fa fa-th-large"></i> Mission</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="about">
                        <div class="media">
                            <img class="pull-left media-object"
                                src="<?php echo $this->request->webroot.'himu/images/about-us/about.jpg" alt="about us';?>">
                            <div class="media-body">
                                <p><?php echo $homes->about; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mission">
                        <div class="media">
                            <img class="pull-left media-object"
                                src="<?php echo $this->request->webroot.'himu/images/about-us/mission.jpg" alt="Mission';?>">
                            <div class="media-body">
                                <p><?php echo $homes->mission; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h3>Our Skills</h3>
                <div class="skill-bar">
                    <div class="skillbar clearfix " data-percent="63%">
                        <div class="skillbar-title">
                            <span>HTML5 &amp; CSS3</span>
                        </div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">63%</div>
                    </div> <!-- End Skill Bar -->
                    <div class="skillbar clearfix" data-percent="70%">
                        <div class="skillbar-title"><span>UI Design</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">70%</div>
                    </div> <!-- End Skill Bar -->
                    <div class="skillbar clearfix " data-percent="60%">
                        <div class="skillbar-title"><span>jQuery</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">60%</div>
                    </div> <!-- End Skill Bar -->
                    <div class="skillbar clearfix " data-percent="60%">
                        <div class="skillbar-title"><span>Python</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">60%</div>
                    </div> <!-- End Skill Bar -->
                    <div class="skillbar clearfix " data-percent="50%">
                        <div class="skillbar-title"><span>PHP</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">50%</div>
                    </div> <!-- End Skill Bar --></div>
                    <div class="skillbar clearfix " data-percent="40%">
                        <div class="skillbar-title"><span>Vue.js</span></div>
                        <div class="skillbar-bar"></div>
                        <div class="skill-bar-percent">40%</div>
                    </div> <!-- End Skill Bar --></div>
                </div>
            </div>
        </div>
    </div>
</section>
