import React from "react";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import Home from "./Home";
import Header from "./Header";
import Footer from "./Footer";

function App() {
    return (
        <BrowserRouter>
            <Header />
            <Route exact path="/" component={Home} />
            <Route path="/go" component={Home} />
            <Footer />
        </BrowserRouter>
    );
}

export default App;

// ReactDOM.render(<App />, document.getElementById("app"));
