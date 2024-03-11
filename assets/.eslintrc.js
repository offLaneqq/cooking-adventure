module.exports = {
  env: {
    es6: true,
    browser: true,
    node: true,
    commonjs: true,
    jquery: true,
  },
  extends: "plugin:@wordpress/eslint-plugin/recommended",
  overrides: [
    {
      env: {
        node: true,
      },
      files: [".eslintrc.{js,cjs}"],
      parserOptions: {
        sourceType: "script",
      },
    },
  ],
  parserOptions: {
    ecmaVersion: "latest",
    sourceType: "module",
  },
  rules: {
    camelcase: [1],
    "space-in-parens": [1, "always"],
    "no-trailing-spaces": [1],
    "spaced-comment": [0],
    "padded-blocks": [0],
    "prefer-template": [0],
    "max-len": [0],
    "no-else-return": [0],
    "func-names": [0],
    "object-shorthand": [0],
    indent: ["error", "tab"],
    "space-before-function-paren": 0,
    "no-tabs": 0,
    "prefer-destructuring": 0,
    "no-undef": 0,
    "no-param-reassign": 0,
    "comma-dangle": 0,
    "lines-around-comment": 0,
  },
};
