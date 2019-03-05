const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

mix
  .js('resources/assets/js/app.js', 'js')
  .sass('resources/assets/sass/app.scss', 'css')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.js')]
  })
  .extract(['vue', 'axios'])
  .version()
