/**
 * Block dependencies
 */

import classnames from 'classnames';
import Inspector from './inspector';
import './style.scss';
import './editor.scss';


/**
 * Internal block libraries
 */

const {
    Fragment,
    RawHTML,
    renderToString,
} = wp.element;

const { __ } = wp.i18n;

const {
    CheckboxControl,
    TextControl,
	TextareaControl,
	Button
} = wp.components;

const {
    // createBlock,
	getBlockTypes,
	unregisterBlockType,
    registerBlockType,
} = wp.blocks;

const {
	PostFeaturedImage,
	BlockControls,
	MediaUpload,
} = wp.editor;

const { hooks } = wp;

const {
    find,
    isEmpty
} = lodash;



/**
 * whitelist blocks
 */

// let allowedBlocks = [
// 	'snackit/snack-meta',
// ];
//
// getBlockTypes().forEach(
// 	function( blockType ) {
// 		if ( allowedBlocks.indexOf( blockType.name ) === -1 ) {
// 			unregisterBlockType( blockType.name );
// 		}
// 	}
// );





/**
 * Register block
 */

registerBlockType(
    'snackit/snack-meta',
    {
        title: __( 'Snack Card', 'snackit' ),
        description: __( 'Please fill out the fields in the block, optional fields are to be found in the settings column below', 'snackit' ),
        category: 'common',
		icon: {
            background: '#0088ce',
            foreground: '#fff',
            src: 'carrot',
        },

		multiple: false,

        keywords: [
            __( 'Product information', 'snackit' ),
            __( 'Snack Item', 'snackit' ),
            __( 'Drink', 'snackit' ),
        ],

        attributes: {

			snackImage: {
                type: 'string',
				source: 'featured_media',
				selector: 'img',
				attribute: 'src',
				default: 'http://placehold.it/500'
			},

			snackPrice: {
				type: 'string',
				source: 'meta',
				meta: 'snack_price',
				// default: 50,
			},

			snackBrand: {
                type: 'string',
				source: 'meta',
				meta: 'snack_brand',
				// default: 'Haribo',
            },

			snackSize: {
                type: 'string',
				source: 'meta',
				meta: 'snack_size',
				// default: '100ml'
            },

			snackDescription: {
                type: 'string',
				source: 'meta',
				meta: 'snack_description',
				// default: 'drink me! - eat me!'
			},

			snackActive: {
                type: 'boolean',
				source: 'meta',
				meta: 'snack_active',
				// default: TRUE
            },

        },

        edit: props => {
            const { attributes: {
				snackImage,
				snackPrice,
				snackSize,
				snackBrand,
				snackDescription,
				snackActive
            }, className, setAttributes } = props;


            const blocks = wp.data.select( 'core/editor' ).getBlocks();

			function selectImage(value) {
				console.log(value);
				setAttributes({
					snackImage: value.sizes.full.url,
				})
			}

            return (
                <Fragment>

                    <Inspector {...{ setAttributes, ...props }} />
                    <BlockControls></BlockControls>
                    <div className={ className }>

                        <div className='snack-card'>
                            {/*<div className='snack-name'>*/}
                               {/*My Snack <span>(will get pulled from title)</span>*/}
                            {/*</div>*/}
							<div className='snack-price'>
								<TextControl
									label={__('Price (in cent)', 'snackit')}
									value={ snackPrice }
									onChange={ snackPrice => setAttributes({ snackPrice }) }
								/>
							</div>
							<div className='snack-size'>
								<TextControl
									label={__('Size (add ml/g)', 'snackit')}
									value={ snackSize }
									onChange={ snackSize => setAttributes({ snackSize }) }
								/>
							</div>

							<div className='snack-description'>
								<TextareaControl
									label={__('Notes on the Snack', 'snackit')}
									value={ snackDescription }
									onChange={ ( snackDescription ) => setAttributes( { snackDescription } ) }
								/>
							</div>
							<div className='snack-brand'>
								<TextControl
									label={__('Brand', 'snackit')}
									value={ snackBrand }
									onChange={ snackBrand => setAttributes({ snackBrand }) }
								/>
                            </div>
							<div className='snack-image'>
								<strong>Select snack image:</strong>
								<PostFeaturedImage />
							</div>


                        </div>

                    </div>
                </Fragment>
            );
        },

        save: props => {
            return null;
        },
    },
);
