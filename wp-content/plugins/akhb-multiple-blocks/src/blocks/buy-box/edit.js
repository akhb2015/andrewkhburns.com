/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, RichText, MediaUpload, InspectorControls, ColorPalette, URLInputButton, BlockControls } from '@wordpress/block-editor';
import { Button, PanelBody } from  '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {

    const blockProps = useBlockProps();

    const onChangeHeading = newHeading => {
        setAttributes({ buyBoxHeading: newHeading })
    }

    const onChangeBuyBoxText = newText => {
        setAttributes({ buyBoxText: newText})
    }

    const onChangeBuyBoxTextColor = newColor => {
        setAttributes({ buyBoxTextColor: newColor })
    }

    return(
        <>
        <InspectorControls {...blockProps}>
            <PanelBody title='Color Options'>
                <div className="components-base-control">
                    <div className="components-base-control__field">
                    
                        <label className="components-base-control__label">
                            Buy Box Text Color
                        </label>
                        <ColorPalette 
                            onChange={onChangeBuyBoxTextColor}
                            value={attributes.buyBoxTextColor}
                        />
                    </div>
                </div>
            </PanelBody>
        </InspectorControls>
        <div className="buy-box" style={{color: attributes.buyBoxTextColor}} >
            <div className="content">
                <h1>
                    <RichText 
                        placeholder = "Type your heading"
                        onChange = { onChangeHeading }
                        value = { attributes.buyBoxHeading }
                    />
                </h1>
                <p>
                    <RichText 
                        placeholder = "Type your text"
                        onChange = { onChangeBuyBoxText }
                        value = { attributes.buyBoxText }
                    />
                </p>
                <a href="#" className="button">Download</a>
            </div>
        </div>
       </>
    );
}