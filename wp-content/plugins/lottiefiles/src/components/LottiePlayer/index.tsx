/**
 * Copyright 2022 Design Barn Inc.
 */

import { Controls, IPlayerProps, Player } from '@lottiefiles/react-lottie-player';
import * as React from 'react';
// eslint-disable-next-line import/no-unassigned-import
import './lottieplayer.scss';

// import '@dotlottie/player-component';

interface ILottiePlayerProps extends IPlayerProps {
  bgColor?: string;
  isPreview: boolean;
  isSimple?: boolean;
  setBackground?: (value: string) => void;
  src: string | Record<string, unknown>;
}

interface IGenericPlayerProps extends IPlayerProps {
  bgColor: string;
  isDotLottie: boolean;
  setBackground?: (value: string) => void;
  src: string;
}

const PreviewPlayer: React.FC<IGenericPlayerProps> = ({ bgColor, src, ...props }) => {
  return (
    <Player
      background={bgColor}
      src={src}
      autoplay
      loop
      style={{ height: '85%', width: '85%', borderRadius: '0.5rem' }}
      {...props}
    />
  );
};

const SimplePlayer: React.FC<IGenericPlayerProps> = ({ bgColor, setBackground, src, ...props }) => {
  return (
    <Player
      src={src}
      autoplay
      loop
      controls
      background={bgColor}
      onBackgroundChange={async (color: string): Promise<void> => {
        setBackground?.(color);
      }}
      {...props}
    >
      <Controls transparentTheme showLabels visible buttons={['play', 'repeat', 'frame']} />
    </Player>
  );
};

export const LottiePlayer: React.FC<ILottiePlayerProps> = ({
  bgColor = '#fff',
  isPreview,
  isSimple = false,
  setBackground,
  src,
  ...props
}) => {
  const isDotLottie = typeof src === 'string' && src.endsWith('.lottie');

  if (isPreview) {
    return <PreviewPlayer isDotLottie={isDotLottie} bgColor={bgColor} src={src} {...props} />;
  } else if (isSimple) {
    return (
      <SimplePlayer isDotLottie={isDotLottie} bgColor={bgColor} src={src} setBackground={setBackground} {...props} />
    );
  }
};
