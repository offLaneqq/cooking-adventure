const path = require("path");
const webpack = require("webpack");

const JS_DIR = path.resolve(__dirname, "src/js");
// const IMG_DIR = path.resolve(__dirname, 'src/img');
// const LIB_DIR = path.resolve(__dirname, 'src/library');
const BUILD_DIR = path.resolve(__dirname, "build");

const entry = {
  main: JS_DIR + "/main.js",
  // editor: JS_DIR + '/editor.js',
};

const output = {
  path: BUILD_DIR,
  filename: "js/[name].js",
  clean: true,
};

module.exports = (env, argv) => ({
  mode: env.mode ?? "development",
  entry: entry,
  output: output,
  plugins: plugins(argv),
  devServer: {
    port: end.port ?? 8080,
    static: "./build/js",
    open: true
  },
});

const plugins = (argv) => [new webpack.ProgressPlugin()];
