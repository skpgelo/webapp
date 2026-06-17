const HtmlWebpackPlugin = require("html-webpack-plugin");
const path = require('path');

module.exports = {
	  devServer: {	 
	  open: true
	},
  plugins: [
		new HtmlWebpackPlugin({
			template: './dist/index.html'
		})
	],
	 module: {
     rules: [
       {
         test: /\.css$/i,
         use: ['style-loader', 'css-loader'],
       },

      {

        test: /\.(png|svg|jpg|jpeg|gif)$/i,

        type: 'asset/resource',

      },
     ],
   },
};
