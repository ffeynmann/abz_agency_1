const path = require("path");
const webpack = require('webpack');


module.exports = {
    resolve: {
        extensions: ['.js', '.ts'],
        alias: {
            '@spa': path.join(__dirname, 'resources', 'src', 'spa')
        }
    },
}
