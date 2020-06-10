import React from "react";
import "./Footer.css";

class Home extends React.Component {
    render() {
        return (
            <footer class="footer-under" id="i4jtud">
                <div class="container-width">
                    <div class="footer-container">
                        <div class="foot-lists">
                            <div class="foot-list">
                                <div class="foot-list-title">About us</div>
                                <div id="iwobrz" class="foot-list-item">
                                    Contact
                                </div>
                                <div id="ii8knd" class="foot-list-item">
                                    Events
                                </div>
                                <div id="i036im" class="foot-list-item">
                                    Company
                                </div>
                                <div class="foot-list-item">Jobs</div>
                                <div class="foot-list-item">Blog</div>
                            </div>
                            <div class="foot-list">
                                <div class="foot-list-title">Services</div>
                                <div class="foot-list-item">Education</div>
                                <div class="foot-list-item">Partner</div>
                                <div class="foot-list-item">Community</div>
                                <div class="foot-list-item">Forum</div>
                                <div class="foot-list-item">Download</div>
                                <div class="foot-list-item">Upgrade</div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-sub">
                            <div class="foot-form-cont">
                                <div class="foot-form-title">Subscribe</div>
                                <div class="foot-form-desc">
                                    Subscribe to our newsletter to receive
                                    exclusive offers and the latest news
                                </div>
                                <input
                                    name="name"
                                    placeholder="Name"
                                    id="ix1xbj"
                                    class="sub-input"
                                />
                                <input
                                    name="email"
                                    placeholder="Email"
                                    class="sub-input"
                                />
                                <button type="button" class="sub-btn">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container-width">
                        <div class="made-with">made with GrapesJS</div>
                        <div class="foot-social-btns">
                            facebook twitter linkedin mail
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </footer>
        );
    }
}

export default Home;
