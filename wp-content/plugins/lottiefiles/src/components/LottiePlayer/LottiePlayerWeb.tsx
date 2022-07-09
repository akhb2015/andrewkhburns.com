/**
 * Copyright 2022 Design Barn Inc.
 */

import { createRef, useEffect, useState } from '@wordpress/element';
import clsx from 'clsx';
import * as React from 'react';

import { useInteractivity } from '../../hooks';
import { IHostAppProps, ILottieProps } from '../../interfaces';
import { Mode } from '../../utils/enums';

export const LottiePlayer: React.FC<IHostAppProps> = ({ attributes, setAttributes }: IHostAppProps) => {
  const lottieRef = createRef<HTMLInputElement>();
  const [settings, setSettings] = useState<ILottieProps>(attributes);
  const [loading, setLoading] = useState(true);

  const { loopHack } = attributes;
  const { loop = true, controls = true, autoplay = true } = JSON.parse(loopHack);

  useInteractivity(lottieRef, attributes, setAttributes);
  useEffect(() => {
    setLoading(true);

    setTimeout(() => {
      setSettings(attributes);
      setLoading(false);
    }, 10);
  }, [attributes]);

  if (loading) return <div style={{ width: settings.width, height: settings.height }}>Loading...</div>;

  return (
    // Interactivity works fine with this one
    <lottie-player
      id={settings.id}
      ref={lottieRef}
      controls={controls === true ? '' : null}
      autoplay={attributes.interactivitymode === Mode.NONE ? '' : null}
      loop={loop === true ? '' : null}
      // hover={null}
      src={settings.src}
      speed={settings.speed}
      background={settings.background}
      className={clsx(
        settings.contentAlign === 'center' ? 'lf-mx-auto' : '',
        settings.contentAlign === 'left' ? '' : '',
        settings.contentAlign === 'right' ? 'lf-mx-auto lf-mr-0' : '',
      )}
      style={{ width: settings.width, height: settings.height }}
    ></lottie-player>
  );
};
