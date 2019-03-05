const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')
const glob = require('glob-all')
const PurgecssPlugin = require('purgecss-webpack-plugin')

class TailwindExtractor {
  static extract(content) {
    return content.match(/[A-Za-z0-9-_:\/]+/g) || []
  }
}

mix
  .js('resources/js/app.js', 'js')
  .sass('resources/sass/app.scss', 'css')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.js')]
  })
  .extract(['vue', 'axios'])
  .version()

if (mix.inProduction()) {
  mix.webpackConfig({
    plugins: [
      new PurgecssPlugin({
        // Specify the locations of any files you want to scan for class names.
        paths: glob.sync([
          path.join(__dirname, 'resources/views/**/*.blade.php'),
          path.join(__dirname, 'resources/js/**/*.vue')
        ]),
        extractors: [
          {
            extractor: TailwindExtractor,

            // Specify the file extensions to include when scanning for
            // class names.
            extensions: ['html', 'js', 'php', 'vue']
          }
        ]
      })
    ]
  })
}
