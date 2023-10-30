/**@type {import('tailwindcss').Config}*/
module.exports = {
  content: ["*.{html,js,php}", "*/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: "#FFFFFF",
        secondary: "#2F4446",
        tertiary: "#D9D9D9",
        textOrange: "#F36823",
        textGray: "#A2A2A2",
        darkGreenColor : "#304547"
      },
      fontFamily: {
        roboto: ["Roboto", "sans-serif"],
      },
    },
  },
  plugins: [],
};


