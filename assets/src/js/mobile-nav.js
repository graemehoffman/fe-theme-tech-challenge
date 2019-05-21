
import delegate from 'delegate';
import closest from 'closest';

import { on, triggerEvent } from './utils/events';

const el = {
	header: document.querySelectorAll('[data-js="header"]')[0],
	navTrigger: document.querySelectorAll('[data-js="nav__trigger"]')[0],
	nav: document.querySelectorAll('[data-js="site-header__nav-container"]')[0],
};

const openNav = () => {
	document.body.classList.add('body--nav-active');
	el.navTrigger.setAttribute('aria-expanded', 'true');
	el.nav.setAttribute('aria-hidden', 'false');
	triggerEvent({
		event: '10upchallenge/open-nav'
	});
	const firstLinkInNav = el.nav.querySelector('.menu-item a');
	if (firstLinkInNav) {
		firstLinkInNav.focus();
	}
};

const closeNav = () => {
	document.body.classList.remove('body--nav-active');
	el.navTrigger.setAttribute('aria-expanded', 'false');
	el.nav.setAttribute('aria-hidden', 'true');
};

const onClickNavTrigger = (e) => {
	if (document.body.classList.contains('body--nav-active')) {
		closeNav();
	} else {
		openNav();
	}
	e.preventDefault();
	e.stopPropagation();
};


/**
 * @function handleClickOutside
 * @description Adds click outside capabilities to close the navigation menu.
 */
const handleCloseOutside = (e) => {
	if (!document.body.classList.contains('body--nav-active')) {
		return;
	}
	if (!closest(e.target, '.site-header__nav-container') && !closest(e.target, '.nav__trigger')) {
		closeNav();
	}
	e.preventDefault();
};

/**
 * @function handleEscapeKey
 * @description Adds Escape key functionality to close the navigation menu, if open.
 */
const handleEscapeKey = (e) => {
	if (e.which !== 27) {
		return;
	}
	if (document.body.classList.contains('body--nav-active')) {
		closeNav();
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
	const notInMenu = !closest(e.target, '.site-header__nav-container');
	const navOpen = document.body.classList.contains('body--nav-active');
	if (notInMenu && navOpen) {
		closeNav();
		el.header.querySelector('.site-branding__logo-link').focus();
	}
};

/**
 * @function handleOpenNav
 * @description When the nav gets opened
 */
const handleOpenNav = () => {
	if (document.body.classList.contains('body--nav-active')) {
		closeNav();
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
	on(document, '10upchallenge/open-search', handleOpenNav());
	delegate(el.header, '[data-js="nav__trigger"]', 'click', onClickNavTrigger);
};

const init = () => {
	if (el.header && el.navTrigger && el.nav) {
		bindEvents();
	}

	console.info('Nav scripts'); // eslint-disable-line no-console
};

export default init;
