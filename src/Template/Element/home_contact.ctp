<section id="contact">
    <div class="container">
        <div class="row text-center clearfix">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="contact-heading">
                    <h2 class="title-one"><?php echo $homes->contact_title; ?></h2>
                    <p><?php echo $homes->contact_subtitle; ?></p>
                    <p v-if="message_sended">Message Saved</p>
                    <button v-on:click="send_new_message"
                            class="btn btn-primary"
                            v-if="message_sended"
                            >Send New Message</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container" v-if="!message_sended">
    <div class="contact-details">
        <div class="pattern"></div>
        <div class="row text-center clearfix">

            <div class="col-sm-6">
                <div id="contact-form-section">
                    <div class="status alert alert-success" style="display: none"></div>
                    <div id="contact-form" class="contact">
                        <div class="form-group">

                            <input
                                type="text"
                                v-model="message.name"
                                class="form-control name-field"
                                required="required"
                                placeholder="Your Name">
                            </div>

                            <div class="form-group">
                                <input
                                    type="email"
                                    v-model="message.email"
                                    class="form-control mail-field"
                                    required="required"
                                    placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <textarea
                                    v-model="message.message"
                                    id="message"
                                    required="required"
                                    class="form-control"
                                    rows="8"
                                    placeholder="Message">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <button
                                    v-on:click="save_message"
                                    class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
