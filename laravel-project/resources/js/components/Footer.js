import React from "react";
import "./Home.css";

class Home extends React.Component {
    render() {
        return (
            <footer id="i5hkyi" className="footer-under">
                <div className="container-width">
                    <div id="i7d7pb" className="footer-container">
                        <div className="foot-lists">
                            <div className="foot-list">
                                <div className="foot-list-title">About us</div>
                                <div className="foot-list-item">Contact</div>
                                <div className="foot-list-item">Events</div>
                                <div className="foot-list-item">Company</div>
                                <div className="foot-list-item">Jobs</div>
                                <div className="foot-list-item">Blog</div>
                            </div>
                            <div className="foot-list">
                                <div className="foot-list-title">Services</div>
                                <div className="foot-list-item">Education</div>
                                <div className="foot-list-item">Partner</div>
                                <div className="foot-list-item">Community</div>
                                <div className="foot-list-item">Forum</div>
                                <div className="foot-list-item">Download</div>
                                <div className="foot-list-item">Upgrade</div>
                            </div>
                            <div className="clearfix"></div>
                        </div>
                        <div className="form-sub">
                            <div className="foot-form-cont">
                                <div id="iqo71n" className="foot-form-title">
                                    Subscribe
                                </div>
                                <div className="foot-form-desc">
                                    Subscribe to our newsletter to receive
                                    exclusive offers and the latest news
                                </div>
                                <input
                                    name="name"
                                    placeholder="Name"
                                    id="i90sbg"
                                    className="sub-input"
                                />
                                <input
                                    name="email"
                                    placeholder="Email"
                                    className="sub-input"
                                />
                                <button type="button" className="sub-btn">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="copyright">
                    <div id="i6sgea" className="container-width">
                        <div id="i5joor" className="made-with">
                            made with GrapesJS
                        </div>
                        <div className="foot-social-btns">
                            facebook twitter linkedin mail
                        </div>
                        <div className="clearfix"></div>
                    </div>
                </div>
            </footer>
        );
    }
}

export default Home;
