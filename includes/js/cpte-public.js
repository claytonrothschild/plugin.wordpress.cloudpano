const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InspectorControls } = wp.editor;
const { PanelBody, TextControl, SelectControl } = wp.components;
const CPTE_TD = 'cloudpano-360-tours-embedder';

const iconEl = wp.element.createElement('svg', {viewBox:"0 0 24 24", xmlns: "http://www.w3.org/2000/svg", width: 20, height: 20 },

	wp.element.createElement('g', { transform:"translate(24 0) scale(-1 1)" },
  		wp.element.createElement('path', { fill: "currentColor", d: "M15 4H5v16h14V8h-4V4ZM3 2.992C3 2.444 3.447 2 3.998 2H16l5 5v13.992A1 1 0 0 1 20.007 22H3.993A1 1 0 0 1 3 21.008V2.992ZM17.657 12l-3.536 3.536l-1.414-1.415L14.828 12l-2.12-2.121l1.413-1.415L17.657 12ZM6.343 12L9.88 8.464l1.414 1.415L9.172 12l2.12 2.121l-1.413 1.415L6.343 12Z" } )
	)

);

registerBlockType('your-namespace/custom-block', {
	title: __('CloudPano 360 Tour Embedder', CPTE_TD),

	icon: iconEl,

	category: 'text',

	attributes: {

		shortId: {
			type: 'string',
			default: '',
		},
		width: {
			type: 'string',
			default: '',
		},
		height: {
			type: 'string',
			default: '',
		},
		alignItems: {
			type: 'string',
			default: 'center',
		},
		
	},

	edit: function ({ attributes, setAttributes }) {

		const { shortId } = attributes;
		const { width }    = attributes;
		const { height }   = attributes;
		const { alignItems }   = attributes;

		const options = [
			{ value: 'center', label: 'Center' },
			{ value: 'left', label: 'Left' },
			{ value: 'right', label: 'Right' },
		  ];

		const onChangeShortId = function (newValue) {

			setAttributes({ shortId: newValue });

		};
		const onChangeWidth = function (newValue) {

			setAttributes({ width: newValue });

		};
		const onChangeHeight = function (newValue) {

			setAttributes({ height: newValue });

		};
		const alignItemsChange = function (newValue) {

			setAttributes({ alignItems: newValue });

		};

		return (

			// Sidebar Content
			wp.element.createElement(

				wp.element.Fragment,
				null,

				wp.element.createElement(InspectorControls, null,

					wp.element.createElement(PanelBody, { title: __('CloudPano 360 Tour Embedder', CPTE_TD) },

						wp.element.createElement(TextControl, {

							label: __('URL', CPTE_TD),
							value: shortId,
							onChange: onChangeShortId,

						}),
						wp.element.createElement('p', { className: 'iscu_shortid_description' }, __('Copy the URL of your hosted Cloud Panel tour and paste it here.', CPTE_TD) ),
						wp.element.createElement(TextControl, {

							label: __('Width', CPTE_TD),
							value: width,
							onChange: onChangeWidth,
							placeholder: '100%',

						}),
						wp.element.createElement(TextControl, {

							label: __('Height', CPTE_TD),
							value: height,
							onChange: onChangeHeight,
							placeholder: '500px',

						}),

						wp.element.createElement(SelectControl, {
							label: __('Select align items:'),
							value: alignItems,
							options: options,
							onChange: alignItemsChange,
						})
					)
				),

				// Block Content
				wp.element.createElement('div', { className: 'custom-block' },

					wp.element.createElement( 'div', { className: 'cpte_custom_block',}, 'CloudPano 360 Tour Embedder' )
					

				)
			)
		);
	},
	
	save: function ( { attributes } ) {

		const { shortId }      = attributes;
		const { width }   	   = attributes;
		const { height }   	   = attributes;
		const { alignItems }   = attributes;

		return  '[cloudpano_360_tours_embedder shortid="'+ shortId +'" alignitems="'+ alignItems +'" width="'+ width +'" height="'+ height +'"]';


	},
  
});