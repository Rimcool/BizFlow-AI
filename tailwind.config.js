module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#1E40AF",   // dark blue
        secondary: "#9333EA", // purple
        accent: "#F59E0B",    // amber
        light: "#F3F4F6",     // light gray
        dark: "#111827",      // dark gray
      },
      fontFamily: {
        sans: ["Inter", "sans-serif"],
        heading: ["Poppins", "sans-serif"],
      },
      borderRadius: {
        xl: "1rem",
      },
    },
  },
  plugins: [],
}
