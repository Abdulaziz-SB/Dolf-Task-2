module.exports = {
  purge: [],
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
        98: '38rem',
        99: '656px'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
