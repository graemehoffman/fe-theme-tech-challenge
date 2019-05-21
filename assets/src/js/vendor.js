
import * as WebFont from 'webfontloader';
import 'lazysizes/plugins/object-fit/ls.object-fit';
import lazySizes from 'lazysizes';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import 'lazysizes/plugins/respimg/ls.respimg';

const init = () =>{

	WebFont.load({
		google: {
			families: ['Raleway']
		}
	});

	lazySizes.init();

	console.info('Load vendor scripts');

};

export default init;
