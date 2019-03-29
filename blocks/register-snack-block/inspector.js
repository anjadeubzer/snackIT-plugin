/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { Component } = wp.element;
const { InspectorControls } = wp.editor;
const {
    PanelBody,
    TextareaControl,
    CheckboxControl,
    PanelRow,
    TextControl,
} = wp.components;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {
    constructor() {
        super(...arguments);
    }

    render() {
        const {
            attributes: {
				snackActive
            },
            setAttributes
        } = this.props;

        return (
            <InspectorControls>

                <PanelBody title={__('Snack Settings', 'snackit')} >

					<PanelRow className='snack-active'>
						<CheckboxControl
							label="online"
							help="show the Snack on the headless site?"
							checked={ snackActive }
							onChange={ ( snackActive ) => { setAttributes( { snackActive } ) } }
						/>
					</PanelRow>
                </PanelBody>

				<PanelBody title={__('Snack Alert', 'snackit')} >
					<PanelRow className='snack-alert'>
						<ul>
							<li>Please refill this snack on:</li>
							<li>- floor 3 (5 requests)</li>
							<li>- floor 0 (1 request)</li>
						</ul>
					</PanelRow>
					<PanelRow className='snack-future'>
						<span>Possible Future Feature</span>
					</PanelRow>
				</PanelBody>

                <PanelBody title={__('Statistics', 'snackit')} >
					<PanelRow>
						<ul>
							<li><strong>56</strong> sold snacks this week</li>
							<li><strong>1.037</strong> sold snacks in total</li>
							<li>Or even: A fancy Graph of how many snacks were sold in the last months</li>
						</ul>
					</PanelRow>
					<PanelRow className='snack-future'>
						<span>Possible Future Feature</span>
					</PanelRow>
				</PanelBody>

            </InspectorControls>
        );
    }
}
