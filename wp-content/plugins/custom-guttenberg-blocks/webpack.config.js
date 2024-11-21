const path = require("path");

module.exports = {
  entry: path.resolve(__dirname, "src/block.js"), // File masuk
  output: {
    path: path.resolve(__dirname, "build"), // Folder keluaran
    filename: "index.js", // Nama file hasil bundling
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env", "@babel/preset-react"],
          },
        },
      },
    ],
  },
  mode: "production",
};
