// npx webpack
const path = require('path');

module.exports = {
  entry: {
    'script-map': './assets/js/script-map.js',
    'script-public': './assets/js/script-public.js',
  },
  output: {
    filename: '[name].min.js',
    path: path.resolve(__dirname, 'assets/js/'),
  },
};
