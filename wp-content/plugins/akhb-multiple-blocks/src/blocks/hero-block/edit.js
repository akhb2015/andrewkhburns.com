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
import { useBlockProps, RichText, MediaUpload, BlockControls, AlignmentToolbar, InspectorControls, ColorPalette } from '@wordpress/block-editor';
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

    const { heroHeading, tagline, heroImage, heroHeadingColor, taglineColor, alignContent } = attributes; 

    const onChangeHeroHeading = newHeading => {
        setAttributes({ heroHeading: newHeading })
    }

    const onChangeTagline = newTagline => {
        setAttributes({ tagline: newTagline })
    }

    const onSelectImage = newImage => {
        setAttributes({ heroImage: newImage.sizes.full.url })
    }

    const onChangeAlignment = newAlignment => {
        setAttributes({ alignContent: newAlignment })
    }

    const onChangeHeroHeadingColor = newHeadingColor => {
        setAttributes({ heroHeadingColor: newHeadingColor })
    }

    const onChangeTaglineColor = newTaglineColor => {
        setAttributes({ taglineColor: newTaglineColor })
    }

        return(
            <>
            <InspectorControls { ...blockProps }>
                <PanelBody title='Color Options'>
                    <div className="components-base-control">
                        <div className="components-base-control__field">
                        
                            <label className="components-base-control__label">
                                Heading color
                            </label>
                            <ColorPalette 
                                onChange={onChangeHeroHeadingColor}
                                value={heroHeadingColor}
                            />
                            <label className="components-base-control__label">
                                Tagline color
                            </label>
                            <ColorPalette 
                                onChange={onChangeTaglineColor}
                                value={taglineColor}
                            />
                        </div>
                    </div>
                </PanelBody>
            </InspectorControls>

        <div className="hero-block" style={{ backgroundImage: `url(${heroImage})`}} >

            <AlignmentToolbar 
                onChange={ onChangeAlignment }
            />
          
            <MediaUpload
                onSelect = { onSelectImage }
                type = "image"
                value = { heroImage }
                render = {({open}) => {

                    return <Button 
                        onClick={open}
                        icon="format-image"
                        showToolTip = "true"
                        label="Add image"
                        className="add-hero-image-btn"
                    />
                }}
            />

            <h1>
                <RichText 
                    placeholder = "Type your hero heading"
                    onChange = { onChangeHeroHeading }
                    value = { heroHeading }
                    style={{ textAlign: alignContent, color: heroHeadingColor }}
                />
            </h1>
            <p>
                <RichText 
                    placeholder = "Type your tagline"
                    onChange = { onChangeTagline }
                    value = { tagline }
                    style={{ textAlign: alignContent, color: taglineColor }}
                />
            </p>
            
        </div>
    </>
    );
}