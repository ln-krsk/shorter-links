import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },
        // colors: {
        //     'blue': '#1fb6ff',
        //     'purple': '#7e5bef',
        //     'pink': '#ff49db',
        //     'orange': '#ff7849',
        //     'green': '#13ce66',
        //     'yellow': '#ffc82c',
        //     'gray-dark': '#273444',
        //     'gray': '#8492a6',
        //     'gray-light': '#d3dce6',
        // },
        fontFamily: {
            sans: ['Graphik', 'sans-serif'],
            serif: ['Merriweather', 'serif'],
        },
        extend: {
            spacing: {
                '8xl': '96rem',
                '9xl': '128rem',
            },
            borderRadius: {
                '4xl': '2rem',
            }
        }
    },
}



