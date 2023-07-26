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
import { useBlockProps, RichText, BlockControls } from '@wordpress/block-editor';
//import { Button, PanelBody, ColorPalette } from  '@wordpress/components';


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

        const { message } = attributes

        //always apply to root element that gets returned
        //add the user-selected styles to the root element. Needs to be added to save()
        const blockProps = useBlockProps()
        
        const onChangeNewMessage = newMessage => {
            setAttributes({ message: newMessage })
        }

        return (

                <h3>
                    <RichText 
                        placeholder = "Type your gated message"
                        onChange = { onChangeNewMessage }
                        value = { message }
                    />
                </h3>
        )
    }