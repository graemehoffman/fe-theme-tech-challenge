
import delegate from 'delegate';
import closest from 'closest';

import { on, triggerEvent } from './utils/events';

const el = {
	header: document.querySelectorAll('[data-js="header"]')[0],
	searchTrigger: document.querySelectorAll('[data-js="site-header__search-trigger"]')[0],
	search: document.querySelectorAll('[data-js="site-header__search"]')[0],
};

const openSearch = () => {
	document.body.classList.add('body--search-active');
	el.searchTrigger.setAttribute('aria-expanded', 'true');
	el.search.setAttribute('aria-hidden', 'false');
	const searchInput = el.search.querySelector('.search-form__field');
	if (searchInput) {
		searchInput.focus();
	}
	triggerEvent({
		event: '10upchallenge/open-search'
	});
};

const closeSearch = () => {
	document.body.classList.remove('body--search-active');
	el.searchTrigger.setAttribute('aria-expanded', 'false');
	el.search.setAttribute('aria-hidden', 'true');
};

const onClickSearchTrigger = (e) => {
	if (document.body.classList.contains('body--search-active')) {
		closeSearch();
	} else {
		openSearch();
	}
	e.preventDefault();
	e.stopPropagation();
};


/**
 * @function handleClickOutside
 * @description Adds click outside capabilities to close the navigation menu.
 */
const handleCloseOutside = (e) => {
	if (!document.body.classList.contains('body--search-active')) {
		return;
	}
	if (!closest(e.target, '.site-header__search') && !closest(e.target, '.site-header__search-trigger')) {
		closeSearch();
	}
	// e.preventDefault();
};

/**
 * @function handleEscapeKey
 * @description Adds Escape key functionality to close the navigation menu, if open.
 */
const handleEscapeKey = (e) => {
	if (e.which !== 27) {
		return;
	}
	if (document.body.classList.contains('body--search-active')) {
		closeSearch();
	}
};

/**
 * @function handleTabKey
 * @description Adds Tab key functionality to close the navigation menu when tabbing out of it.
 */
const handleTabKey = (e) => {
	if (e.which !== 9) {
		return;
	}
	if (!closest(e.target, '.site-header__search') && document.body.classList.contains('body--search-active')) {
		closeSearch();
	}
};

/**
 * @function handleOpenNav
 * @description When the nav gets opened
 */
const handleOpenNav = () => {
	if (document.body.classList.contains('body--search-active')) {
		closeSearch();
	}
};


/**
 * @function bindEvents
 * @description Sets up events for the header
 */
const bindEvents = () => {
	on(document, 'click', handleCloseOutside);
	on(document, 'keyup', handleEscapeKey);
	on(document, 'keyup', handleTabKey);
	on(document, '10upchallenge/open-nav', handleOpenNav);

	delegate(el.header, '[data-js="site-header__search-trigger"]', 'click', onClickSearchTrigger);
};

const init = () => {
	if (el.header && el.searchTrigger && el.search) {
		bindEvents();
	}

	console.info('Search scripts'); // eslint-disable-line no-console
};

export default init;
