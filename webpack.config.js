const path = require('path');// eslint-disable-line
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );// eslint-disable-line

module.exports = { // eslint-disable-line
	entry: {
		main: './assets/js/main.js',
    color: './assets/js/archive/color.js',
    case: './assets/js/archive/case.js',
    product: './assets/js/single/product.js',
    singlecase: './assets/js/single/singlecase.js',
    electronicCatalog: './assets/js/single/electronicCatalog.js',
    about: './assets/js/page/about.js',
    dropdownbanner: './assets/js/components/dropdownbanner.js',
    home: './assets/js/page/home.js',
    qabox: './assets/js/page/qabox.js',
    contact: './assets/js/page/contact.js',
	},
	output: {
		filename: '[name].js',
		path: path.resolve( __dirname, 'dist' ),// eslint-disable-line
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					'postcss-loader',
					'sass-loader',
				],
			},
			{
				test: /\.m?js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: [ '@babel/preset-env' ],
					},
				},
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin( {} ),
	],
};
