/** @type {import('tailwindcss').Config} */
module.exports = {
   content: ['./*'],
   theme: {
      fontFamily: {
         body: ['Inter, sans-serif'],
      },
      extend: {
         colors: {
            main: '#5e72e4',
            secondary: '#8392ab',
            warning: '#fb6340',
            danger: '#f5365c',
            success: '#2dce89',
            info: '#11cdef',
            blue: '#63b3ed',
            purple: '#6f42c1',
            pink: '#d63384',
            orange: '#fd7e14',
            yellow: '#fbd38d',
            green: '#81e6d9',
            teal: '#20c997',
            cyan: '#0dcaf0',
            gray: '#6c757d',
            gray_dark: '#343a40',
            gradient_one: 'rgba(147, 26, 222, 0.83)',
            gradient_two: 'rgba(28, 206, 234, 0.82)',
         },
      },
   },
   plugins: [],
};

// background: linear-gradient(-45deg, rgba(147, 26, 222, 0.83) 0%, rgba(28, 206, 234, 0.82) 100%);
