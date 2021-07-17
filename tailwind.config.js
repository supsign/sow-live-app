const colors = require('tailwindcss/colors');

module.exports = {
  mode: 'jit',
  important: true,

  purge: {
    options: {
      safelist: [/^media-library/],
    },
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.ts',
      './resources/**/*.vue',
    ],
  },

  darkMode: false, // or 'media' or 'class'

  theme: {
    extend: {
      colors: {
        icon: {
          DEFAULT: '#EC6607',
          yellow: '#D7AE00',
          green: '#6F7426',
        },
      },
      screens: {
        sm: '640px',
        md: '768px',
        lg: '1024px',
        xl: '1280px',
        xxl: '1536px',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/aspect-ratio'),
    require('tailwindcss-hyphens'),
    require('autoprefixer'),
  ],
};
