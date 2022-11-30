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
import { useBlockProps, RichText, MediaUpload, BlockControls, AlignmentToolbar, InspectorControls, PanelColorSettings } from '@wordpress/block-editor';
import { Button, PanelBody, ColorPalette } from  '@wordpress/components';


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
export default function Edit( {attributes, setAttributes} ) {

        const { bgColor, textColor } = attributes

        //always apply to root element that gets returned
        //add the user-selected styles to the root element. Needs to be added to save()
        const blockProps = useBlockProps({
            style: {
                'background-color': bgColor,
                'color': textColor
            }
        })
        
        const onChangeNewBgColor = newBgColor => {
            setAttributes({ bgColor: newBgColor })
        }

        return (
            <>
                <InspectorControls>
                    <PanelColorSettings 
                        title={ __('Colors', 'udemy-plus')}
                        colorSettings={[
                            {
                                label: __('Background Color', 'udemy-plus'),
                                value: bgColor,
                                onChange: onChangeNewBgColor
                            },
                            {
                                label: __('Text Color', 'udemy-plus'),
                                value: textColor,
                                onChange: newTextColor => setAttributes({ textColor: newTextColor })
                            }
                        ]}
                    />
                </InspectorControls>
                <div {...blockProps}>
                    <h1>Search: Your search term here</h1>
                    <form method="post" id="myForm">
                        <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" />
                        <div class="firstname form-error"></div>

                        <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" />
                        <div class="lastname form-error"></div>

                        <input type="email" name="email" id="email" placeholder="Enter your email" />
                        <div class="email form-error"></div>
                        <div className="btn-wrapper">
                            <button type="submit" style={{ 'background-color':bgColor, 'color':textColor}}>Search</button>
                        </div>
                    </form>
                </div>
            </>
        )
    }