const CopyPlugin = require("copy-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");
const webpack = require("webpack");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

const JS_DIR = path.resolve(__dirname, "src/js");
const IMG_DIR = path.resolve(__dirname, "src/img");
const LIB_DIR = path.resolve(__dirname, "src/library");
const BUILD_DIR = path.resolve(__dirname, "build");

const entry = {
  main: JS_DIR + "/main.js",
  editor: JS_DIR + "/editor.js",
};

const output = {
  path: BUILD_DIR,
  filename: "js/[name].js",
  clean: true,
};

const rules = [
  {
    test: /\.js$/,
    exclude: /node_modules/,
    use: {
      loader: "babel-loader",
      options: {
        presets: ["@babel/preset-env"],
      },
    },
  },
  {
    test: /\.scss$/,
    exclude: /node_modules/,
    use: [
      MiniCssExtractPlugin.loader, // convert css into array of js, then minicssextraxtplugin take info and extract it into files
      "css-loader",
      "sass-loader",
    ],
  },
  {
    test: /\.(png|svg|jpg|jpeg|gif)$/i,
    include: [IMG_DIR],
    use: {
      loader: "file-loader",
      options: {
        name: "[path][name].[ext]",
        publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
      },
    },
  },
];

const plugins = () => [
  new webpack.ProgressPlugin(),
  new MiniCssExtractPlugin({
    filename: "css/[name].css", // extracted in build/css/main.css for example
  }),
  new CopyPlugin({
    patterns: [{ from: LIB_DIR, to: BUILD_DIR + "/library" }],
  }),
];

module.exports = (env, argv) => ({
  mode: env.mode ?? "development",
  entry: entry,
  output: output,
  plugins: plugins(),
  module: {
    rules: rules,
  },
  optimization: {
    minimizer: [
      new CssMinimizerPlugin({
        parallel: true,
      }),
    ],
  },
  // performance: {
  //   hints: false,    // need add lazy imports or smth for improve performance
  // },
});
