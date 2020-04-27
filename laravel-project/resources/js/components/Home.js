import React from "react";
import "./Home.css";

class Home extends React.Component {
    render() {
        return (
            <div id="i775">
                <div id="i1v2" className="container-width">
                    <div className="logo-container"></div>
                    <nav className="menu"></nav>
                    <div className="clearfix"></div>
                    <div id="i7bcv" className="lead-title">
                        <b>Tell me what you want</b>
                    </div>
                    <form id="i09tj" className="form">
                        <div id="in42r" className="form-group">
                            <div className="form-group"></div>
                        </div>
                        <div id="ima0z" className="form-group">
                            <div className="form-group"></div>
                        </div>
                        <div className="form-group"></div>
                        <div id="icr3c" className="row">
                            <div id="i2pk4" className="cell">
                                <input
                                    type="text"
                                    placeholder="Type here your name"
                                    id="iznni"
                                    className="input"
                                />
                            </div>
                            <div id="ipwp3" className="cell">
                                <input
                                    type="text"
                                    placeholder="Type here your name"
                                    id="ih5un"
                                    className="input"
                                />
                            </div>
                            <div id="ing8s" className="cell">
                                <button id="ibp5m" className="button">
                                    Send
                                </button>
                            </div>
                        </div>
                        <div id="irfaq" className="form-group"></div>
                    </form>
                </div>
            </div>
        );
    }
}

export default Home;
