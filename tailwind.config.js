module.exports = {
  content: ['./resources/views/**/**/*.blade.php'],
  theme: {
    extend: {
      animation: {
        wiggle: 'wiggle 1s ease-in-out infinite',
        fadeInRight: 'fadeInRight 0.4s ease-in-out',
        fadeInLeft: 'fadeInLeft 0.4s ease-in-out ',
      },

      keyframes: {
        fadeInRight:{
          '0%':{opacity:'0',transform:'translate3d(100%,0,0)'},
          '100%':{opacity:'1',transform:'none'}
        },
        fadeInLeft:{
          '0%':{opacity:'0',transform:'translate3d(-100%,0,0)'},
          '100%':{opacity:'1',transform:'none'}
        },
        fadeFromUp:{
          '0%':{opacity:'0',transform:'translate3d(0,-100%,0)'},
          '100%':{opacity:'1',transform:'none'}
        },
        wiggle: {
          '0%, 100%': { transform: 'rotate(-3deg)' },
          '50%': { transform: 'rotate(3deg)' },
        }
      },

      fontFamily: {
        'sans': ['Inter', 'sans-serif'],
        'poppins': ['Poppins', 'sans-serif'], 
        'cairo': ['Cairo', 'sans-serif'], 
        'tajawal': ['Tajawal', 'sans-serif'], 
      },
    },
  },
  plugins: [],
}
