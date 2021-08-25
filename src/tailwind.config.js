module.exports = {
  mode: 'jit',
  purge: ['./*.php'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primary: {
          100: '#F8EBE6',
          200: '#FBC8BA',
          300: '#FEDFA6',
          400: '#B2CEC9',
          500: '#EC894F',
          600: '#FFDFC5',
          550: '#FFDFC5'
        },
        primaryHover: {
          100: '#9EC4BD',
          200: '#98B7B1'
        }
      },
      fontFamily: {
        body: ['Montserrat']
      },
      spacing: {
        '98': '26rem',
        '99': '28rem',
        '100': '30rem',
        '101': '32rem'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
