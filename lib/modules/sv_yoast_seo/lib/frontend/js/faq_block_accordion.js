if ( 'querySelectorAll' in document) {
	(function() {
		const headings = document.querySelectorAll('.wp-block-yoast-faq-block .schema-faq-section')

		Array.prototype.forEach.call(headings, heading => {
			heading.setAttribute('aria-expanded', 'false');
			heading.onclick = () => {
				let expanded = heading.getAttribute('aria-expanded') === 'true' || false;
				headings.forEach( x=> x.setAttribute('aria-expanded', 'false'))
				heading.setAttribute('aria-expanded', !expanded);
			}
		})
	})()
}