import React from 'react';
import PropTypes from 'prop-types';
import {withStyles} from '@material-ui/core/styles';
import Button from '../components/Button';
import Typography from '../components/Typography';
import ProductHeroLayout from './ProductHeroLayout';
import {Link} from 'react-router-dom'

const backgroundImage =
    'https://listify-demos.astoundify.com/classic/wp-content/uploads/sites/2/2019/05/Stocksy_txpbfa0785eO7M200_Medium_832542-1.jpg';

const styles = (theme) => ({
    background: {
        backgroundImage: `url(${backgroundImage})`,
        backgroundColor: '#234f9c', // Average color of the background image.
        backgroundPosition: 'center',
    },
    button: {
        minWidth: 200,
    },
    h5: {
        marginBottom: theme.spacing(4),
        marginTop: theme.spacing(4),
        [theme.breakpoints.up('sm')]: {
            marginTop: theme.spacing(10),
        },
    },
    more: {
        marginTop: theme.spacing(2),
    },
    a: {color: '#FFF'}

});

function ProductHero(props) {
    const {classes} = props;

    return (
        <ProductHeroLayout backgroundClassName={classes.background}>
            <Typography color="inherit" align="center" variant="h2" marked="center">
                Upgrade your Sundays
            </Typography>
            <Typography color="inherit" align="center" variant="h5" className={classes.h5}>
                Enjoy secret offers up to -70% off the best luxury hotels every Sunday.
            </Typography>
                <Button color="secondary"
                        variant="contained"
                        size="large"
                        className={classes.button}
                        component="a"
                >
                    <Link to="/search">
                    Search
                    </Link>
                </Button>
        </ProductHeroLayout>
    );
}

ProductHero.propTypes = {
    classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(ProductHero);
