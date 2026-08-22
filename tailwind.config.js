import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                purple: {
                    50: '#faf5ff',
                    100: '#f3e8ff',
                    200: '#e9d5ff',
                    300: '#d8b4fe',
                    400: '#c084fc',
                    500: '#a855f7',
                    600: '#7e22ce',
                    700: '#6b21a8', /* Mafuyu Purple Primary */
                    800: '#581c87',
                    900: '#3b0764',
                    950: '#1e162b', /* Nightcord Dark Slate */
                },
                miyama: {
                    dark: '#1e162b',
                    purple: '#6b21a8',
                    accent: '#7b52ab',
                    surface: '#f8fafc',
                    border: '#e2e8f0',
                }
            },
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', '"Noto Sans JP"', ...defaultTheme.fontFamily.sans],
                jp: ['"Noto Sans JP"', '"Hiragino Sans"', '"Yu Gothic"', 'sans-serif'],
                mono: ['"JetBrains Mono"', 'ui-monospace', 'monospace'],
            },
        },
    },

    plugins: [forms],
};
