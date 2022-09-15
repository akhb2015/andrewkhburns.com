/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save( {attributes} ) {

    const blockProps = useBlockProps.save();

    const { buyBoxTextColor, buyBoxHeading, buyBoxText } = attributes; 

    return(
        <div className="buy-box" style={{color: buyBoxTextColor}} { ...blockProps } >
            <div className="content">
                <h1>{ buyBoxHeading }</h1>
                <p>{ buyBoxText }</p>
                <a href="#" className="button">Download</a>
            </div>
        </div>
    );
}
