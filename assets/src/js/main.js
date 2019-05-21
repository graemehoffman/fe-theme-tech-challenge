// import 'jquery';
import _ from 'lodash';
import vendor from './vendor';
import search from './search';
import mobileNav from './mobile-nav';
import { appReady, on, triggerEvent } from './utils/events';

vendor();

const App = {

	/**
	 * App.init
	 */
	init() {
		search();
		mobileNav();
	},

	resize() {
		triggerEvent({ event: '10upchallenge/resize_executed', native: false });
	},

	bindEvents() {
		on(window, 'resize', _.debounce(App.resize, 200, false));
	}
};

appReady(() => {
	App.init();
	App.bindEvents();
});
