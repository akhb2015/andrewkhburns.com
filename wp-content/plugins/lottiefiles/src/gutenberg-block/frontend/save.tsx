/**
 * Copyright 2022 Design Barn Inc.
 */

import { useBlockProps } from '@wordpress/block-editor';
import clsx from 'clsx';
import * as React from 'react';

import { ILottieProps } from '../../interfaces';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * return WPElement Element to render.
 */
export const Save: React.FC<ILottieProps> = (attributes: ILottieProps) => {
  const {
    background,
    contentAlign,
    framesstart,
    height,
    id,
    interactivitymode,
    interactivitytype,
    loopHack,
    mode,
    speed,
    src,
    totalFrames,
    visibilityend,
    visibilitystart,
    width,
  } = attributes;

  return (
    <div {...useBlockProps.save()} style={{ backgroundColor: background as string }}>
      <lottie-player
        id={id}
        interactivitytype={interactivitytype}
        interactivitymode={interactivitymode}
        visibilitystart={visibilitystart}
        visibilityend={visibilityend}
        framesstart={framesstart}
        framesend={totalFrames}
        rest={loopHack}
        totalFrames={totalFrames}
        mode={mode}
        src={src}
        speed={speed}
        background={background}
        className={clsx(
          'lottie-player',
          contentAlign === 'center' ? 'mx-auto' : '',
          contentAlign === 'left' ? '' : '',
          contentAlign === 'right' ? 'mx-auto mr-0' : '',
        )}
        style={{ width, height }}
      ></lottie-player>
    </div>
  );
};
