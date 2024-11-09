/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: '16px'
    },
    extend: {
      animation: {
        border: 'background ease infinite',
      },
      keyframes: {
        background: {
          '0%, 100%': { backgroundPosition: '0% 50%' },
          '50%': { backgroundPosition: '100% 50%' },
        },
      },
      colors: {
        primary: '#3b82f6',
        dark: '#0f172a',
        secondary: '#64748b'
      },
      screens: {
        '2xl': '1320px'
      }
    },
  },
  plugins: [
    // require('@tailwindcss/forms'),
  ],
}

