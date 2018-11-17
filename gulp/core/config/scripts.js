var path = require('path');
var webpack = require('webpack-stream').webpack;
var UglifyJsPlugin = require('uglifyjs-webpack-plugin');

// utils
var deepMerge = require('../utils/deepMerge');

// config
var assets = require('./common').paths.assets;

/**
 * Script Building
 * Configuration
 * Object
 *
 * @type {{}}
 */
module.exports = deepMerge({
	paths: {
		watch: assets.src + '/js/**/*.js',
		src: [
			assets.src + '/js/*.js',
			'!' + assets.src + '/js/**/_*'
		],
		dest: assets.dest + '/js',
		clean: assets.dest + '/js/**/*.{js,map}'
	},

	options: {
		webpack: {

			// merged with defaults
			// for :watch task
			watch: {
				mode: 'development',
				cache: true,
				watch: true,
				devtool: 'eval'
			},


			// merged with defaults
			// for :dev task
			dev: {
				mode: 'development',
				devtool: 'eval'
			},


			// merged with defaults
			// for :prod task
			prod: {
				mode: 'production',
				module: {
					rules: [
						{
							loader: 'eslint-loader',
							options: {
								failOnError: false,
								failOnWarning: false
							}
						},
					]
				},
				optimization: {
					minimizer: [
						new UglifyJsPlugin({
							uglifyOptions: {
								output: {
									comments: false
								},
								compress: {
									drop_console: true,
									unsafe: true,
									unsafe_comps: true,
									screw_ie8: true,
									warnings: false
								},
								ie8: false,
							}
						})
					]
				}
			},

			defaults: {
				resolve: {
					extensions: ['.js', '.jsx']
				},
				output: {
					chunkFilename: 'chunk-[name].js'
				},
				stats: {
					colors: true
				},
				module: {
					rules: [
						{
							test: /\.jsx?$/,
							exclude: [
								/node_modules/,
								/polyfills/,
								/gulp/
							],
							loader: 'eslint-loader'
						},
						{
							test: /\.jsx?$/,
							exclude: [
								/node_modules/,
								/polyfills/,
								/gulp/
							],
							loader: 'babel-loader',
							query: {
								presets: [
									['@babel/preset-env', {
										useBuiltIns: false,
									}],
								],
								plugins: [
									'@babel/plugin-transform-runtime'
								]
							}
						}
					]
				},
				plugins: [
					new webpack.ProvidePlugin({
						$: 'jquery',
						jQuery: 'jquery'
					})
				]
			}
		}
	}
});
