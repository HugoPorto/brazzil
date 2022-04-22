<section id="our-team">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-8 col-sm-offset-2">
                <h2 class="title-one"><?php echo $homes->team_title; ?></h2>
                <p><?php echo $homes->team_subtitle; ?></p>
            </div>
        </div>
        <div id="team-carousel" class="carousel slide" data-interval="false">
            <a class="member-left" href="#team-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="member-right" href="#team-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            <div class="carousel-inner team-members">
                <div class="row item active">
                    <div class="col-sm-6 col-md-3">
                        <div class="single-member">
                            <img src="<?php echo $this->request->webroot . 'himu/images/our-team/member1.jpg';?>" alt="team member" />
                            <h4>William Ravi</h4>
                            <h5>Sr. Web Developer</h5>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="single-member">
                            <img
                                src="<?php echo $this->request->webroot . 'himu/images/our-team/foto005.png';?>" alt="team member"/>
                            <h4>Mr. Mota</h4>
                            <h5>Operations Leader</h5>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="single-member">
                            <img src="<?php echo $this->request->webroot . 'himu/images/our-team/foto001.png';?>" alt="team member" />
                            <h4>Hugo Porto</h4>
                            <h5>Software Engineer</h5>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="single-member">
                            <img src="<?php echo $this->request->webroot . 'himu/images/our-team/member4.jpg';?>" alt="team member" />
                            <h4>Anderson Gil</h4>
                            <h5>Marketing Officer</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
