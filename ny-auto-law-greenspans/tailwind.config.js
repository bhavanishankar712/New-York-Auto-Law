/** @type {import('tailwindcss').Config} */

module.exports = {
	content: [
		'./*.php',
		'./assets/**/*.php',
		'./inc/**/*.php',
		'./templates/**/*.php',
		'./styles_scripts/src/css/*.css',
		'./styles_scripts/src/css/**/*.css',
		'./styles_scripts/src/js/*.js'],
	safelist: [
		'bg-[#0C1B33]',
		'bg-[#13B317]',
		'bg-[#C9D1DC]',
		'bg-[#06101F]',
		'bg-[#6B7789]',
		'bg-[#000000]',
		'bg-[#FFFFFF]',
	],
	theme: {
		extend: {
			colors: {
				primary: '#0C1B33',
				secondary: '#13B317',
				bodyColor: '#C9D1DC',
				darkBlue: '#06101F',
				lightgrey: '#E7E7E7',
				darkgrey: '#6B7789',
				black: '#000000',
				white: '#FFFFFF',
			},
			screens: {
				'sm': '412px',
				'md': '768px',
				'lg': '1025px',
				'xl': '1281px',
				'2xl': '1441px',
				'3xl': '1650px',
			},
			fontFamily: {
				heading: ['Figtree'],
				body: ['Golos Text'],
				oswald: ['Oswald'],
			},
		},
	},
	plugins: [require('tailwindcss-debug-screens')],
};

