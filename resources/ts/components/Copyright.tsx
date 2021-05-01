import React from "react";
import {Link, Typography} from "@material-ui/core";

const Copyright: React.FC = () => {
    return (
        <Typography variant="body2" color="textSecondary" align="center">
            {'Copyright © '}
            <Link color="inherit" href="https://material-ui.com/">
                Tsuyoshi Yarimizu
            </Link>{' '}
            {new Date().getFullYear()}
            {'.'}
        </Typography>
    )
}

export default Copyright;
