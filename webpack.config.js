const path = require('path');// eslint-disable-line
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );// eslint-disable-line

module.exports = { // eslint-disable-line
	entry: {
		main: './assets/js/main.js',
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
