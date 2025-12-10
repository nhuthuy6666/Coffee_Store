/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './src/**/*.{js,jsx,ts,tsx,scss,php}',
        '../**/*.php',
        '../blocks/**/*.{js,jsx,ts,tsx,php}',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', 'system-ui', 'sans-serif'],
            },
            keyframes: {
                marquee: {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
                fadeInLeft: {
                    '0%': { opacity: '0', transform: 'translateX(-40px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                fadeInRight: {
                    '0%': { opacity: '0', transform: 'translateX(40px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                fadeOutLeft: {
                    '0%': { opacity: '1', transform: 'translateX(0)' },
                    '100%': { opacity: '0', transform: 'translateX(-40px)' },
                },
                fadeOutRight: {
                    '0%': { opacity: '1', transform: 'translateX(0)' },
                    '100%': { opacity: '0', transform: 'translateX(40px)' },
                }
            },
            animation: {
                marquee: 'marquee 25s linear infinite',
                fadeInLeft: 'fadeInLeft 1s ease forwards',
                fadeInRight: 'fadeInRight 1s ease forwards',
                fadeOutLeft: 'fadeOutLeft 1s ease forwards',
                fadeOutRight: 'fadeOutRight 1s ease forwards',
            }
        },
    },
    plugins: [],
};
