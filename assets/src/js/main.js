// import 'jquery';
import GeneralScripts from './_generalScripts';
import vendor from './vendor';

vendor();

const App = {

	/**
	 * App.init
	 */
	init() {
		// General scripts
		function initGeneralScripts() {
			return new GeneralScripts();
		}
		initGeneralScripts();
	}
};

document.addEventListener('DOMContentLoaded', () => {
	$(() => {
		App.init();
	});
});
