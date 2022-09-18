//path to dist folder must be absolute
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {

	entry: {
		'main': ['./wp-content/themes/akhb-retro/source/js/main.js', './wp-content/themes/akhb-retro/source/sass/main.scss']
	},
	output: {
		filename: '[name].js', //[name] will pull the keys from the entry object i.e. hello-world and car-image
		path: path.resolve(__dirname, './wp-content/themes/akhb-retro/js/'),
		publicPath: '/', //trailing slash required. This is where images are stored. Can be URL to CDN etc.
		// clean: { //clean is only suported by Webpack 5.2 and above

		// }
	},
	mode: '',
	module: {
		rules: [
			{

				test: /\.(png|jpg)$/,
				type: 'asset/resource', //use for large images. creates image files in /dist
				generator: {
			         filename: '../img/[name][ext]' //creates the path in compiiled css
			       }
				//type: 'asset/inline' //use for icons/tiny images. doesn't create new files, converts image to base64 string and injects it directly. Adds weight
				//type: 'asset' //combo of the two above, depending on size of the files (8k is default. Set the size with dataUrlCondition below)
				// parser: {
				// 	dataUrlCondition: {
				// 		maxSize: 3 * 1024 // 3kb
				// 	}
				// }
				//type: 'asset/source' //does NOT generate files in /dist.
			},
			{

				test: /\.(txt)/,
				type: 'asset/source' //does NOT generate files in /dist. Creates javascript string
			},
			{

				test: /\.css$/,
				use: [
					MiniCssExtractPlugin.loader, 'css-loader' //loaders need to be installed as dependancies. Order matters, right to left
				]
			},
			{

				test: /\.scss$/,
				use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
            	publicPath: '../img/'
            }
          },
          'css-loader',
          'sass-loader'
        ],
			},
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: [ '@babel/env' ],
						plugins: [ '@babel/plugin-proposal-class-properties']
					}
				}
			}

		]
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: '../css/style.css'
		}),
	]
}