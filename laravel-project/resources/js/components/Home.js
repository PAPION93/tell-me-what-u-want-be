import withRoot from "../modules/withRoot";
// --- Post bootstrap -----
import React from "react";
import ProductCategories from "../modules/views/ProductCategories";
import ProductSmokingHero from "../modules/views/ProductSmokingHero";
import Footer from "./Footer";
import AppFooter from "../modules/views/AppFooter";
import ProductHero from "../modules/views/ProductHero";
import ProductValues from "../modules/views/ProductValues";
import ProductHowItWorks from "../modules/views/ProductHowItWorks";
import ProductCTA from "../modules/views/ProductCTA";
import AppAppBar from "../modules/views/AppAppBar";
import Header from "./Header";

function Index() {
    return (
        <React.Fragment>
            <Header />
            <ProductHero />
            {/*<ProductValues />*/}
            {/*<ProductCategories />*/}
            {/*<ProductHowItWorks />*/}
            {/*<ProductCTA />*/}
            {/*<ProductSmokingHero />*/}
            <Footer />
        </React.Fragment>
    );
}

export default withRoot(Index);
